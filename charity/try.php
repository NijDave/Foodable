<!DOCTYPE html>
<?php
include '../connection.php';
$selectquery = "select * from contributor_master";
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

$selectquery1 = "SELECT contributor_id,count(*)as count FROM charity_like group by contributor_id order by contributor_id;";
$query1 = mysqli_query($connection, $selectquery1);

while ($res = mysqli_fetch_array($query1)) {
  for ($i = 0; $i < count($grouparr); $i++) {
    if ($grouparr[$i][0] == $res['contributor_id']) {
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
<html>

<head>
  <title>viewcontributor</title>
  <link rel="stylesheet" href="css/cards.css?v=<?php echo time(); ?>" />
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
          <li><a href="grocerystatic.php">Groceries</a></li>
          <li><a href="restaurantstatic.php">Restaurants</a></li>
        </ul>
      </div>
    </div>
    <div class="right">
      <div class="Profilephoto">
        <a href="charityProfilepage.php">
          <img src="../upload_charity/<?php echo $img ?>" alt="PRofile photo" width="60px" height="60px" />
        </a>
      </div>
    </div>
  </div>
  <div class="Cards-area">
    <?php
    for ($i = 0; $i < count($grouparr); $i++) {
      ?>

      <div class="card" id="card<?php echo $grouparr[$i][0]; ?>">
        <img src="https://via.placeholder.com/300" alt="Card Image" />
        <div class="bottom-area">

          <div class="aboutsub">
          <h3 id="card-head">
            <?php echo $grouparr[$i][1]; ?>
          </h3>
          <p id="card-body">
            <?php echo $grouparr[$i][3]; ?>
          </p>
          </div>
          <div class="like">
          <button id="like<?php echo $grouparr[$i][0]; ?>">
          <a href="likePage.php?contibutor_id=<?php echo  $grouparr[$i][0];?>">
            <img src="../images/like buttons/heart.png" alt="" />
            like
          </button>
          </div>
        </div>
        <div class="readme">
          <a href="#">Read More</a>
          </div>
      </div>
      <?php
    } ?>

  </div>
</body>

</html>