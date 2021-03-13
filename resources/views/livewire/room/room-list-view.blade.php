<div>
    <div class="container mx-auto">
        <div class="flex justify-between align-items-center">
            <h1 class="text-4xl">Rooms</h1>
            <button class="px-5 font-bold text-white bg-indigo-500 rounded-md" wire:click="toCreateView">Create
                Room</button>
        </div>

        <div class="flex flex-wrap justify-center mt-24">
            @foreach ($rooms as $item)
                <div class="mx-5 my-5 rounded-md shadow-lg w-96">
                    <div class="w-full h-64 bg-gray-100 rounded-t-md"></div>
                    <div class="px-5 py-5">
                        <div class="text-xl">{{ $item->address }}</div>
                        <div class="text-md">{{ $item->home_type }}, {{ $item->room_type }}</div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
