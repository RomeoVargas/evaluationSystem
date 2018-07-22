<?php
session_start();
$resourcesDir = isset($resourcesDir) ? $resourcesDir : 'resources';

require_once($resourcesDir.'/Database.php');
require_once($resourcesDir.'/../app/Helpers/TextManipulator.php');
require_once($resourcesDir.'/../app/Models/Model.php');
