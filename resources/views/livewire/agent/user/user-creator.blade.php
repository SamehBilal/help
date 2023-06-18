<div>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="font-display text-3xl text-slate-900 dark:text-slate-200">
            {{ __('Add new User') }}
        </h1>
    </div>

    <div class="mt-4 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <form wire:submit.prevent="save">
            <x-card class="relative rounded-lg overflow-hidden">
                <x-slot:content>
                    <fieldset
                        wire:loading.attr="disabled"
                        class="space-y-6 sm:space-y-5"
                    >
                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4">
                            <x-label
                                for="nameInput"
                                :value="__('Name')"
                                class="sm:mt-px sm:pt-2"
                            />
                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <x-input
                                    wire:model.defer="name"
                                    id="nameInput"
                                    type="text"
                                    placeholder="{{ __('John Doe') }}"
                                />
                                <x-input-error
                                    for="name"
                                    class="mt-2"
                                />
                            </div>
                        </div>
                        <div class="sm:border-t sm:border-slate-200 sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:pt-5 dark:sm:border-slate-600">
                            <x-label
                                for="emailInput"
                                :value="__('Email')"
                                class="sm:mt-px sm:pt-2"
                            />
                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <x-input
                                    wire:model.defer="email"
                                    id="emailInput"
                                    type="email"
                                    placeholder="{{ __('johndoe@example.org') }}"
                                />
                                <x-input-error
                                    for="email"
                                    class="mt-2"
                                />
                            </div>
                        </div>
                        <div class="sm:border-t sm:border-slate-200 sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:pt-5 dark:sm:border-slate-600">
                            <x-label
                                for="passwordInput"
                                :value="__('Password')"
                                class="sm:mt-px sm:pt-2"
                            />
                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <x-input
                                    wire:model.defer="password"
                                    id="passwordInput"
                                    type="password"
                                    placeholder="{{ __('********') }}"
                                />
                                <x-input-error
                                    for="password"
                                    class="mt-2"
                                />
                            </div>
                        </div>
                        <div class="sm:border-t sm:border-slate-200 sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:pt-5 dark:sm:border-slate-600">
                            <x-label
                                for="confirmPasswordInput"
                                :value="__('Confirm password')"
                                class="sm:mt-px sm:pt-2"
                            />
                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <x-input
                                    wire:model.defer="password_confirmation"
                                    id="confirmPasswordInput"
                                    type="password"
                                    placeholder="{{ __('********') }}"
                                />
                                <x-input-error
                                    for="password_confirmation"
                                    class="mt-2"
                                />
                            </div>
                        </div>
                    </fieldset>
                </x-slot:content>
                <x-slot:footer class="bg-slate-50 dark:bg-transparent">
                    <div class="flex justify-end">
                        <x-button.primary
                            wire:target="save"
                            wire:loading.attr="disabled"
                        >
                            {{ __('Save') }}
                        </x-button.primary>
                    </div>
                </x-slot:footer>
            </x-card>
        </form>
    </div>
</div>
