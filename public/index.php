<?php

// This file exists so that `php artisan serve` (which serves from the
// project root but expects public/index.php) works correctly in local
// development. It simply delegates to the real entry point one level up.

require __DIR__ . '/../index.php';
