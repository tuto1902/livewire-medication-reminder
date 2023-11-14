<?php

namespace App\Services;

use Filament\Forms;

final class MedicationForm
{
    /**
     * Returns the medication form schema
     *
     * @return array $schema
     */
    public static function schema(): array
    {
        $intervalOptions = [
            'Day' => 'Day',
        ];
        for ($day = 2; $day <= 30; $day++) {
            $intervalOptions["$day Days"] = "$day Days";
        }

        return [
            Forms\Components\Grid::make(3)
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('dosage')
                        ->required()
                        ->numeric(),

                    Forms\Components\Select::make('type')
                        ->required()
                        ->native(false)
                        ->options([
                            'tablet' => 'Tablet',
                            'capsule' => 'Capsule',
                            'injection' => 'Injection',
                        ]),

                    Forms\Components\Select::make('interval')
                        ->required()
                        ->prefix('Every')
                        ->options($intervalOptions)
                        ->searchable(),

                    Forms\Components\Repeater::make('times')
                        ->label('Medication times')
                        ->simple(
                            Forms\Components\TimePicker::make('time')
                                ->required()
                                ->seconds(false)
                                ->displayFormat('h:i A')
                        )
                        ->columnSpanFull(),
                ]),
        ];
    }
}
