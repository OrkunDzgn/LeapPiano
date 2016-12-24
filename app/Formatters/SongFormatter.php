<?php

namespace App\Formatters;

class SongFormatter{

	public function format($song){
		$songs = $song->songs;
		return [
			'song_id' => $song->song_id,
			'name' => $song->song_name,
			'path' => $song->song_path
		];
	}

	public function formatCollection($songCollection){
        $songsArray = array();
		foreach ($songCollection as $song) {
            $songsArray[] = $this->format($song);
        }
        return $songsArray;
	}

}

?>