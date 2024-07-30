<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Salary</title>
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
            max-width: 500px;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Employees Information</h1>
        <h2>Update Salary</h2>
        <form action="update_salary.php" method="post" class="form">
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="operation">Operation:</label>
                <select id="operation" name="operation" class="form-control">
                    <option value="increase">Increase</option>
                    <option value="decrease">Decrease</option>
                </select>
            </div>
            <div class="form-group">
                <label for="employee_id">Employee ID:</label>
                <input type="text" id="employee_id" name="employee_id" class="form-control">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" id="all_employee" name="all_employee" class="form-check-input">
                <label for="all_employee" class="form-check-label">All employees</label>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <button type="button" class="btn btn-danger" onclick="window.location.href='admin_dashboard.php'">Cancel</button>
        </form>
    </div>
</body>
</html>
