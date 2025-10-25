<?php
include "includes/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pageant_id = $conn->real_escape_string($_POST['Pageant_ID']);
    $first_name = $conn->real_escape_string($_POST['First_Name']);
    $last_name = $conn->real_escape_string($_POST['Last_Name']);
    $address = $conn->real_escape_string($_POST['Address']);
    $talent = $conn->real_escape_string($_POST['Talent']);

    $sql = "INSERT INTO candidate (Candidate_ID, First_Name, Last_Name, Address, Talent)
            VALUES ('$candidate_id', '$first_name', '$last_name', '$address', '$talent')";

    if ($conn->query($sql) === TRUE) {
        header("Location: display_candidates.php"); 
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Candidate - Create</title>
</head>
<body>
    <h2>Add New Candidate</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Pageant ID: <input type="number" name="Pageant_ID" required><br><br>
        First Name: <input type="text" name="First_Name" maxlength="50" required><br><br>
        Last Name: <input type="text" name="Last_Name" maxlength="50" required><br><br>
        Address: <input type="text" name="Address" maxlength="150" required><br><br>
        Talent: <input type="text" name="Talent" maxlength="100"><br><br>
        <input type="submit" value="Submit">
        <a href="display_candidates.php">Cancel</a>
    </form>
</body>
</html>