<?php
include "includes/db_connect.php";

$candidate_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($candidate_id > 0) {
   
    $sql = "DELETE FROM candidate WHERE Candidate_ID=$candidate_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: display_candidates.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid Candidate ID.";
}

$conn->close();
?>