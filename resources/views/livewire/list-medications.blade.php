<div 
    x-data="{
        theme: null,
        init: function () {
            this.theme = localStorage.getItem('theme') || 'dark'
            this.changeTheme(this.theme)
        },
        changeTheme: function(theme) {
            this.theme = theme
            localStorage.setItem('theme', theme)
            document.documentElement.className = theme
        }
    }"
>
    <main class="wrapper w-full md:max-w-5xl mx-auto pt-20 px-4">
        <header class="flex justify-between">
            <div>
                <h1 class="text-xl font-medium text-gray-950 dark:text-white">Medications</h1>
            </div>
            <div class="flex gap-1">
                <a
                    class="block w-full rounded-md whitespace-nowrap px-3 py-2 text-sm font-normal text-gray-700 hover:bg-gray-100 focus:bg-gray-200 focus:outline-none active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-100 dark:hover:bg-gray-600 focus:dark:bg-gray-600"
                    :class="theme === 'light' ? 'bg-gray-200' : 'bg-transparent'"
                    href="#"
                    x-on:click="changeTheme('light')"
                >
                    <div class="pointer-events-none">
                        <div class="inline-block w-[24px] text-center" data-theme-icon="light">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="inline-block h-6 w-6">
                            <path
                                d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z" />
                            </svg>
                        </div>
                        <span data-theme-name="light">Light</span>
                    </div>
                </a>
                <a
                    class="block w-full rounded-md whitespace-nowrap px-3 py-2 text-sm font-normal text-gray-700 hover:bg-gray-100 focus:bg-gray-200 focus:outline-none active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-100 dark:hover:bg-gray-600 focus:dark:bg-gray-600"
                    :class="theme === 'dark' ? 'dark:bg-gray-600' : 'bg-transparent'"
                    href="#"
                    x-on:click="changeTheme('dark')"
                >
                    <div class="pointer-events-none">
                        <div class="inline-block w-[24px] text-center" data-theme-icon="dark">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="inline-block h-6 w-6">
                            <path
                                fill-rule="evenodd"
                                d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10.503 10.503 0 01-9.694 6.46c-5.799 0-10.5-4.701-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 01.818.162z"
                                clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span data-theme-name="dark">Dark</span>
                    </div>
                </a>
            </div>
        </header>
        <section class="pt-4">
            {{ $this->table }}
        </section>
    </main>
</div>
