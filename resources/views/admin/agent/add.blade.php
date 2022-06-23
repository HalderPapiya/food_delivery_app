@extends('admin.app')
@section('title')
Agent
 @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> Agent</h1>
            {{-- <h1><i class="fa fa-tags"></i> Add Category</h1> --}}
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">
               Add Agent
                    {{-- <span class="top-form-btn">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Category</button>
                        <a class="btn btn-secondary" href=""><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </span> --}}
                </h3>
                <hr>
                <form action="{{ route('admin.agent.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="first_name">First Name<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" id="first_name" value="{{ old('first_name') }}"/>
                            @error('first_name') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="last_name">Last Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" id="last_name" value="{{ old('last_name') }}"/>
                            @error('last_name') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                
                     <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="email">Email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{ old('email') }}"/>
                            @error('email') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                     {{-- <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="gender">Sex <span class="m-l-5 text-danger"> *</span></label>
                            <select name="gender" id="" class="form-control @error('gender') is-invalid @enderror">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            @error('gender') {{ $message ?? '' }} @enderror
                        </div>
                    </div> --}}
                     <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="phone">Phone<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" id="phone" value="{{ old('phone') }}"/>
                            @error('phone') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    
                    
                     <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="address">Address<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address" value="{{ old('address') }}"/>
                            @error('address') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                     <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="city">City<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('city') is-invalid @enderror" type="text" name="city" id="city" value="{{ old('city') }}"/>
                            @error('city') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                     <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="pin_code">PIN<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('pin_code') is-invalid @enderror" type="text" name="pin_code" id="pin_code" value="{{ old('pin_code') }}"/>
                            @error('pin_code') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    {{-- <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="land_mark">Land Mark</label>
                            <input class="form-control @error('land_mark') is-invalid @enderror" type="text" name="land_mark" id="land_mark" value="{{ old('land_mark') }}"/>
                            @error('land_mark') {{ $message ?? '' }} @enderror
                        </div>
                    </div> --}}
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="agent_no">Agent Number <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('agent_no') is-invalid @enderror" type="text" name="agent_no" id="agent_no" value="{{ old('agent_no') }}"/>
                            @error('agent_no') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="vehicle_no">Vehicle Number <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('vehicle_no') is-invalid @enderror" type="text" name="vehicle_no" id="vehicle_no" value="{{ old('vehicle_no') }}"/>
                            @error('vehicle_no') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="license">License <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('license') is-invalid @enderror" type="text" name="license" id="license" value="{{ old('license') }}"/>
                            @error('license') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                     <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="password">Password <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" value="{{ old('password') }}"/>
                            @error('password') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Agent</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.agent.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection