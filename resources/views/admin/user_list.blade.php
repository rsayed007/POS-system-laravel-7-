@extends('admin/app')


@push('scripts')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" >
@endpush


@section('main_content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">User List</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div>

        @if (session('status'))
            <div class="alert alert-success text-center">
                {{ session('status')}}
            </div>
        @endif

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>User Type</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>User Type</th>
                <th>Action</th>
              </tr>
            </tfoot>

            <tbody>
                @foreach ($userData as $user)
                    
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>  {{ ($user->is_admin==3)?'admin':(($user->is_admin==2)?'modaretor':($user->is_admin==1)?'editor':'user' ) }}</td>
                        <td>
                            <a href="{{route('user-edit',$user->id)}}">Edit </a>
                            ||<a href="{{route('user-delete',$user->id)}}"> Delete</a>

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

    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>

     <!-- Page level plugins -->
  <script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>
@endpush