<!DOCTYPE html>
<?php
session_start();
include '../connection.php';
$charity_id = $_SESSION['userid'];
$select_query = "select * from charity_master where id=$charity_id";
$exe_query = mysqli_query($connection, $select_query);

$nums = mysqli_num_rows($exe_query);

while ($res = mysqli_fetch_array($exe_query)) {
    $user_name = $res['name'];
    $user_email = $res['email'];
    $user_password = $res['password'];
    $user_address = $res['address'];
    $user_city = $res['city'];
    $user_state = $res['state'];
    $user_img = $res['photo_name'];
}
$_SESSION['image_src']=$user_img;
if (isset($_POST['update_details'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $addr = $_POST["addr"];
    $password = $_POST["password"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $filename = $_FILES['image']['name'];
    $_SESSION = $filename;

    // Select file type
    $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    // valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");
    if (in_array($imageFileType, $extensions_arr)) {

        // Upload files and store in database
        if (move_uploaded_file($_FILES["image"]["tmp_name"], '../upload_charity/' . $filename)) {

            $sql = "update charity_master set name='$name',email='$email',password='$password',city='$city',state='$state',photo_name='$filename' where id=$charity_id";
            if (mysqli_query($connection, $sql)) {
                $img = $filename;
                header("Location:charityProfilepage.php");
                exit();
            } else {
                echo "Error" . $sql . "<br>" . mysqli_error($connection);
            }
        }
    }
    mysqli_close($connection);
}
?>
<html>

<head>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Roboto+Condensed:wght@400;700&display=swap"
        rel="stylesheet" />
    <style>
        body {
            background-color: white;
        }
    </style>
</head>

<body>
    <div class="navbar">

        <div class="left">
            <div class="Logo">
                <img src="../images/foodable logo 2.png" alt="logo" class="foodablelogo" />
            </div>
            <div class="navoptions">
                <ul>
                    <li><a href="charity_home.php">Home</a></li>
                    <li><a href="grocerystatic.php">Groceries</a></li>
                    <li><a href="restaurantstatic.php">Restaurants</a></li>
                </ul>
            </div>
        </div>
        <div class="right">
            <div class="Profilephoto">
                <!-- <img src="../images/blank-profile-picture-973460__340.png" alt="PRofile photo" width="60px" height="60px"> -->
                <img src="../upload_charity/<?php echo $user_img ?>" alt="PRofile photo" width="60px" height="60px" />
            </div>
        </div>
    </div>
    <div class="sidenav" id="mySidenav">

        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a><br />
        <div class="sidemenu-opts">
            <a href="viewcontributor.php"><input type="button" value="Contributor Details" /></a>
            <a href="charityGiveRequest.php"><input type="button" value="Give Request" /></a>
            <a href="charityPendingRequest.php"><input type="button" value="Pending Request" /></a>
            <a href="charityAcceptedRequest.php"><input type="button" value="Accepted Request" /></a>
            <a href="charityProfilePage.php"><input type="button" value="Profile Page" /></a>
            <a href="charityLikedContributor.php"><input type="button" value="Likes" /></a>
            <a href="../logout.php"><input type="button" value="Log Out" /></a>
        </div>
    </div>
    <div class="menubar">
        <span onclick="openNav()" id="menu">Menu</span>
    </div>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "220px";
        }

        /* Set the width of the side navigation to 0 */
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    <div class="profilesection">
        <div class="profilearea">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="imagearea">
                    <table>
                        <tr>
                            <td align="center">
                                <img src="../upload_charity/<?php echo $user_img ?>" id="impimg" />
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <label for="photo" id="chgphoto">Change photo</label>
                                <input type="file" name="image" id="photo" required>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="namearea">
                    <div class="namearea-inner">
                        <table>
                            <tr>
                                <td>
                                    <label for="name">Name:</label>

                                </td>
                                <td align ="center">
                                    <input class="input" type="text" id="name" name="name" value="<?php echo $user_name; ?>"
                                        required><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="email">Email:</label>
                                </td>
                                    <td align ="center">
                                        
                                    <input class="input" type="email" id="email" name="email" value="<?php echo $user_email; ?>"
                                        required><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="Address">Address:</label>
                                </td>
                                    <td align ="center">
                                        
                                    <input class="input" type="text" id="Address" name="addr" value="<?php echo $user_address; ?>"
                                        required><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="City">City:</label>
                                </td>
                                    <td align ="center">
                                        
                                    <input class="input" type="text" id="City" name="city" value="<?php echo $user_city; ?>"
                                        required><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="State">State:</label>
                                </td>
                                <td align ="center">

                                    <input class="input" type="text" id="State" name="state" value="<?php echo $user_state; ?>"
                                        required><br>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center" id="submitcol">
                                    <input type="submit" name="update_details" value="Update Details" id="submit" />
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>