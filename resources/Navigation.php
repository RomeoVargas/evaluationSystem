<?php

namespace resources;

class Navigation
{
    private static $allowedUris = [
        'home', 'aboutus', 'teachers', 'contactus', 'teacherlogin', 'studentlogin'
    ];

    private static $adminAllowedUris = [
        'adminhome',
        'adminteachers', 'adminstudents', 'adminadmins',
        'adminteacherstudent', 'adminstudentteacher',
        'adminquestionnaires',
        'adminreports'
    ];
    private static $nestAdminUris = [
        'adminteachers', 'adminstudents', 'adminadmins',
        'adminteacherstudent', 'adminstudentteacher'
    ];

    private static $navTemplate = "
        <div class='navbar-header'>
            <a class='navbar-brand' href='index.php'>Brand</a>
        </div>

        <ul class='nav navbar-right navbar-nav'>
            <li role='presentation' class='%s'><a href='index.php'>Home</a></li>
            <li role='presentation' class='%s'><a href='aboutUs.php'>About Us</a></li>
            <li role='presentation' class='%s'><a href='teachers.php'>Our Teachers</a></li>
            <li role='presentation' class='%s'><a href='contactus.php'>Contact Us</a></li>
            <li role='presentation' class='dropdown %s %s'>
                <a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
                    Login <span class='caret'></span>
                </a>
                <ul class='dropdown-menu'>
                    <li role='presentation'><a href='teacherLogin.php'>Teacher Login</a></li>
                    <li role='presentation'><a href='studentLogin.php'>Student Login</a></li>
                </ul>
            </li>
        </ul>
    ";

    private static $adminNavTemplate = "
        <div class='navbar-header'>
            <a class='navbar-brand' href='index.php'>Brand</a>
        </div>

        <ul class='nav navbar-nav navbar-right'>
            <li role='presentation' class='%s'><a href='%sindex.php'>Dashboard</a></li>
            <li role='presentation' class='dropdown %s %s %s'>
                <a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
                    User Management <span class='caret'></span>
                </a>
                <ul class='dropdown-menu'>
                    <li role='presentation'><a href='%susers/teachers/'>Teachers</a></li>
                    <li role='presentation'><a href='%susers/students.php'>Students</a></li>
                    <li role='presentation'><a href='%susers/admin.php'>Admin</a></li>
                </ul>
            </li>
            <li role='presentation' class='dropdown %s %s'>
                <a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
                    Assignments <span class='caret'></span>
                </a>
                <ul class='dropdown-menu'>
                    <li role='presentation'><a href='%sassignments/teacherToStudent'>Teacher - Student</a></li>
                    <li role='presentation'><a href='%sassignments/studentToTeacher'>Student - Teacher</a></li>
                </ul>
            </li>
            <li role='presentation' class='%s'><a href='%squestionnaires.php'>Questionnaires</a></li>
            <li role='presentation' class='%s'><a href='%sreports.php'>Reports</a></li>
            <li role='presentation'><a href='%s../app/Requests/admin/logout.php'>Logout</a></li>
        </ul>
    ";

    public static function navigate($uri)
    {
        $isAdminUri = self::isAdminUri($uri);
        if (! $isAdminUri && ! in_array($uri, self::$allowedUris)) {
            throw new \UnexpectedValueException('Link is not allowed');
        }

        $allowedUris = ($isAdminUri) ? self::$adminAllowedUris : self::$allowedUris;
        $navTemplate = ($isAdminUri) ? self::$adminNavTemplate : self::$navTemplate;

        foreach ($allowedUris as $allowedUri) {
            $$allowedUri = ($allowedUri == $uri) ? 'active' : '';
        }

        if ($isAdminUri) {
            $uriBack = (in_array($uri, self::$nestAdminUris)) ? ($uri == 'adminteachers' ? '../../' : '../') : '';

            return sprintf(
                $navTemplate,
                $adminhome, $uriBack,
                $adminteachers, $adminstudents, $adminadmins, $uriBack, $uriBack, $uriBack,
                $adminteacherstudent, $adminstudentteacher, $uriBack, $uriBack,
                $adminquestionnaires, $uriBack,
                $adminreports, $uriBack,
                $uriBack
            );
        }

        return sprintf(
            $navTemplate,
            $home, $aboutus, $teachers, $contactus, $teacherlogin, $studentlogin
        );
    }

    public static function isAdminUri($uri)
    {
        return in_array($uri, self::$adminAllowedUris);
    }
}

?>
