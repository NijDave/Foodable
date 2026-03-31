<?php     
    session_start(); 
    include '../connection.php';  

    $contributor_id=$_SESSION['userid']; 
    $selectquery = "select * from charity_master inner join charity_like on charity_master.id=charity_like.charity_id where charity_like.contributor_id=$contributor_id";    
?>
<html>
  <body>
    <h1>Likes Information</h1>
    <div class="table-responsive">
        <table border="1">
            <thead>
                <tr>
                     <th>id</th>
                    <th>name</th>
                    <th>Email</th>
                    <th>address</th>
                    <th>City</th>
                    <th>State</th>
                </tr>
            </thead>
            <tbody>
            <?php

                    $query= mysqli_query($connection,$selectquery);

                    $nums=mysqli_num_rows($query);

                    while($res=mysqli_fetch_array($query)){
                        ?>
                        <tr>
                        <td><?php echo $res['id'] ?></td>
                        <td><?php echo $res['name']?></td>
                        <td>
                            <?php echo $res['email'] ?>
                        </td>
                        <td>
                            <span=class="email-style">
                                <?php echo $res['address'] ?></span>
                        </td>
                        <td>
                            <?php echo $res['city'] ?>
                        </td>
                        <td>
                            <?php echo $res['state'] ?>
                        </td>
                    </tr>
                        <?php
                    }
                    ?>


                
            </tbody>
        </table>
    
</body>
</html>