<?php

namespace Database\Seeders;

use App\Models\SocialMediaLink;
use Illuminate\Database\Seeder;

class SocialMediaLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $socialSites = ["facebook","twitter","linkedin","pinterest","youtube","instagram","tumblr","snapchat","whatsapp","quora","delicious","digg"];
        foreach ($socialSites as $socialSite){
            SocialMediaLink::create([
                'name' => $socialSite
            ]);
        }
    }
}
