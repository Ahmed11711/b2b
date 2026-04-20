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
        Schema::create('bag_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bags_categories_id')
                ->nullable()
                ->constrained('bags_categories')
                ->nullOnDelete();
            $table->string('title');
            $table->decimal('price', 10, 2);
            $table->string('image');
            $table->enum('currency', ['ريال', 'دولار', 'جنيه مصري'])
                ->default('ريال');
            $table->string('rating')->nullable();
            $table->text('desc');
            $table->text('Whose')->nullable();
            $table->text('what_will_you_get')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bag_items');
    }
};
