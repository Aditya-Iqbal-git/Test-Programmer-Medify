<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_items', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama');
            $table->integer('harga_beli');
            $table->integer('laba');
            $table->string('supplier');
            $table->string('jenis');
            $table->binary('foto')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::statement('ALTER TABLE master_items MODIFY foto LONGBLOB NULL');

        Schema::create('categories', function(Blueprint $table){
            $table->id();
            $table->string('nama');
            $table->string('kode')->unique();
            $table->timestamps();
        });

        Schema::create('category_item', function (Blueprint $table){
            $table->id();
            $table->foreignId('master_item_id')->constrained('master_items')->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('category_items');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('master_items');
    }
};
