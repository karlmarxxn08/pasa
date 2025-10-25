<?php
include "includes/db_connect.php";

$candidate_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$candidate_data = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $conn->real_escape_string($_POST['Candidate_ID']);
    $pageant_id = $conn->real_escape_string($_POST['Pageant_ID']);
    $first_name = $conn->real_escape_string($_POST['First_Name']);
    $last_name = $conn->real_escape_string($_POST['Last_Name']);
    $address = $conn->real_escape_string($_POST['Address']);
    $talent = $conn->real_escape_string($_POST['Talent']);

    $sql = "UPDATE candidate SET
            Pageant_ID='$pageant_id',
            First_Name='$first_name',
            Last_Name='$last_name',
            Address='$address',
            Talent='$talent'
            WHERE Candidate_ID=$id";

    
    if ($conn->query($sql) === TRUE) {
        header("Location: display_candidates.php"); 
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

} else if ($candidate_id > 0) {

    $sql = "SELECT * FROM candidate WHERE Candidate_ID=$candidate_id";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $candidate_data = $result->fetch_assoc();
    } else {
        echo "Candidate not found.";
        exit();
    }
} else {
    echo "Invalid Candidate ID.";
    exit();
}

$conn->close();

if (!$candidate_data) return; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Candidate - Update</title>
</head>
<body>
    <h2>Edit Candidate (ID: <?php echo $candidate_data['Candidate_ID']; ?>)</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="Candidate_ID" value="<?php echo $candidate_data['Candidate_ID']; ?>">
        
        Pageant ID: <input type="number" name="Pageant_ID" value="<?php echo $candidate_data['Pageant_ID']; ?>" required><br><br>
        First Name: <input type="text" name="First_Name" value="<?php echo $candidate_data['First_Name']; ?>" required><br><br>
        Last Name: <input type="text" name="Last_Name" value="<?php echo $candidate_data['Last_Name']; ?>" required><br><br>
        Address: <input type="text" name="Address" value="<?php echo $candidate_data['Address']; ?>" required><br><br>
        Talent: <input type="text" name="Talent" value="<?php echo $candidate_data['Talent']; ?>"><br><br>
        
        <input type="submit" value="Update">
        <a href="display.candidates.php">Cancel</a>
    </form>
</body>
</html>