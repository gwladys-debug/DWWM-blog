<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('lastname',50)->after('id');
            $table->string('firstname',50)->after('lastname');
            $table->string('role',50)->after('email')->default('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name',50)->after('id');
            $table->dropColumn('lastname');
            $table->dropColumn('firstname');
            $table->dropColumn('role');
        });
    }
};
