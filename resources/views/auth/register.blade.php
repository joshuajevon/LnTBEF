<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Number -->
        <div>
            <x-input-label for="number" :value="__('number')" />
            <x-text-input id="number" class="block mt-1 w-full" type="text" name="number" :value="old('number')" required autofocus autocomplete="number" />
            <x-input-error :messages="$errors->get('number')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- DOB -->
        <div>
            <x-input-label for="dob" :value="__('DOB')" />
            <x-text-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" required autofocus autocomplete="dob" />
            <x-input-error :messages="$errors->get('dob')" class="mt-2" />
        </div>

        <!-- pob -->
        <div>
            <x-input-label for="pob" :value="__('pob')" />
            <x-text-input id="pob" class="block mt-1 w-full" type="text" name="pob" :value="old('pob')" required autofocus autocomplete="pob" />
            <x-input-error :messages="$errors->get('pob')" class="mt-2" />
        </div>

        <!-- gender -->
        <div>
            <x-input-label for="gender" :value="__('gender')" />
            <div class="male">
                <input type="radio" id="male" name="gender" value="male" @if (old('gender') == "male") checked @endif>
                <label for="male">Male</label>
            </div>

            <div class="female">
                <input type="radio" id="female" name="gender" value="female" @if (old('gender') == "female") checked @endif>
                <label for="female">Female</label>
            </div>

            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- address -->
        <div>
            <x-input-label for="address" :value="__('address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
