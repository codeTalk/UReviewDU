<? 
session_start();
if(!session_start(regduser)){
header("location:/index.php");
}
else{
header("location:google.com");
}
?>

<html>
<body>
<h1 style="color:green;">Login Successful</h1>
</body>
</html>