@extends('admin.app')
@section('title') Agent @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file"></i>Agent</h1>
            <p>Agent List</p>
        </div>
        <a href="{{ route('admin.agent.salary.create') }}" class="btn btn-primary pull-right">Add New</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                {{-- @if (Session::get('success'))
                    <div class="alert alert-success"> {{Session::get('success')}} </div>
                @endif --}}
                <div class="tile-body">
                    <table class="table table-hover custom-data-table-style table-striped" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Agent Name</th>
                                <th> Agent ID </th>
                                <th> Salary </th>
                                <th>Bonus</th>
                                <th> Total Salary </th>
                                {{-- <th> Password </th> --}}
                                <th> Status </th>
                                <th style="width:100px; min-width:100px;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $data)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{ $data->agent ? $data->agent->first_name : ''  }} {{$data->agent ? $data->agent->last_name : ''}}</td>
                                    <td>{{ $data->agent ? $data->agent->agent_no : ' '}}</td>
                                    <td>{{ $data->salary }}</td>
                                    <td>{{ $data->bonus }}</td>
                                    <td>{{ $data->total_salary }}</td>
                                    
                                    <td class="text-center">
                                        <div class="toggle-button-cover margin-auto">
                                            <div class="button-cover">
                                                <div class="button-togglr b2" id="button-11">
                                                    <input id="toggle-block" type="checkbox" name="status" class="checkbox" data-agent_id="{{ $data['id'] }}" {{ $data['status'] == true ? 'checked' : '' }}>
                                                    <div class="knobs"><span>Inactive</span></div>
                                                    <div class="layer"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                   
                                    <td class="text-center">
                                    
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ url('admin/agent-salary/edit', $data['id']) }}" class="btn btn-sm btn-primary edit-btn"><i class="fa fa-edit"></i></a>
                                            {{-- <a href="{{ route('admin.interest.details', $interest['id']) }}" class="btn btn-sm btn-primary edit-btn"><i class="fa fa-eye"></i></a> --}}
                                             <a href="javascript: void(0)" data-id="{{$data['id']}}" class="sa-remove btn btn-sm btn-danger edit-btn"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable({"ordering": false});</script>
     {{-- New Add --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <script type="text/javascript">
    $('.sa-remove').on("click",function(){
        var agentid = $(this).data('id');
        swal({
          title: "Are you sure?",
          text: "Your will not be able to recover the record!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
        },
        function(isConfirm){
          if (isConfirm) {
            window.location.href = "agent-salary/delete/"+agentid;
            } else {
              swal("Cancelled", "Record is safe", "error");
            }
        });
    });
    </script>
  <script type="text/javascript">
    $('input[id="toggle-block"]').change(function() {
        var agent_id = $(this).data('agent_id');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var status = 0;
      if($(this).is(":checked")){
          status = 1;
      }else{
        status = 0;
      }
      $.ajax({
            type:'POST',
            dataType:'JSON',
            url:"{{route('admin.agent.salary.updateStatus')}}",
            data:{ _token: CSRF_TOKEN, id:agent_id, status:status},
            success:function(response)
            {
              // $('#success-text').text(response.message);
              // $('#success-msg').show();
              // $('#success-msg').fadeOut(2000);
              swal("Success!", response.message, "success");
            },
            error: function(response)
            {
                // console.log(response);
                // $('#error-text').text("Error! Please try again later");
                // $('#error-msg').show();
                // $('#error-msg').fadeOut(2000);
                swal("Error!", response.message, "error");
            }
          });
    });
</script>
<script type="text/javascript">
    $('input[id="verified-toggle-block"]').change(function() {
        var verified_id = $(this).data('verified_id');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var is_verified = 0;
      if($(this).is(":checked")){
        is_verified = 1;
      }else{
        is_verified = 0;
      }
      $.ajax({
            type:'POST',
            dataType:'JSON',
            url:"{{route('admin.agent.salary.updateStatus')}}",
            data:{ _token: CSRF_TOKEN, id:verified_id, is_verified:is_verified},
            success:function(response)
            {
              // $('#success-text').text(response.message);
              // $('#success-msg').show();
              // $('#success-msg').fadeOut(2000);
              swal("Success!", response.message, "success");
            },
            error: function(response)
            {
                // console.log(response);
                // $('#error-text').text("Error! Please try again later");
                // $('#error-msg').show();
                // $('#error-msg').fadeOut(2000);
                swal("Error!", response.message, "error");
            }
          });
    });
</script>
@endpush