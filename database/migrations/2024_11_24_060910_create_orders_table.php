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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger("status")->default(0);

            $table->unsignedBigInteger("user_id");
            $table->string("name");
            $table->string("phone");
            $table->string("email");
            $table->string("delivery_address");
            $table->string("optional_address")->nullable();
            $table->text("notes")->nullable();

            $table->text("items");
            $table->integer("item_total");

            $table->boolean("delivery_type")->default(true);
            $table->string("home_area")->default('-1');
            $table->string("store_no")->default('-1');

            $table->integer("delivery_fee");
            $table->integer("total");

            $table->string("delivery_date");
            $table->string("delivery_time");

            $table->integer("payment_method");

            $table->timestamps();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
