@extends('layouts.admin_layouts')
@section('content')
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> View Redeem Rewards</h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">View Redeem Rewards</a></li>
            </ul>
        </div>
    </div>

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
                    @php($i=1)
                    <table class="table table-hover table-bordered table-responsive" id="sampleTable">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>City</th>
                            <th>Reward Name</th>
                            <th>Redeem Date</th>
                            <th>Validity</th>
                            <th>Serial</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($result as $res)

                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$res->name}}</td>
                                <td>{{$res->city_name}}</td>
                                <td>{{$res->reward_name}}</td>
                                {{--  <td>{{$res->city_id}}</td>--}}
                                <td>{{$res->redeem_date}}</td>

                                <td>{{$res->valid_period}}</td>
                                <td>{{$res->serial_number}}</td>
                                {{--<td>
                                    <div class="btn-group">
                                        <a href="/admin/view-statue/edit/{{$res->statue_id}}" class="btn btn-info"
                                           href="#"><i class="fa fa-lg fa-edit"></i></a>
                                        <a href="/admin/view-statue/delete/{{$res->statue_id}}" class="btn btn-warning"
                                           href="#"><i class="fa fa-lg fa-trash"></i></a>
                                    </div>
                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection