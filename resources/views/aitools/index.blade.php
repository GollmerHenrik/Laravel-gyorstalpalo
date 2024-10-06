@extends('layout')

@section("content")
<h1>
    AI eszközök
    <a href="{{route('aitools.create')}}" title="Új AI eszköz">🧞‍♂️</a>
    <a href="{{ route('aitools.index', ['sort_by' => 'name', 'sort_dir' => 'asc']) }}" title="ABC">▼</a>
    <a href="{{ route('aitools.index', ['sort_by' => 'name', 'sort_dir' => 'desc']) }}" title="ZYX">▲</a>
</h1>

@if (session('success'))
<div class="alert alert-success">   
    {{session('success')}}
</div> 
@endif

<ul>
    @foreach ($aitools as $aitool)
        <li class="actions">
            {{$aitool->name}}

            <ul class="tags">
                @foreach ($aitool->tags as $tag)
                    <li>{{$tag->name}}</li>
                @endforeach
            </ul>
            <a href="{{route('aitools.show',$aitool->id)}}" class="button">Megjelenites</a>
            <a href="{{route('aitools.edit',$aitool->id)}}" class="button">Szerkesztés</a>
            <form action="{{route('aitools.destroy',$aitool->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="danger">Törlés</button>
            </form>

        </li>
    @endforeach
</ul>
<div id="paginator">
    {{$aitools->appends(["sort_by" =>request('sort_by'),"sort_dir" =>request('sort_dir')])->links()}}   
</div>


@endsection