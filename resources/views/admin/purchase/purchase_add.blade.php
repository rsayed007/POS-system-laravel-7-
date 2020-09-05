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
        
          <div class="row">
            
            <div class="col-md-6" >
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

            <div class="col-md-6" >
              <div class="form-group">
                <label >Bill Number:</label>
                <input type="text" required class="form-control" placeholder="Enter name" value="{{old('purchase_id')}}" id="purchase_id" name="purchase_id">
                <input type="hidden" required   value="{{Auth::user()->name}}" name="created_by">
              </div> 
            </div> 

          </div>


          <div class="row">

            <div class="col-md-6" >
              <div class="form-group">
                  <label for="">Category Name:</label>
                  
                  <select required class="form-control" name="category_id" id="category_id" value="{{old('category_id')}}">
                    <option value="">-- Select Category --</option>
                  </select>
              </div> 
            </div>

            <div class="col-md-6" >
              <div class="form-group">
                  <label for="">Product Name:</label>

                  <select required class="form-control" name="product_id" id="product_id" value="{{old('product_id')}}">
                    <option value="">-- Select Product --</option>
                  </select>
              </div> 
            </div>

          </div>

          <a  class="btn btn-info text-white" id="addItem">Add Item</a>
          {{-- <button type="submit" class="btn btn-primary text-center">Submit</button> --}}
          <br>
          <br>

      </div>

    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">Purchase List</h6>
        <a href="{{route('purchase-list')}}" class="float-right btn btn-dark">purchases List</a>
      </div>
      <div class="card-body">
        <form method="POST" action="{{route('purchase-store')}}">
          @csrf

            <div class="table-responsive">
              <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Supplier</th>
                    <th>Category</th>
                    <th>Product</th>
                    <th>Pic/botal</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                    <th>Action</th>
                  </tr>
                </thead>
                
                <tbody id="addRow" class="addRow">


                </tbody>
                <tbody>
                  <tr>
                    <td colspan="5"></td>
                    <td>
                      <input readonly type="text" name="estimated_amount" id="estimated_amount" value="0" class="from-control form-control-sm text-right estimated_amout" style="background: aqua;">
                    </td>
                    <td></td>
                  </tr>
                </tbody>
                
              </table>
            </div>
          
          <button type="submit" class="btn btn-primary text-center">Submit</button>
          <br>
          <br>

        </form>
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

    <script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>
    <script id="document-template" type="text/x-handlebars-template">
      
      <tr class="delete_add_more_item" id="delete_add_more_item">
        <td width="15%"> 
          <input name="supplier_id[]" value="@{{supplier_id}}" type="hidden"> @{{supplier_name}}
          <input name="purchase_id[]" value="@{{purchase_id}}"  type="hidden">
        </td>
        <td width="15%"> <input class="form-control form-control-sm text-right caategory_id" name="caategory_id[]" value="@{{caategory_id}}" type="hidden"> @{{category_name}} </td>
        <td width="15%"> <input class="form-control form-control-sm text-right product_id" name="product_id[]" value="@{{product_id}}" type="hidden"> @{{product_name}} </td>
        <td width="10%"> <input class="form-control form-control-sm text-right buying_qunt" id="buying_qunt" name="buying_qunt[]" min="1" value="1" type="number"> @{{caategory_id}} </td>
        <td width="10%"> <input class="form-control form-control-sm text-right unit_price" id="unit_price" readonly name="unit_price[]" min="1" value="1" type="number"> </td>
        <td width="10%"> <input class="form-control form-control-sm text-right buying_price" id="buying_price" name="buying_price[]" min="1" value="1" type="number">  </td>
        
        
        <td width="5%"> <a class="btn btn-danger" id="removeItem" rel="noopener noreferrer">x</a> </td>
      </tr>

    </script>


    <script type="text/javascript" >

      $(document).ready(function() {

        // get unit product data
        $('#addItem').click(function(){
          var supplier_id = $('#supplier_id').val();
          var supplier_name = $('#supplier_id').find('option:selected').text();
          var purchase_id = $('#purchase_id').val();
          var category_id = $('#category_id').val();
          var category_name = $('#category_id').find('option:selected').text();
          var product_id = $('#product_id').val();
          var product_name = $('#product_id').find('option:selected').text();
          // console.log(supplier_id);
          // console.log(supplier_name);
          // console.log(purchase_id);
          // console.log(category_id);
          // console.log(category_name);
          // console.log(product_id);
          // console.log(product_name);

          var source = $("#document-template").html();
          var template = Handlebars.compile(source);
          var data = {
            supplier_id:supplier_id,
            supplier_name:supplier_name,
            purchase_id:purchase_id,
            category_id:category_id,
            category_name:category_name,
            product_id:product_id,
            product_name:product_name
          };
          var html = template(data);
          $('#addRow').append(html);
        });
        // remove add element 
        $(document).on('click','#removeItem', function(e){
          $(this).closest('.delete_add_more_item').remove();
          totalAmount();
        });

        // ---------------------
        $(document).on('keyup click','#buying_price, #buying_qunt', function(){
          var buying_price = $(this).closest('tr').find('input.buying_price').val();
          var buying_qunt = $(this).closest('tr').find('input.buying_qunt').val();
          var unit_price = parseFloat(buying_price / buying_qunt);
          $(this).closest('tr').find('input.unit_price').val(unit_price);
          // console.log(unit_price)
          totalAmount();
        });

        // total amount
        function totalAmount() {
          var sum = 0;
          $('.buying_price').each(function(){
            var value = $(this).val();
            if (!isNaN(value) && value.length != 0) {
              sum += parseFloat(value);
              // console.log(sum);
            }
          });
          $('#estimated_amount').val(sum);
        }

        // get caategory data 
        $(document).on('change','#supplier_id',function() {
          var supplier_id = $(this).val();
          // console.log(supplier_id )
  
          $.ajax({
            url: "{{route('load-category')}}",
            // url: "/load-product",
            type: "GET",
            data:{ supplier_id:supplier_id},
            // cache: false,
            // dataType: 'json',
            success: function(data){
              var html = '<option value="">-- Select Category --</option>';
                $.each(data,function(key,value){
                  html += '<option value="'+value.category_id+'">'+value.category__product.name+'</option>';
                });
                $('#category_id').html(html);
                // console.log(data);
            }
          });
  
        });

        // get unit product data

        $(document).on('change','#category_id',function() {
          var category_id = $(this).val();
          // console.log(category_id )
  
          $.ajax({
            url: "{{route('load-product')}}",
            // url: "/load-product",
            type: "GET",
            data:{ category_id:category_id},
            // cache: false,
            // dataType: 'json',
            success: function(data){
              var html = '<option value="">-- Select Product --</option>';
                $.each(data,function(key,value){
                  html += '<option value="'+value.id+'">'+value.name+'</option>';
                });
                $('#product_id').html(html);
                // console.log(data);
            }
          });
  
        });

// get unit dta 

        // $(document).on('change','#product_id',function() {
        //   var product_id = $(this).val();
        //   // console.log(product_id )
  
        //   $.ajax({
        //     url: "{{route('load-unit')}}",
        //     // url: "/load-product",
        //     type: "GET",
        //     data:{ product_id:product_id},
        //     // cache: false,
        //     // dataType: 'json',
        //     success: function(data){
        //       var html = '';
                
        //         $('#unit_id').html(html);
        //         console.log(data);
        //     }
        //   });
  
        // });


      });
      
    </script>


@endpush

