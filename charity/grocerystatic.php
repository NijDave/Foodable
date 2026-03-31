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
    <title>Grocery Static</title>
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

        body {
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

        .Logo img {
            width: 60px;
            height: 60px;
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
            cursor: pointer;

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
            background: linear-gradient(to bottom, transparent 50%, #ff0066 50%);
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

        #badiimage {
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
                    <li><a href="#">Groceries</a></li>
                    <li><a href="restaurantstatic.php">Restaurants</a></li>
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

    <div class="container">
        <!-- card row starts -->
        <div class="row">
            <!-- card starts  -->
            <div class="card">
                <img src="../images/restaurent images/project file/new grocery store/24 Seven/Z87A0086.jpg"
                    alt="Card Image">
                <h3>24 Seven</h3>
                <p>24 Seven owned by the conglomerate Reliance Retail
                    Subhash Bridgeahmedabad The Metropole Hotel, Near Rto Circle, Ahmedabad 380009 India </p>
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
                <img src="../images/restaurent images/project file/new grocery store/Big Bazaar/big.png"
                    alt="Card Image">
                <h3>Big Bazaar</h3>
                <p>Big Bazaar - Owned by Future Group
                    Address: Big Bazaar, Acropolis Mall, S.G. Highway, Thaltej, Ahmedabad, Gujarat, India.
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
                <img src="../images/restaurent images/project file/new grocery store/D-Mart/Screenshot 2023-04-10 102648.png"
                    alt="Card Image">
                <h3>D Mart</h3>
                <p>D-Mart, Jivraj Park, Vejalpur Road, Ahmedabad, Gujarat, India.</p>
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
                <img src="../images/restaurent images/project file/new grocery store/Easyday/Screenshot 2023-04-10 103239.png"
                    alt="Card Image">
                <h3>EasyDay</h3>
                <p>Saral Privileges, Ioc Road, Near Satyam Bungalows Chandkheda, Chandkheda, Ahmedabad - 382424</p>
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
                <img src="../images/restaurent images/project file/new grocery store/Foodworld/Screenshot 2023-04-10 104357.png"
                    alt="Card Image">
                <h3>Foodworld</h3>
                <p>Dariyapur Darvaja, 380001, Dariyapur, Ahmedabad, Gujarat 380004</p>
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
                <img src="../images/restaurent images/project file/new grocery store/HyperCITY/Screenshot 2023-04-10 105220.png"
                    alt="Card Image">
                <h3>HyperCITY</h3>
                <p> HyperCITY is a retail brand owned by the K Raheja Corp Group
                    HYPERCITY-AHMEDABAD-ALPHA ONE ALPHA ONE FP - NO. 216, TP SCHEME-1, opp. Vastrapur Lake, Vastrapur,
                    Ahmedabad, Gujarat 380054</p>
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
                <img src="../images/restaurent images/project file/new grocery store/JIO MART/Screenshot 2023-04-10 113051.png"
                    alt="Card Image">
                <h3>Jio Mart</h3>
                <p>JioMart is an Indian e-commerce company, headquartered in Navi Mumbai, Maharashtra, India, that
                    started as a joint venture between Reliance Retail and Jio Platforms.</p>
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
                <img src="../images/restaurent images/project file/new grocery store/More/Screenshot 2023-04-10 110103.png"
                    alt="Card Image" style=" width: 70%">
                <h3>More</h3>
                <p>More - Owned by Aditya Birla Retail
                    Address: More, 100 Feet Ring Road, Bopal, Ahmedabad, Gujarat, India.</p>
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
                <img src="../images/restaurent images/project file/new grocery store/Nature's Basket/Screenshot 2023-04-10 111108.png"
                    alt="Card Image" width="120px">
                <h3>The Natural Basket</h3>
                <p>Nature's Basket is a retail brand owned by Godrej Industries Limited
                    Address - Ground Floor, Spenta Boulevard, B wing, Juhu Tara Rd, Juhu Tara, Juhu, Mumbai, Maharashtra
                    400049</p>
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
                <img src="../images/restaurent images/project file/new grocery store/Reliance Fresh/Screenshot 2023-04-10 111741.png"
                    alt="Card Image" width="120px">
                <h3>Reliance Fresh</h3>
                <p>Reliance Digital is an Indian consumer electronics retailer. It is a subsidiary of Reliance Retail, a
                    wholly owned subsidiary of Reliance Industries. Reliance Digital opened its first store on 24 April
                    2007 in Delhi.</p>
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
                <img src="../images/restaurent images/project file/new grocery store/Spencer's/download (2).jpeg"
                    alt="Card Image" width="120px">
                <h3>Spencer's</h3>
                <p>Spencer’s Retail Limited, part of RP Sanjiv Goenka Group, is a multi-format retailer providing a wide
                    range of quality products across categories such as food, personal care, fashion, home essentials,
                    electrical and electronics to its key consumers.</p>
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