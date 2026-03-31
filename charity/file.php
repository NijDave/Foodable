<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/givereq.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/file.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Roboto+Condensed:wght@400;700&display=swap"
        rel="stylesheet" />
    <title>master-blaster</title>
</head>

<body>

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
                        <img src="../upload_charity/<?php echo $img ?>" alt="PRofile photo" width="60px"
                            height="60px" />
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

        <div class="videoarea">
            <div class="video-section">
                <video autoplay muted loop>
                    <source src="../videos/foodydoody.mp4" type="video/mp4" />
                </video>
            </div>
        </div>
        <div class="tops">
            <div class="topdonation">
                <h1>Top donators</h1>
            </div>
            <div class="tables">
                <div class="left-table">
                <table>
                    <thead>
                        <th colspan="3" align="left">
                            Restaurants
                        </th>
                        <th>
                            meals
                        </th>
                        <th>
                            Likes
                        </th>
                    </thead>
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            <img src="../images/images for static table/rest1.jpg" alt="image" class="foodimg">
                        </td>
                        <th align="left" class="name">
                            Mahavir pavbhaji
                        </th>
                        <td align="center">
                            3.5k
                        </td>
                        <td align="center">
                            200
                        </td>
                    </tr>
                    <tr>
                        <td>
                            2
                        </td>
                        <td>
                            <img src="../images/images for static table/rest2.png" alt="image" class="foodimg">
                        </td>
                        <th align="left" class="name">
                            22nd parallel
                        </th>
                        <td align="center">
                            4.8k
                        </td>
                        <td align="center">
                            358
                        </td>
                    </tr>
                    <tr>
                        <td>
                            3
                        </td>
                        <td>
                            <img src="../images/images for static table/rest3.png" alt="image" class="foodimg">
                        </td>
                        <th align="left" class="name">
                            Barbeque Nation
                        </th>
                        <td align="center">
                            2.6k
                        </td>
                        <td align="center">
                            576
                        </td>
                    </tr>
                    <tr>
                        <td>
                            4
                        </td>
                        <td>
                            <img src="../images/images for static table/rest4.png" alt="image" class="foodimg">
                        </td>
                        <th align="left" class="name">
                            Bayleaf
                        </th>
                        <td align="center">
                            3.2k
                        </td>
                        <td align="center">
                            632
                        </td>
                    </tr>
                    <tr>
                        <td>
                            5
                        </td>
                        <td>
                            <img src="../images/images for static table/rest5.png" alt="image" class="foodimg">
                        </td>
                        <th align="left" class="name">
                            Havmore
                        </th>
                        <td align="center">
                            6.2k
                        </td>
                        <td align="center">
                            921
                        </td>
                    </tr>
                    <tr>
                        <td>
                            6
                        </td>
                        <td>
                            <img src="../images/images for static table/rest6.png" alt="image" class="foodimg">
                        </td>
                        <th align="left" class="name">
                            Infi pizzeria
                        </th>
                        <td align="center">
                            5.2k
                        </td>
                        <td align="center">
                            850
                        </td>
                    </tr>
                    <tr>
                        <td>
                            7
                        </td>
                        <td>
                            <img src="../images/images for static table/rest7.png" alt="image" class="foodimg">
                        </td>
                        <th align="left" class="name">
                            Jassi de parathe
                        </th>
                        <td align="center">
                            202
                        </td>
                        <td align="center">
                            1020
                        </td>
                    </tr>

                </table>
                </div>

                <div class="right-table">
                <table>
                    <thead>
                        <th colspan="3" align="left">
                            Groceries
                        </th>
                        <th>
                            products
                        </th>
                        <th>
                            Likes
                        </th>
                    </thead>
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            <img src="../images/images for static table/rest1.jpg" alt="image" class="foodimg">
                        </td>
                        <th align="left" class="name">
                            24 seven
                        </th>
                        <td align="center">
                            268
                        </td>
                        <td align="center">
                            923
                        </td>
                    </tr>
                    <tr>
                        <td>
                            2
                        </td>
                        <td>
                            <img src="../images/images for static table/rest2.png" alt="image" class="foodimg">
                        </td>
                        <th align="left" class="name">
                            Big bazaar
                        </th>
                        <td align="center">
                            482
                        </td>
                        <td align="center">
                            150
                        </td>
                    </tr>
                    <tr>
                        <td>
                            3
                        </td>
                        <td>
                            <img src="../images/images for static table/rest3.png" alt="image" class="foodimg">
                        </td>
                        <th align="left" class="name">
                            D-mart
                        </th>
                        <td align="center">
                            462
                        </td>
                        <td align="center">
                            576
                        </td>
                    </tr>
                    <tr>
                        <td>
                            4
                        </td>
                        <td>
                            <img src="../images/images for static table/rest4.png" alt="image" class="foodimg">
                        </td>
                        <th align="left" class="name">
                            EasyDay
                        </th>
                        <td align="center">
                            367
                        </td>
                        <td align="center">
                            365
                        </td>
                    </tr>
                    <tr>
                        <td>
                            5
                        </td>
                        <td>
                            <img src="../images/images for static table/rest5.png" alt="image" class="foodimg">
                        </td>
                        <th align="left" class="name">
                            Foodworld
                        </th>
                        <td align="center">
                            268
                        </td>
                        <td align="center">
                            467
                        </td>
                    </tr>
                    <tr>
                        <td>
                            6
                        </td>
                        <td>
                            <img src="../images/images for static table/rest6.png" alt="image" class="foodimg">
                        </td>
                        <th align="left" class="name">
                            HyperCity
                        </th>
                        <td align="center">
                            520
                        </td>
                        <td align="center">
                            394
                        </td>
                    </tr>
                    <tr>
                        <td>
                            7
                        </td>
                        <td>
                            <img src="../images/images for static table/rest7.png" alt="image" class="foodimg">
                        </td>
                        <th align="left" class="name">
                            Jio Mart
                        </th>
                        <td align="center">
                            230
                        </td>
                        <td align="center">
                            500
                        </td>
                    </tr>

                </table>
                </div>
            </div>
        </div>
    </body>

</html>