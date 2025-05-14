<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function up()
{
    Schema::create('jobs', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->string('company');
        $table->decimal('salary', 10, 2);
        $table->timestamps();
    });
}

}
