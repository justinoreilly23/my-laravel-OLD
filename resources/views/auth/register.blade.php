@extends('layouts.master')

@section('content')
  <div class="container" >
    <div class="row justify-content-center" >
      <div class="col-md-8" >
        <div class="card bg-light" >
          <div class="card-header" >{{ __('Register') }}</div >
          <div class="card-body" >
            <form method="POST" action="{{ route('register') }}" >
              @csrf
              <div class="form-group row" >
                <label for="username" class="col-md-4 col-form-label text-md-right" >Username</label >

                <div class="col-md-6" >
                  <input id="username"
                         type="text"
                         class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                         placeholder=""
                         name="username"
                         value="{{ old('username') }}"
                         required
                         autofocus >
                </div >
              </div >

              <div class="form-group row" >
                <label for="email" class="col-md-4 col-form-label text-md-right" >{{ __('E-Mail Address') }}</label >

                <div class="col-md-6" >
                  <input id="email"
                         type="email"
                         class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                         name="email"
                         value="{{ old('email') }}"
                         required >

                  @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert" >
                                        <strong >{{ $errors->first('email') }}</strong >
                                    </span >
                  @endif
                </div >
              </div >

              <div class="form-group row" >
                <label for="password" class="col-md-4 col-form-label text-md-right" >{{ __('Password') }}</label >

                <div class="col-md-6" >
                  <input id="password"
                         type="password"
                         class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                         name="password"
                         required >

                  @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert" >
                                        <strong >{{ $errors->first('password') }}</strong >
                                    </span >
                  @endif
                </div >
              </div >

              <div class="form-group row" >
                <label for="password-confirm"
                       class="col-md-4 col-form-label text-md-right" >{{ __('Confirm Password') }}</label >

                <div class="col-md-6" >
                  <input id="password-confirm"
                         type="password"
                         class="form-control"
                         name="password_confirmation"
                         required >
                </div >
              </div >

              <div class="form-group row mb-0" >
                <div class="col-md-6 offset-md-4" >
                  <button type="submit" class="btn col-sm-8 btn-solid-{{ $theme }} btn-primary bg-primary" >
                    {{ __('Register') }}
                  </button >
                </div >
              </div >
            </form >
          </div >
        </div >
        <div class="row m-auto text-center m-auto p-1 box" >
            <a href="/login" class="text-sm" >Login to an existing account</a >
          </div >
      </div >
    </div >
  </div >
@endsection
