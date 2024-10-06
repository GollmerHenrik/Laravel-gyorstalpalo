@extends('layout')

@section('content')

<h1>Kategória szerkesztés</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('categories.update',$category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <fieldset>
        <label for="name">Kategória név</label>
        <input type="text" name="name" id="name" value="{{old('name',$category->name)}}">
    </fieldset>
    <button type="submit">Ment</button>
</form>

@endsection