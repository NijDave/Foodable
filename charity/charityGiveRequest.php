<!DOCTYPE html>
<?php
session_start();
?>
<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Roboto+Condensed:wght@400;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="css/givereq.css?v=<?php echo time(); ?>">
</head>

<body>
    <!-- <h1>DATA BASE DETAILS</h1> -->
    <div class="navbar">
        <div class="left">
            <div class="Logo">
                <a href="charity_home.php">
                    <img src="../images/foodable logo 2.png" width="" alt="logo" />
                </a>
            </div>
            <div class="navoptions">
                <ul>
                    <li><a href="charity_home.php">Dashboard</a></li>
                    <li><a href="grocerystatic.php">Groceries</a></li>
                    <li><a href="restaurantstatic.php">Restaurants</a></li>
                </ul>
            </div>
        </div>
        <div class="right">
            <div class="Profilephoto">
                <a href="charityProfile">
                    <img src="../upload_charity/<?php echo $_SESSION['image_src'] ?> " width="60px" height="60px" srcset="">
                </a>
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
    <div class="cards">
        <div class="table-responsive">
            <?php
            include '../connection.php';
            $selectquery = "select * from contributor_master";
            $query = mysqli_query($connection, $selectquery);
            $nums = mysqli_num_rows($query);
            while ($res = mysqli_fetch_array($query)) {
                ?>
                <table>
                    <tr>
                        <td>
                            <img class="impimg" src="../ProfileImages/user.png" alt="" width="80px">
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <?php echo $res['name'] ?>
                        </td>
                        <td rowspan="4" align="right">
                            <a href="request.php?contributor_id=<?php echo $res['id']; ?>"><button
                                    id="Request">Request</button></a>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <span=class="email-style">
                                <?php echo $res['address'] ?></span>
                        </td>
                    </tr>

                    <br>
                </table>
                <?php
            }
            ?>
        </div>
    </div>

</body>

</html>