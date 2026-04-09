<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();

            // 1. اختبار العلاقات (Relation & Display Field)
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('category_id')->nullable()->constrained('categories'); // جرب تضيفه

            // 2. اختبار الـ Enum والـ Badges
            $table->enum('status', ['pending', 'confirmed', 'canceled', 'expired'])->default('pending');

            // 3. النصوص (Text & Textarea)
            $table->string('title');
            $table->string('title_ar');
            $table->text('description')->nullable(); // ده لازم الـ Generator يخفيه من الجدول (table_show: false)

            // 4. اختبار الميديا (File/Image Cell)
            $table->string('image');
            $table->string('attachment_file')->nullable(); // للتأكد إن أي اسم فيه file بيتعامل كميديا

            // 5. الأرقام والعملات (Number Input)
            $table->decimal('price', 10, 2)->default(0);

            // 6. الـ Boolean (Checkboxes & Active/Inactive Badges)
            $table->boolean('active')->default(true);
            $table->boolean('is_featured')->default(false);

            // 7. التواريخ (Date Picker & Date Formatting)
            $table->timestamp('published_at')->nullable();
            $table->date('expire_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
