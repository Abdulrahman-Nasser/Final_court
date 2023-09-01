<?php


function testMessage($condition, $message)
{
    if ($condition) {
        echo "<div class='alert alert-success m-auto col-md-6'>
         $message success
        </div>
        ";
    }
}

function path($go)
{
    echo "<script> window.location.replace('/court/$go')</script>";
}

function pathAdmin($go)
{
    echo "<script> window.location.replace('/court/$go')</script>";
}



function auth($rule2 = null, $rule3 = null)
{
    if ($_SESSION['users']) {
        if (isset($_SESSION['users'])) {
            if ($_SESSION['users']['ruleID'] == 1 || $_SESSION['users']['ruleID'] == $rule2) {
            } else {

                path("booking.php");
            }
        } else {
            path('login.php');
        }
    } else {
        path('login.php');
    }
}
function auth_admin($rule2 = null, $rule3 = null)
{
    if ($_SESSION['foda']) {
        if (isset($_SESSION['foda'])) {
            if ($_SESSION['foda']['roleID'] == 1 || $_SESSION['foda']['roleID'] == $rule2 ||  $_SESSION['foda']['roleID'] == $rule3) {
            }else {
                path("login.php");
            }
        } else {
            path("login.php");
        }
    } else {
        path("login.php");
    }
}

function auth_code(){
    if(isset($_SESSION['confirmed'])){
        
    }else{
        path("mail_page-main/Vertify_Code.php");
    }
}


function filterValidation($input_value)
{
    $input_value = trim($input_value);
    $input_value = htmlspecialchars($input_value);
    return $input_value;
}


function stringValidation($input_value, $size)
{
    $name = empty($input_value);
    $size = strlen($input_value) < $size;
    if ($name == true || $size == true) {
        return true;
    } else {
        return false;
    }
}

function numberValidation($input_value)
{
    $isNegative = $input_value < 0;
    $empty = empty($input_value);
    $notNumber = !filter_var($input_value, FILTER_VALIDATE_FLOAT);

    if ($isNegative == true || $empty == true || $notNumber == true) {
        return true;
    } else {
        return false;
    }
}

function validationPhone($input_value)
{
    if (preg_match('/^[0-9]{11}+$/', $input_value)) {
        return true;
    } else {
        return false;
    }
}
