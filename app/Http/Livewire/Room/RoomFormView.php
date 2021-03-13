<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
use Carbon\Carbon;
use Livewire\Component;

class RoomFormView extends Component
{
    public $mapped;

    public $form = [
        'home_type' => null,
        'room_type' => null,
        'total_occupancy' => null,
        'total_bedrooms' => null,
        'total_bathrooms' => null,
        'summary' => null,
        'address' => null,
        'price' => null,
        'has_tv' => false,
        'has_kitchen' => false,
        'has_air_con' => false,
        'has_heathing' => false,
        'is_draft' => false,
    ];

    public $fields = [
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
            'value' => false,
            'type' => 'checkbox',
            'required' => false,
        ],
        'has_kitchen' => [
            'value' => false,
            'type' => 'checkbox',
            'required' => false,
        ],
        'has_air_con' => [
            'value' => false,
            'type' => 'checkbox',
            'required' => false,
        ],
        'has_heathing' => [
            'value' => false,
            'type' => 'checkbox',
            'required' => false,
        ],
        'is_draft' => [
            'value' => false,
            'type' => 'checkbox',
            'required' => false,
        ],
    ];

    protected $rules = [
        'form.home_type' => 'required',
        'form.room_type' => 'required',
        'form.total_occupancy' => 'required|integer',
        'form.total_bedrooms' => 'required|integer',
        'form.total_bathrooms' => 'required|integer',
        'form.address' => 'required',
    ];

    protected $messages = [
        'form.home_type.required' => 'Must select a home type.',
        'form.room_type.required' => 'Must select a room type.',
        'form.total_occupancy.required' => 'Please specifiy the total occupancy.',
        'form.total_occupancy.integer' => 'It should be an integer value.',
        'form.total_bedrooms.required' => 'Please specifiy the total bedrooms.',
        'form.total_bedrooms.integer' => 'It should be an integer value.',
        'form.total_bathrooms.required' => 'Please specifiy the total bathrooms.',
        'form.total_bathrooms.integer' => 'It should be an integer value.',
        'form.address.required' => 'Please provide the address.',
    ];

    public function submit()
    {
        if ($this->validate()) {
            $this->form['owner_id'] = auth()->id();
            if ($this->form['is_draft']) {
                $this->form['published_at'] = Carbon::now()->format('Y-m-d');
            }

            $this->mapped = $this->form;
            Room::create($this->form);
        }
    }

    public function render()
    {
        return view('livewire.room.room-form-view');
    }
}
