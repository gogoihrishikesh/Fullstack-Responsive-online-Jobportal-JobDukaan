<?php

session_start();

include("connection.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted 
    
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $job= $_POST['job'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    
  

    
    
  
  
    //save to db
    $candidate_id= rand(1,9999);


    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } 
     else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            //$sql = "INSERT INTO candidate (resume) VALUES ('$filename')";
            $query = "insert into candidate (candidate_id,	first,	last,	email,job,	gender,	address,	pincode,	state,	city,	country	,resume) values ('$candidate_id','$first','$last',	'$email','$job','$gender',	'$address',	'$pincode',	'$state',	'$city',	'$country','$filename')";
        }
    }


   // $query = "insert into candidate (candidate_id,	first,	last,	email,job,	gender,	address,	pincode,	state,	city,	country	) values ('$candidate_id','$first','$last',	'$email','$job','$gender',	'$address',	'$pincode',	'$state',	'$city',	'$country')";
  
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
      $_SESSION['status'] = "Job application posted Successfully";
      header("location: home.php");
    } else {
      $_SESSION['status'] = "Error";
      header("location: home.php");
    }
  }
  

  
  
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Student Registration Form In Bootstrap 5 </title>
    <style>
        body {
            padding: 10px;
            margin: 0;
            font-family: "Nunito Sans";
            background-image: linear-gradient(90deg, #1ce70a 0%, #039a24 100%);
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        h2{
            font-weight: bold;
            font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            text-align: center;
        }

        p {
            margin: 0;
            text-transform: capitalize;
            font-weight: bold;
        }

        th {
            padding: 10px !important;
        }

        .table {
            margin-bottom: 0px;
        }

        .dropdown-toggle {
            background-color: #fff;
        }

        .table>:not(caption)>*>* {
            border-color: #F4BE2C;
            vertical-align: middle;
            white-space: nowrap;
        }

        .table>:not(:first-child) {
            border-top: #F4BE2C;
        }

        .table>thead {
            background-color: #F4BE2C;
            color: #fff;
        }

        .row {
            align-items: center;
        }

        .form-control {
            line-height: 2;
            border: 1px solid #ddd;
            border-radius: 2px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #F4BE2C;
        }

        .form-check-input:checked {
            background-color: #F4BE2C;
            border-color: #F4BE2C;
        }

        .form-check-input:focus {
            box-shadow: none;
        }

        .form-control:hover {
            border-color: #F4BE2C;
        }

        .bg-custom {
            border: 1px solid #F4BE2C;
        }

        .btn-custom {
            border-color: #F4BE2C;
            color: #F4BE2C;
        }

        .btn-custom:hover {
            background-color: #F4BE2C;
            color: #fff;
            box-shadow: 0 2px 4px rgb(0 0 0 / 10%), 0 8px 16px rgb(0 0 0 / 10%);
        }

        .row.m-0 {
            border-bottom: 1px solid #f4be2b;
            margin-bottom: 15px !important;
            background: #f4be2b;
            font-weight: 600;
            color: #fff;
        }

        .row.mb-2 {
            margin: 0;
        }

        .col-lg-4 p {
            font-size: 12px;
        }
        

        @media(max-width: 992px) {
            form {
                width: 80%;
            }
        }

        @media(max-width: 575px) {
            form {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div style="margin-bottom: 30px;">
        <center><a href="home.php"> <img style="width:250px ;" src="images/logo1.png"></a></center>
    </div>
    <h2>Please provide your <i class="fa fa-address-card-o" aria-hidden="true"></i>&nbsp;Details & &nbsp; <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp; Resume</h2>
    <div class="container  mt-5 mb-5">
        <form class="bg-light p-4 m-auto" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-lg-2">
                    <p>First Name</p>
                </div>
                <div class="col-lg-5">
                    <input type="text" class="form-control" placeholder="First Name" name="first" required>
                </div>
                <div class="col-lg-4">
                    <p>(max 30 characters a-z and A-Z)</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">
                    <p>Last Name</p>
                </div>
                <div class="col-lg-5">
                    <input type="text" class="form-control" placeholder="Last Name" name="last" required>
                </div>
                <div class="col-lg-4">
                    <p>(max 30 characters a-z and A-Z)</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">
                    <p>Select your Job</p>
                </div>
                <div class="col-lg-5 d-flex">
                    <?php $qry="SELECT job_id,company_name,job_name,job_cat,location,salary FROM jobs"; $res=mysqli_query($con,$qry);?>
                <select name="job" id="job" class="form-control">
                    <?php while ($row = mysqli_fetch_array($res)){?>
              <option value=" <?php echo $row['job_id']; ?> "><?php echo $row['company_name'];?>&nbsp; -&nbsp; <?php echo $row['job_name'];?>&nbsp; -&nbsp; <?php echo $row['job_cat'];?>&nbsp;-&nbsp;<?php echo $row['salary'];?>&nbsp;-&nbsp; <?php echo $row['location'];?></option>
              
             <?php } ?>
            </select>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-lg-2">
                    <p>Email id </p>
                </div>
                <div class="col-lg-5">
                    <input type="text" class="form-control" placeholder="Email id"  name="email" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">
                    <p>Gender</p>
                </div>
                <div class="col-lg-5 d-flex">
                <select name="gender" id="gender" class="form-control">
              <option value="null"></option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Others">Others</option>
             
            </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">
                    <p>Address</p>
                </div>
                <div class="col-lg-7">
                    <textarea class="form-control" rows="5" name="address"></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">
                    <p>Pin code</p>
                </div>
                <div class="col-lg-5">
                    <input type="text" class="form-control" placeholder="Pin code" name="pincode" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">
                    <p>State </p>
                </div>
                <div class="col-lg-5">
                    <input type="text" class="form-control" placeholder="State" name="state" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">
                    <p>City </p>
                </div>
                <div class="col-lg-5">
                    <input type="text" class="form-control" placeholder="City" name="city" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">
                    <p>Country </p>
                </div>
                <div class="col-lg-5">
                    <input type="text" class="form-control" placeholder="Country" name="country" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-2">
                    <p>Upload your resume </p>
                </div>
                <div class="col-lg-5">
                <input type="file" name="myfile">
                </div>
            </div>


            <button type="submit" name="submit" class="btn btn-custom btn-lg btn-block">Send Now</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>