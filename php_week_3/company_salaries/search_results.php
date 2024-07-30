<?php
require("config.php");

$employee_id = $_POST['employee_id'];
$query = "SELECT * FROM employees";
$params = [];

if (!empty($employee_id)) {
    $query .= " WHERE id = ?";
    $params[] = $employee_id;
}

$stmt = $conn->prepare($query);

if (!empty($employee_id)) {
    $stmt->bind_param("i", $employee_id);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 20px;
        }
        .action_buttons {
            display: flex;
            justify-content: space-around;
        }
        .btn-group {
            margin-bottom: 20px;
        }
        table {
            margin-top: 20px;
        }
        .btn {
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center text-danger">Search Results</h1>
        
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Salary</th>
                    <th>Days Off</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['salary']; ?></td>
                    <td><?php echo $row['daysoff']; ?></td>
                    <td class="action_buttons">
                        <a href="delete_employee.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-md">Delete</a>
                        <a href="update_employee.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-md">Edit</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="btn-group" role="group">
            <button type="button" class="btn btn-secondary" onclick="window.location.href='search_employee.php'">Back to Search</button>
            <button type="button" class="btn btn-primary" onclick="window.location.href='admin_dashboard.php'">Back to Dashboard</button>
        </div>
    </div>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
