<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Setting::create([
            'site_name' => "Agnim's Blog",
            'contact_email' => 'agnim@gupta.me',
            'contact_number' => '923232322',
            'address' => "Gwalior, Madhya Pradesh"
        ]);
    }
}
