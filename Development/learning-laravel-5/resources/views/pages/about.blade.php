@extends('app');

@section('content')
<h1 class="text-center">Welcome To Gasoline</h1>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>




<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Your Current Location</h3>
    </div>
    <div class="panel-body">
        {!! Form::open(array('route' => 'contact_store', 'class' => 'form')) !!}
        <div class="form-group hidden">
            {!! Form::textarea('lat', null,
            array('required',
            'id' => 'lat',
            'class'=>'form-control',
            'placeholder'=>'Your Latitude', 'value' => 'text')) !!}
        </div>


        <div class="form-group hidden">
            {!! Form::textarea('lng', null,
            array('required',
            'id' => 'lng',
            'class'=>'form-control',
            'placeholder'=>'Your Longitude', 'value' => 'text')) !!}
        </div>
        <div class="form-group hidden">
            {!! Form::textarea('address', null,
            array('required',
            'id' => 'address',
            'class'=>'form-control',
            'placeholder'=>'Your address', 'value' => 'text')) !!}
        </div>

        <div class="row">
            <label class="col col-lg-12">You are at:</label>
            {{--this shows the current address--}}
            <h3 id="add_id" class="col col-lg-12"></h3>

        </div>

        <div class="row">
            <div class="col col-lg-12 text-center">
                {!! Form::submit('Get Gas Station List',
                array('class'=>'btn btn-primary ')) !!}
            </div>


        {!! Form::close() !!}
        </div>
    </div>

</div>





@stop

<script>




    var lat_id;
    var lng_id;
    window.onload = function() {
       // debugger;
        lat_id = document.getElementById("lat");
        lng_id = document.getElementById("lng");
        add_id = document.getElementById("add_id");
        address_hidden_id = document.getElementById("address");
        getLocation();
    }

    function getLocation()
    {
    //debugger;
    if (navigator.geolocation)
    {
        navigator.geolocation.watchPosition(showPosition);
    }
    else
    {
        lat_id.innerHTML = "Geolocation is not supported by this browser.";
    }
    }
     function showPosition(position)
    {
        //debugger;
        lat_id.innerHTML= position.coords.latitude;
        lng_id.innerHTML = position.coords.longitude;


        var geocoder = new google.maps.Geocoder();
        var latLng = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
        geocoder.geocode({
                    latLng: latLng
                },
                function(responses)
                {
                    if (responses && responses.length > 0)
                    {
                        console.log("the coords are: ", position.coords.latitude);
                        console.log("the response is: ", responses[0]);
                        add_id.innerHTML = (responses[0].formatted_address);
                        address_hidden_id.innerHTML = (responses[0].formatted_address);
                       // alert(responses[0].formatted_address);
                    }
                    else
                    {
                        //alert('Not getting Any address for given latitude and longitude.');
                    }
                }
        );
    }




</script>



