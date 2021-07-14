@extends('layouts.master')
@section('title')
    {{ __('layout.login') }}
@endsection
@section('layout')
<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('layout.app') }}!</h1>
                                </div>
                                @include('layouts.message')
                                {!! Form::open(['url' => route('auth.authenticate'),'method' => 'post','class' => 'user']) !!}
                                @csrf
                                <div class="form-group">
                                    {{  Form::text('userName',request('userName'),['class' => 'form-control form-control-user','placeholder' => 'Vui lòng nhập email đăng nhập...']) }}
                                </div>
                                <div class="form-group">
                                    {{  Form::password('password',['class' => 'form-control form-control-user','placeholder' => 'Vui lòng nhập mật khẩu truy cập...']) }}
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        {{ Form::checkbox('remember', '1', request('remember'),['class' => 'custom-control-input','id'=>'customCheck','type'=>'checkbox'])  }}
                                        <label class="custom-control-label" for="customCheck">{{ __('layout.rememberLogin') }}</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('layout.login') }}</button>
                                {!! Form::close() !!}
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="#">{{ __('layout.forgotPassword') }}?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection