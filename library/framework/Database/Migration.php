<?php

namespace Library\Framework\Database;

/**
 * Migration contract that defines
 * structure to define migration files
 */
interface Migration {
    public function up(): void;

    public function down(): void;
}