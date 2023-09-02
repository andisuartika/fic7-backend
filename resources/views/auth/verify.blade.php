@extends('layouts.master-without_nav')

@section('title') Verify Your Email Address @endsection

@section('content')
<body class="account-body accountbg">
        <div class="container">
            <div class="row vh-100 d-flex justify-content-center">
                <div class="col-12 align-self-center">
                    <div class="row">
                        <div class="col-lg-5 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 auth-header-box">
                                    <div class="text-center p-3">
                                        <a href="index" class="logo logo-admin">
                                            <img src="{{ URL::asset('assets/images/logo-sm-dark.png') }}" height="50" alt="logo" class="auth-logo">
                                        </a>
                                        <h4 class="mt-3 mb-1 fw-semibold text-white font-18">Verify Your Email Address</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ __('A fresh verification link has been sent to your email address.') }}
                                    </div>
                                @endif
            
                                {{ __('Before proceeding, please check your email for a verification link.') }}
                                {{ __('If you did not receive the email') }},
                                    <form class="form-horizontal  auth-form" method="POST" action="{{ route('verification.send') }}">
                                        @csrf

                                        <div class="form-group mb-0 row">
                                            <div class="col-12 mt-2">
                                                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Resend Verification Email</button>
                                            </div>
                                        </div> <!--end form-group-->
                                    </form><!--end form-->
                                </div>
                                <div class="card-body bg-light-alt text-center">
                                    <span class="text-muted d-none d-sm-inline-block">Mannatthemes © <script>
                                        document.write(new Date().getFullYear())
                                    </script></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

