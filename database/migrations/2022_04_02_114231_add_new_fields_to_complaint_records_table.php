<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToComplaintRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('complaint_records', function (Blueprint $table) {
            $table->string('date_of_event')->after('type');
            $table->longText('details')->nullable()->after('date_of_event');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('complaint_records', function (Blueprint $table) {
            $table->dropColumn(['date_of_event', 'details']);
        });
    }
}
