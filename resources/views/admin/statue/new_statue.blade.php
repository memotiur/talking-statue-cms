@extends('layouts.admin_layouts')
@section('content')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> New Statue</h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">New Statue</a></li>
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

                                <form class="login-form" method="post" action="/admin/save-statue"
                                      enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label">Name</label>
                                        <input class="form-control" type="text" placeholder="Enter statue name"
                                               name="statue_name">
                                        <input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}"
                                               required/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Latitude</label>
                                        <input class="form-control" type="text" placeholder="Latitude" name="latitude"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Longitude</label>
                                        <input class="form-control" type="text" placeholder="Latitude" name="longitude"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">City</label>
                                        <select class="form-control" id="select" name="city">
                                            @foreach($city as $city)
                                                <option value="{{$city->city_id}}">{{$city->name}}</option>
                                            @endforeach

                                        </select>

                                        <a href="/admin/new-city" class="btn btn-primary btn-sm pull-right" href="#"><i
                                                    class="fa fa-lg fa-plus"></i></a>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Template</label>
                                        <select class="form-control" id="select" name="template_id">
                                            @foreach($templates as $template)
                                                <option value="{{$template->template_id}}">{{$template->templates_name}}</option>
                                            @endforeach

                                        </select>

                                        <a href="/admin/new-template" class="btn btn-primary btn-sm pull-right"
                                           href="#"><i
                                                    class="fa fa-lg fa-plus"></i></a>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Address</label>
                                        <input class="form-control" type="text" placeholder="Address" name="address">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Range Radius (in meter) <span style="color: #E26F39;font-size: 12px"> - Maximum value is 1000</span></label>
                                        <input class="form-control" type="text" placeholder="Range Radius (in meter)"
                                               name="range_radius" value="100">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Web Address</label>
                                        <input class="form-control" type="text" placeholder="Web Address"
                                               name="web_address">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">QR Code</label>
                                        <input class="form-control" type="text" placeholder="QR Code" name="qr_code">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Description</label>
                                        <textarea class="form-control" rows="4" placeholder="Description"
                                                  name="description"></textarea>
                                    </div>



                                    <div class="form-group">
                                        <label class="control-label">QR Code - On/Off</label>
                                        <select class="form-control" id="select" name="qr_code_on">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">GPS - On/Off</label>
                                        <select class="form-control" id="select" name="gps_on">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Statue - Active/Deactive</label>
                                        <select class="form-control" id="select" name="statue_active">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Keywords <span style="color: #E26F39;font-size: 12px">(Use commas to separate keywords. Ex: keyword1, Keyword2,...)</span></label>
                                        <textarea class="form-control" rows="4" placeholder="Keywords"
                                                  name="keywords"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Image <span style="color: #E26F39;font-size: 12px">(Use 375 * 600px)</span></label>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <input class="form-control" type="file" name="image"  id="imgInp" >
                                            </div>
                                            <div class="col-md-6">
                                                <img id="blah" src="#" alt="Image" width="150px"/>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Audio File</label>
                                        <input class="form-control" type="file" name="audio_url">
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

        $("#imgInp").change(function(){
            readURL(this);
        });
    </script>
@endsection