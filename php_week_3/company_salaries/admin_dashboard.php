<?php
require("config.php");

$result = $conn->query("SELECT * FROM employees");

$summary = $conn->query("SELECT 
    MAX(salary) as highest_salary, 
    MIN(salary) as lowest_salary, 
    SUM(salary) as total_salary, 
    COUNT(*) as total_employees 
    FROM employees")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 20px;
        }
        .card-deck .card {
            min-width: 15rem;
        }
        .btn-group {
            margin-bottom: 20px;
            margin-top: 20px;
        }
        table {
            margin-top: 20px;
        }
        .btn {
            margin-right: 5px;
        }
        .action_buttons {
            display: flex;
            justify-content: space-around;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center text-danger">Employees Information</h1>
        <div class="card-deck">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Highest Salary</h5>
                    <p class="card-text"><?php echo $summary['highest_salary']; ?></p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Lowest Salary</h5>
                    <p class="card-text"><?php echo $summary['lowest_salary']; ?></p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Salary</h5>
                    <p class="card-text"><?php echo $summary['total_salary']; ?></p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Number of Employees</h5>
                    <p class="card-text"><?php echo $summary['total_employees']; ?></p>
                </div>
            </div>
        </div>

        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="update_salary_page.php" class="btn btn-primary">Update Salary</a>
            <a href="search_employee.php" class="btn btn-secondary">Search Employee</a>
            <a href="calculate_dayoff_page.php" class="btn btn-info">Calculate Salary After Day Off</a>
        </div>

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
                        <a href="delete_employee.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        <a href="update_employee.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
