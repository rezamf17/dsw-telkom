<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelolaProduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelola_produk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jenis')->constrained('jenis_produk')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_nama_produk')->constrained('nama_produk')->onUpdate('cascade')->onDelete('cascade');
            $table->string('witel');
            $table->integer('tgt');
            $table->integer('psbln');
            $table->integer('ach');
            $table->integer('rank');
            $table->integer('tgtrev');
            $table->integer('progrev');
            $table->integer('achrev');
            $table->integer('rankrev');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelola_produk');
    }
}
