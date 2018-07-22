<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Evaluation System</title>

    <!-- Bootstrap -->
    <link href="../resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="../resources/css/jasny-bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url('../resources/images/adminLoginBg.jpg')">
<div class="container-fluid">
    <div class="row" style="margin-top: 50px;">
        <div class='col-lg-offset-3 col-lg-6'>
            <div class='panel panel-primary'>
                <div class='panel-heading'>
                    <h3 class='panel-title'>Admin Login</h3>
                </div>
                <div class='panel-body'>
                    <form method='post' action='../app/Requests/admin/login.php' class='form-horizontal'>
                        <div class='form-group'>
                            <label class='col-sm-2 control-label'>Username</label>
                            <div class='col-sm-10'>
                                <input name='username' type='text' class='form-control' placeholder='Email'>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label class='col-sm-2 control-label'>Password</label>
                            <div class='col-sm-10'>
                                <input name='password' type='password' class='form-control' placeholder='Password'>
                            </div>
                        </div>
                        <div class='form-group row'>
                            <div class='col-sm-offset-2 col-sm-2'>
                                <button type='submit' class='btn btn-default'>Sign in</button>
                            </div>
                            <?php if (! empty($_SESSION['validation_errors']['admin_login'])): ?>
                                <div class='col-sm-8'>
                                    <div class="alert alert-danger alert-dismissible" role="alert" style='height: 33px; padding: 5px 25px 5px 15px; margin: 0;'>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <?= $_SESSION['validation_errors']['admin_login'] ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../resources/js/jquery-3.3.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../resources/js/bootstrap.min.js"></script>
<script src="../resources/js/jasny-bootstrap.min.js"></script>
</body>
</html>

<?php session_destroy(); ?>
