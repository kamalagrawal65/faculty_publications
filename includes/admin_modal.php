<?php
	if(!isset($_SESSION['username'])){
		header("location:index.php");
		exit();
	}
	else if(isset($_SESSION['user_type']) && $_SESSION['user_type']==2){
		header("location:publication-form.php");
		exit();
	}
	else if(isset($_SESSION['user_type']) && $_SESSION['user_type']==1){
		header("location:home.php");
		exit();
	}
		
?>
<style>
.input{
	border-radius:5px;
	height:50px;
	width:500px;
	margin-top:2%;
	padding:2%;
	font-size:20px;
}
#submit{
	margin-top:4%;
	height:40px;
	width:530px;	
}
</style>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>New User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD LIBRARY STAFF</button>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">NEW LIBRARY STAFF</h4>
        </div>
        <div class="modal-body">
          <center>
            <h2>Add New LIBRARY STAFF</h2>
            <div id="login">
            <form action="newadmin.php" method="post">
                <input id="email" class="input" type="text" placeholder="Name" name="name"/>
                <br/>
                <input class="input" type="text" placeholder="USERID" name="userid"/>
                <br/>
                <input class="input" type="email" placeholder="EMAIL" name="email"/>
                <br/>
                <input class="input" type="password" placeholder="PASSWORD" name="pass"/>
                <br/>
                <input type="submit" id="submit"/>
            </form>
            </div>
           </center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myuserModal">ADD USER</button>
  <div class="modal fade" id="myuserModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New User</h4>
        </div>
        <div class="modal-body">
          <center>
            <h2>Add New User</h2>
            <div id="login">
            <form action="newadmin.php" method="post">
                <input id="email" class="input" type="text" placeholder="Name" name="uname"/>
                <br/>
                <input class="input" type="text" placeholder="USERID" name="uuserid"/>
                <br/>
                <input class="input" type="email" placeholder="EMAIL" name="uemail"/>
                <br/>
                <input class="input" type="password" placeholder="PASSWORD" name="upass"/>
                <br/>
                <input type="submit" id="submit"/>
            </form>
            </div>
           </center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>
