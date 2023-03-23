<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['email']) &&
        isset($_POST['pass']) && isset($_POST['pass'])) 
        
        $email = $_POST['email'];
        $pass = $_POST['pass'];
$con = new mysqli("localhost","root","","shopping");
if($con->connect_error){
    die("Failed to connect : ".con->connect_error);
}
else{
    $stmt =  $con->prepare("select * from cart_login where email = ?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows>0){
        $data = $stmt_result->fetch_assoc();
        if($data['pass'] == $pass){
            
        }else{
            echo "Invalid Email or password";
        }

    }
    else{
        echo "Invalid Email or password";
    }
}
}
?>