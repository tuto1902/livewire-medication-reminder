<?php

namespace App\Livewire;

use App\Models\Medication;
use App\Services\MedicationForm;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Livewire\Component;

class ListMedications extends Component implements HasForms, HasTable
{
    use InteractsWithForms, InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(Medication::query())
            ->columns([
                Tables\Columns\Layout\Split::make([
                    Tables\Columns\TextColumn::make('name')
                        ->weight('bold'),
                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('dosage')
                            ->html()
                            ->formatStateUsing(function (Medication $record): string {
                                return new HtmlString(
                                    '<span class="text-gray-800 font-semibold">'.
                                    $record->dosage.' '.
                                    Str::plural($record->type, $record->dosage).
                                    '</span> every '.
                                    Str::lcfirst($record->interval)
                                );
                            })
                            ->color('gray')
                            ->size('text-xs'),
                        Tables\Columns\TextColumn::make('times')
                            ->badge()
                            ->time('h:i A'),
                    ])->space(1),

                ])->from('md'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->model(Medication::class)
                    ->form(MedicationForm::schema())
                    ->slideOver(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->form(MedicationForm::schema())
                    ->slideOver(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public function render()
    {
        return view('livewire.list-medications');
    }
}
