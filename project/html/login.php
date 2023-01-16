<?php
try{

$db = new mysqli("localhost", "root", "", "autisim");
if (isset($_POST['user-id']) and isset($_POST['user-pass'])) {

    $user_id = $_POST ['user-id'];
    $user_pass = $_POST ['user-pass'];

    $qry ="SELECT * FROM `login` WHERE user_name ='".$user_id."'";
    $result = $db->Query($qry);
    $row = $result->fetch_object();
    if ( $row -> user_name == $user_id and $row ->  password == $user_pass and $row -> level=="admin")
    {
        echo "welcome" . $row -> level;
        header("Location: ../PHP/addddd.php");
        exit();
    }
    elseif ($row -> user_name == $user_id and $row ->  password == $user_pass and $row -> level=="user") {
        $qry ="SELECT * FROM `childeren` WHERE child_id ='".$user_id."'";
        $result = $db->Query($qry);
        $x=$result ->fetch_assoc();
        if ($x==null ){
            echo "You are not added to the system yet";
            //   header("Location: ../PHP/admin.php");
            exit();
        }
        else{
            header("Location: ../html/user.html");
            exit();
        }

    }
    else{
        echo "wrong";
        exit();
    }
}

}
catch (Exception $e){
    $e->getTrace();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Autisim</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link rel="stylesheet" href="../css/login.css" />
  <link rel="stylesheet" href="../css/homePage.css">
</head>
<body class="sub_page">

<div class="hero_area">
  <!-- header section strats -->
  <header class="header_section">
    <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
            <span>
              Autisim
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="homePage.html">Home </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="about.html"> About </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="test2.html">Test</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="articles.html">Articles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Sign In</a>
            </li>
            <form class="form-inline">
              <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
          </ul>
        </div>
      </nav>
    </div>
  </header>
  <!-- end header section -->
</div>
<form method="post" action="login.php">
<div class="container-fluid">
  <div class="container">
    <div class="col-xl-10 col-lg-11 login-container">
      <div class="row">
        <div class="col-lg-7 img-box">
          <img src="../images/loginn.png" alt="">
        </div>
        <div class="col-lg-5 no-padding">
          <div class="login-box">
            <h5>Welcome Back!</h5>

            <div class="login-row row no-margin">
              <label ><i class="fas fa-envelope"></i> User Name</label>
                <br>
              <input type="text" name="user-id" >
            </div>

            <div class="login-row row no-margin">
              <label ><i class="fas fa-unlock-alt"></i> Password</label>
                <br>
              <input type="password" name="user-pass" >
            </div>



            <div class="login-row btnroo row no-margin ">
                <button type="submit" class="btn btn-primary btn-sm" > Sign In</button>
            </div>
            <div class="login-row donroo row no-margin">
              <p>Dont have an Account ? <a href="signUP.php">Sign Up</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
</body>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="assets/js/script.js"></script>
</html>

<!-- class="btn btn-primary btn-sm" button
class="form-control form-control-sm"
class="form-control form-control-sm" -->