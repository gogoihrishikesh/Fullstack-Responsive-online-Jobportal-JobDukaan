<?php $current ='candidate';?>
<?php include 'navbar.php' ?>
<?php

session_start();

include("connection.php");
include("function.php");
include("download.php");

$query= "SELECT * FROM candidate";
$result = mysqli_query($con, $query);
$user_data = check_login($con);

?>

<div class="bodyContent">
    <div style="padding:3rem">
    <h2><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;&nbsp;Candidates Applied</h2>
      <br />  
      <table class="table table-hover">
        <thead>
        <tr>
        <th scope="col">#candidite ID</th>   
            <th scope="col">FIRST NAME</th>
            <th scope="col">LAST NAME</th>
            <th scope="col">E-MAIL</th>
            <th scope="col">JOB ID</th>
            <th scope="col">GENDER</th>
            <th scope="col">ADDRESS</th>
            <th scope="col">PINCODE</th>
            <th scope="col">STATE - CITY -COUNTRY</th>
            <th scope="col">APPLIED DATE</th>
            <th scope="col">RESUME</th>
          </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $result->fetch_assoc()) : ?>
        



          <tr>
          <td><?php echo $row['candidate_id'] ?></td>
            <td><?php echo $row['first'] ?></td>
            <td><?php echo $row['last']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['job'] ?></td>
            <td><?php echo $row['gender'] ?></td>
            <td><?php echo $row['address'] ?></td>
            <td><?php echo $row['pincode'] ?></td>
            <td><?php echo $row['state'] ?>&nbsp;-&nbsp;<?php echo $row['city'] ?>&nbsp;-&nbsp;<?php echo $row['country'] ?></td>
            
            <td><?php echo $row['timestamp'] ?></td>
            <td> 
            <center><a style="text-decoration: ;" href="download.php?file_id=<?php echo $row['id'] ?>"><i class="fa fa-download" aria-hidden="true"></i></a></center></td>
          </tr>
        <?php
        endwhile;
        ?>
          
          
        </tbody>
      </table>
    </div>
  </div>

  <!-- javascript includes -->
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
    integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
    integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
    integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
    crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
</body>

</html>