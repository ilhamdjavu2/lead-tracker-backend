<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id(); // Auto increment (int)
			
            $table->string('name', 255);
            $table->string('email', 255);
            $table->string('phone', 20)->nullable();
			
            $table->decimal('budget', 15, 2)->nullable();

            $table->enum('status', [
                'new',
                'contacted',
                'qualified',
                'lost'
            ])->default('new');

            $table->text('notes')->nullable();

            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
