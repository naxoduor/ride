<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TripsController extends Controller
{
    //
    public function search(){
        $title="Trip Search";
        return view('pages.search')->with('title',$title);
    }

    public function searchform(Request $request){
        $searchparam=$request->input('text');
        $checked=$request->input('cancelled');
        $distance=$request->input('distance');
        $str_arr = explode (",", $distance);
        $distance1=$str_arr[0];
        $distance2=$str_arr[1];  

        $time_min=$request->input('time');
        $str_arr = explode (",", $time_min);
        $time_min1=$str_arr[0];
        $time_min2=$str_arr[1];

        $title = "Trip Search Results";
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://hr.hava.bz/trips/recent.json');
        $response = $request->getBody();
        $results = array_filter(json_decode($response)->trips, function($data) use($time_min1,$time_min2,$distance1,$distance2,$searchparam,$checked){
            if($checked){
                return $data->id > 0;
            }
            $time1 = strtotime($data->pickup_date);
            $time2 = strtotime($data->dropoff_date);
            $difference = $time2 - $time1;
            //Convert seconds into minutes.
            
            $minutes = floor($difference / 60);
            if($searchparam){
                
            return $data->driver_name == $searchparam && $data->distance > $distance1 && $data->distance < $distance2 && $minutes >= $time_min1 && $minutes <= $time_min2;
                
            }
            else{
                
            return  $data->distance >= $distance1 && $data->distance <= $distance2 && $minutes >= $time_min1 && $minutes <= $time_min2 ;

        }
        });

        $data=array(
            'title'=>$title,
            'results'=>$results
        );
        return view('pages.searchlist')->with($data);
        
    }

    public function searchitem($id){
        $title = "Trip Details";
        $client = new \GuzzleHttp\Client();
        $request = $client->get('');
        $response = $request->getBody();
        $results = array_filter(json_decode($response)->trips, function($data) use($id){
            return $data->id == $id;
        });

        $data=array(
            'title'=>$title,
            'results'=>$results
        );
        return view('pages.itemdetails')->with($data);
    }

    public function searchitem2(Request $request){

        return "search item 2";
    }
    
}
