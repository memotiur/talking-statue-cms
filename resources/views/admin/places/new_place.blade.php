@extends('layouts.admin_layouts')
@section('content')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> New Place</h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">New Place</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="row">
                    <div class="col-md-12">
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

                                <form class="login-form" method="post" action="/admin/save-place"
                                      enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="control-label">Name</label>
                                        <input class="form-control" type="text" placeholder="Enter place name"
                                               name="place_name">
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
                                        <input class="form-control" type="text" placeholder="Longitude" name="longitude"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">City</label>
                                        <select class="form-control" id="select" name="city_id">
                                            @foreach($city as $city)
                                                <option value="{{$city->city_id}}">{{$city->name}}</option>
                                            @endforeach

                                        </select>

                                        <a href="/admin/new-city" class="btn btn-primary btn-sm pull-right" href="#"><i
                                                    class="fa fa-lg fa-plus"></i></a>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Address</label>
                                        <input class="form-control" type="text" placeholder="Place Address"
                                               name="place_address">
                                    </div>
                                    <div class="form-group" style="display: none">
                                        <label class="control-label">Open Time</label>
                                        <input class="form-control" type="time" placeholder="Open Time"
                                               name="open_time">
                                    </div>
                                    <div class="form-group" style="display: none">
                                        <label class="control-label">Close Time</label>
                                        <input class="form-control" type="time" placeholder="Close Time"
                                               name="close_time">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Working Days</label><br>


                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="saturday"
                                                                  value="Saturday">Saturday</label>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="col-md-4"><label class="control-label">Open Time</label>
                                                </div>
                                                <div class="col-md-8"><input style="padding: 0px 12px;"
                                                                             class="form-control"
                                                                             type="time"
                                                                             placeholder="Close Time"
                                                                             name="saturday_opening_time"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="col-md-4"><label class="control-label">Close Time</label>
                                                </div>
                                                <div class="col-md-8"><input style="padding: 0px 12px;"
                                                                             class="form-control"
                                                                             type="time"
                                                                             placeholder="Close Time"
                                                                             name="saturday_closing_time"></div>
                                            </div>

                                        </div>



                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="checkbox"><label><input type="checkbox" name="sunday"
                                                                                    value="Sunday">Sunday</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="col-md-4"><label class="control-label">Open Time</label>
                                                </div>
                                                <div class="col-md-8"><input style="padding: 0px 12px;"
                                                                             class="form-control"
                                                                             type="time"
                                                                             placeholder="Close Time"
                                                                             name="sunday_opening_time"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="col-md-4"><label class="control-label">Close Time</label>
                                                </div>
                                                <div class="col-md-8"><input style="padding: 0px 12px;"
                                                                             class="form-control"
                                                                             type="time"
                                                                             placeholder="Close Time"
                                                                             name="sunday_closing_time"></div>
                                            </div>

                                        </div>

                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="checkbox"><label><input type="checkbox" name="monday"
                                                                                    value="Monday">Monday</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="col-md-4"><label class="control-label">Open Time</label>
                                                </div>
                                                <div class="col-md-8"><input style="padding: 0px 12px;"
                                                                             class="form-control"
                                                                             type="time"
                                                                             placeholder="Close Time"
                                                                             name="monday_opening_time"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="col-md-4"><label class="control-label">Close Time</label>
                                                </div>
                                                <div class="col-md-8"><input style="padding: 0px 12px;"
                                                                             class="form-control"
                                                                             type="time"
                                                                             placeholder="Close Time"
                                                                             name="monday_closing_time"></div>
                                            </div>

                                        </div>

                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="checkbox"><label><input type="checkbox" name="tuesday"
                                                                                    value="Tuesday">Tuesday</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="col-md-4"><label class="control-label">Open Time</label>
                                                </div>
                                                <div class="col-md-8"><input style="padding: 0px 12px;"
                                                                             class="form-control"
                                                                             type="time"
                                                                             placeholder="Close Time"
                                                                             name="tuesday_opening_time"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="col-md-4"><label class="control-label">Close Time</label>
                                                </div>
                                                <div class="col-md-8"><input style="padding: 0px 12px;"
                                                                             class="form-control"
                                                                             type="time"
                                                                             placeholder="Close Time"
                                                                             name="tuesday_closing_time"></div>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="checkbox"><label><input type="checkbox" name="wednesday"
                                                                                    value="Wednesday">Wednesday</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="col-md-4"><label class="control-label">Open Time</label>
                                                </div>
                                                <div class="col-md-8"><input style="padding: 0px 12px;"
                                                                             class="form-control"
                                                                             type="time"
                                                                             placeholder="Close Time"
                                                                             name="wednesday_opening_time"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="col-md-4"><label class="control-label">Close Time</label>
                                                </div>
                                                <div class="col-md-8"><input style="padding: 0px 12px;"
                                                                             class="form-control"
                                                                             type="time"
                                                                             placeholder="Close Time"
                                                                             name="wednesday_closing_time"></div>
                                            </div>

                                        </div>

                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="checkbox"><label><input type="checkbox" name="thursday"
                                                                                    value="Thursday">Thursday</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="col-md-4"><label class="control-label">Open Time</label>
                                                </div>
                                                <div class="col-md-8"><input style="padding: 0px 12px;"
                                                                             class="form-control"
                                                                             type="time"
                                                                             placeholder="Close Time"
                                                                             name="thursday_opening_time"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="col-md-4"><label class="control-label">Close Time</label>
                                                </div>
                                                <div class="col-md-8"><input style="padding: 0px 12px;"
                                                                             class="form-control"
                                                                             type="time"
                                                                             placeholder="Close Time"
                                                                             name="thursday_closing_time"></div>
                                            </div>

                                        </div>

                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="checkbox"><label><input type="checkbox" name="friday"
                                                                                    value="Friday">Friday</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="col-md-4"><label class="control-label">Open Time</label>
                                                </div>
                                                <div class="col-md-8"><input style="padding: 0px 12px;"
                                                                             class="form-control"
                                                                             type="time"
                                                                             placeholder="Close Time"
                                                                             name="friday_closing_time"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="col-md-4"><label class="control-label">Close Time</label>
                                                </div>
                                                <div class="col-md-8"><input style="padding: 0px 12px;"
                                                                             class="form-control"
                                                                             type="time"
                                                                             placeholder="Close Time"
                                                                             name="friday_opening_time"></div>
                                            </div>

                                        </div>






                                    </div>


                                    <div class="form-group">
                                        <label class="control-label">URL</label>
                                        <input class="form-control" type="text" placeholder="URL"
                                               name="place_web_url">
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label">Description</label>
                                        <textarea class="form-control" rows="4" placeholder="Description"
                                                  name="details"></textarea>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label">Image <span style="color: #E26F39;font-size: 12px">(Use 343 * 220px)</span></label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input class="form-control" type="file" name="image" id="imgInp">
                                            </div>
                                            <div class="col-md-6">

                                                <img id="blah" src="#" alt="Image" width="150px"/>
                                            </div>
                                        </div>
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

        $("#imgInp").change(function () {
            readURL(this);
        });
    </script>
@endsection