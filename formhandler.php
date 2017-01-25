<?php
require 'phpmailer.php';

ini_set('max_execution_time', 300);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // use this array for storing comments
    $errors = array();

    // to prevent xss attack
    function xssSafe($data)
    {
        return htmlentities(trim($data), ENT_QUOTES, 'UTF-8');
    }

    // flag variable
    $hisName = $hisPhone = $hisEmail = $hisAge = $hisMarried = $hisChildren = $hisMilitary = false;
    $herName = $herPhone = $herEmail = $herAge = $herMarried = $herChildren = $herMilitary = false;
    $address = $yearsMarried = $topics = false;

    // validate all the fields for his
    if (!empty($_POST['hisName']) && preg_match_all('/^\d{6,15}$/', $_POST['hisPhone']) &&
        filter_var($_POST['hisEmail'], FILTER_VALIDATE_EMAIL) && preg_match_all('/^\d{1,2}$/', $_POST['hisAge']) &&
        !empty($_POST['hisMarried']) && !empty($_POST['hisChildren']) && !empty($_POST['hisMilitary'])
    ) {
        $hisName = xssSafe($_POST['hisName']);
        $hisPhone = xssSafe($_POST['hisPhone']);
        $hisEmail = xssSafe($_POST['hisEmail']);
        $hisAge = xssSafe($_POST['hisAge']);
        $hisMarried = xssSafe($_POST['hisMarried']);
        $hisChildren = xssSafe($_POST['hisChildren']);
        $hisMilitary = xssSafe($_POST['hisMilitary']);
    } else {
        $errors[] = "Please fill all the fields with required information in <b>HIS</b> box";
    }

    // validate all fields for Her

    if (!empty($_POST['herName']) && preg_match_all('/^\d{6,15}$/', $_POST['herPhone']) &&
        filter_var($_POST['herEmail'], FILTER_VALIDATE_EMAIL) && preg_match_all('/^\d{1,2}$/', $_POST['herAge']) &&
        !empty($_POST['herMarried']) && !empty($_POST['herChildren']) && !empty($_POST['herMilitary'])
    ) {
        $herName = xssSafe($_POST['herName']);
        $herPhone = xssSafe($_POST['herPhone']);
        $herEmail = xssSafe($_POST['herEmail']);
        $herAge = xssSafe($_POST['herAge']);
        $herMarried = xssSafe($_POST['herMarried']);
        $herChildren = xssSafe($_POST['herChildren']);
        $herMilitary = xssSafe($_POST['herMilitary']);
    } else {
        $errors[] = "Please fill all the fields with required information in <b>HER</b> box";
    }

    // validate address
    if (!empty($_POST['address'])) {
        $address = xssSafe($_POST['address']);
    } else {
        $errors[] = "Please enter your address";
    }


    // validate years married
    if (preg_match('/^\d{1,2}$/', $_POST['yearsMarried'])) {
        $yearsMarried = xssSafe($_POST['yearsMarried']);
    } else {
        $errors[] = "Please mention how long you have been married";
    }

    // validate the topics they like to see covered
    if (!empty($_POST['topics'])) {
        $topics = xssSafe($_POST['topics']);
    } else {
        $errors[] = "Please mention the topics that you would like to see convered";
    }

    // if all the fields are filled, proceed
    if ($hisName && $hisPhone && $hisEmail && $hisAge && $hisMarried && $hisChildren && $hisMilitary &&
        $herName && $herPhone && $herEmail && $herAge && $herMarried && $herChildren && $herMilitary &&
        $address && $yearsMarried && $topics
    ) {

        //Set who the message is to be sent from
        $mail->setFrom($hisEmail, $hisName);
        //Set an alternative reply-to address
        $mail->addReplyTo($hisName, $hisName);

        // convert all substrings in html file into php vars
        // using strtr
        $vars = array('%hisName%' => $hisName, '%hisPhone%' => $hisPhone, '%hisEmail%' => $hisEmail, '%hisAge%' => $hisAge,
            '%hisMarried%' => $hisMarried, '%hisChildren%' => $hisChildren, '%hisMilitary%' => $hisMilitary,
            '%herName%' => $herName, '%herPhone%' => $herPhone, '%herEmail%' => $herEmail, '%herAge%' => $herAge,
            '%herMarried%' => $herMarried, '%herChildren%' => $herChildren, '%herMilitary%' => $herMilitary,
            '%address%' => $address, '%yearsMarried%' => $yearsMarried, '%topics%' => $topics);

        // mail body
        $mail->Body = strtr(file_get_contents('email/email.html'), $vars);

        // if mail sent
        if ($mail->send()) {
            include "email/success.html";
        } else {
            echo "Something went wrong. Please contact system administrator";
        }

    } else {
        foreach ($errors as $error) {
            echo "$error <br/>";
        }
    }
}