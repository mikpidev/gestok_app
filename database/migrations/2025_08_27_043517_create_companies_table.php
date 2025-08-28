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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', length: 200 );
            $table->text('address');
            $table->string('phone', length: 8);
            $table->string('owner', length: 100);
            $table->string('email')->unique();
            $table->string('website')->nullable();
            $table->enum('plan',[  "free","basic","premium"]);
            $table->enum('deployment_type',['saas','on_premise']);
            $table->enum('status', ['activa','suspendida','inactiva']);
            $table->text('comments');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
