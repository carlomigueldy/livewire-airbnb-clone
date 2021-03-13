<div>
    <div class="flex justify-center align-items-center my-14">
        <form wire:submit.prevent="submit" class="w-6/12">
            <div class="text-center ">
                <h1 class="text-4xl">Room Form View</h1>
            </div>
            @foreach ($this->fields as $field => $value)
                <div class="w-full p-5 ">
                    <label for="{{ 'fields.' . $field }}">
                        <span class="font-bold">{{ str_replace('_', ' ', Str::title($field)) }}</span>
                        <span class="text-red-500">*</span>
                    </label>
                    <div class="w-full">
                        @switch($value['type'])
                            @case('text')
                            <input type="text" class="w-full px-3 rounded-md "
                                wire:model="{{ 'fields.' . $field . '.value' }}">
                            @break
                            @case('select')
                            <select class="w-full rounded-md" wire:model="{{ 'fields.' . $field . '.value' }}">
                                @foreach ($value['options'] as $option)
                                    <option value="{{ $option }}">{{ $option }}</option>
                                @endforeach
                            </select>
                            @break

                            @case('number')
                            <input type="number" min="0" max="10" class="w-full px-3 rounded-md "
                                wire:model="{{ 'fields.' . $field . '.value' }}">
                            @break

                            @case('checkbox')
                            <input type="checkbox" class="rounded focus:outline-none" wire:model="{{ 'fields.' . $field . '.value' }}">
                            @break
                            @default

                        @endswitch

                        @error('fields.' . $field . '.value') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            @endforeach



            <button class="w-full p-5 mt-10 text-xl text-white bg-indigo-500 rounded-lg shadow-lg color"
                type="submit">Create</button>
        </form>
    </div>

    <code>
        {{ json_encode($this->fields) }}
    </code>
</div>
