<?php

use Illuminate\Database\Seeder;

use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Guides', 'Assets', 'Streaming', 'StreamLabs', 'Twitch', 'OBS', 'Gaming', 'Fortnite', 'CS:GO', 'PUBG'];
        foreach($tags as $t)
        {
            $tag = new Tag;
            $tag->name = $t->name;
            $tag->slug = strtolower(str_slug($t->name));
            $tag->save();
        }
    }
}
