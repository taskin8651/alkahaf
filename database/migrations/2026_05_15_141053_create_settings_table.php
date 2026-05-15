<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();

            // Basic
            $table->string('website_name')->nullable();
            $table->string('website_tagline')->nullable();
            $table->string('copyright_text')->nullable();
            $table->string('developer_credit')->nullable();

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('canonical_url')->nullable();

            // Contact
            $table->string('primary_phone')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('email_address')->nullable();
            $table->text('office_address')->nullable();
            $table->text('store_address')->nullable();
            $table->string('business_hours')->nullable();
            $table->longText('google_map_embed')->nullable();

            // Social
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('youtube_url')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('website_settings');
    }
};