<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class verificationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('verifications')->insert([
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'id_card_front' => 'Sample_' . Str::random(5),
                'id_card_back' => 'Sample_' . Str::random(5),
                'commercial_register' => 'Sample_' . Str::random(5),
                'tax_card' => 'Sample_' . Str::random(5),
                'status' => collect(['pending','approved','rejected'])->random(),
                'notes' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'id_card_front' => 'Sample_' . Str::random(5),
                'id_card_back' => 'Sample_' . Str::random(5),
                'commercial_register' => 'Sample_' . Str::random(5),
                'tax_card' => 'Sample_' . Str::random(5),
                'status' => collect(['pending','approved','rejected'])->random(),
                'notes' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'id_card_front' => 'Sample_' . Str::random(5),
                'id_card_back' => 'Sample_' . Str::random(5),
                'commercial_register' => 'Sample_' . Str::random(5),
                'tax_card' => 'Sample_' . Str::random(5),
                'status' => collect(['pending','approved','rejected'])->random(),
                'notes' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'id_card_front' => 'Sample_' . Str::random(5),
                'id_card_back' => 'Sample_' . Str::random(5),
                'commercial_register' => 'Sample_' . Str::random(5),
                'tax_card' => 'Sample_' . Str::random(5),
                'status' => collect(['pending','approved','rejected'])->random(),
                'notes' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'id_card_front' => 'Sample_' . Str::random(5),
                'id_card_back' => 'Sample_' . Str::random(5),
                'commercial_register' => 'Sample_' . Str::random(5),
                'tax_card' => 'Sample_' . Str::random(5),
                'status' => collect(['pending','approved','rejected'])->random(),
                'notes' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'id_card_front' => 'Sample_' . Str::random(5),
                'id_card_back' => 'Sample_' . Str::random(5),
                'commercial_register' => 'Sample_' . Str::random(5),
                'tax_card' => 'Sample_' . Str::random(5),
                'status' => collect(['pending','approved','rejected'])->random(),
                'notes' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'id_card_front' => 'Sample_' . Str::random(5),
                'id_card_back' => 'Sample_' . Str::random(5),
                'commercial_register' => 'Sample_' . Str::random(5),
                'tax_card' => 'Sample_' . Str::random(5),
                'status' => collect(['pending','approved','rejected'])->random(),
                'notes' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'id_card_front' => 'Sample_' . Str::random(5),
                'id_card_back' => 'Sample_' . Str::random(5),
                'commercial_register' => 'Sample_' . Str::random(5),
                'tax_card' => 'Sample_' . Str::random(5),
                'status' => collect(['pending','approved','rejected'])->random(),
                'notes' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'id_card_front' => 'Sample_' . Str::random(5),
                'id_card_back' => 'Sample_' . Str::random(5),
                'commercial_register' => 'Sample_' . Str::random(5),
                'tax_card' => 'Sample_' . Str::random(5),
                'status' => collect(['pending','approved','rejected'])->random(),
                'notes' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => DB::table('users')->inRandomOrder()->value('id') ?? 1,
                'id_card_front' => 'Sample_' . Str::random(5),
                'id_card_back' => 'Sample_' . Str::random(5),
                'commercial_register' => 'Sample_' . Str::random(5),
                'tax_card' => 'Sample_' . Str::random(5),
                'status' => collect(['pending','approved','rejected'])->random(),
                'notes' => 'Sample_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}