<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // DB sınıfını ekledik
use Faker\Factory as FakerFactory;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = FakerFactory::create();

        // Örnek bir 'users' tablosu veri eklemesi
        foreach (range(1, 10) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Örnek bir 'projects' tablosu veri eklemesi
        foreach (range(1, 5) as $index) {
            DB::table('projects')->insert([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
