<?php
$navUri = 'adminteachers';
$mainContent = "
    <div class='col-lg-offset-1 col-lg-10'>
        <div class='panel panel-primary'>
            <div class='panel-heading'>
                <div class='row' style='vertical-align: middle'>
                    <h3 class='panel-title col-lg-10' style='line-height: 30px'>Teacher Management</h3>
                    <div class='col-lg-2' style='text-align: right'>
                        <a href='#' class='btn btn-sm btn-success'><i class='glyphicon glyphicon-plus-sign'></i> Add Teacher</a>
                    </div>
                </div>
            </div>
            <div class='panel-body'>
                <table class='table table-hover'>
                    <thead>
                        <tr>
                            <td>Full Name</td>
                            <td>No. of Handled Subjects</td>
                            <td>No. of Handled Sections</td>
                            <td>Total No. of Handled Students</td>
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
                                <a title='Edit Teacher' href='#' class='btn btn-sm btn-primary'><i class='glyphicon glyphicon-cog'></i></a>
                                <a title='Delete Teacher' href='#' class='btn btn-sm btn-danger'><i class='glyphicon glyphicon-trash'></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
";

$resourcesDir = '../../../resources';
require_once('../../../layouts/main.php');
?>
