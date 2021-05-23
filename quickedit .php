<?php 
include('admin/src/func.php');

$order   = new Orders();
$contact = new Contact();
$subscriber = new Subscribers(); 

if (isset($_POST['book']))
{
  $order->bookTable();
}

if (isset($_POST['send']))
{
  $contact->contactUS();
}
if (isset($_POST['subscribe']))
{
  $subscriber->subscribe();
}


?>


///// 
ODERS
///


<div class="error-mess" style="color:Red"><?php $order->display_error(); ?></div>
          <div class="mb-3">
            <div class="loading">Loading</div>
            
            <div class="sent-mess" style="color:#2b8a3e" width="50%"><?php $order->display_success(); ?></div>



////////
Contact
////////



<div class="error-mess" style=" color: Red;"><?php $contact->display_error(); ?></div>
              
              <div class="sent-mess" style=" color:#2b8a3e"><?php $contact->display_success(); ?></div>



///////////
NewsLetter
//////////
<div class="error-mess" style="olor: Red;"><?php $subscriber->display_error(); ?></div>
          <div class="sent-mess" style=" color:#2b8a3e"><?php $subscriber->display_success(); ?></div>