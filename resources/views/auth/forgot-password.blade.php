<x-app-layout>
    <form action="{{ route('password.email') }}" method="post" class="w-[400px] mx-auto p-6 my-16">
        @csrf
        <h2 class="text-2xl font-semibold text-center mb-5">
            Enter your Email to reset password
        </h2>
        <p class="text-center text-gray-500 mb-6">
            or
            <a
                href="{{ route('login') }}"
                class="text-sm text-purple-700 hover:text-purple-600"
            >login with existing account</a
            >
        </p>
        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        <div class="mb-4">
            <x-text-input
                id="loginEmail"
                type="email"
                name="email"
                placeholder="Your email address"
                required
            />
        </div>
        <button
            class="btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 w-full"
        >
            Email Password Reset Link
        </button>
    </form>
</x-app-layout>
