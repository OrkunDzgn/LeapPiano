<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScoreController extends Controller
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
    

    public function scores(){
        $scores=\App\Score::all();
        
        if(is_null($scores)){
            abort(404);
        }
        $scoresFormatter = new \App\Formatters\ScoreFormatter;
        $resultFormattedScores = $scoresFormatter->formatCollection($scores);
        usort($resultFormattedScores, function($a, $b) { //Sort the array using a user defined function
            return $a['score'] > $b['score'] ? -1 : 1; //Compare the scores
        }); 
        return $resultFormattedScores;
    }


    public function insertUserScore($score, $userid, $songid) {
        $existingScores=\App\Score::all();

        $newScore = new \App\Score;
        $newScore->score = $score;
        $newScore->user_id = $userid;
        $newScore->song_id = $songid;

        foreach ($existingScores as $existingScore) {
            if($existingScore->user_id == $newScore->user_id && $existingScore->song_id == $newScore->song_id){
                if($newScore->score > $existingScore->score){
                    $changeScore=\App\Score::find($existingScore->score_id);
                    $changeScore->score = $newScore->score;
                    $changeScore->user_id = $newScore->user_id;
                    $changeScore->song_id = $newScore->song_id;
                    $changeScore->save();
                    return 'score updated to ' . $newScore->score . 'for user ' . $newScore->user->name;
                }
                else{
                    return 'user old score was better';
                }
            }
        }
        $newScore->save();
        return 'new score added';
    }
}
        