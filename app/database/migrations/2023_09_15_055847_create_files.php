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
        Schema::create('files', function (Blueprint $table) {
            $table->id('fileid')->unsigned(false);
            $table->string('filename');
            $table->string('passcode');
            $table->string('title');
            $table->string('msg');
            $table->string('ip');
            $table->string('date');
            $table->string('time');
            $table->timestamps();
        });
        
        DB::statement("ALTER TABLE files MODIFY COLUMN fileid bigint(20) AUTO_INCREMENT,AUTO_INCREMENT=1");
        DB::statement("ALTER TABLE files MODIFY COLUMN filename varchar(255) NOT NULL");
        DB::statement("ALTER TABLE files MODIFY COLUMN passcode varchar(255) NULL");
        DB::statement("ALTER TABLE files MODIFY COLUMN title varchar(255) NULL");
        DB::statement("ALTER TABLE files MODIFY COLUMN msg varchar(255) NULL");
        DB::statement("ALTER TABLE files MODIFY COLUMN ip varchar(255) NULL");
        DB::statement("ALTER TABLE files MODIFY COLUMN date varchar(100) NULL");
        DB::statement("ALTER TABLE files MODIFY COLUMN time varchar(100) NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
