<?php
$navUri = 'teacherlogin';
$mainContent = "
    <div class='col-lg-offset-2 col-lg-8'>
        <div class='panel panel-primary'>
            <div class='panel-heading'>
                <h3 class='panel-title'>Teacher Login</h3>
            </div>
            <div class='panel-body'>
                <form class='form-horizontal'>
                    <div class='form-group'>
                        <label for='inputEmail3' class='col-sm-2 control-label'>Email</label>
                        <div class='col-sm-10'>
                            <input type='email' class='form-control' id='inputEmail3' placeholder='Email'>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='inputPassword3' class='col-sm-2 control-label'>Password</label>
                        <div class='col-sm-10'>
                            <input type='password' class='form-control' id='inputPassword3' placeholder='Password'>
                        </div>
                    </div>
                    <div class='form-group'>
                        <div class='col-sm-offset-2 col-sm-10'>
                            <div class='checkbox'>
                                <label>
                                    <input type='checkbox'> Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <div class='col-sm-offset-2 col-sm-10'>
                            <button type='submit' class='btn btn-default'>Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
";

require_once('layouts/main.php');
?>
