<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToTiketsTable extends Migration
{
    public function up()
    {
        Schema::table('tikets', function (Blueprint $table) {
            $table->softDeletes(); // Esto agrega la columna deleted_at
        });
    }

    public function down()
    {
        Schema::table('tikets', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Esto elimina la columna deleted_at si haces rollback
        });
    }
}
