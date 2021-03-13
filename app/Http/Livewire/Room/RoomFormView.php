<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
use App\Repository\Contracts\RoomRepositoryInterface;
use Livewire\Component;

class RoomFormView extends Component
{
    private $roomRepository;

    public $mapped;

    public $fields = [
        // 'owner_id' => null,
        'home_type' => [
            'value' => null,
            'type' => 'select',
            'required' => true,
            'options' => [
                'Entire place',
                'Private room',
                'Hotel room',
                'Unique stays',
                'Superhosts',
                'Shared room'
            ]
        ],
        'room_type' => [
            'value' => null,
            'type' => 'select',
            'required' => true,
            'options' => [
                'Single',
                'Double',
                'Triple',
                'Quad',
                'King',
                'Queen',
                'Twin',
                'Double-double',
                'Studio'
            ]
        ],
        'total_occupancy' => [
            'value' => null,
            'type' => 'number',
            'required' => true,
        ],
        'total_bedrooms' => [
            'value' => null,
            'type' => 'number',
            'required' => true,
        ],
        'total_bathrooms' => [
            'value' => null,
            'type' => 'number',
            'required' => true,
        ],
        'summary' => [
            'value' => null,
            'type' => 'textarea',
            'required' => false,
        ],
        'address' => [
            'value' => null,
            'type' => 'text',
            'required' => true,
        ],
        'price' => [
            'value' => null,
            'type' => 'number',
            'required' => true,
        ],
        'has_tv' => [
            'value' => null,
            'type' => 'checkbox',
            'required' => false,
        ],
        'has_kitchen' => [
            'value' => null,
            'type' => 'checkbox',
            'required' => false,
        ],
        'has_air_con' => [
            'value' => null,
            'type' => 'checkbox',
            'required' => false,
        ],
        'has_heathing' => [
            'value' => null,
            'type' => 'checkbox',
            'required' => false,
        ],

        // 'latitude' => null,
        // 'longitude' => null,
        // 'published_at' => null,
    ];

    // /**
    //  * @param RoomRepositoryInterface $roomRepository
    //  * @return void
    //  */
    // public function mount(RoomRepositoryInterface $roomRepository)
    // {
    //     $this->roomRepository = $roomRepository;
    // }

    public function render()
    {
        return view('livewire.room.room-form-view');
    }

    public function submit()
    {
        $fields = collect($this->fields);
        $mappedFields = $fields->map(function ($item, $key) {
            return $item['value'];
        })->values()->toArray();
        $mappedFields['owner_id'] = auth()->id();

        Room::create($mappedFields);
    }
}
