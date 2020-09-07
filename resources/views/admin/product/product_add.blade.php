@extends('admin/app')


@push('scripts')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" >
@endpush


@section('main_content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Add New product</h1> 
    <p class="mb-4"></p>
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

        @if (session('status'))
            <div class="alert alert-success text-center">
                {{ session('status')}}
            </div>
        @endif


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">Add New product</h6>
        <a href="{{route('product-list')}}" class="float-right btn btn-dark">products List</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          
              <form method="POST" action="{{route('product-store')}}">
                @csrf

                <div class="form-group">
                  <label >Name:</label>
                  <input type="text" required class="form-control" placeholder="Enter name" value="{{old('name')}}" id="name" name="name">
                  <input type="hidden" required   value="{{Auth::user()->name}}" name="created_by">
                </div>
               
                <div class="form-group">
                    <label for="">Suplier:</label>
                    <select required class="form-control" name="supplier_id" id="supplier_id" value="{{old('supplier_id')}}">
                      @foreach ($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                      @endforeach

                    </select>
                </div>        


                <div class="row">

                  <div class="col-md-6" >
                    <div class="form-group">
                        <label for="">Category:</label>
                        <select required class="form-control" name="category_id" id="category_id" value="{{old('category_id')}}">
                          @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                        </select>
                    </div> 
                  </div> 

                  {{-- <div class="col-md-4" >
                    <div class="form-group">
                        <label for="">Quantity:</label>
                        <input type="number" required class="form-control" placeholder="Product quantity" value="{{old('quantity')}}" id="quantity" name="quantity">
                      </div> 
                  </div> --}}

                  <div class="col-md-6" >
                    <div class="form-group">
                        <label for="">Unit:</label>
                        <select required class="form-control" name="unit_id" id="unit_id" value="{{old('unit_id')}}">
                          @foreach ($units as $unit)
                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                          @endforeach
                        </select>
                    </div> 
                  </div>

                </div>
                          
                <div class="form-group">
                    <label for="">Status:</label>
                    <select required class="form-control" name="status" id="status" value="{{old('status')}}">
                      <option value="1">active</option>
                      <option value="0">disble</option>
                    </select>
                </div>           
                

                <button type="submit" class="btn btn-primary">Submit</button>
                <br>
                <br>

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