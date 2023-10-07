<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bbs', static function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->float('price', 10);
            $table->foreignIdFor(User::class)
                ->constrained()
                ->onDelete('cascade');
            $table->timestamps();

            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bbs');
    }
};
