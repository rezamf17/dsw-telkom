<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KelolaLaporan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('kelola_laporan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jenis')->constrained('jenis_produk')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_nama_produk')->constrained('nama_produk')->onUpdate('cascade')->onDelete('cascade');
            $table->string('witel');
            $table->integer('tgtmtd');
            $table->integer('realmtd');
            $table->integer('ach');
            $table->integer('shrtge');
            $table->integer('tgtrev');
            $table->integer('progrev');
            $table->integer('achrev');
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('kelola_laporan');
    }
}
