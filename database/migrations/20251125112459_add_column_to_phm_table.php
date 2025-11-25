<?php
namespace Database\Migrations;

use Library\Framework\Database\QueryBuilder;

/**
 * Migration: 20251125112459_add_column_to_phm_table
 *
 * Implementations should use your application's static DB/query layer
 * inside up() and down(). This file intentionally does NOT reference
 * any query builder to remain neutral — call into your app's DB as needed.
 */
class Migration_20251125112459_add_column_to_phm_table implements \Library\Framework\Database\Migration
{
    public function up(): void
    {
        QueryBuilder::raw(
            "ALTER TABLE public_health_midwives
            ADD COLUMN area_id INT REFERENCES areas(id) ON DELETE CASCADE;"
        );
    }

    public function down(): void
    {
        QueryBuilder::raw(
            "ALTER TABLE public_health_midwives
            DROP COLUMN area_id;"
        );
    }
}