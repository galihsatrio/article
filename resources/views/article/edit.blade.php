@extends('layouts.master')

@section('title', 'Create')

@section('content')
<div class="container" style="margin-top: 120px">
    <div class="row justify-content-center">
        <div class="col-5">


            <h2>Update Article</h2>

            <form action="/article/{{ $article->id }}/update" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                  </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input id="title" class="form-control" type="text" name="title" value="{{ $article->title }}">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" class="form-control" name="content"> {{ $article->content }} </textarea>
                </div>
                <div class="form-group">
                    <label for="Category">Category</label>
                    <select class="form-control" id="Category" name="category_id" value="{{ $article->category_id }}">
                        @foreach($category as $categories)
                            <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-dark"> Update </button>
                <a href="/" class="btn btn-secondary"> Back</a>

            </form>

        </div>
    </div>
</div>
@endsection
