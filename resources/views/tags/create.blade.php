@extends('layout')

@section("content")

<h1>Új Címke</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('tags.store') }}" method="POST">
    @csrf
    <fieldset>
        <label for="name">Címke név</label>
        <input type="text" name="name" id="name">
    </fieldset>
    <button type="submit">Ment</button>
</form>
@endsection