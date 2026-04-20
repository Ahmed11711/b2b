<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageFeatureSeeder extends Seeder
{
    public function run(): void
    {
        $userFeatureId = DB::table('features')->where('key', 'user')->value('id');
        $serviceFeatureId = DB::table('features')->where('key', 'service')->value('id');
        $applyFeatureId = DB::table('features')->where('key', 'applay')->value('id');

        $packageIds = DB::table('packages')->pluck('id');

        if ($packageIds->isEmpty() || !$userFeatureId) {
            return;
        }

        $dataToInsert = [];

        foreach ($packageIds as $packageId) {
            $dataToInsert[] = [
                'package_id' => $packageId,
                'feature_id' => $userFeatureId,
                'value'      => '20',
                'lable'      => 'you have permission for add 20 sub accounts',
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $dataToInsert[] = [
                'package_id' => $packageId,
                'feature_id' => $serviceFeatureId,
                'value'      => '10',
                'lable'      => 'you have permission for services',
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $dataToInsert[] = [
                'package_id' => $packageId,
                'feature_id' => $applyFeatureId,
                'value'      => '50',
                'lable'      => 'you have permission for apply count',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('package_features')->insert($dataToInsert);
    }
}
