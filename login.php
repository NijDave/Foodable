<!DOCTYPE html>
<?php
session_start();
include 'connection.php';

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $passw = $_POST['password'];
    $user = $_POST["user"];
    $email = stripcslashes($email);
    $passw = stripcslashes($passw); //to remove the backslashes from email 
    $email = mysqli_real_escape_string($connection, $email);
    $passw = mysqli_real_escape_string($connection, $passw); // to escape sprcial character in email to prevent sql injection
    if ($user == "CHARITY") {
        $query = "select * from charity_master where email = '$email' and password = '$passw'";
        $execute = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($execute, MYSQLI_ASSOC);
        $no_rows = mysqli_num_rows($execute);

        if ($no_rows == 1) {
            $result = $connection->query($query);
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $img=$row['photo_name'];
            }
            $_SESSION['userid'] = $id;
            $_SESSION['image_src']=$img;
            $_SESSION['type']="charity";
            $query = "select * from users where usertype='charity' and user_type_id=$id";
            $execute = mysqli_query($connection, $query);
            $row = mysqli_fetch_array($execute, MYSQLI_ASSOC);
            $no_rows = mysqli_num_rows($execute);
            if ($no_rows == 1) {
                $result = $connection->query($query);
                while ($row = $result->fetch_assoc()) {
                    $uniq_id = $row["unique_id"];
                    $user_id = $row['user_id'];
                }
                $_SESSION['unique_id'] = $uniq_id;
            }
            header("Location:charity/charity_home.php");
            exit();
        } else {
            echo "<center> <h1 > Login failed. Invalid email or password.</center></h1>";
        }
    } elseif ($user == "CONTRIBUTOR") {
        $query = "select * from contributor_master where email = '$email' and password = '$passw'";
        $execute = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($execute, MYSQLI_ASSOC);
        $no_rows = mysqli_num_rows($execute);

        if ($no_rows == 1) {
            $result = $connection->query($query);
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $img=$row['photo_name'];
            }
            $_SESSION['userid'] = $id;
            $_SESSION['type']="contributor";
            $query = "select * from users where usertype='contributor' and user_type_id=$id";
            $execute = mysqli_query($connection, $query);
            $row = mysqli_fetch_array($execute, MYSQLI_ASSOC);
            $no_rows = mysqli_num_rows($execute);
            if ($no_rows == 1) {
                $result = $connection->query($query);
                while ($row = $result->fetch_assoc()) {
                    $uniq_id = $row["unique_id"];
                    $user_id = $row['user_id'];
                    
                }
                $_SESSION['image_src']=$img;
                $_SESSION['unique_id'] = $uniq_id;
            }
            header("Location:contributor/contributor_home.php");
            exit();
        } else {
            echo "<center> <h1 > Login failed. Invalid username or password.</center></h1>";
        }
    } else {
        $query = "select * from public_master where email = '$email' and password = '$passw'";
        $execute = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($execute, MYSQLI_ASSOC);
        $no_rows = mysqli_num_rows($execute);

        if ($no_rows == 1) {
            $result = $connection->query($query);
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
            }
            $_SESSION['userid'] = $id;
            header("Location:public/public_home.php");
            exit();
        } else {
            echo "<center> <h1 > Login failed. Invalid username or password.</center></h1>";
        }
    }
}


?>


<html lang="en">

