@extends('layouts.admin_layouts')
@section('content')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> New Top Slide Image</h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">New Top Slide Image</a></li>
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

                                <form class="login-form form-horizontal" method="post"
                                      action="/admin/view-slide-image/store"
                                      enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Image <span style="color: #E26F39;font-size: 12px">(Use 375 * 150px)</span></label>

                                        <div class="col-lg-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input class="form-control" type="file" name="image" id="imgInp">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-md-6">
                                                        <img id="blah" src="#" alt="Image" width="150px"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="hidden" name="_token" id="csrf-token"
                                                   value="{{csrf_token()}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Select Option</label>
                                        <div class="col-lg-9">
                                            <select class="form-control " id="select" name="option" onchange="run()">
                                                <option>Place</option>
                                                <option>Statue</option>
                                                <option>URL</option>
                                                <option>Template</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group" id="place">
                                        <label class="col-lg-3 control-label">Select Places</label>
                                        <div class="col-lg-9">
                                            <select class="form-control " id="select" name="place" >
                                                @foreach($places as $place)
                                                    <option value="{{$place->place_id}}">{{$place->place_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group" style="display:none" id="statue">
                                        <label class="col-lg-3 control-label">Select Statue</label>
                                        <div class="col-lg-9">
                                            <select class="form-control " id="select" name="statue" >
                                                @foreach($statues as $statue)
                                                    <option value="{{$statue->statue_id}}">{{$statue->statue_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group" style="display:none"  id="template">
                                        <label class="col-lg-3 control-label">Select Template</label>
                                        <div class="col-lg-9">
                                            <select class="form-control " id="select" name="template">
                                                @foreach($templates as $template)
                                                    <option value="{{$template->template_id}}">{{$template->templates_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" style="display:none" id="url">
                                        <label class="col-lg-3 control-label">Write URL</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" placeholder="URL"
                                                   name="top_slidd_url">
                                        </div>
                                    </div>

                                    <div class="form-group"id="city">
                                        <label class="col-lg-3 control-label">Select City</label>
                                        <div class="col-lg-9">
                                            <select class="form-control " id="select" name="city_id">
                                                @foreach($cities as $city)
                                                    <option value="{{$city->city_id}}">{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group btn-container">
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-9">
                                            <button class="btn btn-primary btn-block"> SAVE</button>
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


    <script>
        function run() {
            //alert( document.getElementById("select").value);
            if(document.getElementById("select").value=="Place"){
                document.getElementById("place").style.display = 'block';
                document.getElementById("statue").style.display = 'none';
                document.getElementById("template").style.display = 'none';
                document.getElementById("url").style.display = 'none';
            }else if(document.getElementById("select").value=="Statue"){
                document.getElementById("place").style.display = 'none';
                document.getElementById("statue").style.display = 'block';
                document.getElementById("template").style.display = 'none';
                document.getElementById("url").style.display = 'none';
            }else if(document.getElementById("select").value=="Template"){
                document.getElementById("place").style.display = 'none';
                document.getElementById("statue").style.display = 'none';
                document.getElementById("template").style.display = 'block';
                document.getElementById("url").style.display = 'none';
            }else if(document.getElementById("select").value=="URL"){
                document.getElementById("place").style.display = 'none';
                document.getElementById("statue").style.display = 'none';
                document.getElementById("template").style.display = 'none';
                document.getElementById("url").style.display = 'block';
            }
        }
    </script>
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