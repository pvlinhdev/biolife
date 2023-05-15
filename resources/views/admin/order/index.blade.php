@extends('admin.master')
@section('title', __('Admin Order'))
@section('style')
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
@endsection
@section('content')
    <!-- Hoverable Table rows -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row cart_table mb-5">
            <h4 class="fw-bold py-3 mb-4 col-md-8"><span class="text-muted fw-light">Tables /</span> Order List</h4>
            <div class="col-md-4 mb-3 mt-2">
                <form class="d-flex" onsubmit="return false">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="table-responsive text-nowrap mt-2">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>User</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Note</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0 " class="show-products">
                        @foreach ($orderList as $order)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td><i class="fab fa-angular fa-lg text-danger "></i>
                                    <strong>{{ $order->user->name }}</strong>
                                </td>
                                <td>{{ $order->receivership->phone }}</td>
                                <td>{{ $order->user->created_at }}</td>
                                <td>{{ $order->receivership->note }}</td>
                                <td>{{ $order->status }}</td>

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('order.show', $order->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Show</a>
                                            <a class="dropdown-item" href="{{ route('order.edit', $order->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit Status</a>

                                            {{-- <a class="dropdown-item"><i class="bx bx-trash me-1"></i>
                                                <button type="submit" class="btn delete-product"
                                                    data-id="{{ $pro->id }}">Delete</button></a> --}}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- phân trang --}}
                <div class="card-footer clearfix">
                    <div class="float-left">
                        <div class="dataTables_info">
                            Showing {{ $orderList->firstItem() }} to {{ $orderList->lastItem() }} of
                            {{ $orderList->total() }} entries
                        </div>
                    </div>
                    {{-- phân trang --}}
                    <div class="float-right">
                        {{ $orderList->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!--/ Hoverable Table rows -->
    </div>
@endsection
@section('script')
    <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>
    {{-- delete --}}
    <script>
        // Xác nhận xóa danh mục
        $(document).ready(function() {
            $('.delete-product').click(function(e) {
                e.preventDefault();
                var productId = $(this).data('id');
                Swal({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                url: "{{ route('admin.product.destroy', ':id') }}"
                                    .replace(':id', productId),
                                type: 'POST',
                                data: {
                                    '_method': 'DELETE',
                                    '_token': '{{ csrf_token() }}'
                                },
                                success: function(data) {
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    )
                                },
                                error: function(xhr, textStatus, errorThrown) {
                                    Swal.fire(
                                        'Error',
                                        'An error occurred while deleting the product!',
                                        'error'
                                    );
                                }
                            });
                        } else {
                            Swal.fire(
                                'Cancelled',
                                'The product was not deleted!',
                                'error'
                            );
                        }
                    });
            });
        });
    </script>
@endsection
