<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profiles = [
          "admin",
          "employee",
          "coordinator"
        ];

        foreach ($profiles as $profile){
            if(Profile::query()->count() == 0) {
                Profile::create([
                    "name" => $profile
                ]);
            }
        }
    }
}
