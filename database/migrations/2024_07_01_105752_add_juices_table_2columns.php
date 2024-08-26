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
        Schema::table('juices', function (Blueprint $table) {
            $table->text('comment')->nullable()->after('zaiko');
            $table->string('img_path', 255)->nullable()->after('zaiko');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('juices', function (Blueprint $table) {
            $table->dropColumn('comment');
            $table->dropColumn('img_path');
        });
    }
};
