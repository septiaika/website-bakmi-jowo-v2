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
    Schema::create('menus', function (Blueprint $table) {
    $table->id();                 // id
    $table->string('nama_menu');  // nama_menu
    $table->integer('harga');     // harga
    $table->text('deskripsi')->nullable(); // deskripsi (boleh null)
    $table->string('kategori')->nullable();
    $table->timestamps();         // created_at, updated_at
});
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
