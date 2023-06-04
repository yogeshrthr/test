<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBusinessDetail;

class VendorsBusinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorBusinessDetails=[
            ['id'=>1,'vendor_id'=>1,'shop_name'=>'yogesh_shop','shop_address'=>'shivrajpur',
            'shop_city'=>'kanpur','shop_state'=>'UP',"shop_country"=>"India",'shop_pincode'=>'209210',
            'shop_mobile'=>'0000000000','shop_website'=>'yogesh_shop.com','shop_email'=>'xyz@dumy.com','address_proof'=>'pancard','address_proof_image'=>'aadhar card',
            'business_license_number'=>'fdfsd454f6ds4d4fd','gst_number'=>'fsafsd545dsfd','pan_number'=>'fwkpn2012f',
            ],
        ];
        VendorsBusinessDetail::insert($vendorBusinessDetails);
    }
}
