<div>
    <style>
        #RoomContainer {
            cursor: pointer;
            transition: all .2s ease-in-out;
        }

        #RoomContainer:hover {
            transform: scale(1.05);
        }

    </style>

    <button wire:click='toCreateView'
        class="fixed z-50 p-5 px-16 font-bold text-white bg-indigo-500 rounded-md shadow-2xl bottom-10 right-10">
        Create new Room
    </button>

    <div class="container h-full mx-auto">
        <div class="flex justify-between align-items-center">
            <h1 class="text-4xl">Rooms</h1>
            {{-- <button class="px-5 font-bold text-white bg-indigo-500 rounded-md" wire:click="toCreateView">Create
                Room</button> --}}
        </div>

        @if (session()->has('success'))
            <div class="p-5 my-10 rounded-lg bg-green-50">
                <span
                    class="text-2xl font-bold text-green-600">{{ session('success') ?? 'Success message here' }}</span>
            </div>
        @endif

        @if ($this->hasRooms)
            <div class="flex flex-wrap justify-center mt-24">
                @foreach ($rooms as $item)
                    <div id="RoomContainer" wire:click="toRoomDetailView({{ $item->id }})"
                        class="mx-5 my-5 rounded-md shadow-lg w-96">
                        <div class="w-full h-64 bg-gray-100 rounded-t-md"
                            style="background-image: url(https://picsum.photos/500/500.jpg); background-repeat: no-repeat; background-position: center; object-fit: cover;">
                        </div>
                        <div class="px-5 py-5">
                            <div class="text-xl">{{ $item->address }}</div>
                            <div class="text-md">{{ $item->home_type }}, {{ $item->room_type }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex justify-center mt-64 align-items-center">
                <div class="text-center">
                    <div class="mb-10 text-2xl">You have no rooms yet, start creating!</div>
                    <button class="px-10 py-3 font-bold text-white bg-indigo-500 rounded-md "
                        wire:click="toCreateView">Get Started</button>
                </div>
            </div>
        @endif

    </div>
</div>
