<?php
error_reporting(E_ALL);

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With");

require 'requests_functions.php';

$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod == 'GET') {
    if (isset($_GET['name'])) {
        $studentName = $_GET['name'];
        $response = getStudentSubjects(['name' => $studentName]);
        echo $response;
    } else {
        echo json_encode([
            "status" => 422, 
            "message" => "Please provide a student name"
        ]);
    }
} else {
    echo json_encode([
        "status" => 405, 
        "message" => "$requestMethod Method Not Allowed"]);
}
?>
