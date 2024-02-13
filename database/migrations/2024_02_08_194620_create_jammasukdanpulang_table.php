<?php

use App\Models\Unit;
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
        Schema::create('jammasukdanpulang', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->time('jam_masuk');
            $table->time('jam_pulang');
            $table->foreignId('unit_id')->constrained('unit')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jammasukdanpulang');
    }

};
