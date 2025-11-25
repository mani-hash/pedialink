<?php
namespace Database\Migrations;

use Library\Framework\Database\QueryBuilder;

/**
 * Migration: 20251125111655_create_parents_table
 *
 * Implementations should use your application's static DB/query layer
 * inside up() and down(). This file intentionally does NOT reference
 * any query builder to remain neutral — call into your app's DB as needed.
 */
class Migration_20251125111655_create_parents_table implements \Library\Framework\Database\Migration
{
    public function up(): void
    {
        QueryBuilder::raw("CREATE TYPE parent_type AS ENUM ('mother','father', 'guardian');");
        QueryBuilder::raw(
            "CREATE TABLE IF NOT EXISTS parents (
                id INT PRIMARY KEY REFERENCES users(id) ON DELETE CASCADE,
                type parent_type NOT NULL,
                nic TEXT NOT NULL UNIQUE,
                address TEXT NOT NULL,
                area_id INT REFERENCES areas(id) ON DELETE CASCADE
            );"
        );
    }

    public function down(): void
    {
        QueryBuilder::raw("DROP TABLE IF EXISTS parents;");
        QueryBuilder::raw("DROP TYPE IF EXISTS parent_type;");
    }
}