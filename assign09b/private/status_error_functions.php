<?php

function require_login() {
  global $session;
  if(!$session->is_logged_in()) {
    redirect_to(url_for('/staff/login.php'));
  } else {
    // do nothing
  }
}


function display_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class=\"errors\">";
    $output .= "Please fix the following errors:";
    $output .= "<ul>";
    foreach($errors as $error) {
      $output .= "<li>" . h($error) . "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}

function display_error_ids($error_ids=array()){
  $output = '';
  if(!empty($error_ids)) {
    $output .="<script>";
    foreach($error_ids as $key=>$value){
      $output .="element_" . $key . "=document.querySelector('". $value ."');";
      $output .="element_" . $key . ".classList.add('inputerror');";
      // $output .="element_" . $key . ".style.border='2px solid red';";
    }
    $output .="</script>";
  }
  return $output;
}

// function get_and_clear_session_message() {
//   if(isset($_SESSION['message']) && $_SESSION['message'] != '') {
//     $msg = $_SESSION['message'];
//     unset($_SESSION['message']);
//     return $msg;
//   }
// }

function display_session_message() {
  global $session;
  $msg = $session->message();
  if(isset($msg) && $msg != '') {
    $session->clear_message();
    return '<div id="message">' . h($msg) . '</div>';
  }
}

?>
