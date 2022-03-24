<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchiveDumpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archive_dumps', function (Blueprint $table) {
            $table->id();
            $table->string('ref_code')->unique();
            $table->string('type')->nullable();
            $table->string('directory_path');
            $table->string('dumped_by')->comment('Name of who executed the data dump');
            $table->timestamps();

            $table->index(['ref_code', 'type', 'dumped_by']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archive_dumps');
    }
}
