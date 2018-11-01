@extends('layouts.admin_layouts')
@section('content')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> New City</h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">New City</a></li>
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

                                <form class="login-form" method="post" action="/admin/save-edited-city"
                                      enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label">City Name</label>
                                        <input class="form-control" type="text" placeholder="Enter City name"
                                               name="name" value="{{$result->name}}">
                                        <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}"/>
                                        <input type="hidden" name="city_id"  value="{{$result->city_id}}"/>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Latitude</label>
                                        <input class="form-control" type="text" placeholder="Latitude" name="city_latitude" value="{{$result->city_latitude}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Longitude</label>
                                        <input class="form-control" type="text" placeholder="Longitude" name="city_longitude"  value="{{$result->city_longitude}}"required>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Country</label>
                                        <input class="form-control" type="text" placeholder="Country" name="country"
                                               value="{{$result->country}}" required>
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