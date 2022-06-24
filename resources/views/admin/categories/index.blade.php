@extends('layouts.admin')

@section('content')
<a href="{{route('admin.categories.create')}}">Crea nuova categoria</a>
<div class="container">
    <div class="row">
        @foreach ($categories as $category)
        <div class="col-2 py-2">
            <div class="card text-center">
                <a href="{{route('admin.categories.show',$category->id)}}"><h4>{{$category->name}}</h4></a>
                <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-primary">Modifica</a>
                <form action="{{route('admin.categories.destroy',$category->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100">Cancella</button>
                </form>
            </div>
            
        </div>
        @endforeach
    </div>
</div>
@endsection