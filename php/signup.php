<!DOCTYPE html>
	<html>
	<head>
		<!-- Title of the page -->
		<title>Login Page</title>

		<!-- Linking to css sheets -->
		<link rel="stylesheet" href="signup.css">
		<link rel="php" href="connect.php">
	</head>
	<body>
		<!-- Start to main body of program -->

		<!-- Background of Page -->
		<div class="hero">

			<!-- Login form background -->
			<div class="loginbox">
					
					<!-- Top detais button -->
					<div class="detbtn">
						<label style="color: #333333;cursor: default;">
							<strong>Sign-Up</strong>
						</label>
					</div>
				<div>

					<!-- Creating the form with all the inputs specified -->
					<div name="login" class="input-group">
					<form action="connect.php"  method="post">
						
						<!-- Asking for user input Name -->
						<div class="input">
						<input class="input" placeholder="Name" required style="color: #fff;"  name="name">
					    </div>

					    <!-- Asking for user input Mobile number -->
						<div class="num">
							<input type="text" name="number" placeholder="Mobile Number" required style="color: #fff;" pattern="[0-9]+" maxlength="10" name="number">
						</div>						
						
						<!-- Asking for user select Gender -->
						<div class="gen" style="color: #fff;">
						<label>Gender</label>
						</div>

						<div class="gender" style="color: #fff;" required>
							
							
							<input type="radio" name="status" id="Male" value="m">
							<label for="Male">Male</label>
							<input type="radio" name="status" id="Female" value="f">
							<label for="Female">Female</label>
							<input type="radio" name="status" id="Other" value="o">
							<label for="Other">Other</label>
							
						</div>
						<div>
						<div class="email" >
							<input type="email" name="email" placeholder="Email ID" required style="color: #fff;">
						</div>
						<div class="pass" >
							<input type="password" name="password" placeholder="Password" required  style="color: #fff;" >
							<label style="color: #ccc; font-size: 9px; ">1 number & 1 uppercase & 1 lowercase letter & 8 or more characters</label>
					<div class="button2">
						<div class="but2">
							<button type="Signup" class="togglebtn2" style="color: #333333;"> 
								<strong>Signup</strong>
							</button>
						</div>
					</div>
					
					
			</form>
		</div>

			</div>
		</div>
	</div>
</body>
</html>

