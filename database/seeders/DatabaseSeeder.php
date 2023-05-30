<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;
use App\Models\Artist;
use App\Models\ComicArtist;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $comicsData = config('dbseeder.comics');
        foreach ($comicsData as $elem) {
            $comic = new Comic();
            $comic->title = $elem["title"];
            $comic->description = $elem["description"];
            $comic->thumb = $elem["thumb"];
            $comic->price = doubleval($elem["price"]);
            $comic->series = $elem["series"];
            $comic->sale_date = date($elem["sale_date"]);
            $comic->type = $elem["type"];
            $comic->created_at = date("Y-m-d H:i:s");
            $comic->updated_at = date("Y-m-d H:i:s");
            $comic->save();

            foreach($elem["artists"] as $art){
                $artist = new Artist();
                $artist->name = substr($art,0,strrpos($art," ",-1));
                $artist->surname = substr($art,strrpos($art," ",-1));
                $artist->save();

                $comicArtist = new ComicArtist();
                $comicArtist->id_comic = $comic->id;
                $comicArtist->id_artist = $artist->id;
                $comicArtist->save();
            }

        }
    }
}
