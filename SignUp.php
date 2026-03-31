<!DOCTYPE html>
<?php
include 'connection.php';
if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $addr = $_POST["addr"];
    $password = $_POST["password"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $user = $_POST["user"];

    if ($user == "CHARITY") {
        $sql = "INSERT INTO charity_master(name,email,password,address,city,state) VALUES ('$name','$email','$password','$addr','$city','$state')";
        if (mysqli_query($connection, $sql)) {
            $id = $connection->insert_id;
            $query = "select * from users where usertype='charity' and user_type_id=$id ";
            $execute = mysqli_query($connection, $query);
            $row = mysqli_fetch_array($execute, MYSQLI_ASSOC);
            $no_rows = mysqli_num_rows($execute);

            if ($no_rows > 0) {
                header("Location:login.php");
                exit();
            } else {
                $ran_id = rand(time(), 100000000);
                $insert_query = "insert into users(unique_id, name, email,status,usertype,user_type_id) value($ran_id,'$name','$email','Active now','charity',$id)";
                mysqli_query($connection, $insert_query);
                header("Location:login.php");
                exit();
            }
        } else {
            echo "Error" . $sql . "<br>" . mysqli_error($conn);
        }
    } elseif ($user == "CONTRIBUTOR") {
        $sql = "INSERT INTO contributor_master(name,email,password,address,city,state) VALUES ('$name','$email','$password','$addr','$city','$state')";
        if (mysqli_query($connection, $sql)) {
            $id = $connection->insert_id;
            $query = "select * from users where usertype='contributor' and user_type_id=$id ";
            $execute = mysqli_query($connection, $query);
            $row = mysqli_fetch_array($execute, MYSQLI_ASSOC);
            $no_rows = mysqli_num_rows($execute);

            if ($no_rows > 0) {
                header("Location:login.php");
                exit();
            } else {
                $ran_id = rand(time(), 100000000);
                $insert_query = "insert into users(unique_id, name, email,status,usertype,user_type_id) value($ran_id,'$name','$email','Active now','contributor',$id)";
                mysqli_query($connection, $insert_query);
                header("Location:login.php");
                exit();
            }
        } else {
            echo "Error" . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        $sql = "INSERT INTO public_master(name,email,password,address,city,state) VALUES ('$name','$email','$password','$addr','$city','$state')";
        if (mysqli_query($connection, $sql)) {
            header("Location:login.php");
            exit();
        } else {
            echo "Error" . $sql . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
}
?>
<html>

<head>
    <title>Sign in</title>
    <!-- <link rel="stylesheet" href="/Css/Login.css" /> -->
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

        .follow {
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .right {
            width: 80%;
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
            align-items: center;
            justify-content: center;
        }

        .images div {
            margin: 0px 20px;
        }

        .form-area {
            background-color: white;
            width: 85%;
            height: 80%;
            border-radius: 50px;
        }

        .innerform {
            width: 100%;
            height: 80%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-head {
            width: 100%;
            /* background-color: blue;  */
            text-align: center;
            font-size: 50px;
        }

        #form {
            width: 80%;
        }

        #form div {
            margin: 2px 0px;
        }
        #form div input
        {
            margin-bottom: 5px;
            border-radius: 20px;
            color: white;
            background-color: rgb(22, 22, 22);
            padding: 10px 30px 5px 5px;
            transition: .3s;
        }
        #form div input:focus
        {
            color: rgb(22, 22, 22);
            margin-bottom: 5px;
            border-radius: 20px;
            background-color: white;
            padding: 20px 20px 10px 10px;
        }

        #form div label {
            font-size: 20px;
            font-weight: bolder;
        }


        .registeras {
            font-size: 30px;
            font-weight: bold;
        }

        .Radio {}

        .radio-inputs {

            display: inline-flex;
            overflow: hidden;
            border-radius: 50px;
            box-shadow: 0 0 15px rgba(0, 0, 0, .2);
        }

        .radio-inputs input {
            display: none;
            /* margin: 10px; */

        }

        .radio_label {
            padding: 20px 20px;
            font-weight: bold;
            color: white;
            background-color: #ff981a;
            cursor: pointer;
            transition: 0.3s;
        }

        .radio_label:hover {
            padding: 20px 20px;
            font-weight: bold;
            /* color: black; */
            background-color: #ffc278;
            cursor: pointer;
            /* transition: 0.1s; */
        }

        .radio-inputs input:checked+.radio_label {
            color: black;
            background-color: white;

        }

            {}

        .submitbut {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .submitbut button {
            padding: 10px 50px;
            background-color: transparent;
            border: 2px solid black;
            border-radius: 40px;
            font-weight: 800;
            cursor: pointer;
            transition: .3s;
        }

        .submitbut button:hover {
            padding: 15px 65px;
            background-color: black;
            font-size: 15px;
            color: #ff981a;
            /* border: px solid #ff981a; */
            border-radius: 40px;

        }

        .orLogin {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            /* text-decoration: none; */
        }

        .orLogin a {
            list-style: none;
            text-decoration: none;
            padding: 5px 15px;
            border-radius: 50px;
            background-color: #ff981a;
            color: white;
            transition: .3s;
        }

        .orLogin a:hover {
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
                <h2>Welcome to Foodable</h2>
            </div>
            <h4 class="follow">Follow us here</h4>

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
        <div class="right">
            <div class="form-area">
                <div class="innerform">
                    <form method="POST" action="" id="form">
                        <div class="form-head">
                            <h2>Signup</h2>
                        </div>
                        <div class="sign-name">
                            <label for="name">Name:</label>
                            <input type="text" name="name" placeholder="NAme" id="name" required><br>
                        </div>
                        <div class="Sign-email">
                            <label for="email">Email:</label>
                            <input type="email" name="email" placeholder="Email" id="email" required><br>
                        </div>
                        <div class="sign-password">
                            <label for="password">Password:</label>
                            <input type="password" name="password" placeholder="Enter password" id="password" required><br>
                        </div>
                        <div class="address">
                            <label for="Address">Address:</label>
                            <input type="text" name="addr" placeholder="Address" id="Address" required><br>
                        </div>
                        <div class="city">
                            <label for="City">City:</label>
                            <input type="text" name="city" placeholder="City" id="City" required><br>
                        </div>
                        <div class="state">
                            <label for="State">State:</label>
                            <input type="text" name="state" placeholder="State" id="State" required><br>
                        </div>
                        <div class="Radio">
                            <div class="registeras">
                                Register as<br>
                            </div>
                            <div class="radio-inputs">
                                <div class="radiocharity">
                                    <input type="Radio" value="CHARITY" name="user" id="charity" />
                                    <label class="radio_label" for="charity">CHARITY</label>
                                </div>

                                <div class="radiocontributor">
                                    <input type="Radio" value="public" name="user" id="User" />
                                    <label class="radio_label" for="User">USER</label>
                                </div>

                                <div class="radiocontributor">
                                    <input type="Radio" value="CONTRIBUTOR" name="user" id="Contributor" />
                                    <label class="radio_label" for="Contributor">CONTRIBUTOR</label>
                                </div>
                            </div>
                        </div>
                        <div class="submitbut">
                            
                            <button type="submit" name="submit">
                                Sign up
                            </button>
    </div>
                            <div class="orLogin">
                                Already a user?
                                <a href="login.php">Login </a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>