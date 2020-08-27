@extends('admin/app')


@push('scripts')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" >
@endpush


@section('main_content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Add New units</h1> 
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
    <div class="card-body">


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">Add New User</h6>
        <a href="http://" class="float-right btn btn-dark">units List</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          
            <form method="POST" action="{{route('unit-update',$unit->id)}}">
                @csrf

                <div class="form-group">
                  <label >Name:</label>
                  <input type="text" required class="form-control" placeholder="Enter name" value="{{ $unit->name }}" id="name" name="name">
                  <input type="hidden" required   value="{{Auth::user()->name}}" name="updated_by">
                </div>
                
                              
                <div class="form-group">
                    <label for="">Status:</label>
                    <select required class="form-control" name="status" id="status" >
                      <option {{ ($unit->status == '1')?'selected':'' }} value="1">active</option>
                      <option {{ ($unit->status == '0')?'selected':'' }} value="0">disble</option>
                    </select>
                </div>
               
              
                

                <button type="submit" class="btn btn-primary">Update</button>

              </form>
            
        </div>
      </div>
    </div>

  </div>

@endsection

@push('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>
@endpush