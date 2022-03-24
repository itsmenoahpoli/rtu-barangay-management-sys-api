<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resident_certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resident_record_id')->constrained('resident_records')->cascadeOnDelete();
            $table->string('type');
            $table->string('status')->default('pending');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['resident_record_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resident_certificates');
    }
}
