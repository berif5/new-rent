<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultImageToLessors extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('lessors', function (Blueprint $table) {
            $table->string('image')->default('public/images/user.png')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lessors', function (Blueprint $table) {
            $table->string('image')->change();
        });
    }
}
