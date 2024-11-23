<div class="container h-full mx-auto flex flex-1 flex-col justify-center">
    <div class="max-w-xl w-80 x-auto p-6 bg-white shadow rounded self-center">
        <h2 class="text-2xl font-bold mb-3 text-center">Login</h2>

        @if (session()->has('message'))
        <div class="mb-4 text-green-500">
            {{ session('message') }}
        </div>
        @endif

        @if (session()->has('error'))
        <div class="mb-4 text-red-500">
            {{ session('error') }}
        </div>
        @endif

        <form wire:submit.prevent="login">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" wire:model="email" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" wire:model="password" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full mt-4 px-4 py-2 text-white bg-black rounded hover:bg-indigo-600">Login</button>
        </form>
        <div class="mt-5 mb-4 flex justify-center items-center">
            <a class="text-center" href="">Forgot password ?</a>
        </div>
    </div>
</div>