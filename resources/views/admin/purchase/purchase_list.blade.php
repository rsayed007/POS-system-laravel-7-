@extends('admin/app')


@push('scripts')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" >
@endpush


@section('main_content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Purchase List</h1>
    <p class="mb-4"></p>

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
                <th>SL</th>
                <th>Purchase No</th>
                <th>Date</th>
                <th>Product Name</th>
                <th>Unit</th>
                <th>Supplier</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>SL</th>
                <th>Purchase No</th>
                <th>Date</th>
                <th>Product Name</th>
                <th>Unit</th>
                <th>Supplier</th>
                <th>Action</th>
              </tr>
            </tfoot>

            <tbody>
                @foreach ($purchases as $purchase)
                    
                    <tr>
                        <td>{{$purchase->name}}</td>
                        <td>{{$purchase->quantity}} 
                          <span class=" badge-success badge-pill">
                            {{$purchase->Unit_purchase->name}}</span> </td>
                        <td>{{$purchase->Supplier_purchase->name}}</td>
                        <td>{{$purchase->Category_purchase->name}} </td>
                        <td> {!! ($purchase->status==1)? '<span class=" badge-success badge-pill">active</span>':'<span class="badge-danger badge-pill">disable</span>' !!}</td>
                        <td>
                            <a href="{{route('purchase-edit',$purchase->id)}}"> <span class="btn btn-sm btn-info" >Edit</span> </a>
                            <a href="{{route('purchase-delete',$purchase->id)}}"> <span class="btn btn-sm btn-danger" >Delete</span></a>
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