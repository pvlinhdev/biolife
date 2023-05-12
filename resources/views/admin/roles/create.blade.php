@extends('admin.master')
@section('title', __('Admin Category'))
@section('stylesheet')

@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Vertical Layouts</h4>
        <!-- Basic Layout -->
        <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Basic Layout</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <!-- /.card-header -->
                    <!-- form start -->
                    {!! Form::open(['route' => 'admin.roles.store', 'method' => 'POST']) !!}
                    <div class="card-body">

                        <div class="tab-pane" id="settings">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <strong>Whoops!</strong> There were some problems with your input.<br>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-md-2 col-form-label">Name</label>
                                    <div class="col-md-10">
                                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}

                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <label for="inputPermission" class="col-md-2 col-form-label">Permission</label>
                                    <div class="col-md-10">

                                        <div class="row">
                                            <?php
                                            $abc = '';
                                            $len = count($permission);
                                            ?>
                                            @foreach ($permission as $key => $value)
                                                <?php
                                                
                                                if ($key === 0) {
                                                    echo '<div class="col-lg-4">';
                                                }
                                                
                                                if ($abc != substr($value->name, 0, strpos($value->name, '-')) && $key === 0) {
                                                    $abc = substr($value->name, 0, strpos($value->name, '-'));
                                                
                                                    echo '<label>' . $abc . '</label><div class="block">';
                                                } elseif ($abc != substr($value->name, 0, strpos($value->name, '-')) && $key !== 0) {
                                                    $abc = substr($value->name, 0, strpos($value->name, '-'));
                                                    echo '</div></div><div class="col-lg-4">';
                                                    echo '<label>' . $abc . '</label><div class="block">';
                                                }
                                                
                                                ?>
                                                {{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                                                {{ $value->name }}
                                                <br />
                                                <?php
                                                if ($key === $len - 1) {
                                                    echo '</div></div>';
                                                }
                                                ?>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.tab-pane -->

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
