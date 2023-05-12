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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#permissionCenter">
                            Create Permission
                        </button>
                        {{-- modal --}}
                        @include('admin.category.create')
                    </div>
                </div>
            </h5>
            <div class="table-responsive text-nowrap mt-2">
                
                <table id="permission_table" class="table table-hover data-table able-striped jambo_table bulk_action">
                    <thead>
                        <tr>
                            <th width="50px">No</th>
                            <th style="text-align: center">Name</th>
                            <th width="150px">Action</th>
                            <th width="150px">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $per)
                            <tr>
                                <td class="text-center">{{++$i}}</td>
                                <td class="text-center">{{ $per->name }}</td>
                                <td>
                                    <a
                                        class="btn btn-sm btn-primary"href="{{ route('admin.permissions.edit', $per->id) }}">Edit</a>
                                </td>
                                <td>
                                    <form method="post" action="{{ route('admin.permissions.destroy', $per->id) }}">
                                        @method('delete')
                                        @csrf

                                        <button type="submit" class="btn btn-sm btn-danger delete_confirm">Delete</button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-footer clearfix">
                    <div class="float-left">
                        <div class="dataTables_info">
                            Showing {{ $permissions->firstItem() }} to {{ $permissions->lastItem() }} of
                            {{ $permissions->total() }} entries
                        </div>
                    </div>
                    {{-- phân trang --}}
                    <div class="float-right">
                        {{ $permissions->links() }}
                    </div>
                </div>
               
                <!-- /.modal -->
                
            </div>
        </div>
        <!--/ Hoverable Table rows -->
    </div>
@endsection
@section('script')


@endsection