<head>
  <title>Login</title>
  <link rel="stylesheet" href="/Css/Login.css" />
  <link rel="icon" href="/images/foodable logo title.png" sizes="16x16 32x32" type="image/png" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Roboto+Condensed:wght@400;700&display=swap"
    rel="stylesheet" />
  <style>
    * {
      margin: 0;
      padding: 0;
      font-family: "Kanit", sans-serif;
      font-family: "Roboto Condensed", sans-serif;
    }

    .Login {
      width: 100%;
      height: 100vh;
      background-color: #ff981a;
      display: flex;
    }

    .left {
      width: 20%;
      background-color: rgb(22, 22, 22);
    }

    .logo {
      height: 43%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .logo img {
      border: 10px solid #fff;
      border-radius: 50%;
      cursor: pointer;
      transition: .2s;
    }

    .logo img:hover {
      border: 10px solid #000;
      cursor: pointer;
    }

    .heading {
      width: 100%;
      height: 30%;
      text-align: center;
      color: white;
      font-size: 19px;

    }

    .right {
      width: 80%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .follow
    {
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .socialmedia {
      color: white;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .images {
      display: flex;
    }
    .images div{
      margin: 0px 10px;
    }

    .form-area {
      background-color: white;
      width: 85%;
      height: 80%;
      border-radius: 50px;
    }
    .innerform
    {
      width: 100%;
      height: 95%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .form-head
    {
      width: 100%;
      /* background-color: blue;  */
      text-align: center;
      font-size: 50px;
    }
    #form
    {
      width: 80%;
    }
    #form div
    {
      margin: 0px 0px;
    }
    .login-email
    {
      font-size: 40px;
      font-weight: bolder;
    }
    .login-pass
    {
      font-size: 40px;
      font-weight: bolder;
    }
    .login-email input
    {
      margin-bottom: 5px;
      border-radius: 20px;
      color: white;
      background-color: rgb(22, 22, 22);
      padding: 10px 5px 5px 5px;
      transition: .3s;
    }
    .login-email input:focus
    {
      color:rgb(22, 22, 22) ;
      margin-bottom: 5px;
      border-radius: 20px;
      background-color: white;
      padding: 20px 20px 10px 10px;
    }

    .login-pass input
    {
      margin-bottom: 5px;
      border-radius: 20px;
      color: white;
      background-color: rgb(22, 22, 22);
      padding: 10px 5px 5px 5px;
      transition: .3s;
    }
    .login-pass input:focus
    {
      color:rgb(22, 22, 22) ;
      margin-bottom: 5px;
      border-radius: 20px;
      background-color: white;
      padding: 20px 20px 10px 10px;
    }
    .Loginas
    {
      font-size: 30px;
      font-weight: bold;
    }
    .Radio
    {
      
    }
    .radio-inputs
    {
      
      display:inline-flex;
      overflow: hidden;
      border-radius: 50px;
      box-shadow: 0 0 15px rgba(0, 0, 0, .2);
    }
    .radio-inputs input
    {
      display: none;
      /* margin: 10px; */

    }

    .radio_label
    {
      padding: 20px 20px;
      font-weight: bold;
      color: white;
      background-color: #ff981a;
      cursor: pointer;
      transition: 0.3s;
    }
    .radio_label:hover
    {
      padding: 20px 14px;
      font-weight: bold;
      /* color: black; */
      background-color: #ffc278;
      cursor: pointer;
      /* transition: 0.1s; */
    }
    .radio-inputs input:checked +.radio_label
    {
      color: black;
      background-color: white;

    }

    .submitbut
    {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .submitbut button
    {
      padding: 10px 35px;
      background-color: transparent;
      border: 2px solid black;
      border-radius: 40px;
      font-weight: 800;
      cursor: pointer;
      transition: .3s;
    }
    .submitbut button:hover
    {
      padding: 20px 45px;
      background-color: black;
      font-size: 15px;
      color: #ff981a;
      /* border: px solid #ff981a; */
      border-radius: 40px;

    }
    .sign-up
    {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      /* text-decoration: none; */
    }
    .sign-up a
    {
      list-style: none;
      text-decoration: none;
      padding: 5px 15px;
      border-radius: 50px;
      background-color: #ff981a;
      color: white;
      transition: .3s;
    }
    .sign-up a:hover
    {
      list-style: none;
      text-decoration: none;
      padding: 5px 15px;
      border-radius: 50px;
      background-color: #000;
      color: #ff981a;
    }
    

    </style>
</head>

<body>
  <div class="Login">
    <div class="left">
      <div class="logo">
        <img src="images/foodable logo 2.png" alt="" width="50%" height="50%">
      </div>
      <div class="heading">
        <h1>WELCOME AGAIN!</h1>
      </div>
      <h4 class="follow">Follow us here</h4>
      <div class="socialmedia">
        <br>
        <div class="images">
          <div class="inst">
            <a href="#">
            <img src="images/logo/instagram.png" alt="instagram" width="30px" height="30px">
            </a>
          </div>
          <div class="linkedin">
            <a href="">
            <img src="images/logo/linkedin.png" alt="instagram" width="30px" height="30px">
            </a>
          </div>
          <div class="twitter">
            <a href="">  
          <img src="images/logo/twitter.png" alt="instagram" width="30px" height="30px">
          </a>  
        </div>
        </div>
      </div>
    </div>
    <div class="right">
      <div class="form-area">
        <div class="innerform">
        <form method="post" id="form">
          
          <div class="form-head">
          <h2>Admin Login</h2>
          </div>
          <div class="login-email">
            <label for="email">Email:</label>
            <input type="text" id="email" placeholder="User Id " name="email" required />
          </div>
          <br>
          <div class="login-pass">
            <label for="password">Password:</label>
            <input type="password" id="password" placeholder="Enter password " name="password" required />
          </div>
          <br>
          <div class="Radio">
            <div class="Loginas">
            Login as:<br>
            </div>
            <div class="radio-inputs">
              <div class="radiocharity">
              <input type="Radio" value="CHARITY" name="user" id="charity" checked />
              <label class="radio_label" for="charity">CHARITY</label>
              </div>
              <div class="radiocontributor">
          <input type="Radio" value="User" name="user" id="User" selected/>
          <label class="radio_label" for="User">USER</label>
          </div>
            <div class="radiocontributor">
          <input type="Radio" value="CONTRIBUTOR" name="user" id="Contributor" selected/>
          <label class="radio_label" for="Contributor">CONTRIBUTOR</label>
          </div>
          </div>
          </div>
        </br>
        <div class="submitbut">
          <button type="submit" name="submit">
            LOGIN
          </button>
          </div>
          <br>
          <div class="sign-up">
            New user?
          <a href="SignUp.php">Sign up</a>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>