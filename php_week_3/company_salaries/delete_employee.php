<?php
require("config.php");

$employee_id = $_GET['id'];

$query = "DELETE FROM employees WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $employee_id);

if ($stmt->execute()) {
    echo "Employee deleted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

header("Location: admin_dashboard.php");
?>
