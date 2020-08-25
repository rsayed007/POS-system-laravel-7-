@extends('admin/app')


@push('scripts')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" >
@endpush


@section('main_content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Add New User</h1> 
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
        <a href="http://" class="float-right btn btn-dark">User List</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          
            <form method="POST" action="{{route('user-store')}}">
                @csrf

                <div class="form-group">
                  <label >Name:</label>
                  <input type="text" required class="form-control" placeholder="Enter name" value="{{old('name')}}" id="name" name="name">
                </div>
                <div class="form-group">
                  <label for="email">Email address:</label>
                  <input type="email" required class="form-control" placeholder="Enter email" value="{{old('email')}}" id="email" name="email">
                </div>
                <div class="form-group">
                  <label for="mobile">Phone number:</label>
                  <input type="number" required class="form-control" placeholder="Enter phone number" id="mobile" value="{{old('mobile')}}" name="mobile">
                </div>
                
                <div class="form-group">
                  <label for="">User Type</label>
                  <select required class="form-control" name="is_admin" id="is_admin" value="{{old('is_admin')}}">
                    <option value="3">Admin</option>
                    <option value="2">Modaretor</option>
                    <option value="1">Editor</option>
                    <option value="0">User</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" placeholder="Enter password" id="password" name="password">
                </div>
                

                <button type="submit" class="btn btn-primary">Submit</button>

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