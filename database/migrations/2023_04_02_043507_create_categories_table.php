<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->timestamps();
        });
        DB::table('categories')->insert([
            ['name' => 'Technology'],
            ['name' => 'Health and Wellness'],
            ['name' => 'Travel'],
            ['name' => 'Food and Drink'],
            ['name' => 'Fashion and Style'],
            ['name' => 'Entertainment'],
            ['name' => 'Sports and Fitness'],
            ['name' => 'Education'],
            ['name' => 'Business and Finance'],
            ['name' => 'Politics'],
            ['name' => 'Art and Design'],
            ['name' => 'Science'],
            ['name' => 'History'],
            ['name' => 'Parenting'],
            ['name' => 'Personal Development'],
            ['name' => 'Relationships'],
            ['name' => 'Religion and Spirituality'],
            ['name' => 'Self-Care'],
            ['name' => 'Social Media'],
            ['name' => 'Writing and Literature'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        DB::table('categories')->whereIn('name', [
            'Technology',
            'Health and Wellness',
            'Travel',
            'Food and Drink',
            'Fashion and Style',
            'Entertainment',
            'Sports and Fitness',
            'Education',
            'Business and Finance',
            'Politics',
            'Art and Design',
            'Science',
            'History',
            'Parenting',
            'Personal Development',
            'Relationships',
            'Religion and Spirituality',
            'Self-Care',
            'Social Media',
            'Writing and Literature',
        ])->delete();
    }
};
