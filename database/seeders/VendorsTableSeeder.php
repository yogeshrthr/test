<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
       $vendor_record=[
            ['id'=>1,'name'=>'yogesh','address'=>'shivrajpur','city'=>'kanpur','state'=>'up','country'=>'India','pincode'=>'209010','mobile'=>'7235019434','email'=>'dummy@gmail.com','status'=>0
            ],
        ];
        Vendor::insert($vendor_record);
    }
}
