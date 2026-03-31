<!DOCTYPE html>
<?php
include '../connection.php';
$selectquery = "select * from contributor_master";
#$selectquery="SELECT contributor_master.id,contributor_master.name,contributor_master.address,contributor_master.email,contributor_master.password,count(*) as rowcount from contributor_master INNER JOIN charity_like on contributor_master.id=charity_like.contributor_id where contributor_master.id=4";
$query = mysqli_query($connection, $selectquery);

$nums = mysqli_num_rows($query);
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

$nums = mysqli_num_rows($query1);
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
    <title>Restaurant Static</title>
    <link rel="stylesheet" href="css/givereq.css">
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
        body
        {
            background-color: white;
        }
        .navbar {
            color: white;

            display: flex;
            width: 100%;
            height: 70px;
            background-color: rgb(20, 20, 20);
        }

        .left {
            display: flex;
            width: 50%;
        }

        .Logo {
            width: 15%;
            display: flex;
            align-items: center;
            justify-content: center;

        }
        .Logo img
        {
            width:60px;
            height:60px;
            border-radius: 50%;
        }

        .navoptions {
            width: 85%;
            height: 100%;
            /* background-color: aqua; */
        }

        .navoptions ul {
            display: flex;
            align-items: left;
            /* justify-content: center; */
        }

        .navoptions ul li {
            padding: 20px;
            padding-top: 25px;
            text-decoration: none;
            list-style: none;
            color: black;
            transition: .4s;
        }

        .navoptions ul li:hover {
            padding: 30px;
            padding-top: 25px;
            text-decoration: none;
            list-style: none;
            color: black;
            border-radius: 5px;
            background-color: #ff981a;
        }

        .navoptions ul li a {
            color: white;
            list-style: none;
            text-decoration: none;
        }

        .right {
            display: flex;
            align-items: right;
            justify-content: right;
            width: 50%;
        }

        .Profilephoto {

            width: 30%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-table {
            /* border: 1px solid #000; */
            width: 40%;
            text-align: center;

        }

        .card-table tbody tr td {
            color: #000;
            font-size: 40px;
            transition: .3s;
            cursor: pointer;
            border-radius: 40px;
        }

        .card-table tbody tr td:hover {
            color: #ff981a;
            padding: 10px;
            border-radius: 40px;
            background-color: black;
            box-shadow: 0 0 20px rgba(0, 0, 0 .2);
        }

        .container {
            width: 1400px;
            height: 300vh;
            max-width: 100%;
            margin: 0 auto;
        }

        .row {
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            margin-top: 60px;
        }

        .card {
            width: 420px;
            border: 1px solid #ddd;
            border-radius: 5px;
            /* padding: 0px 10px 0px 0px; */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: .3s;

        }
        .card:hover {
            width: 420px;
            border: 10px solid #ff981a;
            border-radius: 5px;
            /* padding: 0px 10px 0px 0px; */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;

        }

        .card img {
            width: 350px;
            margin-top: 10px;
            /* align-self: center; */
            height: auto;
            border-radius: 5px;

        }

        .card h3 {
            margin: 5px 0;
            text-align: center;
        }

        .card p {
            color: #777;
            text-align: left;
            padding: 5px;

        }

        .lowersection {
            text-align: center;
            width: 100%;
            margin: 10px 0px 0px 0px;
            /* background-color: gray; */
            border-radius: 0px 0px 5px 5px;
            display: flex;
            align-items: center;
            justify-content: space-between;

        }

        .readmore {
            width: 50%;
            margin: 0;
            padding: 10px 0px;
            /* background-color: yellowgreen; */
            /* text-align: left; */
            transition: .3s;

        }

        .readmore:hover {
            background-color: #ff981a;
            width: 50%;
            border-radius: 0px 0px 0px 5px;
            padding: 10px 0px;
        }

        .btn-readmore {
            width: 50%;
            margin: 0;
            padding: 10px 0px;
            text-decoration: none;
            color: black;
            transition: .3s;

            /* text-align: left; */
        }

        .btn-readmore:hover {
            width: 50%;
            margin: 0;
            padding: 10px 0px;
            text-decoration: none;
            color: black;
            transition: .3s;

            /* text-align: left; */
        }

        #more {
            display: none;
        }

        .like {
            /* background-color: aqua; */
            width: 50%;
            padding: 10px 0px;
            transition: .3s;

                }

        .like:hover {
            background-color: #ff981a;
            width: 50%;
            padding: 10px 0px;
            background: linear-gradient(to bottom, transparent 50%,#ff0066 50%);
            background-size: 100% 200%;
            background-position: bottom;
            font-size: 25px;
        }

        .btn-like {
            color: black;
            text-decoration: none;
            transition: .1s;

        }

        .btn-like:hover {
            color: white;
        }
        #badiimage
        {
              transform: rotate(-90deg);
        }
    </style>
</head>

<body>
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
                    <li><a href="#">Restaurants</a></li>
                </ul>
            </div>
        </div>
        <div class="right">
            <div class="Profilephoto">
                <a href="charityProfile">
                <img src="../images/user (1).png" alt="PRofile photo" srcset="">
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
   
    <br>
    <div class="container">
        <!-- card row starts -->
        <div class="row">
            <!-- card starts  -->
            <div class="card">
                <img src="../images/restaurent images/project file/restaurants/22nd parallel/Screenshot 2023-04-07 140038.png" alt="Card Image">
                <h3>22nd parallel</h3>
                <p>22nd Parallel (22.17°) is the latitude that embraces the city of Vadodara on its journey across the globe. When we embarked on our journey with a vision to provide a great south Indian dining experience, Vadodara was chosen as the first destination to set up our dream project.</p>
                <div class="lowersection">
                    <div class="readmore">
                        <a href="#" onclick="myFunction()" id="myBtn" class="btn-readmore">Read More</a>
                    </div>
                    <div class="like">
                        <a href="#" class="btn-like">LIKE</a>
                    </div>
                </div>
            </div>
            <!-- card ends -->
            <!-- card starts  -->
            <div class="card">
                <img src="../images/restaurent images/project file/restaurants/Barbeque Nation/Screenshot 2023-04-07 144726.png" alt="Card Image">
                <h3>Barbeque Nation</h3>
                <p>One of the leading casual dining chains in India, Barbeque Nation pioneered the concept of “over the table barbeque” live grills embedded in dining tables – allowing guests to grill their own barbecue’s right at their tables. Barbeque Nation was founded in 2006 with the concept of 'all you can eat'. We currently own and operate around 200 outlets in India, 4 outlets in UAE, 1 outlet in Malaysia and 1 outlet in Oman.

</p>
                <div class="lowersection">
                    <div class="readmore">
                        <a href="#" onclick="myFunction()" id="myBtn" class="btn-readmore">Read More</a>
                    </div>
                    <div class="like">
                        <a href="#" class="btn-like">LIKE</a>
                    </div>
                </div>
            </div>
            <!-- card ends -->
                      <!-- card starts  -->
                      <div class="card">
                <img src="../images/restaurent images/project file/restaurants/Bayleaf/Screenshot 2023-04-07 141135.png" alt="Card Image">
                <h3>Bayleaf</h3>
                <p>18, 19, Dr Rustom Cama Marg, Alkapuri Society, Alkapuri, Vadodara, Gujarat 390007</p>
                <div class="lowersection">
                    <div class="readmore">
                        <a href="#" onclick="myFunction()" id="myBtn" class="btn-readmore">Read More</a>
                    </div>
                    <div class="like">
                        <a href="#" class="btn-like">LIKE</a>
                    </div>
                </div>
            </div>
                <!-- card ends -->


        </div>
        <!-- card row ends -->
                <!-- card row starts -->
                <div class="row">
            <!-- card starts  -->
            <div class="card">
                <img src="../images/restaurent images/project file/restaurants/Fiorella Italian Restaurant/Screenshot 2023-04-07 142124.png" alt="Card Image">
                <h3>Fiorella Italian Restaurant</h3>
                <p>Breezy, stylish Italian eatery whipping up pastas and wood-fired pizzas within a hotel.</p>
                <div class="lowersection">
                    <div class="readmore">
                        <a href="#" onclick="myFunction()" id="myBtn" class="btn-readmore">Read More</a>
                    </div>
                    <div class="like">
                        <a href="#" class="btn-like">LIKE</a>
                    </div>
                </div>
            </div>
            <!-- card ends -->
            <!-- card starts  -->
            <div class="card">
                <img src="../images/restaurent images/project file/restaurants/Havmore/Screenshot 2023-04-07 153114.png" alt="Card Image">
                <h3>Havmor</h3>
                <p>Back in 1944, Shri Satish Chona began the journey of sharing his family's brand of wholesome goodness throughout Ahmedabad. As this small idea grew, Havmor won over millions of fans with its unique taste, quality and original ice-cream flavours. At the same time, our iconic Chana Puri made first-time visitors of our restaurants into loyal regulars. Infusing the taste of nostalgia in a well-guarded recipe, we became a 'home away from home'.</p>
                <div class="lowersection">
                    <div class="readmore">
                        <a href="#" onclick="myFunction()" id="myBtn" class="btn-readmore">Read More</a>
                    </div>
                    <div class="like">
                        <a href="#" class="btn-like">LIKE</a>
                    </div>
                </div>
            </div>
            <!-- card ends -->
                      <!-- card starts  -->
                      <div class="card">
                <img src="../images/restaurent images/project file/restaurants/Jassi De Parathe/Screenshot 2023-04-07 151420.png" alt="Card Image">
                <h3>Jassi de parathe</h3>
                <p>Achieving success over-night is a myth and hence we have had gone through a lot to create the recipe for success in order to establish Jassi as ‘The Jassi De Parathe’.
Jassi De Parathe has established itself as the authentic Punjabi food restaurant in Ahmedabad. Our commitment to provide home cooked style food made under the supervision of the family has ensured growing food lovers.</p>
                <div class="lowersection">
                    <div class="readmore">
                        <a href="#" onclick="myFunction()" id="myBtn" class="btn-readmore">Read More</a>
                    </div>
                    <div class="like">
                        <a href="#" class="btn-like">LIKE</a>
                    </div>
                </div>
            </div>
                <!-- card ends -->

        </div>
        <!-- card row ends -->
                        <!-- card row starts -->
                        <div class="row">
            <!-- card starts  -->
            <div class="card">
                <img src="../images/restaurent images/project file/restaurants/Kabir's Kitchen & Cafe/Screenshot 2023-04-07 143008.png" alt="Card Image">
                <h3>Kabir`s Kitchen & Cafe</h3>
                <p>Kabir's Gallery, R.C Dutt Road Alkapuri, Opposite Concord Building, Vadodara 390005 India</p>
                <div class="lowersection">
                    <div class="readmore">
                        <a href="#" onclick="myFunction()" id="myBtn" class="btn-readmore">Read More</a>
                    </div>
                    <div class="like">
                        <a href="#" class="btn-like">LIKE</a>
                    </div>
                </div>
            </div>
            <!-- card ends -->
            <!-- card starts  -->
            <div class="card">
                <img src="../images/restaurent images/project file/restaurants/WelcomCafe Cambay/Screenshot 2023-04-07 150119.png"  id="badiimage" alt="Card Image" style=" width: 50%">
                <h3>WelcomCafe Cambay</h3>
                <p>RC Dutt Rd, Aradhana Society, Vishwas Colony, Alkapuri, Vadodara, Gujarat 390007</p>
                <div class="lowersection">
                    <div class="readmore">
                        <a href="#" onclick="myFunction()" id="myBtn" class="btn-readmore">Read More</a>
                    </div>
                    <div class="like">
                        <a href="#" class="btn-like">LIKE</a>
                    </div>
                </div>
            </div>
            <!-- card ends -->
                      <!-- card starts  -->
                      <div class="card">
                <img src="../images/restaurent images/project file/restaurants/Zaafaroon/Screenshot 2023-04-07 152414.png"  alt="Card Image">
                <h3>Zaafaroon</h3>
                <p>
Lions Hall Road Shop No: 1, Shivalay Apts, Haribakti Extn,, Vadodara 390007 India</p>
                <div class="lowersection">
                    <div class="readmore">
                        <a href="#" onclick="myFunction()" id="myBtn" class="btn-readmore">Read More</a>
                    </div>
                    <div class="like">
                        <a href="#" class="btn-like">LIKE</a>
                    </div>
                </div>
            </div>
                <!-- card ends -->

        </div>
        <!-- card row ends -->
                <!-- card row ends -->
                        <!-- card row starts -->
                        <div class="row">
            <!-- card starts  -->
            <div class="card">
                <img src="../images/restaurent images/sasuma.jpg" alt="Card Image">
                <h3>Sasumaa</h3>
                <p>GF 1/2/3, Vrundavan Mall, Dabhoi - Waghodia Ring Rd, near Vrundavan Crossing, Vadodara, Gujarat 390019</p>
                <div class="lowersection">
                    <div class="readmore">
                        <a href="#" onclick="myFunction()" id="myBtn" class="btn-readmore">Read More</a>
                    </div>
                    <div class="like">
                        <a href="#" class="btn-like">LIKE</a>
                    </div>
                </div>
            </div>
            <!-- card ends -->
            <!-- card starts  -->
            <div class="card">
                <img src="../images/restaurent images/Blue Lagoon.jpg" alt="Card Image" style=" width: 90%">
                <h3>Blue Lagoon's Restaurant</h3>
                <p> 75M7+7VJ, Abhishek Complex Akshar Chowk, Old Padra Rd, Vadodara, Gujarat 390007</p>
                <div class="lowersection">
                    <div class="readmore">
                        <a href="#" onclick="myFunction()" id="myBtn" class="btn-readmore">Read More</a>
                    </div>
                    <div class="like">
                        <a href="#" class="btn-like">LIKE</a>
                    </div>
                </div>
            </div>
            <!-- card ends -->
                      <!-- card starts  -->
                      <div class="card">
                <img src="../images/restaurent images/white potato.jpg"  alt="Card Image">
                <h3>White Potato</h3>
                <p>An international menu of pizza, noodles & handhelds is served in this relaxed vegetarian restaurant.</p>
                <div class="lowersection">
                    <div class="readmore">
                        <a href="#" onclick="myFunction()" id="myBtn" class="btn-readmore">Read More</a>
                    </div>
                    <div class="like">
                        <a href="#" class="btn-like">LIKE</a>
                    </div>
                </div>
            </div>
                <!-- card ends -->

        </div>
        <!-- card row ends -->
    </div>

</body>

</html>