<!doctype html>
<html>
<head>
	<meta charset = "utf-8">
	<title>My Project</title>
	<link rel="stylesheet" href="css/sign_up.css" >
</head>
<body>
	<body>
  	<div class="ribbon"></div>
  	<div class="login">
        <h1 class="h_start" >Sign up</h1>
  	<form action="creating_by_admin.php" method="POST">
    	<div class="input">
      	
      	<div class="blockinput">
        	<i class="icon-envelope-alt"></i><input name="firstName" required placeholder="Your first name">
      	</div>
      	
      	<div class="blockinput">
        	<i class="icon-envelope-alt"></i><input name="lastName" required placeholder="Your lastname">
      	</div>

      	<div class="blockinput">
        	<i class="icon-envelope-alt"></i><input type="mail" name="email" required placeholder="Email">
      	</div>

      	<div class="blockinput">
        	<i class="icon-envelope-alt"></i>
        	<select  class="select-css" name="optionList" value ="Select Role">
			<option>admin</option>
			<option>user</option>
		</select>
      	</div>
		<div class="blockinput">
        	<i class="icon-unlock"></i><input type="password" name="password" required placeholder="Password">
      	</div>
		</div>
    	<button>Create Account</button>
  	</form>
  	</div>
	</body>
	</form>
</body>
</html>