@extends('layouts.master')

@section('title', 'Login')

@section('content')
<div class="container" style="margin-top: 120px">
    <div class="row justify-content-center my-5">
        <div class="col-4">
            <h1>Register</h1>

            <form action="/register/post" method="POST" class="mt-5">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" class="form-control" type="text" name="name">
                </div>
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
