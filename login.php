<?php
   define('DB_SERVER', 'localhost:3036');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'test12345');
   define('DB_DATABASE', 'database');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>

<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {    
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
        //header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<html>

<head>
    <title> Login </title>
    <script type="text/JavaScript">
        function Con() { confirm("You're about to be directed to another pg. Do you want to continue?"); }
    </script>
</head>


<body style="background-image: url('https://ak.picdn.net/shutterstock/videos/17178685/thumb/1.jpg'); background-size:cover;">
    <center>
        <h1 style="color:Crimson;">
            <b>
LOGIN
</b>
        </h1>
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdk90_VVLOTb5zDCdQmx_oGF0Gjr_2KpwtPOMif3FVscEP6eoIsEU7c2XjG23m787S-oU&usqp=CAU" align="right">
        <form action="" method "Post">
            <h3 style="color:Navy;">
                &emsp; &emsp;Username <input type="text" name="user" placeholder="User-ID/Email-ID/Ph No" required/>
                <br><br> &emsp; &emsp;Password&nbsp <input type="password" name="pass" placeholder="Password" required/>
                <br><br> &emsp; <input type="reset" name="rest" /> &emsp; <input type="submit" onclick="Con();" name="sub" />
                <h2 style="color:Tomato;">
                    <marquee>
                        New to page? Sign Up here
                    </marquee>
                </h2>
    </center>
    </h3>
    <strong>
<h5>
<ul type=circle style="color:Dodgerblue;">
<li>Username can contain special characters like "_","." & alphanumeric values only</li>
<br>
<li>Password to be atleast 6 characters long</li>
<br>
<li>Password should include <b> ATLEAST</b> one uppercase, one number and one special character</li>
</h5>
</strong>


</body>

</html>
