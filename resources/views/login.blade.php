<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Affiliate Marketing</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css')  }}" rel="stylesheet">
    <link href="{{ asset('css/style.css')  }}" rel="stylesheet">

    <!-- Custom styles include-->
    @yield('css')
</head>

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
                                    <h1 class="h4 text-gray-900 mb-4">Affiliate Marketing!</h1>
                                </div>
                                <div class="alert-message">
                                    @if($errors)
                                        @foreach($errors->getBags() as $item)
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ $item->first() }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endforeach
                                    @endif

                                    @if(session()->has('message-success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session()->get('message-success') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    @if(session()->has('message-error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session()->get('message-error') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                </div>
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
                                        <label class="custom-control-label" for="customCheck">Ghi nhớ đăng nhập</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Đăng nhập</button>
                                {!! Form::close() !!}
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="#">Quên mật khẩu?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js')}}"></script>

<!-- Custom scripts include-->
@yield('js')

</body>

</html>