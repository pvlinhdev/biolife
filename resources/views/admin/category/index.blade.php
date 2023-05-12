@extends('admin.master')
@section('title', __('Admin Category'))

@section('content')
    <!-- Hoverable Table rows -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row cart_table mb-5">
            <h4 class="fw-bold py-3 mb-4 col-md-8"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>
            <div class="col-md-4 mb-3 mt-2">
                <form class="d-flex" onsubmit="return false">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">
                <div class="" style="text-align: right">
                    {{-- <small class="text-light fw-semibold">Category</small> --}}
                    <div class="buttoncreate">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                            Create Category
                        </button>
                        <!-- Modal -->
                        @include('admin.category.create')
                    </div>
                </div>
            </h5>
            <div class="table-responsive text-nowrap mt-2">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Images</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($categoryList as $cat)
                            <tr>
                                <td>
                                    img
                                </td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $cat->name }}</strong>
                                </td>
                                <td>{{ $cat->description }}</td>

                                <td><span class="badge bg-label-primary me-1">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('admin.category.edit', $cat->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>

                                            {{-- <form action="{{ route('admin.category.destroy', $cat->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-delete">Delete</button>
                                            </form> --}}
                                            <button class="btn btn-danger delete-category"
                                                data-id="{{ $cat->id }}">Xóa</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Hoverable Table rows -->
    </div>
@endsection
@section('script')
    {{-- delete --}}
    <script>
        // Xác nhận xóa danh mục
        $(document).ready(function() {
            $('.delete-category').click(function(e) {
                e.preventDefault();
                var categoryId = $(this).data('id');
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
                                url: "{{ route('admin.category.destroy', ':id') }}"
                                    .replace(':id', categoryId),
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
                                        'An error occurred while deleting the category!',
                                        'error'
                                    );
                                }
                            });
                        } else {
                            Swal.fire(
                                'Cancelled',
                                'The category was not deleted!',
                                'error'
                            );
                        }
                    });
            });
        });
    </script>

@endsection
