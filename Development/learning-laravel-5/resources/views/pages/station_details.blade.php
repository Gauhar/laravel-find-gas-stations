@extends('app')

@section('content')

    <div class="row page-header">
        <div class="col-lg-8">
            <h3 class="pull-left pr">
                Gas Station Details

            </h3>

        </div>
        <div class="col-lg-4 text-right pt-lg">

            <button class="btn btn-default fa fa-arrow-left mr" onclick="goBack()">&nbsp;View All Stations</button>
            {{--<a class="btn btn-default" href="/"><i class="fa fa-arrow-left mr"></i>&nbsp;View All Stations</a>--}}
        </div>
    </div>
<div class="panel panel-default">

<div class="panel-body">




    <div class="row stats">

        <div class="col-lg-6 text-center stat-box">
            <h3 class="text-left">Opening Hours:</h3>
            @if($opening_hours)
            @for($i=0;$i<count($opening_hours);$i++)
                <h5 class="text-left">{{$opening_hours[$i]}} </h5>
            @endfor
            @else
                <h2 class="text-left" style="color: orangered">Opening hours not available </h2>
            @endif


        </div>
        <div class="col-lg-12 text-right">
            @if($open_now == true)
                <label class="label label-success mr">Open</label>
            @else
                <label class="label label-danger mr">Closed</label>
            @endif
        </div>

        <div class="hidden">
            <input type="text" id="lat" value="{{$latitude}}">
            <input type="text" id="lng" value="{{$longitude}}">

        </div>
        <div class="col-lg-6 text-center">
            <div id="map"></div>
        </div>


    </div>

    <div class="row">
        <div class="col-lg-12">
            <hr/>
        </div>
    </div>

    <div class="row captialize-labels mt-lg">
        <div class="col-lg-12">
            <div class="form-group row">
                <div class="col-lg-3">
                    <label>Name</label>
                    <h3 class="m0">{{$gas_station_name}}</h3>
                </div>
                <div class="col-lg-3">
                    <label>Gas station number:</label>
                    <h3 class="m0">
                        @if($phone_number)
                            <span class="">{{$phone_number}}</span>
                        @else
                            <span class="">-</span>
                        @endif

                    </h3>
                </div>
                <div class="col-lg-6 text-right">
                    <button class="btn btn-sm btn-warning" onclick="goBack()">
                        <h5 class="m0 mb"><i class="fa fa-arrow-circle-left"></i></h5>
                        <h6 class="m0">Go back</h6>
                    </button>

                        <a href="{{$website}}" target="_blank" type="button" class="btn btn-sm btn-info">
                            <h5 class="m0 mb"><i class="fa fa-globe"></i></h5>
                            <h6 class="m0">Go to website</h6>
                        </a>
                        <a href="{{$website}}" type="button" class="btn btn-sm btn-success">
                            <h5 class="m0 mb"><i class="fa fa-map"></i></h5>
                            <h6 class="m0">Open in maps</h6>
                        </a>

                </div>
            </div>
        </div>
    </div>
</div>
</div>



@stop

<script>

    goBack = function()
    {
        window.history.back();
    }
    window.onload = function()
    {

        var lat = document.getElementById('lat').value;
        var lng = document.getElementById('lng').value;

        showPosition(lat,lng);
    }

    function showPosition(lat, lng) {


        var latlon = lat + "," + lng;

        var img_url = "http://maps.googleapis.com/maps/api/staticmap?center="
                +latlon+"&zoom=14&size=400x300&sensor=false";
        document.getElementById("map").innerHTML = "<img src='"+img_url+"'>";
    }
</script>
