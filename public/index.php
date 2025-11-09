<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Database\Database;

$db = new Database();
$dbconnect = $db->connect();

$sql = "SELECT title, content FROM articles";

$result = $dbconnect->query($sql);
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " — <b>" . htmlspecialchars($row["title"], ENT_QUOTES, 'UTF-8') . "</b>: "
            . htmlspecialchars($row["content"], ENT_QUOTES, 'UTF-8') . "<br>";
    }
} else {
    echo "0 results";
}

$db->close();