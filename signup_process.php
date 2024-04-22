<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the required fields are set in $_POST array
    if (isset($_POST['Namee']) && isset($_POST['userType']) && isset($_POST['email'])) {
        // Extract data from $_POST array
        $name = $_POST['Namee'];
        $role = $_POST['userType']; // Assuming the role field in your form is named 'userType'
        $email = $_POST['email'];

        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'users');
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        } else {
            // Prepare and bind the SQL statement
            $stmt = $conn->prepare("INSERT INTO users (Namee, user_type, email) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $role, $email);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Registration successful";
            } else {
                echo "Error: " . $conn->error;
            }

            // Close statement and connection
            $stmt->close();
            $conn->close();
        }
    } else {
        // Handle if required fields are not set in $_POST array
        echo "Error: Required fields are not set";
    }
} else {
    // Handle if the form is not submitted
    echo "Error: Form is not submitted";
}

?>