<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('departement');
            $table->string('title');
            $table->string('town');
            $table->string('phone');
            $table->string('categorie');
            $table->string('type');
            $table->string('url');
            $table->string('list_id');
            $table->string('image')->nullable();
            // $table->string('annonce_id');
            // $table->string('title');
            // $table->integer('price')->nullable();
            // $table->string('url');
            // $table->text('description');
            // $table->string('urgent');
            // $table->string('category_name');
            // $table->string('ad_type');
            // $table->string('region');
            // $table->string('departement')->nullable();;
            // $table->string('city');
            // $table->string('postal_code');
            // $table->string('is_exclusive')->nullable();
            // $table->string('first_publication_date');
            // $table->string('last_publication_date');
            // $table->string('has_phone');
            // $table->string('phone')->nullable();
            // $table->string('owner_type');
            // $table->string('owner_name');
            // $table->string('user_id');
            // $table->string('real_estate_type')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
