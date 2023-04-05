@extends('layouts.auth')
@section('title', 'Reset Password')
@section('content')

<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">{{ __('Reset Password') }}</p>

        <form action="{{ route('password.email') }}" method="post">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
            @csrf
            <div class="input-group mb-3">
                <input id="email" type="email"
                placeholder="Your Email"
                 class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                <div id="input_group_append" class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Send Password Reset Link</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <p class="mb-1">
            

            @if (Route::has('login'))
            <a class="btn btn-link" href="{{ route('login') }}">
                {{ __('Login in') }}
            </a>
        @endif
        </p>
    </div>
    <!-- /.login-card-body -->
</div>
@endsection
@push('js')
    <script src="{{ asset('admin_asset/custome/js/login.js') }}"></script>
@endpush