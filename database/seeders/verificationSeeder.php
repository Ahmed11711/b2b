<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class verificationSeeder extends Seeder
{
    public function run(): void
    {
        // 1. جلب جميع معرفات المستخدمين
        $userIds = DB::table('users')->pluck('id');

        $data = [];

        // 2. إنشاء سجل توثيق واحد لكل مستخدم
        foreach ($userIds as $id) {
            $data[] = [
                'user_id' => $id,
                'id_card_front' => 'ID_Front_' . Str::random(5),
                'id_card_back' => 'ID_Back_' . Str::random(5),
                'commercial_register' => 'Comm_' . Str::random(5),
                'tax_card' => 'Tax_' . Str::random(5),
                'status' => collect(['pending', 'approved', 'rejected'])->random(),
                'notes' => 'Note_' . Str::random(5),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // 3. إدخال البيانات دفعة واحدة
        DB::table('verifications')->insert($data);
    }
}
