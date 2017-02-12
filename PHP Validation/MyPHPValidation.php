<!--Author : Udit Panchal -->


<html>
	<head>
		<style>
			
			#heading
			{
				color:#336633;
				
			}
			
			#firstnav li
			{
				display:inline;
				margin:1px;
				background-color:#339933;
				padding:5px 14px 5px 14px;	
			}
			
			#firstnav li a
			{
				color:white;
				text-decoration:none;
				
			}
			
			table
			{
				
				border-collapse:collapse;
			
			}
			
			.fcol
			{
				width:30px;
				height:66px;
				background-color:#339933;
				text-align:center;
				color:white;
				width:90px;
				border:1px solid white;
			}
			
			.scol
			{
				background-color:#D4D4D4;
				width:350px;
				text-align:center;
				border:1px solid white;
			}
			
			.tcol
			{
				background-color:#D4D4D4;
				width:300px;
				border:1px solid white;
			}
			
			.input
			{
				height:62px;
				width:347px;
				background-color:#E5E5E5;
				border:6px solid white;
				font-size:18px;
				text-align:left;
			}
			
			#formdiv
			{
				padding-left:25px;
			}
			
			#ok_table
			{
				border:1px solid green;
				color:green;
				margin-left:28px;
				margin-top:28px;
				margin-bottom:28px;
				width:30%;
			}
			
			#ok_table p
			{
				padding-left:20px;
				color:green;
				padding-top:15px;
				padding-bottom:15px;
			}
			
			#error_table
			{
				border:1px solid #D4D4D4;
				width:23%;
				margin:20px;
				margin-left:29px;	
			}
			
			.perror
			{
				color:red;
				font-weight:bold;
			}
			
		
			#notice2
			{
				color:red;
			}
			#frow_showtable td
			{
				background-color:green;
				text-align:center;
				color:white;
			}
			.datarow
			{
				background-color:#D4D4D4;
			}
			
			#showtable 
			{
				border:1px solid white;
				margin:20px;
			}
			
			#showtable tr,td 
			{
				border:1px solid white;
				
			}
			
			#rating a
			{
				text-decoration:none;
				background-color:green;
				color:white;
				padding:3px;
			}
		</style>
		
	</head>
	
	<header>
			 <h1 id=heading>Form Validation with Reg Expressions and CSV</h1> 
		     <nav id=firstnav>
				<ul>
					<li><a href="<?php echo $_SERVER['PHP_SELF']?>">Refresh This Page</a></li>
					<li><a href="logfile.txt" target="_blank">Show Logfile.txt</a></li>
					<li><a href="<?php echo $_SERVER['PHP_SELF']?>?show=1">Show logfile.txt Formatted</a></li>
					<li><a href="<?php echo $_SERVER['PHP_SELF']?>?clear=1">Clear logfile.txt</a></li>
				</ul>
			</nav>
	</header>
	<body>
			<?php
			$notice1   =  "";
			$notice2   =  "";
			$notice3   =  "";
			$notice4   =  "";
			$notice5   =  "";
			$firstname =  "";
			$street    =  "";
			$postalcode=  "";
			$phone     =  "";
			$email     =  "";
			
			if($_SERVER['REQUEST_METHOD']=='GET')
			{
				if(isset($_GET['clear'])==TRUE)
				{
					$myclearfile = fopen("logfile.txt","w");
					fclose($myclearfile);
				}
				
				if(isset($_GET['show'])==TRUE)
				{
					if($_GET['show']=='2')
					{
						$firstname = "Mr. John Woo";
						$street    = "50 Young Street";
						$postalcode= "LT4T34";
						$phone     = "289-689-9123";
						$email     = "john.wooo@mohawkcollege.ca";
					}
					
					if($_GET['show']=='3')
					{
						$firstname = "Mr. Jackie Chan";
						$street    = "50 China Town";
						$postalcode= "MR4R77";
						$phone     = "905 555 7777";
						$email     = "jackie.changg@mohawkcollege.com";
					}
					
					if($_GET['show']=='4')
					{
						$firstname = "Mrs. Anjelina Jolie";
						$street    = "21 Times Square";
						$postalcode= "HH1-T22";
						$phone     = "(905)111-2222";
						$email     = "anjelina.jolie@mohawkcollege.org";
					}
					
					if($_GET['show']=='5')
					{
						$firstname = "Mr Kim Jong";
						$street    = "1 New York";
						$postalcode= "HH1-T232";
						$phone     = "905    111-2222";
						$email     = "an.jolie@mohawkcollege.org";
					}
					
					if($_GET['show']=='6')
					{
						$firstname = "Mr. John New name";
						$street    = "2145 East Gate";
						$postalcode= "R12-TG2";
						$phone     = "(9054)111-2222";
						$email     = "john.peter@gmail.org";
					}
					
					if($_GET['show']=='7')
					{
						$firstname = "mr John Lennon";
						$street    = "21 Ireland";
						$postalcode= "NW1--Y67";
						$phone     = "(905)111----2222";
						$email     = "john.lennon@mohawkcollege.uk";
					}
					
					if($_GET['show']=='8')
					{
						$firstname = "Mrs. Black Snake";
						$street    = "21 Times.Square";
						$postalcode= "LK5 R77";
						$phone     = "(905))111-2222";
						$email     = "need.forspeed@mohawkcollege.com";
					}
					
					if($_GET['show']=='9')
					{
						$firstname = "Mr. North";
						$street    = "21 Jump Street";
						$postalcode= "FFF-T22";
						$phone     = "(905) 111-2222";
						$email     = "good.super@mohawkcollege.org";
					}
					
					if($_GET['show']=='10')
					{
						$firstname = "Mrs. Anjelina Jolie";
						$street    = "21 Times Square";
						$postalcode= "L8N-1X2";
						$phone     = "289-(921)-8762";
						$email     = "creation@mohawkcollege.org";
					}
					
				}
				
			}
			
			if($_SERVER['REQUEST_METHOD']=='POST')
			{
				$firstname = $_POST['firstname'];
				$street    = $_POST['street'];
				$postalcode= $_POST['postalcode'];
				$phone     = $_POST['phone'];
				$email     = $_POST['email'];
				$notice1   =  "notice1";
				$notice2   =  "notice1";
				$notice3   =  "notice1";
				$notice4   =  "notice1";
				$notice5   =  "notice1";
				
			
				
				
				if(preg_match("/^(Mr\.|Mrs\.)\s?[A-Za-z]+\s{1,}[A-Za-z]+$/",$_POST['firstname']))
				{
					$f1 = true;
				}
				else 
				{
					$f1 = false;
					$notice1 = "notice2";
				}
				
				if(preg_match("/^([0-9]{2,3}\s{1,}[A-Za-z]+\s{1,}[A-Za-z]+$)/",$_POST['street']))
				{
					$f2 = true;
				}
				else
				{
					$f2 = false;
					$notice2 = "notice2";
				}
				
				if(preg_match("/^[A-Z]{2}[0-9]{1}(\s{0,1}|-{0,1})[A-Z]{1}[0-9]{2}$/",$_POST['postalcode']))
				{
					$f3 = true;
				}
				else
				{
					$f3 = false;
					$notice3 = "notice2";
				}
				
				
				if(preg_match("/(^((\(){1}[0-9]{3}(\)){1})|^[0-9]{3})((\.){0,1}|(\-){0,1}|(\s){0,1})([0-9]{3})((\.){0,1}|(\-){0,1}|(\s){0,1})([0-9]{4}$)/",$_POST['phone']))
				{
					$f4 = true;
				}
				else
				{
					$f4 = false;
					$notice4 = "notice2";
				}
				
				if(preg_match("/^[A-Za-z]{4,10}\.{1}[A-Za-z]{4,10}\@{1}(mohawkcollege)(\.com|\.ca|\.org)$/",$_POST['email']))
				{
					$f5 = true;
				}
				else
				{
					$f5 = false;
					$notice5 = "notice2";
				}
				
				if($f1==true AND $f2==true AND $f3==true AND $f4==true AND $f5==true)
				{
						echo"<div id = ok_table>";
							echo"<p>Thank you <strong>".$firstname."</strong> for your submission. You submitted: "."<br>".$firstname." , ".$street." , ".$postalcode." , ".$phone." , ".$email."</p>";
						echo"</div>";
						
						date_default_timezone_set("Canada/Eastern");
						$myfile = fopen("logfile.txt","a+");
						$remote_addr = $_SERVER['REMOTE_ADDR'];
						$content = array($remote_addr , date("Ymd h:i:s") , $firstname , $street , $postalcode , $phone , $email);
					    fputcsv($myfile,$content);
					    fclose($myfile);
						
				}
				
				if($f1==false OR $f2==false OR $f3==false OR $f4==false OR $f5==false)
				{
					echo"<div id = error_table>";
					
						echo"<span class= perror>There are errors in the code:</span>";
						echo"<nav id=secondnav>";
						echo"<ul>";
						
							if($f1==false)
							{
								echo"<li>Fullname not entered correctly.</li>";
							}
					    	if($f2==false)
					    	{
					    		echo"<li>Street address not entered correctly.</li>";
					    	}
					    	if($f3==false)
					    	{
					    		echo"<li>Postal Code in wrong format!</li>";
					    	}
					    	if($f4==false)
					    	{
					    		
					    		echo"<li>Invalid Phone Number</li>";
					    	}
					    	if($f5==false)
					    	{
					    		echo"<li>Email is in wrong format!</li>";
					    	}
					    	
					    echo"</ul>";
					    echo"</nav>";
					echo"</div>";
				}
				
				
			}    
			
			
			
				
			?>
			<div id= "formdiv">
				<form action="<?PHP echo $_SERVER['PHP_SELF']  ?>" method="post" >
					<table>
						<tr>
							<td class="fcol">Full Name:</td><td class="scol"><input class="input" type="text" name="firstname" value="<?php echo $firstname; ?>"/></td><td class="tcol"><span id=<?php echo $notice1; ?>>Salution of Mr. and Mrs. followed by two text strings separated by any number of spaces<span></span></td>
						</tr>
						<tr>
							<td class="fcol">Street</td><td class="scol"> <input  class="input" type="text" name="street" value="<?php echo $street; ?>"/></td><td class="tcol"><span id=<?php echo $notice2; ?>>2 or 3 digit number followed by a test string ending with Street or Road separated by any number of spaces.</span></td>
						</tr>
						<tr>
							<td class="fcol">PostalCode:</td><td class="scol"> <input class="input" type="text" name="postalcode" value="<?php echo $postalcode; ?>"/></td><td class="tcol"><span id=<?php echo $notice3; ?>>Char Char digit optional Hyphen or space Char Digit Digit (abclxy and number 0 not allowed. Case insensitive. )</span></td>
						</tr>
						<tr>
							<td class="fcol">Phone:</td><td class="scol"> <input class="input" type="text" name="phone" value="<?php echo $phone; ?>"/></td><td class="tcol"><span id=<?php echo $notice4; ?>>10 digits, first 3 digits have optional parentheses, either side of digits 456 are optional space, dot or hyphen.</span></td>
						</tr>
						<tr>
							<td class="fcol">Email:</td><td class="scol"> <input class="input" type="text" name="email" value="<?php echo $email; ?>"/></td><td class="tcol"><span id=<?php echo $notice5; ?>>firstname.lastname@mohawkcollege.domain (firstname and lastname must be 4-10 characters in length, domain may be either .com, .ca or .org)</span></td>
						</tr>
					</table>
					<br>
					<input type="submit" name="" value="Submit me now!!!">
				</form>
			</div>
			
			<?php 
			
			if($_SERVER['REQUEST_METHOD']=='GET')
			{
				if(isset($_GET['show'])==TRUE)
				{ ?>
			
					<div id="rating">
						<strong>Good</strong> <a href="<?php echo $_SERVER['PHP_SELF']?>?show=2">0</a>
											  <a href="<?php echo $_SERVER['PHP_SELF']?>?show=3">1</a>
											  <a href="<?php echo $_SERVER['PHP_SELF']?>?show=4">2</a>
					
					   <strong>Bad</strong>   <a href="<?php echo $_SERVER['PHP_SELF']?>?show=5">3</a>
											  <a href="<?php echo $_SERVER['PHP_SELF']?>?show=6">4</a>
											  <a href="<?php echo $_SERVER['PHP_SELF']?>?show=7">5</a>
					
					  <strong>Mixed</strong>  <a href="<?php echo $_SERVER['PHP_SELF']?>?show=8">6</a>
											  <a href="<?php echo $_SERVER['PHP_SELF']?>?show=9">7</a>
					 						  <a href="<?php echo $_SERVER['PHP_SELF']?>?show=10">8</a>
					</div>
					<div id ="showform">
						<table id="showtable">
							<tr id="frow_showtable">
						<td>IP Address</td><td>Time Stamp</td><td>Name</td><td>Street</td><td>Postal Code</td><td>Phone</td><td>Email</td>
					</tr>"; 
					<?php 
						$file2 = fopen('logfile.txt','r');
						
						while(feof($file2) == FALSE)
						{
							$fileget = fgetcsv($file2);
							echo"
							<tr class=\"datarow\">
								<td>".$fileget[0]."</td><td>".$fileget[1]."</td><td>".$fileget[2]."</td><td>".$fileget[3]."</td><td>".$fileget[4]."</td><td>".$fileget[5]."</td><td>".$fileget[6]."</td>
							</tr>";
						}
						fclose($file2);
						
					echo"
				</table>
			</div>";
				}
			}?>
		
	</body>
</html>