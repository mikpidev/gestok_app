<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('store_tax_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade'); //Store es igual a establecimiento de la compania
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');
            $table->string('nit', 20);
            $table->string('ncr', 20);
            $table->string('razon_social', 200);
            $table->string('actividad_economica', 200);
            $table->text('direccion_fiscal');
            $table->string('email', 100);
            $table->string('telefono', 8);
            $table->string('cert_firma_digital', 200);
            $table->enum('estado', ['activo', 'suspendido', 'vencido']);
            $table->text('comentarios')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_tax_infos');
    }
};
