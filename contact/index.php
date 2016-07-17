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
    $html = '<html>
<head>
<title>Email from the web</title>
</head>
<body>

<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
<tr>
<td align="center" valign="top">

<table border="1" cellpadding="10" width="500">
<tr>
<td>Company</td>
<td>' . $_POST['company'] . '</td>
</tr>
<tr>
<td>Contact name</td>
<td>'.$_POST['name'].'</td>
</tr>
<tr>
<td>Address</td>
<td>'.$_POST['address'].'</td>
</tr>
<tr>
<td>Tel No</td>
<td>'.$_POST['phone'].'</td>
</tr>
<tr>
<td>E-mail Address</td>
<td>'.$_POST['email'].'</td>
</tr>
<tr>
<td>Question/Order</td>
<td>'.$_POST['message'].'</td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
';
    return $html;
    // $message = 'From: '.$_POST['name'].' '.$_POST['email'] . "\n";
    // $message += 'Company: '.$_POST['company']."\n";
    // $message += 'Address: '.$_POST['address']."\n";
    // $message += 'Phone: ' . $_POST['phone']."\n";
    // $message += 'Message: '.$_POST['message'];
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
    $output = array(
        'status' => 'danger',
        'message' => ''
    );
    $errors = get_errors_from_form();
    if ($errors) {
        $output['message'] = 'Please make sure all fields are correct';
    } else {
        $to = 'info@whitecz.com';
        $subject = 'New order form';


        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <webmaster@whitecz.com>' . "\r\n";

        $message = generate_message();
        //if (mail($to, $subject, $message, $headers)) {
        if (0) {
            $output['message'] = 'Email was successfully sent!';
            $output['status'] = 'success';
        } else {
            $output['message'] = 'Error while emailing';
        }
    }
}

$page = 'contact';
$title = 'Contact';

include('../header.php');
?>
<div class="content-container">
<?php 
if (isset($output)) {
?>
<div class="alert alert-<?php echo $output['status']; ?>">
  <?php echo $output['message'] ?>
</div>

<?php
}
?>
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

            <button onClick="validate()">Submit</button>
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
            </div>
        </div>
    </div>


</div>
<?php
include('../footer.php');