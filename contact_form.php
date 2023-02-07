<?php
$my_email = "email@domain.com"; //fill in your own e-mail adress
?>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Contact Form</title>
<link href="contact_form.css" rel="stylesheet" type="text/css" />
<script>
 function goBack()
   {
     window.history.back()
   }
 </script>
</head>

<body>

<?php
if (isset($_REQUEST['email'])) {
	//send email
	$email = $_REQUEST['email'] ;
	$subject = $_REQUEST['subject'] ;
	$message = $_REQUEST['message'] ;

	echo "<table class='table' width='50%'>
		<tr class='table_header'>
			<td>Contact Form</td>
		</tr>
		<tr class='row1'>
			<td>";
				if ($email == "") {
					echo "ERROR: you have to fill in a E-mail adress<br>";
					echo "<input type='button' value='Back' onclick='goBack()' />";
					exit;
				}
				if ($subject == "") {
					echo "ERROR: you have to fill in a subject<br>";
					echo "<input type='button' value='Back' onclick='goBack()' />";
					exit;
				}
				if ($message == "") {
					echo "ERROR: you have to fill in a message<br>";
					echo "<input type='button' value='Back' onclick='goBack()' />";
					exit;
				}

			mail($my_email, $subject,
			$message, "From:" . $email);
			echo "Thank you for using this form.<br>Your message has been send.
			</td>
		</tr>
	</table>";
 
} else {

	echo "<form method='post' action='contact_form.php'>
		<table class='table' width='40%'>
			<tr class='table_header'>
				<td colspan='2'>Contact Form</td>
			</tr>
			<tr class='row1'>
				<td>Email:</td>
				<td>
					<input name='email' type='text' />
				</td>
			</tr>
			<tr class='row1'>
				<td>Subject:</td>
				<td>
					<input name='subject' type='text' />
				</td>
			</tr>
			<tr class='row1'>
				<td valign='top'>Message:</td>
				<td>
					<textarea name='message' rows='8' cols='40'></textarea>
				</td>
			</tr>
			<tr class='row1'>
				<td>&nbsp;</td>
				<td>
					<input type='submit' value='Send Message' />
				</td>
			</tr>
		</table>
	</form>";
}
?>

</body>
</html>
