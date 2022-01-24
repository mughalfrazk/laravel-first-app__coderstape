@extends('app')
@section('title', 'Service Page')

@section('content')
    <h1>Service Page</h1>

    <form action="/service" method="post">
        @csrf
        <input type="text" name="name" autocomplete="off" />
        <button type="submit">Add Service</button>
    </form>
    <p style="color: red">@error('name') {{ $message }} @enderror</p>

    <ul>
        @forelse ($services as $service)
            <li>{{ $service->name }}</li>
        @empty
            <li>No services available</li>
        @endforelse
    </ul>
@endsection
