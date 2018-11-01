@extends('layouts.admin_layouts')
@section('content')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Edit Statue</h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">Edit Statue</a></li>
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
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
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

                                <form class="login-form" method="post" action="/admin/edit-statue/save"
                                      enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label">Name</label>
                                        <input class="form-control" type="text" placeholder="Enter statue name"
                                               name="statue_name" value="{{$result->statue_name}}">
                                        <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}"/>
                                        <input type="hidden" name="statue_id" id="csrf-token"
                                               value="{{$result->statue_id}}"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Latitude</label>
                                        <input class="form-control" type="text" placeholder="Latitude"
                                               value="{{$result->latitude}}" name="latitude"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Longitude</label>
                                        <input class="form-control" type="text" placeholder="Latitude"
                                               name="longitude" value="{{$result->longitude}}"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">City</label>
                                        <select class="form-control" id="select" name="city">
                                            @foreach($city as $city)
                                                <option value="{{$city->city_id}}"
                                                        @if($result->city==$city->city_id) selected @else @endif>{{$city->name}}</option>

                                            @endforeach

                                        </select>

                                        <a href="/admin/new-city" class="btn btn-primary btn-sm pull-right" href="#"><i
                                                    class="fa fa-lg fa-plus"></i></a>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Template</label>
                                        <select class="form-control" id="select" name="template_id">
                                            @foreach($templates as $template)
                                                <option value="{{$template->template_id}}" @if($template->template_id==$result->template_id)selected @endif>{{$template->templates_name}}</option>
                                            @endforeach

                                        </select>

                                        <a href="/admin/new-template" class="btn btn-primary btn-sm pull-right"
                                           href="#"><i
                                                    class="fa fa-lg fa-plus"></i></a>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Address</label>
                                        <input class="form-control" type="text" placeholder="Address" name="address"
                                               value="{{$result->address}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Range Radius (in meter) <span style="color: #E26F39;font-size: 12px"> - Maximum value is 1000</span></label>
                                        <input class="form-control" type="text" placeholder="Range Radius (in meter)"
                                               name="range_radius" value="{{$result->range_radius}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Web Address</label>
                                        <input class="form-control" type="text" placeholder="Web Address"
                                               name="web_address" value="{{$result->web_address}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">QR Code</label>
                                        <input class="form-control" type="text" placeholder="QR Code" name="qr_code"
                                               value="{{$result->qr_code}}">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Description</label>
                                        <textarea class="form-control" rows="4" placeholder="Description"
                                                  name="description">{{$result->description}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">QR Code ON</label>
                                        <select class="form-control" id="select" name="qr_code_on">
                                            <option value="1" @if($result->qr_code_on==1) selected @endif>Yes</option>
                                            <option value="0" @if($result->qr_code_on==0) selected @endif>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">GPS ON</label>
                                        <select class="form-control" id="select" name="gps_on">
                                            <option value="1" @if($result->gps_on==1) selected @endif>Yes</option>
                                            <option value="0" @if($result->gps_on==0) selected @endif>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Statue Active</label>
                                        <select class="form-control" id="select" name="statue_active">
                                            <option value="1" @if($result->statue_active==1) selected @endif>Yes
                                            </option>
                                            <option value="0" @if($result->statue_active==0) selected @endif>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Keywords <span
                                                    style="color: #E26F39;font-size: 12px">(Use commas to separate keywords. Ex: keyword1, Keyword2,...)</span></label>
                                        <textarea class="form-control" rows="4" placeholder="Keywords"
                                                  name="keywords">{{$result->keywords}}</textarea>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label">Image <span style="color: #E26F39;font-size: 12px">(Use 375 * 600px)</span></label>
                                        <input class="form-control" type="file" name="image" id="imgInp">
                                        <img id="blah" src="/images/{{$result->image}}" alt="Image" width="150px"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Audio File</label>
                                        <input class="form-control" type="file" name="audio_url"
                                               value="{{$result->audio_url}}">

                                        <label class="control-label">Audio {{$result->audio_url}}</label>
                                        <audio controls>

                                            <source src="/audio/{{$result->audio_url}}" type="audio/mpeg">
                                        </audio>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    </script>
@endsection