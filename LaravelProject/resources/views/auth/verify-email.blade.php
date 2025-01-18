<x-guest-layout> <!-- Guest layout component for unauthenticated users -->


    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">

        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent') <!-- Check if a verification link was recently sent -->
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">

            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <!-- Action Buttons Section -->
    <div class="mt-4 flex items-center justify-between">

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf <!-- CSRF token for security -->

            <div>
                <x-primary-button> <!-- Reusable primary button component -->
                    {{ __('Send Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <!-- Form to log out -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <!-- Log Out Button -->
            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
