<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SongsController extends Controller
{
    // public function officeBrokers($office_id){
    //     $brokers=\App\Office::find($office_id)->brokers;
        
    //     if(is_null($brokers)){
    //         abort(404);
    //     }

    //     $brokersArray = array();
    //     for ($i=0; $i<count($brokers); $i++) {
    //         $brokerFormatter = new \App\Formatters\BrokerFormatter;
    //         $brokerFormatResult = $brokerFormatter->format($brokers[0]);
    //         $brokersArray[] = $brokerFormatResult; 
    //     }
    //     return $brokersArray;
    // }
    

    public function songs(){
        $songs=\App\Song::all();
        
        if(is_null($songs)){
            abort(404);
        }
        $songsFormatter = new \App\Formatters\SongFormatter;
        return $songsFormatter->formatCollection($songs);
    }
}
