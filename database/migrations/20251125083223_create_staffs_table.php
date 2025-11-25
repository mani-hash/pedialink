<?php
namespace Database\Migrations;

use Library\Framework\Database\QueryBuilder;

/**
 * Migration: 20251125083223_create_staffs_table
 *
 * Implementations should use your application's static DB/query layer
 * inside up() and down(). This file intentionally does NOT reference
 * any query builder to remain neutral — call into your app's DB as needed.
 */
class Migration_20251125083223_create_staffs_table implements \Library\Framework\Database\Migration
{
    public function up(): void
    {
        QueryBuilder::raw(
            "CREATE TABLE IF NOT EXISTS staffs (
                id INT PRIMARY KEY REFERENCES users(id) ON DELETE CASCADE,
                nic TEXT NOT NULL UNIQUE,
                license_no TEXT UNIQUE
            );"
        );

        QueryBuilder::raw(
            "CREATE TABLE IF NOT EXISTS doctors (
                id INT PRIMARY KEY REFERENCES users(id) ON DELETE CASCADE
            );"
        );

        QueryBuilder::raw(
            "CREATE TABLE IF NOT EXISTS public_health_midwives (
                id INT PRIMARY KEY REFERENCES users(id) ON DELETE CASCADE
            );"
        );
    }

    public function down(): void
    {
        QueryBuilder::raw("DROP TABLE IF EXISTS public_health_midwives;");
        QueryBuilder::raw("DROP TABLE IF EXISTS doctors;");
        QueryBuilder::raw("DROP TABLE IF EXISTS staffs;");

    }
}