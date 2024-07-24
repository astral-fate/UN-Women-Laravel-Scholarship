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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('carTitle', 100);
            $table->text('description');
            $table->float('price');
            $table->boolean('published')->default(false);
            $table->integer('capacity');
            $table->boolean('is_filled')->default(false);
            $table->date('date_from');
            $table->date('date_to');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
?>
