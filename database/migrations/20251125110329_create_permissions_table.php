<?php
namespace Database\Migrations;

use Library\Framework\Database\QueryBuilder;

/**
 * Migration: 20251125110329_create_permissions_table
 *
 * Implementations should use your application's static DB/query layer
 * inside up() and down(). This file intentionally does NOT reference
 * any query builder to remain neutral — call into your app's DB as needed.
 */
class Migration_20251125110329_create_permissions_table implements \Library\Framework\Database\Migration
{
    public function up(): void
    {
        QueryBuilder::raw(
            "CREATE TABLE IF NOT EXISTS permissions (
                id SERIAL PRIMARY KEY,
                type TEXT 
            );"
        );

        QueryBuilder::raw(
            "CREATE TABLE IF NOT EXISTS admin_type_permissions (
                admin_type_id INT NOT NULL REFERENCES admin_types(id),
                permission_id INT NOT NULL REFERENCES permissions(id),
                PRIMARY KEY (admin_type_id, permission_id)
            );"
        );

        QueryBuilder::raw(
            "CREATE TABLE IF NOT EXISTS admin_permissions (
                admin_id INT NOT NULL REFERENCES admins(id),
                permission_id INT NOT NULL REFERENCES permissions(id),
                granted_by INT REFERENCES admins(id),
                granted_at TIMESTAMP WITH TIME ZONE DEFAULT now(),
                PRIMARY KEY (admin_id, permission_id)
            );"
        );
    }

    public function down(): void
    {
        QueryBuilder::raw("DROP TABLE IF EXISTS admin_permissions;");
        QueryBuilder::raw("DROP TABLE IF EXISTS admin_type_permissions;");
        QueryBuilder::raw("DROP TABLE IF EXISTS permissions;");
    }
}