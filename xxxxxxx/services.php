 <?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <style>
    body{
        background-image: url('img/mess_background.jpg');\
          background-repeat: no-repeat;
  background-attachment: fixed;
    }
    </style>

    <title>Modern Business - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">Start Bootstrap</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="services.html">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Portfolio
            </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                            <a class="dropdown-item" href="portfolio-1-col.html">1 Column Portfolio</a>
                            <a class="dropdown-item" href="portfolio-2-col.html">2 Column Portfolio</a>
                            <a class="dropdown-item" href="portfolio-3-col.html">3 Column Portfolio</a>
                            <a class="dropdown-item" href="portfolio-4-col.html">4 Column Portfolio</a>
                            <a class="dropdown-item" href="portfolio-item.html">Single Portfolio Item</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Blog
            </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                            <a class="dropdown-item" href="blog-home-1.html">Blog Home 1</a>
                            <a class="dropdown-item" href="blog-home-2.html">Blog Home 2</a>
                            <a class="dropdown-item" href="blog-post.html">Blog Post</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Other Pages
            </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                            <a class="dropdown-item" href="full-width.html">Full Width Page</a>
                            <a class="dropdown-item" href="sidebar.html">Sidebar Page</a>
                            <a class="dropdown-item" href="faq.html">FAQ</a>
                            <a class="dropdown-item" href="404.html">404</a>
                            <a class="dropdown-item" href="pricing.html">Pricing Table</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
   
    <?php
    $servername = "sql303.epizy.com";
    $username = "epiz_24645821";
    $password = "F2WkQXhNqW";
    $dbname = "epiz_24645821_mess";
    $conn = new mysqli($servername, $username, $password,$dbname); 
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $name = $_SESSION['user_name'];
    $name = stripslashes($name);
    $name = mysqli_real_escape_string($conn,$name);
    $sql1 = "SELECT NAME,MESS_DETAILS,HOSTEL_BLOCK FROM student WHERE USERNAME='$name'";
    $result = mysqli_query($conn,$sql1);
    $rows = mysqli_fetch_assoc($result);
    ?>
    <div class="container">

        <h1 class="mt-4 mb-3">MESS SELECTION
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="first.html">Home</a>
            </li>
            <li class="breadcrumb-item active">CURRENT DETAILS</li>
        </ol>
        <table align="center" class="table table-bordered table-hoverable bg-dark text-white">
            <tr>
                <td>NAME</td>
                <td><?php echo $rows['NAME'];?></td>
            </tr>
            <tr>
                <td>REGISTER NO.</td>
                <td><?php echo $name;?></td>
            </tr>
            <tr>
                <td>MESS</td>
                <td><?php echo $rows['MESS_DETAILS'];?></td>
            </tr>
            <tr>
                <td>BLOCK</td>
                <td><?php echo $rows['HOSTEL_BLOCK'];?></td>
            </tr> 
        </table>
        <div>
        <form action="update.php" method="POST">
         <select class="form-control" aria-labelledby="SELECT MESS" name="selectedmess">
            <optgroup label="Special">
            <option value="FUSION - SPECIAL MESS">FUSION</option>
            <option value="DARLING - SPECIAL MESS">DARLING</option>
            <option value="PR - SPECIAL MESS">PR</option>
            <option value="ZENITH-SPECIAL MESS">ZENITH</option>
            </optgroup>
            <optgroup label="SPECIAL PAID">
            <option value="FOODCY">FOODCY</option>
            <option value="FOOD MALL">FOOD MALL</option>
            <option value="FOOD PARK">FOOD PARK</option>
            <option value="BUDDIES & BITES">BUDDIES & BITES</option>
            </optgroup>
            <optgroup label="NORTH VEG">
            <option value="FUSION-N.VEG">FUSION</option>
            <option value="DARLING-N.VEG">DARLING</option>
            <option value="PR-N.VEG">PR</option>
            <option value="ZENITH-N.VEG">ZENITH</option>
            </optgroup>
            <optgroup label="NORTH NON-VEG">
            <option value="FUSION-N.NONVEG">FUSION</option>
            <option value="DARLING-N.NONVEG">DARLING</option>
            <option value="PR-N.NONVEG">PR</option>
            <option value="ZENITH-N.NONVEG">ZENITH</option>
            </optgroup>
            <optgroup label="SOUTH VEG">
            <option value="FUSION-S.VEG">FUSION</option>
            <option value="DARLING-S.VEG">DARLING</option>
            <option value="PR-S.VEG">PR</option>
            <option value="ZENITH-S.VEG">ZENITH</option>
            </optgroup>
            <optgroup label="SOUTH NON-VEG">
            <option value="FUSION-S.NONVEG">FUSION</option>
            <option value="DARLING-S.NONVEG">DARLING</option>
            <option value="PR-S.NONVEG">PR</option>
            <option value="ZENITH-S.NONVEG">ZENITH</option>
            </optgroup>
        </select>
        <input type="submit" class="btn btn-dark" value="SUBMIT" name="Submit">
        </form>
        </div>
        



        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>