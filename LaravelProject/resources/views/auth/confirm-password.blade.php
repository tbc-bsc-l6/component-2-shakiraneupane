<x-guest-layout>
    <!-- Display a message to inform users that this is a secure area and password confirmation is required -->
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <!-- Form for password confirmation -->
    <form method="POST" action="">
        @csrf <!-- CSRF protection for form submission -->

        <!-- Password input field -->
        <div>
            <!-- Label for the password input field -->
            <x-input-label for="password" :value="__('Password')" />

            <!-- Password input text field -->
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <!-- Error messages for password validation -->
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Submit button -->
        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
