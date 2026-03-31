<?php
session_start();
?>
<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="contributordesign/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="contributordesign/accreq.css?v=<?php echo time(); ?>">
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
                <img src="../upload_contributor/<?php echo $_SESSION['image_src'] ?>" alt="PRofile photo" width="60px"
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

    <div class="table-responsive">
        <?php
        include "../connection.php";
        $contributor_id = $_SESSION['userid'];
        $selectquery = "select * from charity_master inner join charity_request_contributor on charity_master.id=charity_request_contributor.charity_id where charity_request_contributor.request_status=1 and charity_request_contributor.contributor_id=$contributor_id";

        $query = mysqli_query($connection, $selectquery);

        $nums = mysqli_num_rows($query);

        while ($res = mysqli_fetch_array($query)) {
            ?>
            <div class="cards">
                <table>
                    <tr>
                        <th align="left" id="name">
                            <?php echo $res['name'] ?>
                        </th>
                        <td rowspan="4" align="right" id="chat">
                            <a href="startChatprocess.php?charity_id=<?php echo $res['id'] ?>">chat</a>
                        </td>
                    </tr>
                    <tr>

                        <td>
                            <?php echo $res['email'] ?>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <?php echo $res['city'] ?>
                            <?php echo $res['state'] ?>
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