<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author')->nullable();
            $table->string('url')->nullable();
            $table->string('skills')->nullable();
            $table->text('note')->nullable();
            $table->unsignedTinyInteger('percentage_completed')->nullable(); //== WILL BE MOVED TO PERFORMANCES TBL
            $table->date('completed_at')->nullable(); //== WILL BE MOVED TO PERFORMANCES TBL
            $table->foreignId('source_id')->constrained()->cascadeOnDelete();
            $table->foreignId('status_id')->constrained()->cascadeOnDelete();
            $table->foreignId('type_id')->constrained()->cascadeOnDelete()->default(1);
            $table->foreignId('priority_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('resources');
    }
}
