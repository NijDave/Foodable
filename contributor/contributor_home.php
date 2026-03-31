<?php
session_start();
?>
<html>

<head>
       <link rel="stylesheet" href="contributordesign/style.css?v=<?php echo time(); ?>">
       <link rel="stylesheet" href="contributordesign/file.css?v=<?php echo time(); ?>">
       <link rel="preconnect" href="https://fonts.googleapis.com" />
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
       <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Roboto+Condensed:wght@400;700&display=swap"
              rel="stylesheet" />
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
                                                 <img src="../images/restaurents/Pizza_Hut_logo.svg.png" alt="image"
                                                        class="foodimg">
                                          </td>
                                          <th align="left" class="name">
                                                 Pizza Hut
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
                                                 <img src="../images/restaurents/logo (2).png" alt="image"
                                                        class="foodimg">
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
                                                 <img src="../images/restaurents/36b1c18c8216d69cc54765790c1c2c65.jpg"
                                                        alt="image" class="foodimg">
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
                                                 <img src="../images/restaurents/Barbeque_Nation_New_Logo.jpg"
                                                        alt="image" class="foodimg">
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
                                                 <img src="../images/restaurents/download (9).png" alt="image"
                                                        class="foodimg">
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
                                                 <img src="../images/restaurents/download (10).png" alt="image"
                                                        class="foodimg">
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
                                                 <img src="../images/restaurents/download (11).png" alt="image"
                                                        class="foodimg">
                                          </td>
                                          <th align="left" class="name">
                                                 Jassi de parathe
                                          </th>
                                          <td align="center">
                                                 2.8k
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
                                                 <img src="../images/groceries/24seven.png" alt="image" class="foodimg">
                                          </td>
                                          <th align="left" class="name">
                                                 24 seven
                                          </th>
                                          <td align="center">
                                                 2.8k
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
                                                 <img src="../images/restaurent images/project file/new grocery store/Big Bazaar/logo.png"
                                                        alt="image" class="foodimg">
                                          </td>
                                          <th align="left" class="name">
                                                 Big bazaar
                                          </th>
                                          <td align="center">
                                                 4.5k
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
                                                 <img src="../images/groceries/D MArt.jpg" alt="image" class="foodimg">
                                          </td>
                                          <th align="left" class="name">
                                                 D-mart
                                          </th>
                                          <td align="center">
                                                 4.6k
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
                                                 <img src="../images/groceries/easyday.jpg" alt="image" class="foodimg">
                                          </td>
                                          <th align="left" class="name">
                                                 EasyDay
                                          </th>
                                          <td align="center">
                                                 3.6k
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
                                                 <img src="../images/groceries/foodworld.jpg" alt="image"
                                                        class="foodimg">
                                          </td>
                                          <th align="left" class="name">
                                                 Foodworld
                                          </th>
                                          <td align="center">
                                                 2.6k
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
                                                 <img src="../images/groceries/hypercity.jpg" alt="image"
                                                        class="foodimg">
                                          </td>
                                          <th align="left" class="name">
                                                 HyperCity
                                          </th>
                                          <td align="center">
                                                 5.2k
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
                                                 <img src="../images/groceries/jiomart_logo.png" alt="image"
                                                        class="foodimg">
                                          </td>
                                          <th align="left" class="name">
                                                 Jio Mart
                                          </th>
                                          <td align="center">
                                                 2.3k
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