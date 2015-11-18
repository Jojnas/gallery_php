<?php

include('includes/init.php');



if($session->isSignedIn()){
    redirect('login.php');
}

if(empty($_GET['id'])) {

    redirect('users.php');
}

$user = User::find_by_id($_GET['id']);

if($user){

    $session->message("The user " . $user->username ." has been deleted");
    $user->delete();
    redirect('users.php');

} else {
    redirect('users.php');
}