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

if (isset($_POST['gameID'], $_POST['archerID'], $_POST['end_number'], $_POST['score'])) {
    $gameID = sanitise_input($_POST['gameID']);
    $archerID = sanitise_input($_POST['archerID']);
    $end_number = sanitise_input($_POST['end_number']);
    $scores = array_map('sanitise_input', $_POST['score']);
    

    $totalScore = array_sum($scores);

    require_once("settings.php");
    $connection = @mysqli_connect($host, $user, $pwd, $sql_db);
    
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $uuid = uniqid();
    $stmt = $connection->prepare("INSERT INTO Score (GameID, ArcherID, TotalScore) VALUES (?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("iii", $gameID, $archerID, $totalScore);
        $stmt->execute();
        $scoreID = $stmt->insert_id;
        $stmt->close();

        $stmt_end = $connection->prepare("INSERT INTO End (ScoreID, EndNumber) VALUES (?, ?)");
        if ($stmt_end) {
            $stmt_end->bind_param("ii", $scoreID, $end_number);
            $stmt_end->execute();
            $endID = $stmt_end->insert_id;
            $stmt_end->close();


            $stmt_arrow = $connection->prepare("INSERT INTO Arrow (EndID, Score) VALUES (?, ?)");
            if ($stmt_arrow) {
                foreach ($scores as $score) {
                    $stmt_arrow->bind_param("ii", $endID, $score);
                    $stmt_arrow->execute();
                }
                $stmt_arrow->close();
                echo "Scores submitted successfully!";
            } else {
                echo "Error: " . $connection->error;
            }
        } else {
            echo "Error: " . $connection->error;
        }
    } else {
        echo "Error: " . $connection->error;
    }

 
    mysqli_close($connection);
} else {
    echo "Required fields are missing.";
}
?>
