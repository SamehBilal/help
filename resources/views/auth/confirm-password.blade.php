<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img
                    src="{{ $generalSettings->favicon_path ? Storage::url($generalSettings->favicon_path) : asset('img/logo-blue.png') }}"
                    alt="{{ $generalSettings->site_name ?? config('app.name') }}"
                    class="h-12 w-auto"
                >
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-slate-600">
            {{ __('content.This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors
            class="mb-4"
            :errors="$errors"
        />

        <form
            method="POST"
            action="{{ route('password.confirm') }}"
        >
            @csrf

            <!-- Password -->
            <div>
                <x-label
                    for="password"
                    :value="__('content.Password')"
                />

                <x-input
                    id="password"
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                />
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('content.Confirm') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
