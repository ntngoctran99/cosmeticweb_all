@extends('layouts.master')
@section('content')
<section class="login-details">
    <div class="container">
        <div class="form_login">
            <h4>LOGIN</h4>
            @if (session('status'))
                <ul>
                    <li class="text-danger"> {{ session('status') }}</li>
                </ul>
            @endif
            <form action="{{ url('/postlogin') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" name="password" class="form-control" id="Password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</section>
@endsection
<style>
    .form_login{
        width: 500px;
        margin: 0 auto;
        padding:50px 0
    }
</style>
