<?php
$navUri = 'adminadmins';
$mainContent = "
    <div class='col-lg-offset-1 col-lg-10'>
        <div class='panel panel-primary'>
            <div class='panel-heading'>
                <h3 class='panel-title'>Admin Management</h3>
            </div>
            <div class='panel-body'>
                <table class='table table-hover'>
                    <thead>
                        <tr>
                            <td>Full Name</td>
                            <td>Contact Number</td>
                            <td>Date Created</td>
                            <td>Date Last Logged In</td>
                            <td width='90px'></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Lorem Ipsum</td>
                            <td>Lorem Ipsum</td>
                            <td>Lorem Ipsum</td>
                            <td>Lorem Ipsum</td>
                            <td>
                                <a title='Edit Admin' href='#' class='btn btn-sm btn-primary'><i class='glyphicon glyphicon-cog'></i></a>
                                <a title='Delete Admin' href='#' class='btn btn-sm btn-danger'><i class='glyphicon glyphicon-trash'></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
";

$resourcesDir = '../../resources';
require_once('../../layouts/main.php');
?>
