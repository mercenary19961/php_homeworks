<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate Day Off Reduction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
            color: #dc3545;
        }
        .btn-success {
            margin-right: 10px;
        }
        .result-box {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #28a745;
            border-radius: 8px;
            background-color: #d4edda;
            color: #155724;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Employees Information</h1>
        <h2>Calculate Day Off Reduction</h2>
        <form action="calculate_dayoff_page.php" method="post" class="form-horizontal">
            <div class="form-group">
                <label for="days_off" class="col-sm-2 control-label">Days Off:</label>
                <div class="col-sm-10">
                    <input type="number" id="days_off" name="days_off" min="1" max="30" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label for="employee_id" class="col-sm-2 control-label">Employee ID:</label>
                <div class="col-sm-10">
                    <input type="text" id="employee_id" name="employee_id" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Calculate</button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href='admin_dashboard.php'">Cancel</button>
                </div>
            </div>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require("config.php");

            $days_off = $_POST['days_off'];
            $employee_id = $_POST['employee_id'];

            $query = "SELECT salary FROM employees WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $employee_id);
            $stmt->execute();
            $stmt->bind_result($salary);
            $stmt->fetch();
            $stmt->close();

            $salary_per_day = $salary / 30;
            $reduction = $salary_per_day * $days_off;
            $new_salary = $salary - $reduction;

            $conn->close();

            echo "<div class='result-box'>";
            echo "<h3>Calculation Result</h3>";
            echo "<p>Original Salary: $" . number_format($salary, 2) . "</p>";
            echo "<p>Reduction Amount for $days_off days off: $" . number_format($reduction, 2) . "</p>";
            echo "<p>New Salary: $" . number_format($new_salary, 2) . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
