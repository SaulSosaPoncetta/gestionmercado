<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ordens', function (Blueprint $table) {
            $table->foreignId('vendedor_id')->nullable()->after('usuario_id')
                ->constrained('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('ordens', function (Blueprint $table) {
            $table->dropForeign(['vendedor_id']);
            $table->dropColumn('vendedor_id');
        });
    }
};
