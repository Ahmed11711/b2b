<?php

namespace App\Services\command;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SeederGenerator
{
    private static array $coolImages = [
        'https://images.unsplash.com/photo-1498050108023-c5249f4df085',
        'https://images.unsplash.com/photo-1461747823400-487cf1852d7e',
        'https://images.unsplash.com/photo-1504639725590-34d0984388bd',
    ];

    private static array $arabicWords = ['تجريبي', 'افتراضي', 'جديد', 'مميز', 'مطور'];

    /**
     * الماكينة الأساسية لبناء الموديل بالكامل
     */
    public static function make(string $model)
    {
        $modelClass = "App\\Models\\{$model}";
        $table = class_exists($modelClass) ? (new $modelClass)->getTable() : Str::snake(Str::pluralStudly($model));

        if (!Schema::hasTable($table)) return;

        // 1. توليد الملفات الأساسية للارافيل
        self::generateFactory($model, $table);
        self::generateSeeder($model, $table);
        self::appendToDatabaseSeeder($model);

        // 2. توليد التوثيق (Markdown)
        self::generateMarkdownDoc($model, $table);

        // 3. توليد مجموعة بوست مان (Postman Collection)
        self::generatePostmanCollection($model, $table);
    }

    private static function generateSeeder($model, $table)
    {
        $columns = Schema::getColumnListing($table);
        $recordsCount = 10;
        $recordsArray = "";

        for ($i = 0; $i < $recordsCount; $i++) {
            $fields = "";
            foreach ($columns as $column) {
                if (in_array($column, ['id', 'created_at', 'updated_at', 'deleted_at'])) continue;

                $value = self::guessExpertValue($column, $table, $i);
                $fields .= "                '{$column}' => {$value},\n";
            }

            $fields .= "                'created_at' => now(),\n";
            $fields .= "                'updated_at' => now(),\n";

            $recordsArray .= "            [\n{$fields}            ],\n";
        }

        $stub = "<?php\n\nnamespace Database\Seeders;\n\nuse Illuminate\Database\Seeder;\nuse Illuminate\Support\Str;\nuse Illuminate\Support\Facades\DB;\n\nclass {$model}Seeder extends Seeder\n{\n    public function run(): void\n    {\n        DB::table('{$table}')->insert([\n{$recordsArray}        ]);\n    }\n}";

        File::put(database_path("seeders/{$model}Seeder.php"), $stub);
    }

    private static function guessExpertValue($column, $table, $index)
    {
        $columnType = Schema::getColumnType($table, $column);

        // 1. الربط العميق والذكي (Smart Factory Relationships)
        if (Str::endsWith($column, '_id')) {
            $relatedTable = Str::plural(Str::replaceLast('_id', '', $column));
            // التحقق لو الجدول فيه عمود active عشان نربط ببيانات صحيحة فقط
            $condition = Schema::hasColumn($relatedTable, 'active') ? "->where('active', 1)" : "";
            return "DB::table('{$relatedTable}'){$condition}->inRandomOrder()->value('id') ?? 1";
        }

        if (Str::endsWith($column, '_at')) return "now()";

        if (in_array($columnType, ['integer', 'tinyint', 'smallint', 'boolean', 'bigint'])) {
            return rand(0, 1);
        }

        if (Str::endsWith($column, '_ar')) {
            $word = self::$arabicWords[array_rand(self::$arabicWords)];
            $label = Str::replace(['_ar', '_'], ' ', $column);
            return "'{$label} {$word} ' . Str::random(3)";
        }

        if ($columnType === 'enum' || in_array($column, ['role', 'status'])) {
            try {
                $results = DB::select("SHOW COLUMNS FROM `{$table}` WHERE Field = ?", [$column]);
                if (!empty($results) && isset($results[0]->Type)) {
                    preg_match('/^enum\((.*)\)$/', $results[0]->Type, $matches);
                    if (isset($matches[1])) return "collect([" . $matches[1] . "])->random()";
                }
            } catch (\Exception $e) {
            }
        }

        if (preg_match('/(slug|email|username|code|phone|password|token|title|name|desc)/i', $column)) {
            if (Str::contains($column, 'email')) return "'user_' . Str::lower(Str::random(8)) . '_{$index}@example.com'";
            if (Str::contains($column, 'password')) return "bcrypt('password')";
            if (Str::contains($column, 'phone')) return "'01' . rand(100, 999) . rand(1000, 9999) . {$index}";
            if (Str::contains($column, 'slug')) return "'slug-' . Str::lower(Str::random(6)) . '-' . {$index}";
            return "Str::title('{$column}') . '_' . Str::random(5)";
        }

        if (preg_match('/(image|img|file|logo)/i', $column)) {
            return "collect(['" . implode("','", self::$coolImages) . "'])->random()";
        }

        return "'Sample_' . Str::random(5)";
    }

