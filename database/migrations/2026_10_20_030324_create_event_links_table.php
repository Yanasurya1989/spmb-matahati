
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_links', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url', 2048);
            $table->string('icon', 30)->default('🔗');
            $table->enum('type', ['link', 'pdf'])->default('link');
            $table->boolean('show_download')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_links');
    }
};
