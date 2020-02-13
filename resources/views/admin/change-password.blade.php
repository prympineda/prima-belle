@extends('layouts.master-admin')

@section('title') Change Password @endsection

@section('content')
    <h1>Change Password</h1>

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action=" {{ route('admin.save-change-password') }} " method="post">
                        @csrf      
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Current Passwod:<span class="text-danger">*</span> </label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" name="current_password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">New Password: <span class="text-danger">*</span> </label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" name="new_password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Confirm Password: <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" name="new_confirm_password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" value="true" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                
            </div>
        </div>
    </div>


@stop