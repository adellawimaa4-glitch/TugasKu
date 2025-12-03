<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('tugas', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('tugas');
        $table->date('tgl_mulai');
        $table->date('tgl_selesai');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('tugas');
}
};
