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
    return filter_var($email, FILTER_VALIDATE_EMAIL);
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
            if ( !email_validation($_POST[$name])) {
                $errors[] = $name;
            }
        }
    }

    return $errors;
}

if (! empty($_POST) && $_SESSION['token'] == $_POST['csrf']) {
    $errors = get_errors_from_form();
    var_dump($errors);
    if ($errors) {
        echo "errors";
    } else {
        //mail()
        // show thankyou message
        $message = "Thank you";
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
                    <textarea name="message" rows="5" type="text" class="form-control" id="message" placeholder="Message" required></textarea>
                </div>

                <input type="hidden" name="csrf" value="<?php echo $_SESSION['token'];?>" />

            <button onClick="validate()">clicky click</button>
            </form>
            </div>
            <div class="col-sm-5">
                <div class="contact-info">
                    <h4>Email:</h4>
                    info@whitecz.com
                </div>
                <div class="contact-info">
                    <h4>Telephone:</h4>
                    (323) – 463 – 1234 (U.S.A)<br/>
                    (866) – 505 – 8010 (U.S.A Toll Free)
                </div>
                <div class="contact-info">
                    <h4>Fax:</h4>
                    (323) – 461 – 0000 (U.S.A)<br/>
                    
                </div>
                <div class="contact-info">
                    <h4>Skype:</h4>
                    whitecz.com
                </div>
                <div class="contact-info">
                    <h4>Address:</h4>
                    148 S Gramercy Pl. # 3<br/>
                    Los Angeles, CA 90004 (U.S.A)
                </div>
                <div class="contact-info">
                    <h4>Social: </h4>
                </div>
            </div>
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