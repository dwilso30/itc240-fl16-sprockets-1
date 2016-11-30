
	 
	<?php 
include 'includes/header.php'; 
?>
        <h1>Contact Us</h1>
        
<?php
//postback2.php
/*
echo '<pre>';
var_dump($_SERVER[]);
echo '</pre>';
*/

//echo basename( $_SERVER['PHP_SELF']);

define('THIS_PAGE',basename( $_SERVER['PHP_SELF']));

//echo THIS_PAGE;

//die;

/*

' . xxx . '

*/
if(isset($_POST['First_Name']))
{
  /*  echo'<pre>';
    var_dump($_POST);
    echo'</pre>';
    */
 
$to      = 'daniww85@gmail.com';
$subject = 'ITC240 Contact Form';
$message = process_post();
$replyTo=$_POST['Email'];
$headers = 'From: noreply@seattlecentral.edu' . PHP_EOL .
    'Reply-To: ' . $replyTo . PHP_EOL .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

        
    echo'<p>
    <a href="' . THIS_PAGE . '">EXIT</a>
    </p>';
    
   
    //echo $_POST['FirstName'];
}else{
    echo'
    <form action="' . THIS_PAGE . '" method="post">
First Name:<input type="text" name="First_Name" required="required" autofocus="autofocus" title="First Name is required" placeholder="First Name goes here"/><br/>
Email:<input type="email" name="email" required="required"/><br/>
Comments:<textarea name="Comments"></textarea><br/>
<input type="submit" value="Click me"/>

</form>
';
}

function process_post()
{//loop through POST vars and return a single string
    $myReturn = ''; //set to initial empty value

    foreach($_POST as $varName=> $value)
    {#loop POST vars to create JS array on the current page - include email
         $strippedVarName = str_replace("_"," ",$varName);#remove underscores
        if(is_array($_POST[$varName]))
         {#checkboxes are arrays, and we need to collapse the array to comma separated string!
             $myReturn .= $strippedVarName . ": " . implode(",",$_POST[$varName]) . PHP_EOL;
         }else{//not an array, create line
             $myReturn .= $strippedVarName . ": " . $value . PHP_EOL;
         }
    }
    return $myReturn;
}

?>







		
	   <?php
include 'includes/footer.php';
?>