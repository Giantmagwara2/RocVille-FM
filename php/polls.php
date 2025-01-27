<?php
header("Content-Type: application/json");

// File to store poll data
$pollFile = "poll_data.json";

// Initialize poll data if the file doesn't exist
if (!file_exists($pollFile)) {
    $initialData = [
        "Rock" => 0,
        "Pop" => 0,
        "Jazz" => 0,
        "Hip-hop" => 0,
        "Classical" => 0
    ];
    file_put_contents($pollFile, json_encode($initialData));
}

// Handle incoming POST requests
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $vote = $data["vote"] ?? null;

    if ($vote) {
        // Update poll data
        $pollData = json_decode(file_get_contents($pollFile), true);
        if (array_key_exists($vote, $pollData)) {
            $pollData[$vote]++;
            file_put_contents($pollFile, json_encode($pollData));
            echo json_encode(["success" => true, "results" => $pollData]);
            exit;
        }
    }
    echo json_encode(["success" => false]);
}
?>
