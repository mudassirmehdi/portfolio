@extends('layouts.app')

@section('content')
<div id="primary" class="p-t-b-100 height-full">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-md-auto">
                    <div class="shadow r-10">
                    <div class="row grid">
                        <div class="col-md-5 white p-5">

                           <div class="mb-5">
                               <img src="{{ asset('frontend/images/jinnah.png') }}" width="60" alt="">
                           </div>

                            <form class="form-material" method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Input -->
                                <div class="body">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label class="form-label">E-mail</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                             <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label class="form-label">Password</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="form-check">
                                             <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary btn-sm pl-4 pr-4">Login</button>
 
                                </div>
                                <!-- #END# Input -->
                            </form>
                        </div>
                        <div class="col-md-7 blue p-5 text-white">
                            <i class="icon-circle-o s-36"></i>
                            <h1 class="mt-3">Are You Ready?</h1>

                        <div class="pt-3 mb-5">
                            <p>Login to jinnah portal & get started</p>
                        </div> 
                          </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
