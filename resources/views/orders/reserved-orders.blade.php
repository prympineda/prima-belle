@extends('layouts.master-admin')

@section('title') Reserved Orders @endsection

@section('custom-css')
<link href="{{ asset('dashboard/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    @if (count($reserved_orders) == 0)
        <h1>No Reserved Orders</h1>
    @else


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1>Reserved Orders</h1>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Agent Name</th>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Quantity</th>
                                    <th>Customer Name</th>
                                    <th>Address</th>
                                    <th>Contact Details</th>
                                    <th>Note</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reserved_orders as $item)
                                <tr class="text-center">
                                    <td> <img src="/images/{{$item->product->photo_name}}" height="150" width="150" alt=""> </td>
                                    <td> {{ ucwords($item->user->name) }} </td>
                                    <td>{{ ucwords($item->product->name) }}</td>
                                    <th> {{ $item->product->code }} </th>
                                    <td> {{ $item->quantity }} </td>
                                    <td> {{ ucwords($item->customer_name) }} </td>
                                    <td> {{ ucwords($item->address) ?: '...' }} </td>
                                    <td> {{ $item->contact_details ?: '...'}} </td>
                                    <td> {{ $item->note ?: '...'}} </td>
                                    <td> {{ ($item->updated_at)}} </td>
                                    <td> 
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editModal" data-uid="{{$item->uid}}" data-product_uid="{{$item->product->uid}}" data-size="{{$item->product->size}}" data-stock="{{$item->product->stock}}" data-price="{{$item->product->price}}" data-product_name="{{$item->product->name}}" data-product_code=" {{ $item->product->code }} " data-quantity="{{ $item->quantity }}" data-customer_name="{{ $item->customer_name}}" data-customer_address="{{ $item->address }}" data-contact_details="{{ $item->contact_details }}"  data-customer_note="{{ $item->note }}" data-toggle="tooltip" data-placement="top" title="Edit" > Edit</a> <br>
                                        <a href="#" class="btn btn-success btn-paid" data-item="{{ ucwords($item->product->code) }}" data-link="{{ route('admin.sold-items', $item->uid) }} "data-toggle="tooltip" data-placement="top" title="Paid">Paid</a> <br>
                                        <a href="#" class="btn btn-danger btn-cancel" data-item="{{ ucwords($item->product->code) }}" data-link="{{ route('admin.cancel-orders', $item->uid) }} "data-toggle="tooltip" data-placement="top" title="Cancel">Cancel</a> 
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endif
  
  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Order</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Product Name: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="product_name" name="product_name" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Product Code: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="product_code" name="product_code" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Price: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="price" name="price" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Available Stock: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="stock" name="stock" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Size: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="size" name="size" readonly>
                        </div>
                    </div>
                    <form action=" {{route('admin.update-place-orders')}} " method="post">
                        @csrf
                        <input type="hidden" id="uid" name="uid">
                        <input type="hidden" id="product_uid" name="product_uid">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Quantity: </label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Customer Name: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Address: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="customer_address" name="address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Contact Details: </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="contact_details" name="contact_details" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Note: </label>
                        <div class="col-sm-8">
                         <textarea name="" id="customer_note" cols="37" rows="5"></textarea>
                        </div>
                    </div>
               
        
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>


@stop

@section('custom-js')

<script src="{{ asset('dashboard/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>

<script>
$('#editModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var uid = button.data('uid')
    var product_uid = button.data('product_uid')
    var stock = button.data('stock')
    var size = button.data('size')
    var price = button.data('price')
    var product_name = button.data('product_name')
    var product_code = button.data('product_code')
    var quantity = button.data('quantity')
    var customer_name = button.data('customer_name')
    var customer_address = button.data('customer_address')
    var contact_details = button.data('contact_details')
    var customer_note = button.data('customer_note')

    var modal = $(this)
        modal.find('#uid').val(uid)
        modal.find('#product_uid').val(product_uid)
        modal.find('#product_name').val(product_name)
        modal.find('#product_code').val(product_code)
        modal.find('#price').val(price)
        modal.find('#stock').val(stock)
        modal.find('#size').val(size)
        modal.find('#quantity').val(quantity)
        modal.find('#customer_name').val(customer_name)
        modal.find('#address').val(customer_address)
        modal.find('#contact_details').val(contact_details)
        modal.find('#customer_note').val(customer_note)


})

   $('.btn-paid').on('click', function(){
    Swal.fire({
        title: $(this).data().item,
        text: "Already Paid?",
        icon: 'success',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    }).then((result) => {
        if (result.value) {
            window.location = $(this).data().link;
        }
    })
})

$('.btn-cancel').on('click', function(){
    Swal.fire({
        title: $(this).data().item,
        text: "Cancel this Order? Will remove this permanently.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    }).then((result) => {
        if (result.value) {
            window.location = $(this).data().link;
        }
    })
})
</script>


@endsection