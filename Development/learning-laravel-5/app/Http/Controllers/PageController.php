<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use App\Http\Requests\ContactFormRequest;
use App\Http\Controllers\Image;

class PageController extends Controller
{

    public function create()
    {
        $entry_data = array(
            'name' => "Gauhar Shakeel"
        );
        return view('pages.about', $entry_data);
    }



    public function store(Request $request, $dist = 3000)
    {

       //dd($request->input('address'));
        $lng = $request->input('lng');
        $lat = $request->input('lat');

        // check for the current address
        // if exists then please get the lat and lng fron the table where the address is equal
        // to the input address.
        // the lat and the lng are used to get the place details
        // the details also need to be stored persistently.
        //

        $url_places = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$lat,$lng&radius=$dist&type=gas_station&key=AIzaSyAyyRNGUWjHovipHaeCyfJg_kkNWOFqxXs";
        // Make the HTTP request
        $location_data = @file_get_contents($url_places);
        // Parse the json response
        $location_json = json_decode($location_data, true);


        $gas_stations = $location_json['results'];
        $gas_station_names = array();
        $gas_station_address = array();
        $place_id = array();
        $index = 0;
        foreach ($gas_stations as $gas_station) {

            $gas_station_names[$index] = $gas_station['name'];
            $gas_station_address[$index] = $gas_station['vicinity'];
            $place_id[$index] = $gas_station['place_id'];

            $index++;


        }

        $entry_data = array(
            "gas_stations_name" => $gas_station_names,
            "gas_station_address" => $gas_station_address,
            "place_id" => $place_id,
            "lat" => $lat,
            "lng" => $lng


        );


        return view('pages.gas-list', $entry_data);

    }
    public function about()
    {
      //  dd($this->input->post('newLat'));
        $entry_data = array(
            'name' => "Gauhar Shakeel"
        );
        return view('pages.about', $entry_data);
    }


    public function gas_location()
    {

    }

    public function view_gas_station_details($id)
    {


        $url_place_detail = "https://maps.googleapis.com/maps/api/place/details/json?placeid=$id&key=AIzaSyAyyRNGUWjHovipHaeCyfJg_kkNWOFqxXs";

        $location_data = @file_get_contents($url_place_detail);

        $location_detail_json = json_decode($location_data, true);
        $location_details = $location_detail_json['result'];


        $opening_hours = array();
        $phone_number = "";
        $is_open = true;

        if(array_key_exists('opening_hours', $location_details))
        {
            $opening_hours = $location_details['opening_hours']['weekday_text'];
        }
        else
        {
            $opening_hours = null;
        }

        if(array_key_exists('international_phone_number', $location_details))
        {
            $phone_number = $location_details['international_phone_number'];
        }
        else{
            if(array_key_exists('formatted_phone_number',$location_details))
            {
                $phone_number = $location_details['formatted_phone_number'];
            }
            else
            {
                $phone_number = null;
            }

        }
        if(array_key_exists('open_now', $location_details))
        {
            $is_open = $location_details['open_now'];
        }


        $entry_data = array(
            "opening_hours" => $opening_hours,
            "address" => $location_details['formatted_address'],
            "phone_number" => $phone_number,
            "gas_station_name" => $location_details['name'],
            "open_now" => $is_open,
            "website" => $location_details['url'],
            "latitude" => $location_details['geometry']['location']['lat'],
            "longitude" => $location_details['geometry']['location']['lng']


        );



        return view('pages.station_details', $entry_data);




    }



}