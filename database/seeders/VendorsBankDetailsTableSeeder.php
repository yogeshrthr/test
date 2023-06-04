<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBankDetail;

class VendorsBankDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorBankDetails=[
            ['id'=>1,'vendor_id'=>1,'account_holder_name'=>'yogesh_shop','bank_name'=>'ICICI bank',
            'account_number'=>'123456789','confirm_account_number'=>'123456789',"bank_ifsc_code"=>"icba0003328",
            ],
        ];
        VendorsBankDetail::insert($vendorBankDetails);
    }
}
