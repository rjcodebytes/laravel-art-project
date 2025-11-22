<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('paintings', function (Blueprint $table) {
            $table->json('related_paintings')->nullable()->after('tags');
        });
    }

    public function down()
    {
        Schema::table('paintings', function (Blueprint $table) {
            $table->dropColumn('related_paintings');
        });
    }
};
