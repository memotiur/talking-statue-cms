@extends('layouts.admin_layouts')
@section('content')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Settings</h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="card">
                            <div class="card-body">

                                @if(session('success'))
                                    <div class="alert alert-success">
                                        <strong></strong> {{session('success')}}
                                    </div>
                                @endif
                                @if(session('decline'))
                                    <div class="alert alert-danger">
                                        <strong></strong> {{session('decline')}}
                                    </div>
                                @endif

                                    <form class="login-form form-horizontal" method="post" action="/admin/setting/update"
                                          enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Name</label>
                                            <div class="col-lg-10">

                                                <input class="form-control" type="text"
                                                       name="name" value="{{$result->name}}">
                                                <input type="hidden" name="_token" id="csrf-token"
                                                       value="{{csrf_token()}}"/>
                                                <input type="hidden" name="id"
                                                       value="{{$result->id}}"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Email</label>
                                            <div class="col-lg-10">
                                                <input class="form-control"
                                                       name="email" value="{{$result->email}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Password</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" type="password"
                                                       name="password" value="{{$result->password}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Phone</label>
                                            <div class="col-lg-10">
                                                <input class="form-control"
                                                       name="mobile_number" value="{{$result->mobile_number}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">City</label>
                                            <div class="col-lg-10">
                                                <input class="form-control"
                                                       name="city" value="{{$result->city}}">
                                            </div>
                                        </div>


                                        <div class="form-group btn-container">
                                            <div class="col-lg-2"></div>
                                            <div class="col-lg-10">
                                                <button class="btn btn-primary btn-block"> UPDATE</button>
                                            </div>

                                        </div>
                                    </form>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection




