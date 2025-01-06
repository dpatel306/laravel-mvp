<div class="container mx-auto px-6 py-8">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-4">
        <div class="p-4 bg-white dark:bg-gray-900">
            <h1 class="text-left text-slate-800 text-xl font-medium">User List</h1>
            <div class="p-4 bg-white dark:bg-gray-900">
                <label for="table-search" class="sr-only">Search</label>
                <div class="mt-1">
                    <input type="text" id="table-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
                </div>
            </div>
            <div class="mt-8 grid grid-cols-5 gap-3">
                @foreach($users as $user)
                <div wire:key="{{ $user->id }}" class="bg-slate-200 p-2 max-w-sm rounded-md flex float-start flex-col relative group">
                    <img src="{{ Storage::url('upload/users/user.jpg') }}">
                    <div class="flex float-start flex-col">
                        <span class="text-sm text-left text-blue-700">{{$user->name}}</span>
                        <span class="text-xs">{{$user->email}}</span>
                    </div>
                    <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-20 transition-opacity duration-300 z-0"></div>

                    <!-- Foreground Content -->
                    <div class="absolute inset-0 flex justify-center items-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                        <a 
                        class="bg-red-600 text-white p-2 mx-2 rounded-md hover:bg-red-700 transition-colors duration-300"
                        type="button"
                        wire:click="deleteUser({{ $user->id }})"
                        wire:confirm="Are you sure you want to delete this post?"
                        >Delete</a>
                        <a class="bg-green-600 text-white p-2 mx-2 rounded-md hover:bg-green-700 transition-colors duration-300" wire:click="openModal({{ $user->id }})">Edit</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="p-4 bg-white dark:bg-gray-900">
            {{ $users->links() }}
        </div>
    </div>
    <!-- Modal -->
    @if($isOpen)
        <div 
        x-data="{ showModal: false }"
        x-init="setTimeout(() => showModal = true, 50)" 
        x-show="showModal"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 transition-opacity duration-200 ease-out"
        x-transition:enter="transition-opacity ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click.away="showModal = false; $wire.closeModal()"
        >
            <div class="bg-white p-6 rounded shadow-lg w-1/2">
                <h2 class="text-xl font-bold mb-4">Edit User Details</h2>

                <form wire:submit.prevent="saveUser">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium">Name</label>
                        <input type="text" id="name" wire:model="name" class="w-full border rounded px-3 py-2" />
                        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium">Email</label>
                        <input type="email" id="email" wire:model="email" class="w-full border rounded px-3 py-2" />
                        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="button" wire:click="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>