<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {




        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);


        $this->call(CategorySeeder::class);
        

        $this->call(UserInfoSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(AdsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(MyCertificateSeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(verificationSeeder::class);
    
    
    
    
        
    
    
    
        
    }
}
