<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecord=[
            ['id'=>2,'name'=>'yogesh','type'=>'vendor','vendor_id'=>1,'mobile'=>'7235019434',
            'email'=>'dummy@gamil.com','password'=>'$2a$09$QYF11M0uOIH6U74glQ7zLedRibxSG83ITTOHsRQzl/pP1VzPb8iL2','image'=>'','status'=>0],
        ];
        Admin::insert($adminRecord);
    }
}
