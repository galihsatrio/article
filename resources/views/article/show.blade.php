@extends('layouts.master')

@section('title', 'Show')

@section('content')
<div class="container" style="margin-top: 70px; margin-bottom: 90px">
    <div class="row justify-content-center">
        <div class="col-8">

            <div class="text-center mb-5">
                <h2 class="text-center mt-5 mb-4">{{ $article->title }}</h2>

                <img src="/storage/{{ $article->image }}" style="max-width: 500px" class="img-fluid mt-4" alt="">
            </div>

            <p>{{ $article->content }}</p>

            <small>Author : <span class="text-danger">{{ $article->user->name }}</span> </small> <br>
            <small>Category : <span class="text-success">{{ $article->category->name }}</span> </small> <br>
            <small>Create at : <span class="text-success">{{ \Carbon\Carbon::parse($article->created_at)->format('d, M Y') }}</span> </small>

            <div class="text-center mt-5">
                @if(Auth::id() == $article->user->id )
                <a href="/article/{{ $article->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                <a href="/article/{{ $article->id }}/delete" class="btn btn-danger btn-sm">Delete</a>
                @endif
                <a href="/" class="btn btn-secondary btn-sm">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
