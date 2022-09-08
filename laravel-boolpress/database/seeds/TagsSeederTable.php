<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\ Str;
use App\Tag;

class TagsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags=[
            'Piatto veloce',
            'Piatto freddo',
            'Vegetariano',
            'Vegano',
            'Gluten Free'
        ];
        foreach($tags as $tag){
            $new_tag= new Tag();
            $new_tag->name=$tag;
            $new_tag->slug=Str::slug ( $tag ,'-');
            $new_tag->save();
        }

    }
}
