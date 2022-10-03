<?php

require_once __DIR__ . "/Database.php";

use Config\Database;

$db = Database::getConnection();
echo "Sukses membuat koneksi ke Database" . PHP_EOL;