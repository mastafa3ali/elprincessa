<?php

namespace Database\Seeders;

use App\Models\Frontend;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrontendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('frontends')->delete();
        Frontend::create(['option' => 'website_name_en','value' => 'Princessa','type' => 'string']);
        Frontend::create(['option' => 'website_name_ar','value' => 'برنسيسة','type' => 'string']);
        Frontend::create(['option' => 'logo','value' => 'logo.png','type' => 'image']);
        Frontend::create(['option' => 'email','value' => 'info@arjoha.com','type' => 'email']);
        Frontend::create(['option' => 'working_date','value' => '12345678','type' => 'text']);
        Frontend::create(['option' => 'address','value' => 'cairo-giza','type' => 'string']);
        Frontend::create(['option' => 'fb_link','value' => 'www.facebook.com','type' => 'string']);
        Frontend::create(['option' => 'twitter_link','value' => 'www.twitter.com','type' => 'string']);
        Frontend::create(['option' => 'linked_link','value' => 'www.linkedin.com','type' => 'string']);
        Frontend::create(['option' => 'instagram_link','value' => 'www.instagram.com','type' => 'string']);
        Frontend::create(['option' => 'bio_en','value' => '','type' => 'text']);
        Frontend::create(['option' => 'bio_ar','value' => '','type' => 'text']);
        Frontend::create(['option' => 'about_us_en','value' => '','type' => 'text']);
        Frontend::create(['option' => 'about_us_ar','value' => '','type' => 'text']);
        Frontend::create(['option' => 'policy_en','value' => '','type' => 'text']);
        Frontend::create(['option' => 'policy_ar','value' => '','type' => 'text']);
        Frontend::create(['option' => 'privacy_en','value' => '','type' => 'text']);
        Frontend::create(['option' => 'privacy_ar','value' => '','type' => 'text']);
    }
}
