@extends('layouts.master')

@section('title', 'All Article')

@section('content')

<div class="container"style="margin-top: 90px; margin-bottom: 90px">
    <div class="row">
        <div class="col">
            <div class="row justify-content-between align-items-center">
                <div>
                    @isset($category)
                        <h1 class="my-4">Category : {{  $category->name }}</h1>
                    @endisset
                    @isset($user)
                        <h1 class="my-4">Author : {{  $user->name }}</h1>
                    @endisset
                    @if(!isset($category) && !isset($user) )
                        <h1 class="my-4">All Post</h1>
                    @endif

                </div>
                @auth
                <a href="/create" class="btn btn-primary btn-sm ">Add Article</a>
                @endauth
            </div>
        </div>
    </div>
    <div class="row mt-4">
        @foreach($articles as $article)
        <div class="col-3 mt-3">
            <div class="card" style="width: 17rem;">
                <img class="card-img-top" src="/storage/{{ $article->image }}" alt="Card image cap" style="height: 12rem; object-fit: cover">
                <div class="card-body">
                  <h5 class="card-title">{{ Str::limit($article->title, 20, '...') }}</h5>
                  <small class="card-text">{{ Str::limit($article->content, 50, '...')  }}</small> <br>
                  <small>Author : <span class="text-danger"> {{ $article->user->name }}</span></small> <br>
                  <small>Category : <span class="text-primary">{{ $article->category->name }}</span> </small> <br>
                  <a href="/{{ $article->id }}/show" class="btn btn-primary btn-sm mt-2">Baca</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection
