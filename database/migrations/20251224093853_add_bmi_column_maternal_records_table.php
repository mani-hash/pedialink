<?php
namespace Database\Migrations;
use Library\Framework\Database\QueryBuilder;;

/**
 * Migration: 20251224093853_add_bmi_column_maternal_records_table
 *
 * Implementations should use your application's static DB/query layer
 * inside up() and down(). This file intentionally does NOT reference
 * any query builder to remain neutral — call into your app's DB as needed.
 */
class Migration_20251224093853_add_bmi_column_maternal_records_table implements \Library\Framework\Database\Migration
{
    public function up(): void
    {
       
        {
        QueryBuilder::raw(
            "ALTER TABLE maternal_records
            ADD bmi INT;"
        );
    }
    }

    public function down(): void
    {
        QueryBuilder::raw("ALTER TABLE maternal_records DROP COLUMN IF EXISTS bmi;");
    }
}