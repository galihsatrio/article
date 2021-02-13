@extends('layouts.master')

@section('title', 'Login')

@section('content')
<div class="container" style="margin-top: 90px">
    <div class="row justify-content-center mt-2">
        <div class="col-7">
            @if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center my-5">
        <div class="col-4">
            <h1>Login</h1>

            <form action="/login/post" method="POST" class="mt-5">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-control" type="text" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" class="form-control" type="password" name="password">
                </div>
                <button class="btn btn-dark">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection
