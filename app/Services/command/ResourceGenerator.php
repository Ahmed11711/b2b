<?php

namespace App\Services\command;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ResourceGenerator
{
    /**
     * الميثود الرئيسية لإنشاء الموديول وتحديث الموديل
     */
    public static function make(string $model)
    {
        // تحويل اسم الموديل لاسم الجدول (مثلاً Blog -> blogs)
        $table = Str::snake(Str::pluralStudly($model));

        if (!Schema::hasTable($table)) {
            return "❌ Table '{$table}' does not exist in the database!";
        }

        // جلب أعمدة الجدول
        $columns = Schema::getColumnListing($table);

        // 1. تحديث الموديل بالخصائص الذكية (Searchable, Filterable, Allowed)
        self::updateModel($model, $table, $columns);

        // 2. إنشاء المجلد الخاص بالـ Resources إذا لم يكن موجوداً
        $baseFolder = app_path("Http/Resources/Admin/{$model}");
        if (!File::exists($baseFolder)) {
            File::makeDirectory($baseFolder, 0755, true);
        }

        // 3. توليد ملف الـ Resource (Clean Version بدون Swagger)
        $resourcePath = "{$baseFolder}/{$model}Resource.php";
        File::put($resourcePath, self::generateResourceStub($model, $columns));

        // 4. توليد ملف الـ JS للفرونت إند
        $jsFolder = resource_path("js/forms");
        if (!File::exists($jsFolder)) {
            File::makeDirectory($jsFolder, 0755, true);
        }
        $fieldsPath = "{$jsFolder}/{$model}Fields.js";
        File::put($fieldsPath, self::generateFieldsStub($model, $table, $columns));

        return "✅ [Success] {$model} Model updated with Smart Arrays & Resource generated!";
    }

    /**
     * تحديث الموديل وإضافة مصفوفات الفلترة والبحث أوتوماتيكياً
     */
    private static function updateModel($model, $table, $columns)
    {
        $modelPath = app_path("Models/{$model}.php");
        if (!File::exists($modelPath)) return;

        $content = File::get($modelPath);

        // تحديد الحقول الحساسة التي لا يجب أن تظهر في الـ API
        $skipFields = ['password', 'remember_token', 'deleted_at'];

        // 1. Allowed Fields: كل الأعمدة ما عدا الحساسة
        $allowed = array_values(array_diff($columns, $skipFields));
        $allowedStr = "['" . implode("', '", $allowed) . "']";

        // 2. Searchable: الأعمدة النصية فقط (string/text)
        $searchable = [];
        // 3. Filterable: الأعمدة المعرفة كـ ID أو Boolean أو Enum
        $filterable = [];

        foreach ($columns as $col) {
            $type = Schema::getColumnType($table, $col);

            // منطق تحديد الـ Searchable
            if (in_array($type, ['string', 'text']) && !Str::endsWith($col, '_id') && !in_array($col, ['id', 'image', 'file', 'photo'])) {
                $searchable[] = $col;
            }

            // منطق تحديد الـ Filterable
            if (Str::endsWith($col, '_id') || in_array($type, ['boolean', 'integer', 'enum', 'tinyint'])) {
                if ($col !== 'id') $filterable[] = $col;
            }
        }

        $searchableStr = "['" . implode("', '", $searchable) . "']";
        $filterableStr = "['" . implode("', '", $filterable) . "']";

        // الكود اللي هيتحقن جوه الموديل
        $propertiesStub = "
    public array \$searchable = {$searchableStr};
    public array \$filterable = {$filterableStr};
    public array \$allowedFields = {$allowedStr};
";

        // إذا كانت الخصائص مش موجودة، ضيفها بعد فتح الكلاس
        if (!Str::contains($content, 'public array $allowedFields')) {
            $content = preg_replace('/class ' . $model . '.*?{/s', "$0\n{$propertiesStub}", $content);
        } else {
            // تحديث القيم إذا كانت موجودة مسبقاً
            $content = preg_replace('/public array \$searchable\s*=\s*\[.*?\];/s', "public array \$searchable = {$searchableStr};", $content);
            $content = preg_replace('/public array \$filterable\s*=\s*\[.*?\];/s', "public array \$filterable = {$filterableStr};", $content);
            $content = preg_replace('/public array \$allowedFields\s*=\s*\[.*?\];/s', "public array \$allowedFields = {$allowedStr};", $content);
        }

        // إضافة العلاقات تلقائياً (BelongsTo)
        foreach ($columns as $col) {
            if (Str::endsWith($col, '_id')) {
                $relationName = Str::camel(Str::replaceLast('_id', '', $col));
                if (!Str::contains($content, "function {$relationName}(")) {
                    $relatedModel = Str::studly(Str::replaceLast('_id', '', $col));
                    $relationCode = "\n    public function {$relationName}()\n    {\n        return \$this->belongsTo({$relatedModel}::class, '{$col}');\n    }\n";
                    $content = preg_replace('/}\s*$/', $relationCode . "\n}", $content);
                }
            }
        }

        File::put($modelPath, $content);
    }

    /**
     * توليد ملف الـ Resource
     */
    private static function generateResourceStub($model, $columns)
    {
        $fieldsList = array_diff($columns, ['id', 'password', 'deleted_at']);
        $fieldsString = "'" . implode("', '", $fieldsList) . "'";

        return "<?php

namespace App\Http\Resources\Admin\\{$model};

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\\{$model}
 */
class {$model}Resource extends JsonResource
{
    public function toArray(\$request): array
    {
        \$attributes = \$this->resource->getAttributes();
        \$data = ['id' => \$this->id];
        \$fields = [{$fieldsString}];

        foreach (\$fields as \$field) {
            if (array_key_exists(\$field, \$attributes)) {
                \$data[\$field] = \$this->{\$field};
            }
        }

        return \$data;
    }
}";
    }

    /**
     * توليد ملف الـ JS للفرونت إند بناءً على قواعد البيانات
     */
    private static function generateFieldsStub($model, $table, $columns)
    {
        $fieldsArray = [];
        foreach ($columns as $col) {
            if (in_array($col, ['id', 'created_at', 'updated_at', 'deleted_at', 'password'])) continue;

            $type = Schema::getColumnType($table, $col);
            $inputType = match (true) {
                preg_match('/(image|img|file|photo|logo)/i', $col) => 'file',
                $type === 'boolean' || $type === 'tinyint' => 'checkbox',
                $type === 'text' || $type === 'longtext' => 'textarea',
                default => 'text'
            };

            $label = Str::title(str_replace('_', ' ', $col));
            $fieldsArray[] = "  { key: \"{$col}\", label: \"{$label}\", type: \"{$inputType}\" }";
        }

        $fieldsString = implode(",\n", $fieldsArray);

        return "/**
 * Auto-generated fields for {$model}
 */
export const {$model}Fields = [\n{$fieldsString}\n];";
    }
}
