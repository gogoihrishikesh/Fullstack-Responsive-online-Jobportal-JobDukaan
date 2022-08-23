<?php $current = 'jobs'; ?>
<?php
session_start();
include("connection.php");
include("function.php");



$user_data = check_login($con);
$query = "select * from jobs";
$result = mysqli_query($con, $query);

?>
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.8.1/css/all.css">
    
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'> -->
<style>
    img {
        width: 200px;
        padding: 20px;
        align-self: center;
        margin-left: 30px;
    }

    .hero-img {
        align-items: center;
    }
</style>
<?php include 'navbar.php' ?>


<div class="bodyContent">
    <div style="padding:3rem">
        <h2><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;&nbsp;Jobs Available</h2>
        <br />
        <section class="women-collection pt-0" id="collection" style="margin-top: 30px;">
            <div class="container">

                <div class="row">
                    <?php
                    while ($row = $result->fetch_assoc()) : ?>
                        <div class="col-12 col-md-6 hero-img">
                            <center><a href="#"><img src="images/job.png" alt=""></a></center>
                                <div class="mt-2">
                                    <div style="color: #111;text-align:center;">
                                        <span class="text-uppercase font-weight-bold"><?php echo $row['company_name'] ?></span><br>
                                        <span>Role : <?php echo $row['job_name']; ?></span><br>
                                        <span>Job category: <?php echo $row['job_cat']; ?></span><br>
                                        <span>Job description: <?php echo $row['job_desc']; ?></span><br>
                                        <span>Job location: <?php echo $row['location']; ?></span><br>
                                        <span>salary: <?php echo $row['salary']; ?></span><br>
                                        <span>Experience: <?php echo $row['experience']; ?></span>

                                    </div>
                                </div>
                                
                        </div>
                    <?php
                    endwhile;
                    ?>


                </div><br>

        </section>
    </div>
</div>

<!-- javascript includes -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>

</html>