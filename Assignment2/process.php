<?php
// Start session for any future use
session_start();

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and collect form data
    $fullName = htmlspecialchars(trim($_POST['fullName'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $dob = htmlspecialchars(trim($_POST['dob'] ?? ''));
    $gender = htmlspecialchars(trim($_POST['gender'] ?? ''));
    $address = htmlspecialchars(trim($_POST['address'] ?? ''));
    $course = htmlspecialchars(trim($_POST['course'] ?? ''));
    
    // Format date of birth
    $formattedDob = !empty($dob) ? date("F j, Y", strtotime($dob)) : '';
    
    // Current timestamp
    $registrationTime = date("F j, Y, g:i a");
    
    // Server-side validation
    $errors = [];
    
    if (empty($fullName)) $errors[] = "Full name is required";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required";
    if (empty($phone)) $errors[] = "Phone number is required";
    if (empty($dob)) $errors[] = "Date of birth is required";
    if (empty($gender)) $errors[] = "Gender is required";
    if (empty($address)) $errors[] = "Address is required";
    if (empty($course)) $errors[] = "Course selection is required";
    
    if (!empty($errors)) {
        // Redirect back with error
        header("Location: index.html");
        exit();
    }
} else {
    // Redirect to form if accessed directly
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="success-container">
            <div class="success-header">
                <div class="success-icon">✅</div>
                <h1>Registration Successful!</h1>
                <p>Thank you for registering. Here are your submitted details:</p>
            </div>
            
            <div class="info-card">
                <h2 style="color: #667eea; margin-bottom: 20px; font-size: 20px;">📋 Registration Details</h2>
                
                <div class="info-row">
                    <span class="info-label">Full Name:</span>
                    <span class="info-value"><?php echo $fullName; ?></span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">Email:</span>
                    <span class="info-value"><?php echo $email; ?></span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">Phone:</span>
                    <span class="info-value"><?php echo $phone; ?></span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">Date of Birth:</span>
                    <span class="info-value"><?php echo $formattedDob; ?></span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">Gender:</span>
                    <span class="info-value"><?php echo $gender; ?></span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">Address:</span>
                    <span class="info-value"><?php echo nl2br($address); ?></span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">Course:</span>
                    <span class="info-value"><?php echo $course; ?></span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">Registered On:</span>
                    <span class="info-value"><?php echo $registrationTime; ?></span>
                </div>
            </div>
            
            <div class="btn-container">
                <a href="index.html" class="back-btn">← Back to Registration Form</a>
            </div>
        </div>
    </div>
</body>
</html>

