<?php
session_start();

//require 'db_connect.php';
// Establish a connection to the database
$db_connection = mysqli_connect("localhost","root","","bt_feedback");
// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Get the form data
if (isset($_POST['full_name']) && isset($_POST['email']) && isset($_POST['phone_number'])&& isset($_POST['service_feedback'])&& isset($_POST['comment'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $service_feedback = $_POST['service_feedback'];
    $comment = $_POST['comment'];

// Insert the data into the database
    $insert_data = mysqli_query($db_connection, "INSERT INTO `feedback` (full_name, email, phone_number, service_feedback, comment) VALUES ('$full_name', '$email', '$phone_number', '$service_feedback', '$comment')");



    if ($insert_data === TRUE) {
        header('Location: thanks.php');
        exit;

    } else {
        header('Location: null.php');
        exit;

    }




}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="feedbackstyle.css">
    <title>SEND FEEDBACK</title>
</head>
<body>
    <form action="" method="post">
        <h2>Submit Feedback</h2>

        <div class="container">
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" required>
        
        <label for="service_feedback">Service Feedback:</label>
        <select id="service_feedback" name="service_feedback" required>
          <option value="">--Select--</option>
          <option value="Jackpots">Jackpots</option>
          <option value="Prematch & Live">Prematch & Live</option>
          <option value="BSL">BSL</option>
          <option value="Virtuals">Virtuals</option>
          <option value="Casino">Casino</option>

        </select>
    <div class="commentary">
        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment" rows="5" required></textarea>
    </div>
        
        <button type="submit">Submit</button>
    </div>

    </form>
    
      
</body>
</html>
