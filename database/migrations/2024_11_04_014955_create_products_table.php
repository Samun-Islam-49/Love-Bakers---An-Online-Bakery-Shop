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
        Schema::create('products', function (Blueprint $table) {
            // Database features
            $table->id();
            $table->unsignedBigInteger("cat_id");
            $table->unsignedBigInteger("subcat_id")->nullable();
            $table->foreign("cat_id")->references("id")->on("categories")->onDelete("cascade");
            $table->foreign("subcat_id")->references("id")->on("subcategories")->onDelete("cascade");



            // Product features
            $table->string("name");
            $table->string("slug")->nullable();
            $table->string("code");
            $table->string("tags")->nullable();
            $table->string("sell_weight")->nullable();
            $table->string("sell_price")->nullable();
            $table->string("short_discription")->nullable();
            $table->text("ingredients")->nullable();
            $table->text("discription")->nullable();
            $table->string("thumbnail");
            $table->text("images")->nullable();
            $table->integer("status")->nullable();
            $table->integer("sale_type")->nullable();
            $table->integer("sale_discount")->nullable();
            $table->boolean("daily_needs")->nullable();
            $table->boolean("delivery_type")->nullable();
            $table->boolean("unit_type")->nullable();
            $table->integer("total_sells")->nullable();

            //Admin
            $table->unsignedBigInteger("admin_id");
            $table->foreign("admin_id")->references("id")->on("admins");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
