<?php

session_start();

// generate new token
if (!isset($_SESSION['token']))
{
    $token = md5(uniqid(rand(), TRUE));
    $_SESSION['token'] = $token;
}

function email_validation($email) {

}

function validate_form($post) {

}

?>

<!DOCTYPE html>
<html>
<head>
  <!--<link href="https://fonts.googleapis.com/css?family=Raleway:300,800" rel="stylesheet">-->
  <link href='/assets/bootstrap.css' rel='stylesheet' type='text/css'>
  <link href='/assets/style.css' rel='stylesheet' type='text/css'>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>L O G O S | cubic zirconias</title>
</head>
<body>


<div class="container">
<div class="logo-container">
    <div class="row">
        <div class="col-xs-12 col-sm-4">
            <div class="logo">L O G O S</div>
        </div>
        <div class="col-xs-12 col-sm-8"></div>
    </div>
</div>
<div class="nav-container">
    <div class="row">
        <nav>
            <ul class="nav">
                <li><a href="/" class="mobile-nav">Home</a></li>
                <li><a href="/about" class="mobile-nav">About Us</a></li>
                <li><a href="/machinecut" class="mobile-nav">Machine Cut</a></li>
                <li><a href="/handcut" class="mobile-nav">Hand Cut</a></li>
                <li><a href="/contact" class="mobile-nav">Contact Us</a></li>
            </ul>
        </nav>
    </div>
</div>


<div class="content-container">
    <div class="content">
        <div class="row">
            <div class="col-xs-12">
                <h1>Contact us / Quote</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">
            <form method="post" action="">

            </form>



            </div>
            <div class="col-sm-4">
                contact
            </div>
        </div>



        <div class="row">
            <div class="col-xs-12">
                <div class="main-block"><b>
                    Wax Setting for CZ Jewelry<br/>
                    Reproducing it to better quality<br/>
                    Minimizing any defective goods<br/></b>
                </div>
            </div>
        </div>
        <div class="row">
            Tolerance of size if very important for WAX setting.<br/>
            That's why our Machine cut Cubic Zirconia is prepared for each 0.05 MM.<br/>
            Also each pack quantity is 1,000 pcs, 500 pcs is available.<br/>
            We strongly recommend them to the Silver & Gold Jewelry market and Watch manufacture who is looking for not only quailty improvment but profit increase.
        </div>
        <div class="row">
        SIZE / Round Shape
            <table class="table table-striped table-bordered">
                <tr>
                    <td>0.07 MM</td>
                    <td>0.08 MM</td>
                    <td>0.09 MM</td>
                    <td>1.00 MM</td>
                </tr>
                <tr>
                    <td>1.05 MM</td>
                    <td>1.10 MM</td>
                    <td>1.15 MM</td>
                    <td>1.20 MM </td>
                </tr>
                <tr>
                    <td>1.25 MM</td>
                    <td>1.30 MM</td>
                    <td>1.35 MM</td>
                    <td>1.40 MM</td>
                </tr>
                <tr>
                    <td>1.45 MM</td>
                    <td>1.50 MM</td>
                    <td>1.55 MM</td>
                    <td>1.60 MM</td>
                </tr>
                <tr>
                    <td>1.65 MM</td>
                    <td>1.70 MM</td>
                    <td>1.75 MM</td>
                    <td>1.80 MM</td>
                </tr>
                <tr>
                    <td>1.90 MM</td>
                    <td>1.95 MM</td>
                    <td>2.00 MM</td>
                    <td>AND MORE</td>
                </tr>
            </table>
        </div>

        <div class="row">
            
            <div class="col-md-3 col-sm-6">
                <img class="img-responsive" src="/images/thumbs/1.jpg" />
            </div>

            <div class="col-md-3 col-sm-6">
                <img class="img-responsive" src="/images/thumbs/1.jpg" />
            </div>

            <div class="col-md-3 col-sm-6">
                <img class="img-responsive" src="/images/thumbs/1.jpg" />
            </div>
            <div class="col-md-3 col-sm-6">
                <img class="img-responsive" src="/images/thumbs/1.jpg" />
            </div>
        </div>
    </div>
</div>




<footer>
<div class="container">
    <div class="row">
    <ul class="footer-nav">
        <li><a href="#">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Machine Cut</a></li>
        <li><a href="#">Hand Cut</a></li>
        <li><a href="#">Contact Us</a></li>

    </ul>
    </div>
    <div class="row">
    info@whitecz.com (213)463-1234 USA
    </div>
</div>
</footer>
</body>
</html>