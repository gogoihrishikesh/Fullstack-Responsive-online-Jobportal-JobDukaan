<?php
session_start();
include("connection.php");
include("function.php");

$user_data = check_login($con);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  //something was posted 
  $job_cat = $_POST['job_cat'];
  $company_name = $_POST['company_name'];
  $job_name = $_POST['job_name'];

  $job_desc = $_POST['job_desc'];
  $location = $_POST['location'];
  $salary = $_POST['salary'];
  $experience = $_POST['experience'];




  //save to db
  $user_id= rand(0,10000);
  $job_id=rand(0,2000);
  $query = "insert into jobs ( job_id,company_name,job_name,job_cat,job_desc,location,salary,experience) values ('$job_id','$company_name','$job_name','$job_cat','$job_desc','$location','$salary','$experience')";

  $query_run = mysqli_query($con, $query);
  if ($query_run) {
    $_SESSION['status'] = "Job posted Successfully";
    header("location: index.php");
  } else {
    $_SESSION['status'] = "Job posted Successfully";
    header("location: index.php");
  }
}

$query = "select * from jobs";
$result = mysqli_query($con, $query);

?>
<?php $current = 'index'; ?>
<?php include 'navbar.php' ?>


<div class="bodyContent">
  <div style="padding:3rem">
    <h2><i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;&nbsp;Welcome <?php echo $_SESSION['user_name']; ?></h2>
    <br />
    <p>

      <button class="button " type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Add job&nbsp;&nbsp;<i class="fa fa-chevron-down" aria-hidden="true"></i>
      </button>
    </p>
    <div class="collapse" id="collapseExample">
      <div class=" card-body">
        <?php
        if (isset($_SESSION['status'])) {
          echo "<h4>" . $_SESSION['status'] . "</h4>";
          unset($_SESSION['status']);
        }
        ?>

        <form method="POST">
          <div class="mb-3">
            <label for="Company Name" class="form-label">Company Name</label>
            <input type="text" class="form-control" id="" name="company_name">
          </div>
          <div class="mb-3">
            <label for="exampleInput Position" class="form-label">Job Title</label>
            <input type="text" class="form-control" id="exampleInput Position" name="job_name">
          </div>
          <div class="mb-3">
            <label for="JobCat" class="form-label">Job category</label>

            <select name="job_cat" id="jobcat" class="form-control">
              <option value="null"></option>
              <option value="Web Development">Web Development</option>
              <option value="Graphics design">Graphics design</option>
              <option value="Data Scientist">Data Scientist</option>
              <option value="Digital Marketing">Digital Marketing</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="JobDesc" class="form-label">Job Description</label>
            <input type="text" class="form-control" id="JobDesc" name="job_desc">
          </div>
          <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location">
          </div>
          <div class="mb-3">
            <label for="CTC" class="form-label">Salary</label>
            <input type="text" class="form-control" id="CTC" name="salary">
          </div>
          <div class="mb-3">
            <label for="exp" class="form-label">Experience</label>
            <input type="text" class="form-control" id="exp" name="experience">
          </div>
          

          <button type="submit" name="submit" class="button">Submit</button>
          <button style="gap:10px;" type="reset" class="button">Reset</button>
          <form>
      </div>
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">company name</th>
          <th scope="col">Job Title</th>
          <th scope="col">Job category</th>
          <th scope="col">Job Description</th>
          <th scope="col">Location</th>
          <th scope="col">Salary</th>
          <th scope="col">Experience</th>

        </tr>
      </thead>


      <tbody>
        <?php
        while ($row = $result->fetch_assoc()) : ?>
        



          <tr>
          <td><?php echo $row['job_id'] ?></td>
            <td><?php echo $row['company_name'] ?></td>
            <td><?php echo $row['job_name']; ?></td>
            <td><?php echo $row['job_cat']; ?></td>
            <td><?php echo $row['job_desc'] ?></td>
            <td><?php echo $row['location'] ?></td>
            <td><?php echo $row['salary'] ?></td>
            <td><?php echo $row['experience'] ?></td>
            
          </tr>
        <?php
        endwhile;
        ?>
      </tbody>
    </table>
  </div>
</div>

<!-- javascript includes -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>

</html>