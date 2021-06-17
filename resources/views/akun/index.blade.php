<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Setting Akun')</title>
  @include('layouts/header')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('layouts/navbar')

  @include('layouts/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="card card-into card card-outline card-header">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Akun Setting</h1>
            <!-- Session -->
                  @if (Session::get('success'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  @endif
                  
                  @if (Session::get('failed'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('failed') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  @endif
          </div>
          </div><!-- /.row -->
        <!-- Main content -->
        <div class="container-fluid">
          <div class="card-deck">
              <div class="card card-info">
                  <div class="card-header">
                      <h3 class="card-title">Profile</h3>
                  </div>
                  <div class="card-body">
                      <form role="form" id="update" action="{{ route('setting.akun.update') }}" method="post">
                          @csrf
                          <div class="form-group row">
                              <label class="col-sm-4 col-form-label">{{ __('Email') }}</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" id="email" value="{{ Auth::user()->email }}" disabled>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="name" class="col-sm-4 col-form-label">{{ __('Name') }}</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="exp_reminder" class="col-sm-4 col-form-label">{{ __('Pengingat Expired') }}</label>
                              <div class="col-sm-8">
                                  <div class="input-group">
                                      <input type="number" class="form-control" id="exp_reminder" name="exp_reminder" min="1" value="{{ Auth::user()->exp_reminder }}"/>
                                      <div class="input-group-append">
                                          <div class="input-group-text">hari sebelum expired.</div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
                  <div class="card-footer">
                      <button id="button-update" type="button" class="btn btn-primary float-right" onclick="$('#update').submit();">{{ __('Update Profile') }}</button>
                  </div>
              </div>
              <div class="card card-primary">
                  <div class="card-header">
                      <h3 class="card-title">Password</h3>
                  </div>
                  <div class="card-body">
                      <form role="form" id="update_password" action="{{ route('update-password') }}" method="post">
                          @csrf
                          <div class="form-group row">
                              <label for="old_password" class="col-sm-4 col-form-label">{{ __('Current Password') }}</label>
                              <div class="col-sm-8">
                                  <input type="password" class="form-control" id="old_password" name="old_password">
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="password" class="col-sm-4 col-form-label">{{ __('New Password') }}</label>
                              <div class="col-sm-8">
                                  <input type="password" class="form-control" id="password" name="password">
                              </div>
                              @error('password')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                          </div>
                          <div class="form-group row">
                              <label for="password" class="col-sm-4 col-form-label">{{ __('Confirm Password') }}</label>
                              <div class="col-sm-8">
                                  <input type="password" class="form-control" id="password" name="password_confirmation">
                              </div>
                          </div>
                      </form>
                  </div>
                  <div class="card-footer">
                      <button id="button-update" type="button" class="btn btn-primary float-right" onclick="$('#update_password').submit();">{{ __('Change Password') }}</button>
                  </div>
              </div>
          </div>
      </div>
        <!-- /.content -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  </div>
  
  @include('layouts/footer')

  