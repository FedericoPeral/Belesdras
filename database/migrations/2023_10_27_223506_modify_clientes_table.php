
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
        Schema::table('clientes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_profesionales');
            $table->unsignedBigInteger('id_telefonos');
            $table->string('telefono', 255)->change(); // 255 es la longitud máxima del campo
            $table->foreign('id_profesionales')->references('id')->on('profesionales');
            $table->foreign('id_telefonos')->references('id')->on('telefonos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropForeign(['id_profesionales']);
            $table->dropForeign(['id_telefonos']);
            $table->dropColumn(['id_profesionales', 'id_telefonos']);
            $table->string('telefono', 255)->change();
        });
    }
};
