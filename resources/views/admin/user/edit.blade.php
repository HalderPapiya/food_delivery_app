@extends('admin.app')
@section('title') User @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> User</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">Edit User</h3>
                <form action="{{ route('admin.user.update',$user->id) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="first_name">First Name<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" id="first_name" value="{{$user->first_name }}"/>
                            @error('first_name') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="last_name">Last Name<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" id="last_name" value="{{$user->last_name }}"/>
                            @error('last_name') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="phone">Mobile Number<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" id="phone" value="{{ $user->phone }}"/>
                            @error('phone') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                     <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="email">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{ $user->email }}"/>
                            @error('email') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                     <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="address">Address<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address" value="{{ $user->address }}"/>
                            @error('address') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                     <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="city">City<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('city') is-invalid @enderror" type="text" name="city" id="city" value="{{ $user->city }}"/>
                            @error('city') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                     <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="pin_code">PIN<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('pin_code') is-invalid @enderror" type="text" name="pin_code" id="pin_code" value="{{ $user->pin_code }}"/>
                            @error('pin_code') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="land_mark">Land Mark</span></label>
                            <input class="form-control @error('land_mark') is-invalid @enderror" type="text" name="land_mark" id="land_mark" value="{{ $user->land_mark }}"/>
                            @error('land_mark') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                     {{-- <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="password">Password <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('password') is-invalid @enderror" type="text" name="password" id="password" value="{{ old('password') }}"/>
                            @error('password') {{ $message ?? '' }} @enderror
                        </div>
                    </div> --}}
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.user.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection