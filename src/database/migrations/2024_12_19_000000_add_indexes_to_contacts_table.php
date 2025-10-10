<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexesToContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            // Add indexes for search optimization
            $table->index(['first_name', 'last_name'], 'contacts_name_search');
            $table->index('email', 'contacts_email_search');
            $table->index('gender', 'contacts_gender_search');
            $table->index('category_id', 'contacts_category_search');
            $table->index('created_at', 'contacts_created_at_search');
            
            // Composite index for common search combinations
            $table->index(['gender', 'category_id'], 'contacts_gender_category_search');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropIndex('contacts_name_search');
            $table->dropIndex('contacts_email_search');
            $table->dropIndex('contacts_gender_search');
            $table->dropIndex('contacts_category_search');
            $table->dropIndex('contacts_created_at_search');
            $table->dropIndex('contacts_gender_category_search');
        });
    }
}