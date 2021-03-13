@extends('layouts.base')

@section('body')
    <header class="fixed z-50 flex justify-end w-full h-20 bg-white shadow-md align-items-center">
        {{-- <button onclick="window.location='{{ url()->previous() }}'" class="w-40 text-xl">Go back</button> --}}

        <div
            style="padding: 5px; height: 100%; display: flex; justify-content: center; align-items: center; margin-right: 10px;">
            <img class="shadow-xl" src="https://static.theceomagazine.net/wp-content/uploads/2018/10/15093202/elon-musk.jpg"
                title="User avatar"
                style="cursor: pointer; height: 50px; width: 50px; background-color: indigo; border-radius: 50%; object-fit: cover;" />
        </div>
    </header>

    <main class="py-36">
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </main>
@endsection
