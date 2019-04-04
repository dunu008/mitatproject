<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('id');
			$table->string('fullname', 200);
			$table->string('surname', 100);
			$table->string('nic', 12);
			$table->string('address', 300);
			$table->string('telephone', 10);
			$table->string('al_index', 20);
			$table->float('al_zscore', 10, 0);
			$table->string('district', 40);
			$table->string('al_sub1', 30);
			$table->char('al_sub1_result', 1);
			$table->string('al_sub2', 30);
			$table->char('al_sub2_result', 1);
			$table->string('al_sub3', 30);
			$table->char('al_sub3_result', 1);
			$table->char('al_english',1);
			$table->year('ol_year');
			$table->char('ol_maths', 1);
			$table->char('ol_english', 1);
			$table->integer('priority');
			$table->float('sectionA', 10, 0)->nullable();
			$table->float('sectionB', 10, 0)->nullable();
			$table->float('sectionC', 10, 0)->nullable();
			$table->char('qualified', 1)->nullable();
			$table->char('selected', 1)->nullable();
            //$table->integer('applicantvenue')->index('FOREIGN');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants');
    }
}
