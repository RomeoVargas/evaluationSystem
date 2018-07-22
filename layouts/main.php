<?php
$resourcesDir = isset($resourcesDir) ? $resourcesDir : 'resources';
require_once($resourcesDir.'/Navigation.php');

use resources\Navigation;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Evaluation System</title>

    <!-- Bootstrap -->
    <link href="<?= $resourcesDir ?>/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-default navbar-fixed-top <?= (Navigation::isAdminUri($navUri)) ? 'navbar-inverse' : '' ?>">
            <div class="container-fluid">
                <?= Navigation::navigate($navUri); ?>
            </div>
        </nav>
    </div>
    <div class="row" style="margin-top: 65px;">
        <?= $mainContent; ?>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?= $resourcesDir ?>/js/jquery-3.3.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?= $resourcesDir ?>/js/bootstrap.min.js"></script>
</body>
</html>
