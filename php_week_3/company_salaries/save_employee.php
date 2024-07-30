<?php
require("config.php");

$employee_id = $_POST['id'];
$name = $_POST['name'];
$salary = $_POST['salary'];
$daysoff = $_POST['daysoff'];

$query = "UPDATE employees SET name = ?, salary = ?, daysoff = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("sdii", $name, $salary, $daysoff, $employee_id);

if ($stmt->execute()) {
    echo "Employee updated successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

header("Location: admin_dashboard.php");
?>
