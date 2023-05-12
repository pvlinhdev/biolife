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
                    {!! Form::open(['route' => 'admin.user.store', 'method' => 'POST']) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        {!! Form::text('name', old('name'), [
                                            'placeholder' => 'Name',
                                            'class' => 'form-control',
                                        ]) !!}
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        {!! Form::text('email', old('email'), [
                                            'placeholder' => 'Email',
                                            'class' => 'form-control',
                                        ]) !!}
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-phone">Phone</label>
                                        <input type="text" name="phone" id="basic-default-phone"
                                            class="form-control phone-mask" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-phone">Iamge</label>
                                        <input type="file" name="file_upload" id="basic-default-phone"
                                            class="form-control phone-mask" />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Password:</strong>
                                        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Confirm Password:</strong>
                                        {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                                        <span class="text-danger">{{ $errors->first('confirm-password') }}</span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Role:</strong>
                                    {!! Form::select('roles', $roles, old('roles', []), ['class' => 'form-control', 'multiple']) !!}
                                    <span class="text-danger">{{ $errors->first('roles') }}</span>
                                </div>
                            </div>
                        </div>
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
