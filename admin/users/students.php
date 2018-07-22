<?php
$navUri = 'adminstudents';
$mainContent = "
    <div class='col-lg-offset-1 col-lg-10'>
        <div class='panel panel-primary'>
            <div class='panel-heading'>
                <h3 class='panel-title'>Student Management</h3>
            </div>
            <div class='panel-body'>
                <table class='table table-hover'>
                    <thead>
                        <tr>
                            <td>Student ID</td>
                            <td>Full Name</td>
                            <td>No. of Enrolled Subjects</td>
                            <td>Date Enrolled</td>
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
                                <a title='Edit Student' href='#' class='btn btn-sm btn-primary'><i class='glyphicon glyphicon-cog'></i></a>
                                <a title='Delete Student' href='#' class='btn btn-sm btn-danger'><i class='glyphicon glyphicon-trash'></i></a>
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
