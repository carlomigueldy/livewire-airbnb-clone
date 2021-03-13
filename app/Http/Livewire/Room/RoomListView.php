<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
use Livewire\Component;

class RoomListView extends Component
{
    public $room;

    public $rooms;

    public function getHasRoomsProperty()
    {
        if ($this->rooms == null) return false;

        return count($this->rooms) > 0;
    }

    public function mount(Room $room)
    {
        $this->room = $room;
        $this->rooms = $room->orderBy('created_at', 'desc')->get();
    }

    public function toCreateView()
    {
        return redirect(route('rooms.create'));
    }

    public function toRoomDetailView($id)
    {
        return redirect(route('rooms.show', $id));
    }

    public function render()
    {
        return view('livewire.room.room-list-view');
    }
}
