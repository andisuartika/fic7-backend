@extends('layouts.master')
@section('title') Dashboard @endsection

@section('css')
<link href="{{ URL::asset('assets/plugins/leaflet/leaflet.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/lightpick/lightpick.css') }}" rel="stylesheet" />
@endsection

@section('content')
@component('components.breadcrumb')
@slot('li_1') Dastone @endslot
@slot('li_2') Pages @endslot
@slot('li_3') Profile @endslot
@slot('title') Profile @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-0">
                <div style="height: 220px; background-image: url('assets/images/widgets/1.jpg')" class="pro-map" ></div>
            </div>
            <!--end card-body-->
            <div class="card-body">
                <div class="dastone-profile">
                    <div class="row">
                        <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                            <div class="dastone-profile-main">
                                <div class="dastone-profile-main-pic">
                                    <img src="{{ (isset(Auth::user()->avatar) && Auth::user()->avatar != '') ? asset(Auth::user()->avatar) : asset('/assets/images/users/user-1.jpg') }}" alt="" height="110" class="rounded-circle">
                                </div>
                                <div class="dastone-profile_user-detail">
                                    <h5 class="dastone-user-name">{{ Auth::user()->name }}</h5>
                                    <p class="mb-0 dastone-user-name-post">{{ Auth::user()->bio }}</p>
                                </div>

                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-lg-4 ms-auto align-self-center">
                            <ul class="list-unstyled personal-detail mb-0">
                                <li class=""><i class="ti ti-mobile me-2 text-secondary font-16 align-middle"></i> <b> phone </b> : {{ Auth::user()->phone }}</li>
                                <li class="mt-2"><i class="ti ti-email text-secondary font-16 align-middle me-2"></i> <b> Email </b> : {{ Auth::user()->email }}</li>
                            </ul>

                        </div>
                        <!--end col-->
                        {{-- <div class="col-lg-4 align-self-center">
                            <div class="row">
                                <div class="col-auto text-end border-end">
                                    <button type="button" class="btn btn-soft-primary btn-icon-circle btn-icon-circle-sm mb-2">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>
                                    <p class="mb-0 fw-semibold">Facebook</p>
                                    <h4 class="m-0 fw-bold">25k <span class="text-muted font-12 fw-normal">Followers</span></h4>
                                </div>
                                <!--end col-->
                                <div class="col-auto">
                                    <button type="button" class="btn btn-soft-info btn-icon-circle btn-icon-circle-sm mb-2">
                                        <i class="fab fa-twitter"></i>
                                    </button>
                                    <p class="mb-0 fw-semibold">Twitter</p>
                                    <h4 class="m-0 fw-bold">58k <span class="text-muted font-12 fw-normal">Followers</span></h4>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div> --}}
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end f_profile-->
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>

<div class="pb-4">
    <ul class="nav-border nav nav-pills mb-0" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="settings_detail_tab" data-bs-toggle="pill" href="#Profile_Settings">Settings</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-12">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="Profile_Settings" role="tabpanel" aria-labelledby="settings_detail_tab">
                <div class="row">
                  <div class="col-lg-6 col-xl-6">
                      <form action="{{ route('user-profile-information.update') }}" method="POST">
                      @csrf
                      @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="card-title">Personal Information</h4>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end card-header-->
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">Name</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <input class="form-control @error('name', 'updateProfileInformation')
                                        is-invalid
                                        @enderror" type="text" name="name" value="{{ Auth()->user()->name }}">
                                        @error('name', 'updateProfileInformation')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">Bio</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <textarea class="form-control" type="text" name="bio">{{ Auth()->user()->bio }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">Contact Phone</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="las la-phone"></i></span>
                                            <input type="text" class="form-control  @error('phone', 'updateProfileInformation')
                                            is-invalid
                                            @enderror" name="phone" value="{{ Auth()->user()->phone }}" placeholder="Phone" aria-describedby="basic-addon1">
                                            @error('phone', 'updateProfileInformation')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">Email Address</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="las la-at"></i></span>
                                            <input type="text" class="form-control @error('email', 'updateProfileInformation')
                                            is-invalid
                                            @enderror" name="email" value="{{ Auth()->user()->email }}" placeholder="Email" aria-describedby="basic-addon1">
                                            @error('email', 'updateProfileInformation')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-9 col-xl-8 offset-lg-3">
                                        <button type="submit" class="btn btn-sm btn-outline-primary">Submit</button>
                                        <button type="reset" class="btn btn-sm btn-outline-danger">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </form>
                      </div>
                    <!--end col-->
                    <div class="col-lg-6 col-xl-6">
                      <form action="{{ route('user-password.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Change Password</h4>
                            </div>
                            <!--end card-header-->
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">Current Password</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <input class="form-control @error('current_password','updatePassword')
                                        is-invalid
                                        @enderror" name="current_password" type="password" placeholder="Password">
                                        @error('current_password','updatePassword')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">New Password</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <input class="form-control @error('password','updatePassword')
                                        is-invalid
                                        @enderror" name="password" type="password" placeholder="New Password">
                                        @error('password','updatePassword')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center">Confirm Password</label>
                                    <div class="col-lg-9 col-xl-8">
                                        <input class="form-control" name="password_confirmation" type="password" placeholder="Re-Password">
                                        <span class="form-text text-muted font-12">Never share your password.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-9 col-xl-8 offset-lg-3">
                                        <button type="submit" class="btn btn-sm btn-outline-primary">Change Password</button>
                                        <button type="reset" class="btn btn-sm btn-outline-danger">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                      </form>
                    </div> <!-- end col -->
                </div>
                <!--end row-->
            </div>
            <!--end tab-pane-->
        </div>
        <!--end tab-content-->
    </div>
    <!--end col-->
</div>


@endsection

@section('script')

<script src="{{ URL::asset('assets/plugins/leaflet/leaflet.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/lightpick/lightpick.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/jquery.profile.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection