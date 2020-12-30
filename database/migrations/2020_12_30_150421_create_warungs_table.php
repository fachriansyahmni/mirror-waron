<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warungs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_warung');
            $table->string('pemilik');
            $table->string('no_hp')->nullable();
            $table->string('foto')->nullable();
            $table->string('alamat')->nullable();
            $table->LongText('koordinat')->nullable();
            $table->integer('kategori_id');
            $table->integer('akun_id');
            $table->integer('kec_id');
            $table->integer('kabkot_id');
            $table->integer('prov_id');
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
        Schema::dropIfExists('warungs');
    }
}
