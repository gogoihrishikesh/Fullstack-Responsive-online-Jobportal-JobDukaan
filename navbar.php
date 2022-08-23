<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Boostrap 4 responsive Sidebar template with slide in/out effect">
  <meta name="author" content="Simran Singh">
  <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">


  <title>JobDukaan</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
  <div class="side-bar">
    <!-- add class "side-bar-light" here for light version -->
    <nav class="navbar navbar-inverse">

      <!-- toogle button -->
      <button class="navbar-toggler hidden-lg-up" type="button" id="toggler" aria-controls="list-container" aria-label="Toggle side-bar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- brand name goes below -->
      <a class="navbar-brand" href="#"><img src="images/logo2.png"></a>
      <div class="list-container">
        <ul>
          <!-- list of side bar elements goes here,-->
          <li <?php if($current == 'index') {echo 'class="active"';} ?>><a href="index.php"><span class="navIcon"><i class="fa fa-home"></i></span>&nbsp;&nbsp;Dashboard</a></li>
          <li <?php if($current == 'candidate') {echo 'class="active"';} ?>><a href="candidate.php"><span class="navIcon"><i class="fa fa-star-half-o"></i></span>&nbsp;&nbsp;Candidates</a></li>
          <li <?php if($current == 'jobs') {echo 'class="active"';} ?>><a href="jobs.php"><span class="navIcon"><i class="fa fa-car"></i></span>&nbsp;&nbsp;Jobs</a></li>
          
          <li><a href="logout.php"><span class="navIcon"><i class="fa fa-sign-out"></i></span>&nbsp;&nbsp;Logout</a></li>

        </ul>
      </div>
    </nav>
  </div>