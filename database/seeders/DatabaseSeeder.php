<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;
use App\Models\Artist;
use App\Models\ComicArtist;
use App\Models\Writer;
use App\Models\ComicWriter;

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
            $comic->price = (double)(str_replace("$","",$elem["price"]));
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

            foreach($elem["writers"] as $wri){
                $writer = new Writer();
                $writer->name = substr($wri,0,strrpos($wri," ",-1));
                $writer->surname = substr($wri,strrpos($wri," ",-1));
                $writer->save();

                $comicWriter = new ComicWriter();
                $comicWriter->id_comic = $comic->id;
                $comicWriter->id_writer = $writer->id;
                $comicWriter->save();
            }
        }
    }
}
