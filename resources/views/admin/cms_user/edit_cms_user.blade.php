@extends('layouts.admin_layouts')
@section('content')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Update CMS User</h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">Update CMS User</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
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

                                <form class="login-form" method="post" action="/admin/update-cms-user"
                                      enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label">Name</label>
                                        <input class="form-control" type="text" placeholder="Enter statue name"
                                               name="name"  value="{{$result->name}}">
                                        <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}"/>
                                        <input type="hidden" name="id" value="{{$result->id}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        <input class="form-control" type="email" value="{{$result->email}}" placeholder="email" name="email"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Password</label>
                                        <input class="form-control" value="{{$result->password}}"type="password" placeholder="Password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Age</label>
                                        <input class="form-control" value="{{$result->age}}"type="text" placeholder="age" name="age"
                                               required>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">City</label>
                                        <input class="form-control" value="{{$result->city}}"type="text" placeholder="city" name="city"
                                               required>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Phone</label>
                                        <input class="form-control" value="{{$result->mobile_number}}"type="text" placeholder="age" name="mobile_number"
                                               required>
                                    </div>



                                    <div class="form-group btn-container">
                                        <button class="btn btn-primary btn-block"> UPDATE</button>
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