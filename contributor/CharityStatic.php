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
    <title>Charity home</title>
    <link rel="stylesheet" href="contributordesign/style.css">
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

        .navbar {

            color: white;

            display: flex;
            width: 100%;
            height: 70px;
            background-color: rgb(20, 20, 20);
            position: sticky;
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
            transition: .2s;
            cursor: pointer;

        }

        .card:hover {
            min-width: 420px;
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
            background: linear-gradient(to bottom, transparent 50%, #3dbbff 50%);
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
                    <li><a href="contributor_home.php">Home</a></li>
                    <li><a href="#">Charity</a></li>
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


    <br>
    <div class="container">
        <!-- card row starts -->
        <div class="row">
            <!-- card starts  -->
            <div class="card">
                <img src="../images/restaurent images/project file/charities/Akshaya Patra Foundation/download (1).jpeg"
                    alt="Card Image">
                <h3>Akshaya Patra Foundation</h3>
                <p>Akshaya Patra Foundation - 5th Floor, Pawan Complex, Above IDBI Bank, Chhani Jakatnaka, Vadodara,
                    Gujarat 390024. Owner: Akshaya Patra Foundation.</p>
                <div class="lowersection">
                    <div class="readmore">
                        <a href="#" onclick="myFunction()" id="myBtn" class="btn-readmore">Read More</a>
                    </div>
                    <div class="like">
                        <a href="#" class="btn-like">Request</a>
                    </div>
                </div>
            </div>
            <!-- card ends -->
            <!-- card starts  -->
            <div class="card">
                <img src="../images/restaurent images/project file/charities/Apang Manav Mandal/download (1).png"
                    alt="Card Image">
                <h3>Apang Manav Mandal</h3>
                <p>Apang Manav Mandal - Bhavna Society, Opposite Swami Narayan Temple, New Sama Road, Vadodara, Gujarat
                    390008. Owner: Apang Manav Mandal.
                </p>
                <div class="lowersection">
                    <div class="readmore">
                        <a href="#" onclick="myFunction()" id="myBtn" class="btn-readmore">Read More</a>
                    </div>
                    <div class="like">
                        <a href="#" class="btn-like">Request</a>
                    </div>
                </div>
            </div>
            <!-- card ends -->
            <!-- card starts  -->
            <div class="card">
                <img src="../images/restaurent images/project file/charities/child-line/download (1).png"
                    alt="Card Image">
                <h3>Child line</h3>
                <p>Chiranjeevi Foundation - 49, Natubhai Centre, Near Kothi Char Rasta, Raopura, Vadodara, Gujarat
                    390001. Owner: Chiranjeevi Foundation.</p>
                <div class="lowersection">
                    <div class="readmore">
                        <a href="#" onclick="myFunction()" id="myBtn" class="btn-readmore">Read More</a>
                    </div>
                    <div class="like">
                        <a href="#" class="btn-like">Request</a>
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
                <img src="../images/restaurent images/project file/charities/Feeding India/Screenshot 2023-04-07 164107.png"
                    alt="Card Image">
                <h3>Feeding India</h3>
                <p>Feeding India by Zomato is a not for profit organization, designing interventions to reduce hunger
                    among underserved communities in India.</p>
                <div class="lowersection">
                    <div class="readmore">
                        <a href="#" onclick="myFunction()" id="myBtn" class="btn-readmore">Read More</a>
                    </div>
                    <div class="like">
                        <a href="#" class="btn-like">Request</a>
                    </div>
                </div>
            </div>
            <!-- card ends -->
            <!-- card starts  -->
            <div class="card">
                <img src="../images/restaurent images/project file/charities/ISKCON Food Relief Foundation (IFRF)/Screenshot 2023-04-07 163704.png"
                    alt="Card Image">
                <h3>ISKCON Food Relief Foundation (IFRF)</h3>
                <p>Address: MQV7+5CX, Mahim Rd, Kamala Park, Palghar, Maharashtra 401404</p>
                <div class="lowersection">
                    <div class="readmore">
                        <a href="#" onclick="myFunction()" id="myBtn" class="btn-readmore">Read More</a>
                    </div>
                    <div class="like">
                        <a href="#" class="btn-like">Request</a>
                    </div>
                </div>
            </div>
            <!-- card ends -->
            <!-- card starts  -->
            <div class="card">
                <img src="../images/restaurent images/project file/charities/Koshish Vadodara/Screenshot 2023-04-07 171336.png"
                    alt="Card Image">
                <h3>Koshish Vadodara</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum
                    interdum, nisi lorem egestas vitae scel</p>
                <div class="lowersection">
                    <div class="readmore">
                        <a href="#" onclick="myFunction()" id="myBtn" class="btn-readmore">Read More</a>
                    </div>
                    <div class="like">
                        <a href="#" class="btn-like">Request</a>
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
                <img src="../images/restaurent images/project file/charities/Roobin Hood army/Screenshot 2023-04-07 165925.png"
                    alt="Card Image">
                <h3>Roobin Hood army</h3>
                <p>The Robin Hood Foundation is a charitable organization which attempts to alleviate problems caused by poverty in New York City. The organization also administers a relief fund for disasters in the New York City area.</p>
                <div class="lowersection">
                    <div class="readmore">
                        <a href="#" onclick="myFunction()" id="myBtn" class="btn-readmore">Read More</a>
                    </div>
                    <div class="like">
                        <a href="#" class="btn-like">Request</a>
                    </div>
                </div>
            </div>
            <!-- card ends -->
            <!-- card starts  -->
            <div class="card">
                <img src="../images/restaurent images/project file/charities/shravanseva/Screenshot 2023-04-07 172747.png"
                    alt="Card Image">
                <h3>Shravanseva</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum
                    interdum, nisi lorem egestas vitae scel</p>
                <div class="lowersection">
                    <div class="readmore">
                        <a href="#" onclick="myFunction()" id="myBtn" class="btn-readmore">Read More</a>
                    </div>
                    <div class="like">
                        <a href="#" class="btn-like">Request</a>
                    </div>
                </div>
            </div>
            <!-- card ends -->

        </div>

</body>

</html>