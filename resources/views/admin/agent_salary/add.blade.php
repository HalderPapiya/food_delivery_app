@extends('admin.app')
@section('title')
Agent Salary
 @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> Agent Salary</h1>
            {{-- <h1><i class="fa fa-tags"></i> Add Category</h1> --}}
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">
               Add Agent Salary
                    
                </h3>
                <hr>
                <form action="{{ route('admin.agent.salary.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label" for="agent_id">Agent <span class="m-l-5 text-danger"> *</span></label>
                        <select class="form-control @error('agent_id') is-invalid @enderror" name="agent_id" id="agent_id" value="{{ old('
                        ') }}">
                            <option selected disabled>Select one</option>
                            @foreach($agents as $agent)
                            <option value="{{$agent->id}}">{{$agent->first_name . ' '. $agent->last_name . '-'. $agent->agent_no}}</option>
                            @endforeach
                        </select>
                        @error('agent_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                   
                
                     <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="salary">Salary<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('salary') is-invalid @enderror" type="text" name="salary" id="salary" value="{{ old('salary') }}"/>
                            @error('salary') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    
                    
                     <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="bonus">Bonus<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('bonus') is-invalid @enderror" type="text" name="bonus" id="bonus" value="{{ old('bonus') }}"/>
                            @error('bonus') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                     <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="total_salary">Total Salary<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('total_salary') is-invalid @enderror" type="text" name="total_salary" id="total_salary" value="{{ old('total_salary') }}"/>
                            @error('total_salary') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                     
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Agent Salary</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.agent.salary.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection