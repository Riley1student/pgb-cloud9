<?php 

	?>

	<? 

	$fullName = stripslashes(str_replace("'", "", $_REQUEST['fullName']));
	$address = stripslashes(str_replace("'", "", $_REQUEST['address']));
	$city = stripslashes(str_replace("'", "", $_REQUEST['city']));
	$province = stripslashes(str_replace("'", "", $_REQUEST['province']));
	$country = stripslashes(str_replace("'", "", $_REQUEST['country']));
	$postalCode = stripslashes(str_replace("'", "", $_REQUEST['postalCode']));
	$emailAddress = stripslashes(str_replace("'", "", $_REQUEST['emailAddress']));
	
	  
	  
	  if(empty($fullName) || empty($address) || empty($city) || empty($province) || empty($country) || empty($postalCode) || empty($emailAddress) || $_REQUEST['check'] == 'edit'){

	  
	  
	  ?>
	  
	  
	  <form method="post" name="frmCatalogue" action="./sendCatalogue.php">
     <p class="pageName">Riley Form </p>
     
	<p class="style4"> *Please check that you have filled in all fields below:</p>
	 <table border="0" cellpadding="2" cellspacing="0">
        <tr>
          <td width="114"><div align="right" class="style4">Name:</div></td>
          <td width="169"><input type="text" name="fullName" value="<? echo $fullName;?>"></td>
        </tr>
        <tr>
          <td><div align="right" class="style4">Address:</div></td>
          <td><input type="text" name="address" value="<? echo $address;?>"></td>
        </tr>
        <tr>
          <td><div align="right" class="style4">City:</div></td>
          <td><input type="text" name="city" value="<? echo $city;?>"></td>
        </tr>
        <tr>
          <td><div align="right" class="style4">Province/State:</div></td>
          <td><input type="text" name="province" value="<? echo $province;?>"></td>
        </tr>
        <tr>
          <td><div align="right" class="style4">Country:</div></td>
          <td><input type="text" name="country" value="<? echo $country;?>"></td>
        </tr>
        <tr>
          <td><div align="right" class="style4">Postal/Zip Code: </div></td>
          <td><input type="text" name="postalCode" value="<? echo $postalCode;?>"></td>
        </tr>
        <tr>
          <td><div align="right" class="style4">Email Address: </div></td>
          <td><input type="text" name="emailAddress" value="<? echo $emailAddress;?>"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Submit"></td>
        </tr>
        <tr>
          <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="5">&nbsp;</td>
        </tr>
      </table></form>
	  
	  <?
	  } else if(empty($_REQUEST['check'])) {
		  ?>
		   <form method="post" name="frmCatalogue" action="./sendCatalogue.php">
     <p class="pageName">Riley Form </p>
     
	<p class="style4"> *Please check that you have filled in all fields below correctly and press "Mail Catalogue" below to receive your catalogue via mail.</p>
	 <table border="0" cellpadding="2" cellspacing="0">
        <tr>
          <td width="114"><div align="right" class="style4">Name:</div></td>
          <td width="169"><input type="hidden" name="fullName" value="<? echo htmlspecialchars($fullName, ENT_QUOTES);?>"><? echo htmlspecialchars($fullName, ENT_QUOTES);?></td>
        </tr>
        <tr>
          <td><div align="right" class="style4">Address:</div></td>
          <td><input type="hidden" name="address" value="<? echo htmlspecialchars($address, ENT_QUOTES);?>"><? echo htmlspecialchars($address, ENT_QUOTES);?></td>
        </tr>
        <tr>
          <td><div align="right" class="style4">City:</div></td>
          <td><input type="hidden" name="city" value="<? echo htmlspecialchars($city, ENT_QUOTES);?>"><? echo htmlspecialchars($city, ENT_QUOTES);?></td>
        </tr>
        <tr>
          <td><div align="right" class="style4">Province/State:</div></td>
          <td><input type="hidden" name="province" value="<? echo htmlspecialchars($province, ENT_QUOTES);?>"><? echo htmlspecialchars($province, ENT_QUOTES);?></td>
        </tr>
        <tr>
          <td><div align="right" class="style4">Country:</div></td>
          <td><input type="hidden" name="country" value="<? echo htmlspecialchars($country, ENT_QUOTES);?>"><? echo htmlspecialchars($country, ENT_QUOTES);?></td>
        </tr>
        <tr>
          <td><div align="right" class="style4">Postal/Zip Code: </div></td>
          <td><input type="hidden" name="postalCode" value="<? echo htmlspecialchars($postalCode, ENT_QUOTES);?>"><? echo htmlspecialchars($postalCode, ENT_QUOTES);?></td>
        </tr>
        <tr>
          <td><div align="right" class="style4">Email Address: </div></td>
          <td><input type="hidden" name="emailAddress" value="<? echo htmlspecialchars($emailAddress, ENT_QUOTES);?>"><? echo htmlspecialchars($emailAddress, ENT_QUOTES);?><input type="hidden" name="check" value="preview"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="button" name="mail" value="Mail Catalogue" onClick="javascript:document.frmCatalogue.submit();">&nbsp;&nbsp;&nbsp;<input type="button" name="do_edit" value="Edit" onClick="javascript:document.frmCatalogue.check.value = 'edit'; document.frmCatalogue.submit();"></td>
        </tr>
        <tr>
          <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="5">&nbsp;</td>
        </tr>
      </table></form>
	  <?
	  } else {

			?>
			<p class="pageName">Riley Message </p>
			<p class="style4">Thank you for your request. You will receive your catalogue in the mail soon.</p>
			<?
			$stmt = "insert into catalogueRequests (name,address,city,province,country,postalCode,emailAddress) values ('".$fullName."','".$address."','".$city."','".$province."','".$country."','".$postalCode."','".$emailAddress."')";
			@mysql_do_query($stmt);
	  }
	  ?>
	  
	  
	  
	  
	<?php include("./footer.php");?>