<?php

namespace Database\Seeders;

use App\Models\Info;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('infos')->delete();
        Info::create(['option' => 'website_name_en','value' => 'Princessa','type' => 'string']);
        Info::create(['option' => 'website_name_ar','value' => 'برنسيسة','type' => 'string']);
        Info::create(['option' => 'logo','value' => 'logo.png','type' => 'image']);
        Info::create(['option' => 'email','value' => 'info@arjoha.com','type' => 'email']);
        Info::create(['option' => 'working_date','value' => '12345678','type' => 'text']);
        Info::create(['option' => 'phones','value' => '0123123123','type' => 'string']);
        Info::create(['option' => 'address','value' => 'الخليفة الأمير , الحديقة الدولية , مدينة نصر , محافظة','type' => 'string']);
        Info::create(['option' => 'lat','value' => '0123123123','type' => 'string']);
        Info::create(['option' => 'long','value' => '0123123123','type' => 'string']);
        Info::create(['option' => 'snapchat_link','value' => 'www.snapchat.com','type' => 'string']);
        Info::create(['option' => 'youtube_link','value' => 'www.youtubein.com','type' => 'string']);
        Info::create(['option' => 'fb_link','value' => 'https://www.facebook.com/hammamelprincessa','type' => 'string']);
        Info::create(['option' => 'twitter_link','value' => 'www.twitter.com','type' => 'string']);
        Info::create(['option' => 'linked_link','value' => 'www.linkedin.com','type' => 'string']);
        Info::create(['option' => 'instagram_link','value' => 'www.instagram.com','type' => 'string']);
        Info::create(['option' => 'phoneCach','value' => '0100237468347','type' => 'string']);
        Info::create(['option' => 'map_link','value' => '','type' => 'string']);
        // Info::create(['option' => 'bio_en','value' => '','type' => 'text']);
        Info::create(['option' => 'bio_ar','value' => '','type' => 'text']);
        // Info::create(['option' => 'about_us_en','value' => '','type' => 'text']);
        Info::create(['option' => 'about_us_ar','value' => '','type' => 'text']);
        // Info::create(['option' => 'policy_en','value' => '','type' => 'text']);
        Info::create(['option' => 'policy_ar','value' => '','type' => 'text']);
        // Info::create(['option' => 'privacy_en','value' => '','type' => 'text']);
        Info::create(['option' => 'privacy_ar','value' => 'حمامات شرقية ملكى غربى كليوباترا تركى ساونا جاكوزى مغطس بخار تكييس باديكير مانيكير
        برافين سويت واكس نتوياج مساج بجميع انواعه للسيدات فقط','type' => 'text']);
    }
}
