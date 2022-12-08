<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){
//assign var
$user = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
$phone = filter_var($_POST['phone'],FILTER_SANITIZE_STRING);
$msg = filter_var($_POST['message'],FILTER_SANITIZE_STRING);

// create errors msg 
$formerrors = array();
if(strlen($user) < 5) {
    $formerrors[] = "Username Must Be Larger Than 5 ";
}
if(strlen($phone) < 11) {
    $formerrors[] = "Phone Number Must Be 11 digits";
}
if(strlen($msg) < 15) {
    $formerrors[] = "Message Must Be Larger Than 15 charcters";

}

$to = "akh52888@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = 'From:'  .$email. "\r\n" ;
"CC: somebodyelse@example.com";

if (empty($formerrors)){


mail($to,$subject,$txt,$headers);

}
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/master.css">
    
    <title> Contact Form </title>
</head>
<body>
    


<div class="container">
 
 <fieldset>

    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

        <h1  class="text-center">Contact ME</h1>
        <div>
        <?php if(isset($formerrors)){
        
        foreach($formerrors as $error){
            echo $error . "<br>";
        }
    }
    ?>

</div>


        <input class="form-control" type="text" placeholder=" Usename " required name="username">
        <input class="form-control" type="email" placeholder="Write valid email " required name="email">
        <input class="form-control" type="text" placeholder="Type Your Phone " name="phone" required>
        <textarea class="form-control" name="message" id="" cols="30" rows="10" placeholder="Type Yor Message " required></textarea>
        <button type="submit" class="btn btn-success btn-block">Send Message </button>
        <button type="Reset" class="btn btn-outline-success">Clear Inputs  </button>
    </form>
 </fieldset>


</div>









    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>