<!DOCTYPE html>
<?php
include '../connection.php';
$selectquery = "select * from charity_master";
$query = mysqli_query($connection, $selectquery);

$grouparr = [];
while ($res = mysqli_fetch_array($query)) {
    $arr = [];
    $arr[] = $res['id'];
    $arr[] = $res['name'];
    $arr[] = $res['email'];
    $arr[] = $res['address'];
    $arr[] = $res['city'];
    $arr[] = $res['state'];
    $grouparr[] = $arr;
}

$selectquery1 = "SELECT charity_id,count(*)as count FROM charity_request_contributor group by charity_id order by charity_id;";
$query1 = mysqli_query($connection, $selectquery1);

while ($res = mysqli_fetch_array($query1)) {
    for ($i = 0; $i < count($grouparr); $i++) {
        if ($grouparr[$i][0] == $res['charity_id']) {
            $grouparr[$i][] = $res['count'];
            break;
        }
    }
}
for ($i = 0; $i < count($grouparr); $i++) {
    if (count($grouparr[$i]) == 6) {
        $grouparr[$i][] = 0;
    }
}
?>
<head>
       <link rel="stylesheet" href="contributordesign/style.css?v=<?php echo time(); ?>">
       <link rel="stylesheet" href="contributordesign/card.css?v=<?php echo time(); ?>">
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
                                   <li><a href="restaurantstatic.php">I dont know :/</a></li>
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
       <div class="charity">
              <h1>CHARITY</h1>
       </div>
    </div>
    <div class="cardsection">
    <div class="Cards">
      <?php
      for ($i = 0; $i < count($grouparr); $i++) {
          ?>
          <div class="card" id="card<?php echo $grouparr[$i][0]; ?>">
            <img src="https://via.placeholder.com/300" alt="Card Image" />
            <h3><?php echo $grouparr[$i][1]; ?></h3>
            <p><?php echo $grouparr[$i][3]; ?></p>
            <a href="#">Read More</a>
          </div>
          <?php
      }?>
      </div>
      </div>
    </body>
      </html>

