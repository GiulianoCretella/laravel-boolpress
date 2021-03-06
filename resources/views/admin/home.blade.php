@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-4 text-center">
            <div class="card my-2">
                <a href="{{route('admin.posts.index')}}"><h1>Vai ai Post</h1></a>
            </div>
        </div>
        <div class="col-4 text-center">
            <div class="card my-2">
                <a href="{{route('admin.categories.index')}}"><h1>Vai alle categorie</h1></a>
            </div>
        </div>
        <div class="col-4 text-center">
            <div class="card my-2">
                <a href="{{route('admin.tags.index')}}"><h1>Vai ai tags</h1></a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
