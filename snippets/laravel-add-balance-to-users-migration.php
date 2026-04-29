<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'balance')) {
                $table->unsignedBigInteger('balance')->default(0)->after('email');
            }

            if (!Schema::hasColumn('users', 'balance_updated_at')) {
                $table->timestamp('balance_updated_at')->nullable()->after('balance');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'balance_updated_at')) {
                $table->dropColumn('balance_updated_at');
            }

            if (Schema::hasColumn('users', 'balance')) {
                $table->dropColumn('balance');
            }
        });
    }
};
