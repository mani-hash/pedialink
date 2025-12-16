<?php
namespace Database\Migrations;

use Library\Framework\Database\QueryBuilder;

/**
 * Migration: 20251216180430_maternal_table
 *
 * Implementations should use your application's static DB/query layer
 * inside up() and down(). This file intentionally does NOT reference
 * any query builder to remain neutral — call into your app's DB as needed.
 */
class Migration_20251216180430_maternal_table implements \Library\Framework\Database\Migration
{
    public function up(): void
    {
        QueryBuilder::raw("CREATE TABLE maternal (
                              patient_id     INT PRIMARY KEY REFERENCES patients(id) ON DELETE CASCADE
                              );"
        );
    }

    public function down(): void
    {
    }
}