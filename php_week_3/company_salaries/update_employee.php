<?php
require("config.php");

$employee_id = $_GET['id'];
$query = "SELECT * FROM employees WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $employee_id);
$stmt->execute();
$result = $stmt->get_result();
$employee = $result->fetch_assoc();

$stmt->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Employee</title>
    <link rel="stylesheet" href="path/to/your/css/file.css">
</head>
<body>
    <h1>Update Employee Information</h1>

    <form action="save_employee.php" method="post">
        <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $employee['name']; ?>" required>

        <label for="salary">Salary:</label>
        <input type="text" id="salary" name="salary" value="<?php echo $employee['salary']; ?>" required>

        <label for="daysoff">Days Off:</label>
        <input type="text" id="daysoff" name="daysoff" value="<?php echo $employee['daysoff']; ?>" required>

        <button type="submit">Save</button>
        <button type="button" onclick="window.location.href='admin_dashboard.php'">Cancel</button>
    </form>
</body>
</html>
