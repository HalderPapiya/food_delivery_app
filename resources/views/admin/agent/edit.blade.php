@extends('admin.app')
@section('title') Agent @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> Agent</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">Edit Agent</h3>
                <form action="{{ route('admin.agent.update',$data->id) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="first_name">First Name<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" id="first_name" value="{{$data->first_name }}"/>
                            @error('first_name') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="last_name">Last Name<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" id="last_name" value="{{$data->last_name }}"/>
                            @error('last_name') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="phone">Mobile Number<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" id="phone" value="{{ $data->phone }}"/>
                            @error('phone') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                     <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="email">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{ $data->email }}"/>
                            @error('email') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                     <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="address">Address<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address" value="{{ $data->address }}"/>
                            @error('address') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                     <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="city">City<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('city') is-invalid @enderror" type="text" name="city" id="city" value="{{ $data->city }}"/>
                            @error('city') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                     <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="pin_code">PIN<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('pin_code') is-invalid @enderror" type="text" name="pin_code" id="pin_code" value="{{ $data->pin_code }}"/>
                            @error('pin_code') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    {{-- <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="land_mark">Land Mark</span></label>
                            <input class="form-control @error('land_mark') is-invalid @enderror" type="text" name="land_mark" id="land_mark" value="{{ $data->land_mark }}"/>
                            @error('land_mark') {{ $message ?? '' }} @enderror
                        </div>
                    </div> --}}
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="agent_no">Agent Number <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('agent_no') is-invalid @enderror" type="text" name="agent_no" id="agent_no" value="{{ $data->agent_no }}"/>
                            @error('agent_no') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="vehicle_no">Vehicle Number <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('vehicle_no') is-invalid @enderror" type="text" name="vehicle_no" id="vehicle_no" value="{{ $data->vehicle_no }}"/>
                            @error('vehicle_no') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="license">License <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('license') is-invalid @enderror" type="text" name="license" id="license" value="{{ $data->license }}"/>
                            @error('license') {{ $message ?? '' }} @enderror
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
                        <a class="btn btn-secondary" href="{{ route('admin.agent.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection