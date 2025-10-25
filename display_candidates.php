<?php
include "includes/db_connect.php";
function close_conn($conn) {
    $conn->close();
}

$sql = "SELECT * FROM candidate";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Candidate Management - Read</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 8px; }
        .action-link { margin-right: 10px; }
    </style>
</head>
<body>
    <h2>Candidate List</h2>
    <p><a href="addnew_candidates.php">Add New Candidate</a></p>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Pageant ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Talent</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Candidate_ID"] . "</td>";
                echo "<td>" . $row["Pageant_ID"] . "</td>";
                echo "<td>" . $row["First_Name"] . "</td>";
                echo "<td>" . $row["Last_Name"] . "</td>";
                echo "<td>" . $row["Address"] . "</td>";
                echo "<td>" . $row["Talent"] . "</td>";
                echo "<td>
                        <a class='action-link' href='update.php?id=" . $row["Candidate_ID"] . "'>Edit</a>
                        <a class='action-link' href='delete.php?id=" . $row["Candidate_ID"] . "' onclick='return confirm(\"Are you sure you want to delete this candidate?\")'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No candidates found</td></tr>";
        }
        close_conn($conn);
        ?>
    </table>
</body>
</html>