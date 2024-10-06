@extends('layout')

@section('content')

<h1>AI eszköz szerkesztés</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('aitools.update',$aitool->id) }}" method="POST">
    @csrf
    @method('PUT')
    <fieldset>
        <label for="name">AI eszköz név</label>
        <input type="text" name="name" id="name" value="{{old('name',$aitool->name)}}">
    </fieldset>
    <fieldset>
        <label for="category_id">Kategória</label>
        <select name="category_id" id="category_id" value="{{old('category_id',$aitool->category->name)}}">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </fieldset>
    <fieldset>
        <label for="description">Leírás</label>
        <textarea name="description" id="description" value="{{old('description',$aitool->description)}}"></textarea>
    </fieldset>
    <fieldset>
        <label for="link">Link</label>
        <input type="text" name="link" id="link" value="{{old('link',$aitool->link)}}">
    </fieldset>
    <fieldset>
        <label for="hasFreePlan">Van ingyenes változat?</label>
        <input type="checkbox" name="hasFreePlan" id="hasFreePlan" value="{{old('hasFreePlan',$aitool->hasFreePlan)}}">
    </fieldset>
    <fieldset>
        <label for="price">Ár (Ft/hó)</label>
        <input type="number" name="price" id="price" value="{{old('price',$aitool->price)}}">
    </fieldset>
    <button type="submit">Ment</button>
</form>

@endsection