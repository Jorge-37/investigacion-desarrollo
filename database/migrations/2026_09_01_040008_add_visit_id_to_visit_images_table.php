<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('visit_images', function (Blueprint $table) {

            $table->foreignId('visit_id')
                ->after('id')
                ->constrained('visits')
                ->cascadeOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('visit_images', function (Blueprint $table) {

            $table->dropForeign(['visit_id']);
            $table->dropColumn('visit_id');

        });
    }
};