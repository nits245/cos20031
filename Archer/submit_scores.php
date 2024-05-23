<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();


if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    header("Location: login.php");
    exit;
}


function sanitise_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_POST['endID'], $_POST['arrowID'], $_POST['gameID'], $_POST['archerID'], $_POST['end_number'], $_POST['score'])) {
        $gameID = sanitise_input($_POST['gameID']);
    $archerID = sanitise_input($_POST['archerID']);
    $endID = sanitise_input($_POST['endID']);
    $arrowID = sanitise_input($_POST['arrowID']);
    $endNumber = sanitise_input($_POST['end_number']);
    $scores = array_map('sanitise_input', $_POST['score']);
    

    $totalScore = array_sum($scores);
    require_once("settings.php");
    $connection = mysqli_connect($host, $user, $pwd, $sql_db);
    

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }


    $stmt = $connection->prepare("INSERT INTO score (GameID, ArcherID, TotalScore) VALUES (?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("iii", $gameID, $archerID, $totalScore);
        $stmt->execute();
        $scoreID = $stmt->insert_id;
        $stmt->close();


        $stmt_end = $connection->prepare("INSERT INTO End (EndID, ScoreID, EndNumber) VALUES (?, ?, ?)");
        if ($stmt_end) {
            $stmt_end->bind_param("uuu", $endID, $scoreID, $endNumber);
            $stmt_end->execute();
            $stmt_end->close();


            $stmt_arrow = $connection->prepare("INSERT INTO Arrow (ArrowID, EndID, Score) VALUES (?, ?, ?)");
            if ($stmt_arrow) {
                foreach ($scores as $score) {
                    $stmt_arrow->bind_param("iii", $arrowID, $endID, $score);
                    $stmt_arrow->execute();
                }
                $stmt_arrow->close();
                echo "Scores submitted successfully!";
            } else {
                echo "Error inserting into Arrow: " . $connection->error;
            }
        } else {
            echo "Error inserting into End: " . $connection->error;
        }
    } else {
        echo "Error inserting into Score: " . $connection->error;
    }
    mysqli_close($connection);
} else {
    echo "Required fields are missing.";
}
?>
