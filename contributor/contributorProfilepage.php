<!DOCTYPE html>
<?php
session_start();
include '../connection.php';
$contributor_id = $_SESSION['userid'];
$select_query = "select * from contributor_master where id=$contributor_id";
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
$select_query2 = "select count(*)as count from charity_like where contributor_id=$contributor_id";
$exe_query2 = mysqli_query($connection, $select_query2);

$nums = mysqli_num_rows($exe_query2);

while ($res = mysqli_fetch_array($exe_query2)) {
    $noLikes = $res['count'];
}
if (isset($_POST['update_details'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $addr = $_POST["addr"];
    $password = $_POST["password"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $filename = $_FILES['image']['name'];
    // Select file type
    $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    // valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    // Upload files and store in database
    if (move_uploaded_file($_FILES["image"]["tmp_name"], '../upload_contributor/' . $filename)) {

        $sql = "update contributor_master set name='$name',email='$email',password='$password',city='$city',state='$state',photo_name='$filename' where id=$contributor_id";
        if (mysqli_query($connection, $sql)) {
            header("Location:contributorProfilepage.php");
            exit();
        } else {
            echo "Error" . $sql . "<br>" . mysqli_error($connection);
        }
    }

    mysqli_close($connection);
}
?>
<html>

<head>
    <title>
        <?php echo $user_name; ?>`s profile
    </title>
    <link rel="stylesheet" href="contributordesign/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="contributordesign/profile.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="navbar">
        <div class="left">
            <div class="Logo">
                <img src="../images/foodable logo 2.png" alt="logo" class="foodablelogo" />
            </div>
            <div class="navoptions">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="CharityStatic.php">Charity</a></li>
                </ul>
            </div>
        </div>
        <div class="right">
            <div class="Profilephoto">
                <img src="../upload_contributor/<?php echo $user_img ?>"  alt="PRofile photo" width="60px"
                    height="60px">
            </div>
        </div>
    </div>
    <div class="sidenav" id="mySidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a><br />
        <a href="viewcharity.php"><input type="button" value="Charity Details" /></a>
        <a href="contributorPendingRequest.php"><input type="button" value="Pending Request" /></a>
        <a href="contributorAcceptedRequest.php"><input type="button" value="Accepted Request" /></a>
        <a href="contributorProfilePage.php"><input type="button" value="Profile Page" /></a>
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
    <div class="profilearea">
        <form method="POST" action="" enctype='multipart/form-data'>
            <div class="imagearea">
                <div class="imagetable">
                    <table>
                        <tr>
                            <td align="center">
                                <img src="../upload_contributor/<?php echo $user_img ?>" id="profileimage" />
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <label for="photo" id="uploadbutton">Upload your Photo<label>
                                        <input type="file" name="image" id="photo" required><br>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <div class="likearea">
                                    <div class="likesection">
                                        <label for="nolike">Likes Given :=</label>
                                        <a href="viewWhoGivesLikes.php" id="nolike">
                                            <?php echo $noLikes; ?>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="formarea">
                <div class="forminner">
                <table>
                    <tr>
                        <td>
                            <label for="name">Name:</label>
                        </td>
                        <td align="center">
                            <input class="inputname" type="text" name="name" id="name" value="<?php echo $user_name; ?>" required><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email:</label>
                        </td>
                        <td align="center">
                            <input class="inputname" type="email" name="email" id="email" value="<?php echo $user_email; ?>" required><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="password">Password:</label>
                        </td>
                        <td align="center">
                            <input class="inputname" type="text" name="password" id="password" value="<?php echo $user_password; ?>" required><br>
                        </td>
                    </tr>
                    <tr>
                        <td>

                            <label for="Address">Address:</label>
                        </td>
                        <td align="center">
                            <input class="inputname" type="text" name="addr" id="Address" value="<?php echo $user_address; ?>" required><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="City">City:</label>
                        </td>
                        <td align="center">
                            <input class="inputname" type="text" name="city" id="City" value="<?php echo $user_city; ?>" required><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="State">State:</label>
                        </td>
                        <td align="center">
                            <input class="inputname" type="text" name="state" id="State" value="<?php echo $user_state; ?>" required><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" id="submitcol" align="center" border="2">
                            <input id="submit" type="submit" name="update_details" value="Update Details" />
                        </td>
                    </tr>
                </table>
                </div>
            </div>
        </form>
    </div>
</body>

</html>