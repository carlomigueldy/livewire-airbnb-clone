<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
use Livewire\Component;

class RoomListView extends Component
{
    public $room;

    public $rooms;

    public function mount(Room $room)
    {
        $this->room = $room;
        $this->rooms = $room->orderBy('created_at', 'desc')->get();
    }

    public function toCreateView()
    {
        return redirect(route('rooms.create'));
    }

    public function render()
    {
        return view('livewire.room.room-list-view');
    }
}
