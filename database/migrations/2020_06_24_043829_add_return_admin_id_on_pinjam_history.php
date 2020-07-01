<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReturnAdminIdOnPinjamHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pinjam_history', function (Blueprint $table) {
            $table->dateTime('return_at')->nullable()->default(null)->after('book_id');
            $table->bigInteger('admin_id')->nullable()->default(null)->after('return_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pinjam_history', function (Blueprint $table) {
            $table->dropColumn('return_at');
            $table->dropColumn('admin_id');
        });
    }
}
