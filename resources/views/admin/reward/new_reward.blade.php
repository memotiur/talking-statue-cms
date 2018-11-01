@extends('layouts.admin_layouts')
@section('content')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> New Reward</h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">New Reward</a></li>
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

                                <form class="login-form" method="post" action="/admin/save-reward"
                                      enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label">Reward Name</label>
                                        <input class="form-control" type="text" placeholder="Enter Reward name"
                                               name="reward_name">
                                        <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}"
                                               required/>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label">Valid Period</label>
                                        <input class="form-control" type="number" placeholder="Valid Period"
                                               name="valid_period">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">City</label>
                                        <select class="form-control" id="select" name="reward_city">
                                            @foreach($cities as $city)
                                                <option value="{{$city->city_id}}">{{$city->name}}</option>
                                            @endforeach

                                        </select>

                                        <a href="/admin/new-city" class="btn btn-primary btn-sm pull-right" href="#"><i
                                                    class="fa fa-lg fa-plus"></i></a>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label">URL</label>
                                        <input class="form-control" type="text" placeholder="URL"
                                               name="reward_url">
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label">Image <span style="color: #E26F39;font-size: 12px">(Use 343 * 570px)</span></label>
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                    <div class="form-group btn-container">
                                        <button class="btn btn-primary btn-block"> SAVE</button>
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