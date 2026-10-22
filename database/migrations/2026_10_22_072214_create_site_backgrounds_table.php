
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Background SPMB');
            $table->string('image_path')->nullable();
            $table->string('image_url', 2048)->nullable();
            $table->unsignedTinyInteger('overlay_opacity')->default(85);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_backgrounds');
    }
};
