<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="base.css">
</head>
<body>
<?php 
          include("BDD.php");
?>


<form  action="BDD.php"  method="post">
<div class="container">
    <div>
    <label  for="firstname">Prenom :</label>
    <input  type="text"  id="firstname"  name="firstname" required="required" format=^[a-zA-Z][a-zA-Z0-9-_\.]{1,45}$>
    </div>
    <div>
    <label  for="lastname">NOM :</label>
    <input  type="text"  id="lastname"  name="lastname" required="required" format=^[a-zA-Z][a-zA-Z0-9-_\.]{1,45}$>
    </div> 
</div> 
<div  class="button">
  <button  type="submit">Send</button>
</div> 

</body>
</html>




