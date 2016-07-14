<?php

session_start();
$errors = array();

// generate new token
if (!isset($_SESSION['token']))
{
    $token = md5(uniqid(rand(), TRUE));
    $_SESSION['token'] = $token;
}

function sanitize_vars($list) {
    foreach($list as $name) {
        // $_POST[$name] = $_POST[$name];
    }
}

function generate_message() {
    $message = 'From: '.$_POST['name'].' '.$_POST['email'] . "\n";
    $message += 'Company: '.$_POST['company']."\n";
    $message += 'Address: '.$_POST['address']."\n";
    $message += 'Phone: ' . $_POST['phone']."\n";
    $message += 'Message: '.$_POST['message'];
}

function email_validation($email) {

}

function get_errors_from_form() {
    $names = array(
        'company',
        'name',
        'address',
        'phone',
        'email',
        'subject',
        'message'
    );

    $errors = array();

    foreach($names as $name) {

        if (! isset($_POST[$name]) && empty($_POST[$name])) {
            $errors[] = $name;
        } else if ($name == 'email') {

        }
    }

    return $errors;
}

if (! empty($_POST) && $_SESSION['token'] == $_POST['csrf']) {
    $errors = get_errors_from_form();
    var_dump($errors);
    if ($errors) {
        echo "errors";
    } 

    echo "DONZO";
}

?>

<!DOCTYPE html>
<html>
<head>
  <!--<link href="https://fonts.googleapis.com/css?family=Raleway:300,800" rel="stylesheet">-->
  <link href='/assets/bootstrap.css' rel='stylesheet' type='text/css'>
  <link href='/assets/style.css' rel='stylesheet' type='text/css'>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="/assets/script.js"></script>
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
            <ul class="header-nav">
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
            <?php
            if (!empty($messages)) {
                foreach($messages as $message) {
                    echo '<div class="alert alert-danger">
                    <strong>Success!</strong> Indicates a successful or positive action.
                    </div>';
                }
            }
            ?>
            <div class="col-sm-7">
            <form method="post" action="">

                <div class="form-group">
                    <label for="company">Company Name (required)</label>
                    <input name="company" type="text" class="form-control" id="company" placeholder="Company Name" required>
                </div>

                <div class="form-group">
                    <label for="name">Name (required)</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Name" required>
                </div>

                <div class="form-group">
                    <label for="name">Address (required)</label>
                    <input name="address" type="text" class="form-control" id="address" placeholder="Address" required>
                </div>

                <div class="form-group">
                    <label for="name">Phone Number (required)</label>
                    <input name="phone" type="text" class="form-control" id="phone" placeholder="Phone number" required>
                </div>

                <div class="form-group">
                    <label for="email">Email address (required) </label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <label for="name">Subject (required)</label>
                    <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject" required>
                </div>

                <div class="form-group">
                    <label for="name">Message (required)</label>
                    <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required></textarea>
                </div>

                <input type="hidden" name="csrf" value="<?php echo $_SESSION['token'];?>" />

            <button onClick="validate()">clicky click</button>
            </form>
            </div>
            <div class="col-sm-5">
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