<?php
require("config.php");

$amount = $_POST['amount'];
$operation = $_POST['operation'];
$employee_id = $_POST['employee_id'];
$all_employee = isset($_POST['all_employee']);

if ($all_employee) {
    if ($operation == 'increase') {
        $query = "UPDATE employees SET salary = salary + (salary * ? / 100)";
    } else {
        $query = "UPDATE employees SET salary = salary - (salary * ? / 100)";
    }
    $stmt = $conn->prepare($query);
    $stmt->bind_param("d", $amount);
} else {
    if ($operation == 'increase') {
        $query = "UPDATE employees SET salary = salary + (salary * ? / 100) WHERE id = ?";
    } else {
        $query = "UPDATE employees SET salary = salary - (salary * ? / 100) WHERE id = ?";
    }
    $stmt = $conn->prepare($query);
    $stmt->bind_param("di", $amount, $employee_id);
}

if ($stmt->execute()) {
    echo "Salary updated successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

header("Location: admin_dashboard.php");
?>
