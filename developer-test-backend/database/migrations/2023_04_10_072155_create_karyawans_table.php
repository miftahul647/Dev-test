<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('umur');
            $table->string('alamat');
            $table->string('agama');
            $table->string('jenis_kelamin');
            $table->string('nomor_handphone');
            $table->string('email');
            $table->date('created_at')->default(now());
            $table->date('updated_at')->nullable();
            $table->date('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawans');
    }
};
