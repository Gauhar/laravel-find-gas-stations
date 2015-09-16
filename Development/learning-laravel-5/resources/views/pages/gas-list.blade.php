

@extends('app')

@section('content')
    <input type="hidden" id="token" value="{{ csrf_token() }}">

    <div class="row page-header">
        <div class="row">
            <div class="col-lg-8 text-left">
                <h1><u>Gasoline</u> </h1>

            </div>
            <div class="col-lg-4 text-right">

                <button class="btn btn-default fa fa-arrow-left mr" onclick="goBack()">&nbsp;Welcome Page</button>
                {{--<a class="btn btn-default" href="/"><i class="fa fa-arrow-left mr"></i>&nbsp;View All Stations</a>--}}
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Gas Stations List</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <th class="col-lg-4">Name</th>

                        <th class="col-lg-4">Address</th>



                        <th></th>


                        </thead>

                        <tbody>


                        @for($i=0;$i<count($gas_stations_name);$i++)
                            <tr>


                                <td>
                                    {{$gas_stations_name[$i]}}

                                </td>
                                <td>
                                    {{$gas_station_address[$i]}}

                                </td>

                                <td class="hidden">
                                    {{$place_id[$i]}}

                                </td>



                                <td class="text-right">

                                    <a href="station-details/{{$place_id[$i]}}"  class="btn btn-info  btn-fetch-url mr">View Details</a>


                                </td>
                            </tr>

                        @endfor


                        </tbody>
                        {{--<tbody>--}}
                        {{--{!! Form::open(array('route' => 'gas-list', 'class' => 'form')) !!}--}}
                        {{--<tr>--}}

                            {{--<td>--}}

                                {{--{!! Form::select('distance', array('two' => '2 Km', 'eight' => '8 Km'), 'two') !!}--}}
                            {{--</td>--}}
                            {{--<td></td>--}}
                            {{--<td class="hidden">--}}
                                {{--<input type="text" id="lat" value="{{$lat}}">--}}
                                {{--<input type="text" id="lng" value="{{$lng}}">--}}
                            {{--</td>--}}
                            {{--<td class="text-right">--}}
                                {{--{!! Form::submit('Filter',array('class' => 'btn btn-default')) !!}--}}
                            {{--</td>--}}

                            {{--<div class="dropdown">--}}
                            {{--<div>--}}
                            {{--{!! Form::submit('Select',--}}
                            {{--array(--}}
                            {{--'id'=>'select',--}}
                            {{--'data-toggle'=>'dropdown',--}}
                            {{--'aria-hashpopup'=>'true',--}}
                            {{--'aria-expanded'=>'false',--}}
                            {{--'class'=>'btn btn-default dropdown-toggle')) !!}--}}
                            {{--</div>--}}

                            {{--<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                            {{--Select--}}
                            {{--<span class="caret"></span>--}}
                            {{--</button>--}}
                            {{--<ul class="dropdown-menu" aria-labelledby="dropdownMenu2">--}}
                            {{--<li><a href="#">2 Km</a></li>--}}
                            {{--<li><a href="#">8 Km</a></li>--}}
                            {{--<li><a href="#">16 Km</a></li>--}}
                            {{--<li><a href="#">25 Km</a></li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}

                        {{--</tr>--}}
                        {{--{!! Form::close() !!}--}}
                        {{--</tbody>--}}

                    </table>



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
</script>

