<div>
    <div class="flex justify-start h-20 shadow-md bg-gray-50 align-items-center">
        <button class="w-40 text-xl">Go back</button>
    </div>

    <div class="flex justify-center my-10 align-items-center">
        <form wire:submit.prevent="submit" class="w-6/12">
            <div class="mb-16 text-center">
                <h1 class="text-4xl">Create a new room</h1>
            </div>
            @foreach ($this->fields as $field => $value)
                <div class="w-full p-5 ">
                    <label for="{{ 'fields.' . $field }}">
                        <span class="font-bold">{{ str_replace('_', ' ', Str::title($field)) }}</span>
                        @if ($value['required'])
                            <span class="text-red-500">*</span>
                        @endif
                    </label>
                    <div class="w-full">
                        @switch($value['type'])
                            @case('text')
                            <input type="text" class="w-full px-3 rounded-md "
                                wire:model="{{ 'fields.' . $field . '.value' }}">
                            @break

                            @case('textarea')
                            <textarea type="textarea" class="w-full px-3 rounded-md " rows="8"
                                wire:model="{{ 'fields.' . $field . '.value' }}"></textarea>
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
                            <input type="checkbox" class="rounded focus:outline-none"
                                wire:model="{{ 'fields.' . $field . '.value' }}">
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

    <div class="p-5 font-bold bg-green-200">
        <code>
            {{ json_encode($this->fields) }}
        </code>
    </div>

    <div class="p-5 font-bold bg-green-300">
        <code>{{ json_encode($this->mapped) }}</code>
    </div>

</div>
