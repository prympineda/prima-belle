@extends('layouts.master-admin')

@section('title') Sold Orders @endsection

@section('custom-css')
<link href="{{ asset('dashboard/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    @if (count($sold_orders) == 0)
        <h1>No Sold Orders</h1>
    @else
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1>Sold Orders</h1>
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
                                @foreach ($sold_orders as $item)
                                <tr class="text-center">
                                    <td class="text-center"> <img src="/images/{{$item->product->photo_name}}" height="150" width="150" alt=""> </td>
                                    <td> {{ ucwords($item->user->name) }} </td>
                                    <td>{{ ucwords($item->product->name) }}</td>
                                    <th> {{ $item->product->code }} </th>
                                    <td> {{ $item->quantity }} </td>
                                    <td> {{ ucwords($item->customer_name) }} </td>
                                    <td> {{ ucwords($item->address) ?: '...' }} </td>
                                    <td> {{ $item->contact_details ?: '...'}} </td>
                                    <td> {{ $item->note ?: '...'}} </td>
                                    <td> {{ ($item->updated_at)}} </td>
                                    <td> <a href="#" class="btn btn-danger btn-paid" data-item="{{ ucwords($item->product->name) }}" data-link="{{ route('admin.unsold-items', $item->uid) }} "data-toggle="tooltip" data-placement="top" title="Unsold">Unsold</a> </td>
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
@stop



@section('custom-js')

<script src="{{ asset('dashboard/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dashboard/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>

<script>
   $('.btn-paid').on('click', function(){
    Swal.fire({
        title: $(this).data().item,
        text: "Missed Item? This Item will go back to your Reserved Orders",
        type: 'warning',
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