<?php
include '_includes/config.inc.php';
include ABSOLUTE_PATH . '_includes/header.inc.php';

 ?>
 <script>
 function validateForm() {
   var valid = true;


     var n = document.forms["contact_form"]["name"].value;
     if (n == "") {
       document.getElementById("error_one").innerHTML = "Please enter your name"
         valid = false;
     }
		 else {
			 document.getElementById("error_one").innerHTML = ""
		 }
     var e = document.forms["contact_form"]["email"].value;
		 var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
     if (e == "" || !re.test(e)) {
       document.getElementById("error_two").innerHTML = "Please enter a valid email address"
         valid = false;
     }
		 else {
			 document.getElementById("error_two").innerHTML = ""
		 }
     var s = document.forms["contact_form"]["subject"].value;
     if (s == "") {
       document.getElementById("error_three").innerHTML = "Please enter a subject"
         valid = false;
     }
		 else {
			 document.getElementById("error_three").innerHTML = ""
		 }
     var t = document.forms["contact_form"]["textarea"].value;
     if (t == "") {
       document.getElementById("error_four").innerHTML = "Please enter your message"
         valid = false;
     }
		 else {
			 document.getElementById("error_four").innerHTML = ""
		 }


       return valid;

 }

 </script>
			<div id="contents">
				<div class="box">
					<div>
						<div id="contact" class="body">
							<h1>Contact</h1>
							<form name = "contact_form" action="process_contact.php" onsubmit = "return validateForm()" method="post">
								<table>
									<tbody>
										<tr>
											<td>Name:</td>
											<td><input name = "name" type="text" value="" class="txtfield"></td>
											<td><label id = "error_one"></label></td>
										</tr> <tr>
											<td>Email:</td>
											<td><input name = "email" type="text" value="" class="txtfield"></td>
											<td><label id = "error_two"></label></td>
										</tr> <tr>
											<td>Subject:</td>
											<td><input name = "subject" type="text" value="" class="txtfield"></td>
											<td><label id = "error_three"></label></td>
										</tr> <tr>
											<td class="txtarea">Message:</td>
											<td><textarea name = "textarea"></textarea></td>
											<td><label id = "error_four"></label></td>
										</tr> <tr>
											<td></td>
											<td><input type="submit" value="" class="btn"></td>
										</tr>
									</tbody>
								</table>
							</form>
							<h2>Bhaccasyoniztas Beach Resort</h2>
							<p>
								<span>Address:</span> 123 Lorem Ipsum Cove, Sed Ut City, LI 12345
							</p>
							<p>
								<span>Telephone Number:</span> 1-800-999-9999
							</p>
							<p>
								<span>Fax Number:</span> 1-800-111-1111
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		include ABSOLUTE_PATH . '_includes/footer.inc.php';
		 ?>
