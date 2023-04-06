@extends('layouts.auth')
@section('title', 'Reset Password')
@section('content')

@push('css')
    <style>
        input[type='email']{
            background-color: rgb(225, 233, 225);
            border: none;
        }
        input[type='email']:focus{
            background-color: rgb(225, 233, 225);
            border: none;
        }
       /* .login-card-body{
            border-radius: 10px;
            box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
        } */
    </style>
@endpush

<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">{{ __('Reset Password') }}</p>

        <form action="{{ route('password.update') }}" method="post">
            <input type="hidden" name="token" value="{{ $token }}">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
            @csrf
            <div class="input-group mb-3">
                <input id="email" type="email"
                placeholder="Your Email"
                 class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}"required autocomplete="email" autofocus>
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

            <div class="input-group mb-3">
                <input id="password" type="password"
                placeholder="Your password"
                 class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password" autofocus>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                <div id="input_group_append" class="input-group-append">
                    <div class="input-group-text">
                        {{--  <span class="fas fa-envelope"></span>  --}}
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="password-confirm" type="password"
                placeholder="Your password Confirmation"
                 class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="password_confirmation" autofocus>
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                <div id="input_group_append" class="input-group-append">
                    <div class="input-group-text">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- /.col -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Reset Password') }}
                    </button>
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
    <script>
        //disable write in email input
        $(document).ready(function(){
            $('#email').attr('readonly', true);
        }); 
    </script>
@endpush