    private static function generateMarkdownDoc($model, $table)
    {
        $columns = Schema::getColumnListing($table);
        $baseUrl = "api/" . Str::kebab(Str::plural($model));

        $md = "# 📘 API Guide: {$model}\n\n";
        $md .= "This documentation is auto-generated for the **{$table}** table.\n\n";
        $md .= "### 🚀 Endpoints\n";
        $md .= "| Action | Method | Endpoint | Auth |\n";
        $md .= "| :--- | :--- | :--- | :--- |\n";
        $md .= "| List All | `GET` | `/{$baseUrl}` | Bearer |\n";
        $md .= "| View One | `GET` | `/{$baseUrl}/{id}` | Bearer |\n";
        $md .= "| Create | `POST` | `/{$baseUrl}` | Bearer |\n";
        $md .= "| Update | `PUT` | `/{$baseUrl}/{id}` | Bearer |\n";
        $md .= "| Delete | `DELETE` | `/{$baseUrl}/{id}` | Bearer |\n\n";

        $md .= "### 📋 Database Schema\n";
        $md .= "| Column | Type | Description |\n";
        $md .= "| :--- | :--- | :--- |\n";
        foreach ($columns as $column) {
            $type = Schema::getColumnType($table, $column);
            $md .= "| `{$column}` | *{$type}* | Field from database |\n";
        }

        $path = base_path("docs/api/");
        File::ensureDirectoryExists($path);
        File::put($path . Str::snake($model) . ".md", $md);
    }

    private static function generatePostmanCollection($model, $table)
    {
        $columns = Schema::getColumnListing($table);
        $baseUrl = "{{base_url}}/api/" . Str::kebab(Str::plural($model));

        $realData = DB::table($table)->first();
        $sampleId = $realData->id ?? 1;

        $payload = [];
        foreach ($columns as $column) {
            if (in_array($column, ['id', 'created_at', 'updated_at', 'deleted_at'])) continue;
            $payload[$column] = $realData->$column ?? (Str::endsWith($column, '_ar') ? "نص تجريبي" : "Sample value");
        }

        $collection = [
            'info' => [
                'name' => "{$model} Module Collection",
                'schema' => 'https://schema.getpostman.com/json/collection/v2.1.0/collection.json',
            ],
            'item' => [
                self::buildPostmanItem("List {$model}", "GET", $baseUrl),
                self::buildPostmanItem("Show {$model}", "GET", "{$baseUrl}/{$sampleId}"),
                self::buildPostmanItem("Store {$model}", "POST", $baseUrl, $payload),
                self::buildPostmanItem("Update {$model}", "PUT", "{$baseUrl}/{$sampleId}", $payload),
                self::buildPostmanItem("Delete {$model}", "DELETE", "{$baseUrl}/{$sampleId}"),
            ],
            'auth' => [
                'type' => 'bearer',
                'bearer' => [['key' => 'token', 'value' => '{{auth_token}}', 'type' => 'string']]
            ]
        ];

        $path = storage_path("app/postman/");
        File::ensureDirectoryExists($path);
        File::put($path . Str::snake($model) . "_collection.json", json_encode($collection, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    private static function buildPostmanItem($name, $method, $url, $body = null)
    {
        // إضافة الـ Automated API Testing (Javascript)
        $expectedStatus = ($method === 'POST') ? 201 : 200;
        $tests = [
            "pm.test('Response status is {$expectedStatus}', () => { pm.response.to.have.status({$expectedStatus}); });",
            "pm.test('Response is valid JSON', () => { pm.response.to.be.json; });",
        ];

        return [
            'name' => $name,
            'event' => [
                [
                    'listen' => 'test',
                    'script' => ['type' => 'text/javascript', 'exec' => $tests]
                ]
            ],
            'request' => [
                'method' => $method,
                'header' => [['key' => 'Accept', 'value' => 'application/json', 'type' => 'text']],
                'url' => ['raw' => $url, 'host' => ['{{base_url}}'], 'path' => explode('/', str_replace('{{base_url}}/', '', $url))],
                'body' => $body ? [
                    'mode' => 'raw',
                    'raw' => json_encode($body, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                    'options' => ['raw' => ['language' => 'json']]
                ] : null,
            ]
        ];
    }

    private static function generateFactory($model, $table)
    {
        $columns = Schema::getColumnListing($table);
        $definition = "";
        foreach ($columns as $column) {
            if (in_array($column, ['id', 'created_at', 'updated_at', 'deleted_at'])) continue;
            $line = "'{$column}' => ";
            if (Str::endsWith($column, '_id')) $line .= "1,";
            elseif (Str::contains($column, 'email')) $line .= "\$this->faker->unique()->safeEmail,";
            elseif (Str::contains($column, 'password')) $line .= "bcrypt('password'),";
            else $line .= "\$this->faker->word,";
            $definition .= "            {$line}\n";
        }
        $stub = "<?php\nnamespace Database\Factories;\nuse App\Models\\{$model};\nuse Illuminate\Database\Eloquent\Factories\Factory;\nclass {$model}Factory extends Factory {\n    protected \$model = {$model}::class;\n    public function definition(): array {\n        return [\n{$definition}        ];\n    }\n}";
        File::put(database_path("factories/{$model}Factory.php"), $stub);
    }

    private static function appendToDatabaseSeeder(string $model)
    {
        $seederPath = database_path('seeders/DatabaseSeeder.php');
        if (!File::exists($seederPath)) return;
        $content = File::get($seederPath);
        $seederName = "{$model}Seeder::class";
        if (Str::contains($content, $seederName)) return;
        $pattern = '/(public function run\(\): void\s*\{)/';
        if (preg_match($pattern, $content)) {
            $content = preg_replace($pattern, "$1\n        \$this->call({$seederName});", $content);
            File::put($seederPath, $content);
        }
    }
}
