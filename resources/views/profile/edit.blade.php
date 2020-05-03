@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
    <h1 class="ml-2">Profile</h1>
@stop

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('profile.update') }}">
                    @csrf
                    @method('put')

                    <div class="card ">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('Edit Profile') }}</h4>
                        </div>
                        <div class="card-body ">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name" type="text" placeholder="{{ __('Name') }}"
                                            value="{{ old('name', auth()->user()->name) }}" required="true"
                                            aria-required="true" />
                                        @if ($errors->has('name'))
                                        <span class="error text-danger"
                                            for="input-name">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email" type="email" placeholder="{{ __('Email') }}"
                                            value="{{ old('email', auth()->user()->email) }}" required />
                                        @if ($errors->has('email'))
                                        <span class="error text-danger"
                                            for="input-email">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-1">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('profile.password') }}">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header">
                            <div class="card-title">{{ __('Change password') }}</div>
                        </div>
                        <div class="card-body">
                            @if (session('status_password'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="fas fa-times"></i>
                                </button>
                                {{ session('status_password') }}
                            </div>
                        @endif
                            <div class="row">
                                <label class="col-sm-2"
                                    for="input-current-password">{{ __('Current Password') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                        <input
                                            class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                                            input type="password" name="old_password"
                                            placeholder="{{ __('Current Password') }}" value="" required />
                                        @if ($errors->has('old_password'))
                                        <span class="error text-danger"
                                            for="input-name">{{ $errors->first('old_password') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2"
                                    for="input-password">{{ __('New Password') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password" type="password"
                                            placeholder="{{ __('New Password') }}" value="" required />
                                        @if ($errors->has('password'))
                                        <span class="error text-danger"
                                            for="input-password">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2"
                                    for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <input class="form-control" name="password_confirmation"
                                            type="password"
                                            placeholder="{{ __('Confirm New Password') }}" value="" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-1">
                            <button type="submit" class="btn btn-primary">{{ __('Change password') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
