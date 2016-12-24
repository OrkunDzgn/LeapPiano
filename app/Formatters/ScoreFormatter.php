<?php

namespace App\Formatters;

class ScoreFormatter{

	public function format($score){
		//$score = $score->scores;
		return [
			'username' => $score->user->name,
			'songname' => $score->songs->song_name,
			'score' => $score->score
		];
	}

	public function formatCollection($scoreCollection){
        $scoresArray = array();
		foreach ($scoreCollection as $score) {
            $scoresArray[] = $this->format($score);
        }
        return $scoresArray;
	}

}

?>