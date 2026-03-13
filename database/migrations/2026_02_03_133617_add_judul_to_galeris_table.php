<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    if (!Schema::hasColumn('galeris', 'judul')) {
        Schema::table('galeris', function (Blueprint $table) {
            $table->string('judul')->default('')->after('id');
        });
    }
}


    public function down()
{
    if (Schema::hasColumn('galeris', 'judul')) {
        Schema::table('galeris', function (Blueprint $table) {
            $table->dropColumn('judul');
        });
    }
}

};
