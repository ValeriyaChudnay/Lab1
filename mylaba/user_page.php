<!doctype html>
<html>
<head>
	<meta charset = "utf-8">
	<title>My Project</title>
    <style>
        img{
            margin: 20px;
            border: #570b5b;
            border-radius:5px ;
            border: 5px solid #330844;
        }
        .login{
            background:url(tablebg.jpg) ;
            border-bottom: 2px solid #cc9ec9;
            border-radius: 5px;
            text-align: center;
            color: #290050;
            text-shadow: 0 1px 0 #f6d1ff;
            max-width: 300px;
            margin: 0 auto;
            padding: 15px 40px 20px 40px;
            box-shadow: 0 0 100px #290050;
        }
        .input{
        }

        input{
            text-align: center;
            background: #fffcff;
            overflow: hidden;
            box-shadow: inset 0 0 3px #b235f4;
            border-bottom: 1px solid #FFF;
            margin: 3px;
            width: 260px;
            border: 0;
            line-height: 3.6em;
            box-sizing: border-box;
            color: #330844;
            font-family:Comic Sans MS, Comic Sans, cursive;;
            text-shadow: 0 1px 0 #FFF;
        }
        .blockinput{
            border-bottom: 1px solid #330844;
            border-top: 1px solid #FFFFFF;
        }

        body {

            background-image:url(img/bg.jpg);
            background-color: #c79cbc;
        }
        .button2{
            font-family:Comic Sans MS, Comic Sans, cursive;
            margin-top: 0px;

            width: 100%;
            height: 100%;
            line-height: 2em;
            background: rgb(204, 158, 201);
            cursor: pointer;
            border-top: 1px solid #c76ad4;
            box-shadow: 0 0 0 1px #dfabe7, 0 2px 2px #330844;
            color: #FFFFFF;
            border-width:0;
            font-size: 1.5em;
            text-shadow: 0 1px 2px #290050;
        }
        .button2:hover{
            background: linear-gradient(to bottom, rgb(223, 171, 231) 0%, rgb(178, 53, 244) 100%);
        }
        .button2:active{
            box-shadow: inset 0 0 5px #000;
            background: linear-gradient(to bottom, rgb(246, 209, 255) 0%, rgb(87, 11, 91) 100%);
        }
        button{
            font-family:Comic Sans MS, Comic Sans, cursive;
            margin-top: 20px;
            line-height: 2em;
            background: rgb(204, 158, 201);
            cursor: pointer;
            border-top: 1px solid #c76ad4;
            box-shadow: 0 0 0 1px #dfabe7, 0 2px 2px #330844;
            color: #FFFFFF;
            border-width:0;
            font-size: 1.5em;
            text-shadow: 0 1px 2px #290050;
        }
        button:hover{
            background: linear-gradient(to bottom, rgb(223, 171, 231) 0%, rgb(178, 53, 244) 100%);
        }
        button:active{
            box-shadow: inset 0 0 5px #000;
            background: linear-gradient(to bottom, rgb(246, 209, 255) 0%, rgb(87, 11, 91) 100%);
        }

    </style>
</head>

<body>
<center>
    <?php

    require_once 'connection.php';
    $link = mysqli_connect($host,$user,$password,$database)
    or die("Error" . mysqli_error($link));
    session_start();
    $tmp = $_SESSION["id"];
    $_SESSION["role"] = "user";
    $query = " SELECT image_path,image_name FROM users WHERE id='$tmp'";

    $result = mysqli_query($link,$query)
    or die ("Error" .mysqli_error($link));

    $row = mysqli_fetch_array($result);

    $image_name=$row["image_name"];
    $image_path=$row["image_path"];

    if ($image_name != "") echo '<img src="'.$image_path.''.$image_name.'" width=150 height=100>';

    require_once 'connection.php';
    $link = mysqli_connect($host,$user,$password,$database)
    or die("Error" . mysqli_error($link));
    //session_start();

    $query = " SELECT users.first_name,users.last_name,users.email,users.password FROM users WHERE id='$tmp'";

    $result = mysqli_query($link,$query)
    or die ("Error" .mysqli_error($link));

    $row = mysqli_fetch_row($result);
    echo '
 <div class="login">
 <div class="input">
 	<form method="POST" action="upload.php" enctype="multipart/form-data">
		<input type="file" name="image">
		<br>
		<input class="button2" type="submit" value="Upload">
		<br>
		    	</form>
        <form method="POST"action="edit.php" >
		<br>
		<input name="firstName" required value='.$row[0].'>
		<br>
		<input name="lastName" required value='.$row[1].'>
		<br>
		<input type="mail" name="email" required value='.$row[2].'>
		<br>
		<input type="password" name="password" required value='.$row[3].'>
		<br>
      	<button>Change data</button>
      	';

    mysqli_free_result($result);
    mysqli_close($link);
    ?>
</center>
	
</body>
</html>