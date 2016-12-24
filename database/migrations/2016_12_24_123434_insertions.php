<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Insertions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //######Adding Songs#######
        DB::table('songs')->insert(
        array(
            'song_id' => 1,
            'song_name'=>'10. Yıl Marşı',
            'song_path'=>'/songs/10yilmarsi.json'
        ));
        DB::table('songs')->insert(
        array(
            'song_id' => 2,
            'song_name'=>'Jingle Bells',
            'song_path'=>'/songs/jinglebells.json'
        ));
        DB::table('songs')->insert(
        array(
            'song_id' => 3,
            'song_name'=>'Samanyolu',
            'song_path'=>'/songs/samanyolu.json'
        ));


        //######Adding Users#######
        DB::table('users')->insert(
        array(
            'id' => 1,
            'name'=>'Orkun',
            'email'=>'orkundzgn@gmail.com',
            'password'=>bcrypt('123')
        ));
        DB::table('users')->insert(
        array(
            'id' => 2,
            'name'=>'Muhammed',
            'email'=>'mkorkmaz95@gmail.com',
            'password'=>bcrypt('123')
        ));
        DB::table('users')->insert(
        array(
            'id' => 3,
            'name'=>'Akhan',
            'email'=>'a.akbulut@iku.edu.tr',
            'password'=>bcrypt('123')
        ));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
