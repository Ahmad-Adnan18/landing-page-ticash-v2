<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update all leads that have NULL or empty status to 'pending'
        DB::table('leads')
          ->whereNull('status')
          ->orWhere('status', '')
          ->update(['status' => 'pending']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Optionally reset to NULL (but we'll just leave as is since this was a data migration)
        // For rollback, we might not want to revert this change
    }
};
