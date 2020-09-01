@extends('admin/app')


@push('scripts')
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" >
@endpush


@section('main_content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">New purchase</h1> 
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
        <h6 class="m-0 font-weight-bold text-primary float-left">Add New purchase</h6>
        <a href="{{route('purchase-list')}}" class="float-right btn btn-dark">purchases List</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          
              <form method="POST" action="{{route('purchase-store')}}">
                @csrf

                <div class="row">

                  
                  <div class="col-md-4" >
                    <div class="form-group">
                      <label for="">Suplier:</label>
                      <select required class="form-control" name="supplier_id" id="supplier_id" value="{{old('supplier_id')}}">
                        <option value="">-- Select Supplier --</option>
                        @foreach ($suppliers as $supplier)
                          <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                      </select>
                    </div>   
                  </div> 

                  <div class="col-md-4" >
                    <div class="form-group">
                      <label >Bill Number:</label>
                      <input type="text" required class="form-control" placeholder="Enter name" value="{{old('purchase_id')}}" id="purchase_id" name="purchase_id">
                      <input type="hidden" required   value="{{Auth::user()->name}}" name="created_by">
                    </div> 
                  </div> 

                  

                  <div class="col-md-4" >
                    <div class="form-group">
                        <label for="">Category Name:</label>
                        
                        <select required class="form-control" name="category_id" id="category_id" value="{{old('category_id')}}">
                          <option value="">-- Select Category --</option>
                          {{-- @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach --}}
                        </select>
                    </div> 
                  </div>


                </div>


                <div class="row">


                  <div class="col-md-4" >
                    <div class="form-group">
                        <label for="">Product Name:</label>
                        
                        <select required class="form-control" name="product_id" id="product_id" value="{{old('product_id')}}">
                          <option value="">-- Select Product --</option>
                          @foreach ($products as $prosuct)
                            <option value="{{$prosuct->id}}">{{$prosuct->name}}</option>
                          @endforeach
                        </select>
                    </div> 
                  </div>

                  <div class="col-md-2" >
                    <div class="form-group">
                        <label for="">Quantity:</label>
                        <input type="number" required class="form-control" placeholder="purchase quantity" value="{{old('buying_qut')}}" id="buying_qut" name="buying_qut">
                      </div> 
                  </div>
                  <div class="col-md-2" >
                    <div class="form-group">
                        <label for="">Unit:</label>
                        <input type="number" required class="form-control" placeholder=" unit" value="{{old('quantity')}}" id="quantity" name="quantity">
                      </div> 
                  </div>

                  

                  <div class="col-md-4" >
                    <div class="form-group">
                        <label for="">Total Price:</label>
                        <input type="number" required class="form-control" placeholder="total price" value="{{old('buying_price')}}" id="buying_price" name="buying_price">

                    </div> 
                  </div>
                  
                </div>

                <div class="row">


                  <div class="col-md-4" >
                    <div class="form-group">
                        <label for="">Unit Price:</label>
                        <input type="number" required class="form-control" placeholder="unit price" value="{{old('unit_price')}}" id="unit_price" name="unit_price">
                        </select>
                    </div> 
                  </div>


                </div>
                          
                <div class="form-group">
                  <label for="">Description:</label>

                  <textarea class="form-control"  name="description" id="description" cols="5" rows="5"></textarea>
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

    {{-- <script src="{{ asset('admin/vendor/jquery/jquery.min.js')}}"></script> --}}

    <script type="text/javascript" >

      $(document).ready(function() {

        $(document).on('change','#supplier_id',function() {
          var supplier_id = $(this).val();
          // console.log(supplier_id )
  
          $.ajax({
            url: "{{route('load-product')}}",
            // url: "/load-product",
            type: "GET",
            data:{ supplier_id:supplier_id},
            // cache: false,
            // dataType: 'json',
            success: function(data){
              var html = '<option value="">Select Category</option>';
                $.each(data,function(key,value){
                  html += '<option value="'+value.category_id+'">'+value.category__product.name+'</option>';
                });
                $('#category_id').html(html);
                console.log(data);
              
            }
          });
  
        })
      });
      
    </script>


@endpush

