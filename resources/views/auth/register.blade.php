@extends('layouts.head')
@section('title', 'Register')
@section('body_content')
    <body class="account-body accountbg">

    <!-- Log In page -->
    <div class="row vh-100 ">
        <div class="col-12 align-self-center">
            <div class="auth-page">
                <div class="card auth-card shadow-lg">
                    <div class="card-body">
                        <div class="px-3">
                            <div class="auth-logo-box">
                                <a href="#" class="logo logo-admin"><img src="../assets/images/logo-sm.png" height="55" alt="logo" class="auth-logo"></a>
                            </div><!--end auth-logo-box-->

                            <div class="text-center auth-logo-text">
                                <h4 class="mt-0 mb-3 mt-5">Register for KingBlog</h4>
                            </div> <!--end auth-logo-text-->


                            <form class="form-horizontal auth-form my-4" method="POST" action="{{ route('register') }}">

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-user"></i>
                                            </span>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!--end form-group-->

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-mail"></i>
                                            </span>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!--end form-group-->

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-lock"></i>
                                            </span>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div><!--end form-group-->

                                <div class="form-group">
                                    <label for="password-confirm">Confirm Password</label>
                                    <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-lock-open"></i>
                                            </span>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>

                                </div><!--end form-group-->

                                <div class="form-group row mt-4">
                                    <div class="col-sm-12">
                                        <div class="custom-control custom-switch switch-success">
                                            <input type="checkbox" class="custom-control-input" id="customSwitchSuccess">
                                            <label class="custom-control-label text-muted" for="customSwitchSuccess">By registering you agree to the Frogetor <a href="#" class="text-primary">Terms of Use</a></label>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end form-group-->

                                <div class="form-group mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" type="submit">{{ __('Register') }}<i class="fas fa-sign-in-alt ml-1"></i></button>
                                    </div><!--end col-->
                                </div> <!--end form-group-->
                            </form><!--end form-->
                        </div><!--end /div-->

                        <div class="m-3 text-center text-muted">
                            <p class="">Already have an account ? <a href="{{route('login')}}" class="text-primary ml-2">Log in</a></p>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end auth-card-->
        </div><!--end col-->
    </div><!--end row-->
    <!-- End Log In page -->
@endsection
