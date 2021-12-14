<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_surat')->nullable();
            $table->integer('pemohon')->unsigned();
            $table->integer('ttd')->unsigned();
            $table->foreign('ttd')->references('id')->on('signatures')->default(1);
            $table->integer('tipe_surat')->unsigned();
            $table->foreign('pemohon')->references('id')->on('users');
            $table->foreign('tipe_surat')->references('id')->on('tipe_surat');
            $table->string('perihal')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('nama_mitra')->nullable();
            $table->string('alamat_mitra')->nullable();
            $table->string('nama_kegiatan')->nullable();
            $table->string('lokasi_kegiatan')->nullable();
            $table->dateTime('tgl_pelaksanaan_kegiatan')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('file')->nullable();
            $table->integer('status')->default(0);
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
       Schema::dropIfExists('surats');
    }
}