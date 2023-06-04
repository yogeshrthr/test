<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call(AdminTableSeeder::class);
        // $this->call(VendorsTableSeeder::class);
        // $this->call(VendorsBusinessDetailsTableSeeder::class);
        // $this->call(VendorsBankDetailsTableSeeder::class);
        // $this->call(SectionSeederTable::class);
        // $this->call(CategoriesSeederTable::class);
        // $this->call(BrandsSeederTable::class);
        // $this->call(ProductsSeederTable::class);
        // $this->call(ProductsAttributesTableSeeder::class);
        $this->call(BannerSeederTable::class);
        
        
    }
}
