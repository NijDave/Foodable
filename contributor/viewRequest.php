<?php     
    session_start(); 
    include '../connection.php';  

    $contributor_id=$_SESSION['userid']; 
    $selectquery = "select * from charity_request1 where contributorRequest_id = $contributor_id and request_status = 0";
?>
<html>
  <body>
    <h1>View Request</h1>
    <div class="table-responsive">
        <table border="1">
            <thead>
                <tr>
                    <th>CharityId</th>
                    <th>Status</th>
                    <th>Permission</th>
                </tr>
            </thead>
            <tbody>
            <?php

                    $query= mysqli_query($connection,$selectquery);

                    $nums=mysqli_num_rows($query);

                    while($res=mysqli_fetch_array($query)){
                        ?>
                        <td><?php echo $res['charityRequest_id'] ?></td>
                        <td><?php echo $res['request_status']?></td>
                        <td><a href="acceptPermission.php?charity_id=<?php echo $res['charityRequest_id'] ?>">Accept</a></td>
                        <?php
                    }
                    ?>


                
            </tbody>
        </table>
    
</body>
</html>