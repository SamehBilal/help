<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
        <h1 class="font-display text-3xl text-slate-900 dark:text-slate-200">
            {{ __('Languages') }}
        </h1>
        <div class="mt-4 sm:mt-0">
            <x-button.primary
                wire:click="createLanguage"
                type="button"
            >
                <x-heroicon-m-plus class="-ml-1 mr-2 w-4 h-4" />
                {{ __('New language') }}
            </x-button.primary>
        </div>
    </div>

    <div
        x-data="{ showLanguageForm: @entangle('showLanguageForm') }"
        class="mt-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"
    >
        <div class="space-y-4">
            <x-card
                x-cloak
                x-show="showLanguageForm"
                x-trap="showLanguageForm"
                class="bg-slate-50 relative rounded-lg overflow-hidden dark:bg-slate-700/50"
            >
                <x-slot:content>
                    @if ($errors->any())
                        <div class="mb-4 rounded-md bg-red-50 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <x-heroicon-s-x-circle class="w-5 h-5 text-red-400" />
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">
                                        {{ trans_choice('There were :count error with your submission|There were :count errors with your submission', $errors->count()) }}
                                    </h3>
                                    <div class="mt-2 text-sm text-red-700">
                                        <ul
                                            role="list"
                                            class="list-disc pl-5 space-y-1"
                                        >
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form wire:submit.prevent="saveLanguage">
                        <fieldset
                            wire:target="saveLanguage"
                            wire:loading.attr="disabled"
                            class="grid grid-cols-1 gap-6 sm:grid-cols-12 items-end"
                        >
                            <div class="sm:col-span-12 xl:col-span-6">
                                <x-label
                                    for="language.name"
                                    :value="__('Language name')"
                                />
                                <x-input
                                    wire:model.defer="language.name"
                                    type="text"
                                    class="mt-1"
                                    :placeholder="__('Language name')"
                                />
                            </div>
                            <div class="sm:col-span-12 xl:col-span-4">
                                <x-label
                                    for="language.code"
                                    :value="__('Language code')"
                                />
                                <x-input
                                    wire:model.defer="language.code"
                                    type="text"
                                    class="mt-1"
                                    :placeholder="__('Language code')"
                                />
                            </div>
                            {{-- <div class="sm:col-span-12 xl:col-span-2">
                                <x-label
                                for="language.active"
                                :value="__('Active')"
                                class=
                                />
                                <div class="mt-1 sm:col-span-2 sm:mt-0">
                                    <button
                                        wire:model.defer="language.active"
                                        type="button"
                                        class="group relative inline-flex h-5 w-10 flex-shrink-0 cursor-pointer items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-slate-800"
                                        role="switch"
                                        aria-checked="false"
                                    >
                                        <span class="sr-only">{{ __('Make language active') }}</span>
                                        <span
                                            aria-hidden="true"
                                            class="pointer-events-none absolute h-full w-full rounded-md"
                                        ></span>
                                        <span
                                            aria-hidden="true"
                                            @class(['pointer-events-none absolute mx-auto h-4 w-9 rounded-full transition-colors duration-200 ease-in-out', 'bg-blue-600' => 1, 'bg-slate-200' => ! 0])
                                        ></span>
                                        <span
                                            aria-hidden="true"
                                            @class(['pointer-events-none absolute left-0 inline-block h-5 w-5 transform rounded-full border border-slate-200 bg-white shadow ring-0 transition-transform duration-200 ease-in-out', 'translate-x-5' => 1, 'translate-x-0' => ! 0])
                                        ></span>
                                    </button>
                                    <x-input-error
                                        for="enableUserRegistration"
                                        class="mt-2"
                                    />
                                </div>
                            </div> --}}
                            <div class="sm:col-span-12 xl:col-span-2">
                                <div class="flex items-center justify-end space-x-2">
                                    <x-button.text x-on:click="showLanguageForm = false">
                                        {{ __('Cancel') }}
                                    </x-button.text>
                                    <x-button.primary>
                                        {{ __('Save') }}
                                    </x-button.primary>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </x-slot:content>
            </x-card>

            <x-card class="relative rounded-lg overflow-hidden">
                <x-slot:header>
                    <div>
                        <x-input
                            wire:model.debounce.500ms="search"
                            type="search"
                            placeholder="{{ __('Search...') }}"
                        />
                    </div>
                </x-slot:header>
                <x-slot:content>
                    <div class="-mx-4 -my-6 overflow-x-auto sm:-mx-6">
                        <div class="inline-block min-w-full align-middle">
                            <div class="relative overflow-hidden ring-1 ring-black ring-opacity-5">
                                <div
                                    wire:loading.delay
                                    class="absolute inset-0 z-10 bg-slate-100/50 dark:bg-slate-700/50"
                                >
                                    <div
                                        wire:loading.flex
                                        class="h-full w-full items-center justify-center"
                                    >
                                        <div class="m-auto flex items-center space-x-2">
                                            <x-loading-spinner class="w-5 h-5 dark:text-slate-200" />
                                            <p class="text-sm dark:text-slate-200">{{ 'Loading languages...' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <table class="min-w-full divide-y divide-slate-300 dark:divide-slate-600">
                                    <thead class="bg-slate-50 dark:bg-slate-700">
                                        <tr>
                                            <th
                                                scope="col"
                                                class="pl-4 pr-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-slate-500 whitespace-nowrap sm:pl-6 dark:text-slate-200"
                                            >
                                                {{ __('Name') }}
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-slate-500 whitespace-nowrap dark:text-slate-200"
                                            >
                                                {{ __('Code') }}
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-3 py-3 text-center text-xs font-medium uppercase tracking-wide text-slate-500 whitespace-nowrap dark:text-slate-200"
                                            >
                                                {{ __('Active') }}
                                            </th>
                                            <th
                                                scope="col"
                                                class="relative pl-3 pr-4 py-3 text-right text-xs font-medium uppercase tracking-wide text-slate-500 whitespace-nowrap sm:pr-6 dark:text-slate-200"
                                            >
                                                <span class="sr-only">
                                                    {{ __('Actions') }}
                                                </span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-200 dark:divide-slate-600">
                                        @forelse($this->languages as $language)
                                            <tr
                                                wire:target="search"
                                                wire:loading.class.delay="opacity-50"
                                                class="hover:bg-slate-50 dark:hover:bg-slate-700/25"
                                            >
                                                <td class="whitespace-nowrap pl-4 pr-3 py-4 font-medium text-sm text-slate-900 sm:pl-6 dark:text-slate-200">
                                                    <a
                                                        href="{{ route('agent.tickets.list', ['language' => $language->slug]) }}"
                                                        class="hover:text-blue-500 hover:underline dark:hover:text-blue-400"
                                                    >
                                                        {{ $language->name }}
                                                    </a>
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-left text-sm text-slate-500 dark:text-slate-400">
                                                    {{ $language->code }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-center text-sm text-slate-500 dark:text-slate-400">
                                                    <button
                                                        wire:click="toggleActive({{ $language->id }})"
                                                        type="button"
                                                        class="group relative inline-flex h-5 w-10 flex-shrink-0 cursor-pointer items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-slate-200 dark:focus:ring-offset-slate-800"
                                                    >
                                                        <span class="sr-only">{{ __('Toggle language status') }}</span>
                                                        <span
                                                            aria-hidden="true"
                                                            class="pointer-events-none absolute h-full w-full rounded-md"
                                                        ></span>
                                                        <span
                                                            aria-hidden="true"
                                                            @class(['pointer-events-none absolute mx-auto h-4 w-9 rounded-full transition-colors duration-200 ease-in-out', 'bg-blue-600' => $language->active, 'bg-slate-200' => ! $language->active])
                                                        ></span>
                                                        <span
                                                            aria-hidden="true"
                                                            @class(['pointer-events-none absolute left-0 inline-block h-5 w-5 transform rounded-full border border-slate-200 bg-white shadow ring-0 transition-transform duration-200 ease-in-out', 'translate-x-5' => $language->active, 'translate-x-0' => ! $language->active])
                                                        ></span>
                                                    </button>
                                                </td>
                                                {{-- <td class="whitespace-nowrap px-3 py-4 text-center text-sm text-slate-500 dark:text-slate-400">
                                                    {{ $language->tickets_count }}
                                                </td> --}}
                                                <td class="whitespace-nowrap pl-3 pr-4 py-4 text-right text-sm text-slate-500 sm:pr-6">
                                                    <div
                                                        x-data="{ confirmLanguageDeletion: false }"
                                                        x-on:click.outside="confirmLabelDeletion = false"
                                                    >
                                                        <div
                                                            x-show="!confirmLanguageDeletion"
                                                            class="space-x-1"
                                                        >
                                                            <button
                                                                wire:click="editLanguage({{ $language->id }})"
                                                                type="button"
                                                                title="{{ __('Edit label') }}"
                                                                class="hover:text-blue-500"
                                                            >
                                                                <x-heroicon-m-pencil-square class="h-4 w-4" />
                                                                <span class="sr-only">{{ __('Edit') }}</span>
                                                            </button>
                                                            <button
                                                                x-on:click="confirmLanguageDeletion = true"
                                                                type="button"
                                                                title="{{ __('Delete label') }}"
                                                                class="hover:text-red-500"
                                                            >
                                                                <x-heroicon-m-trash class="h-4 w-4" />
                                                                <span class="sr-only">{{ __('Delete') }}</span>
                                                            </button>
                                                        </div>
                                                        <div
                                                            x-cloak
                                                            x-show="confirmLanguageDeletion"
                                                            class="space-x-1"
                                                        >
                                                            <button
                                                                x-on:click="confirmLanguageDeletion = false"
                                                                type="button"
                                                                title="{{ __('Cancel') }}"
                                                                class="text-blue-600 hover:text-blue-500"
                                                            >
                                                                <x-heroicon-m-x-circle class="h-4 w-4" />
                                                                <span class="sr-only">{{ __('Cancel') }}</span>
                                                            </button>
                                                            <button
                                                                wire:click="deleteLanguage('{{ $language->id }}')"
                                                                x-on:click="confirmLanguageDeletion = false"
                                                                type="button"
                                                                title="{{ __('Confirm') }}"
                                                                class="text-red-600 hover:text-red-500"
                                                            >
                                                                <x-heroicon-m-check-circle class="h-4 w-4" />
                                                                <span class="sr-only">{{ __('Confirm') }}</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr wire:loading.class.delay="opacity-50">
                                                <td
                                                    colspan="5"
                                                    class="px-3 py-8 text-center text-slate-500 dark:text-slate-400"
                                                >
                                                    <div class="inline-flex items-center space-x-1">
                                                        <x-heroicon-o-inbox class="w-5 h-5 text-slate-400" />
                                                        <span>{{ __('No records found...') }}</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </x-slot:content>
                @if($this->languages->hasPages())
                    <x-slot:footer>
                        {{ $this->languages->links() }}
                    </x-slot:footer>
                @endif
            </x-card>
        </div>
    </div>
</div>
