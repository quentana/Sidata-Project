<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('data_siswas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('Tanggal_Lahir');
            $table->string('Tempat_Lahir');
            $table->string('No_Hp');
            $table->string('Nis');
            $table->string('Email');
            $table->integer('Tinggi_badan')->nullable();
            $table->integer('Berat_badan')->nullable();
            $table->string('No_Ijaza_Sd')->nullable();
            $table->string('No_Ijaza_Smp')->nullable();
            $table->string('Rt', 5)->nullable();
            $table->string('Rw', 5)->nullable();
            $table->string('Kelurahan')->nullable();
            $table->string('Kecamatan')->nullable();
            $table->string('Provinsi')->nullable();
            // $table->string('kode_pos', 10)->nullable();
            $table->enum('Jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->foreignId('keluarga_id')->nullable()->constrained('data_keluargas')->onDelete('set null');
            // Relasi foreign key
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('jurusan_id')->constrained('jurusans')->onDelete('cascade');
            $table->foreignId('rayon_id')->constrained('rayons')->onDelete('cascade');
            $table->foreignId('romble_id')->constrained('rombles')->onDelete('cascade');

            // status
            $table->enum('Status', ['Diterima', 'Ditolak', 'Pending'])->default('Pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_siswas');
    }
};
