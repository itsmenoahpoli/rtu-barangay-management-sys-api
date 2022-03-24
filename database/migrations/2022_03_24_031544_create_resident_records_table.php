<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resident_records', function (Blueprint $table) {
            $table->id();
            $table->string('ref_code')->unique();
            $table->string('name_suffix')->nullable();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('mobile_number');
            $table->string('landline')->nullable();
            $table->string('birthdate');
            $table->string('region');
            $table->string('city');
            $table->string('barangay');
            $table->string('address_line1');
            $table->string('address_line2')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['ref_code', 'email', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resident_records');
    }
}
