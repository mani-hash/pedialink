<?php
namespace Database\Migrations;

use Library\Framework\Database\QueryBuilder;

/**
 * Migration: 20251125092602_create_admins_table
 *
 * Implementations should use your application's static DB/query layer
 * inside up() and down(). This file intentionally does NOT reference
 * any query builder to remain neutral — call into your app's DB as needed.
 */
class Migration_20251125092602_create_admins_table implements \Library\Framework\Database\Migration
{
    public function up(): void
    {
        QueryBuilder::raw("CREATE TYPE admin_type as ENUM ('super', 'data', 'user');");
        QueryBuilder::raw(
            "CREATE TABLE IF NOT EXISTS admin_types (
                id SERIAL PRIMARY KEY,
                type admin_type NOT NULL
            );"
        );
        QueryBuilder::raw(
            "INSERT INTO admin_types (type) VALUES
                ('super'),
                ('data'),
                ('user');"
        );
        QueryBuilder::raw(
            "CREATE TABLE IF NOT EXISTS admins (
                id INT PRIMARY KEY REFERENCES users(id) ON DELETE CASCADE,
                admin_type_id INT REFERENCES admin_types(id)
            );"
        );
    }

    public function down(): void
    {
        QueryBuilder::raw("DROP TABLE IF EXISTS admins;");
        QueryBuilder::raw("DROP TABLE IF EXISTS admin_types;");
        QueryBuilder::raw("DROP TYPE IF EXISTS admin_type;");
    }
}