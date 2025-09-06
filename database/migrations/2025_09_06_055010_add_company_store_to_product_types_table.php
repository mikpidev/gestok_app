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
        Schema::table('product_types', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('company_id')->nullable()->after('id');
            $table->unsignedBigInteger('store_id')->nullable()->after('company_id');

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_types', function (Blueprint $table) {
            //
            $table->dropForeign(['company_id']);
            $table->dropForeign(['store_id']);
            $table->dropColumn(['company_id', 'store_id']);
        });
    }
};
