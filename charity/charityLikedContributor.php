<?php
session_start();
include '../connection.php';

$charity_id = $_SESSION['userid'];
$selectquery = "select * from contributor_master inner join charity_like on contributor_master.id=charity_like.contributor_id where charity_like.charity_id=$charity_id";
?>
<html>

<head>
    <link rel="stylesheet" href="css/navmenu.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/liked.css?v=<?php echo time(); ?>">
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
                <a href="charityProfilepage.php">
                    <img src="../upload_charity/<?php echo $_SESSION['image_src'] ?>" alt="PRofile photo" width="60px" height="60px" />
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

    <div class="table-responsive">
        <div class="tableinner">
            <?php

            $query = mysqli_query($connection, $selectquery);

            $nums = mysqli_num_rows($query);

            while ($res = mysqli_fetch_array($query)) {
                ?>
                <table  class="table1">
                    <tr class="mainrow" align="left">
                        <th>
                            <h1>
                            <?php echo $res['name'] ?>
                        </th>

                        <td align="right" rowspan="2" colspan="2">
                        <h3>
                        Was liked by you
                        </h3>
                        </td>
                    </tr>
                        <tr>
                            
                        <td  align="left">
                
                        <?php echo $res['email'] ?>
                        </td>

                    </tr>
                </table>
                <?php
            }
            ?>
        </div>
    </div>
</body>

</html>