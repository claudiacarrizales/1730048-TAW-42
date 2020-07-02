<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->integer('cedula');
            $table->string('email',50)->unique();
            $table->enum('sexo',['masculino','femenino', 'no definido']);
            $table->enum('estado_civil',['soltero','casado']);
            $table->string('telefono');
            $table->timestamps();
            $table->unsignedBigInteger('Fk_Departamento');
            $table->foreign('Fk_Departamento')->references('idD')->on('departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
