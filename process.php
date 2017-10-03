<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>22Passer - Firewall Fucker</title>

    <style>
@import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
	margin: 0;
	padding: 0;
	background: #fff;

	color: #fff;
	font-family: Arial;
	font-size: 12px;
}

.body{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background-image: url(http://themepack.me/i/c/749x468/media/g/1134/hacker-theme-zk10.jpg);
	background-size: cover;
	-webkit-filter: blur(5px);
	z-index: 0;
}

.grad{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: auto;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
	z-index: 1;
	opacity: 0.7;
}

.header1{
	position: absolute;
	top: calc(50% - 35px);
	left: calc(50% - 255px);
	z-index: 2;
}

.header1 div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header1 div span{
	color: #5379fa !important;
}
.login{
	position: absolute;
	top: calc(51% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login {
	width: 150px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=submit]{
	width: 260px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=submit]:hover{
	opacity: 0.8;
}

.login input[type=submit]:active{
	opacity: 0.6;
}

.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=submit]:focus{
	outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}
@media screen and (max-width: 480px) {
.header1 {
	display: none;
}
.header2{
	position: absolute;
	top: calc(20% - 35px);
	left: calc(50% - 255px);
	z-index: 2;
}

.header2 div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header2 div span{
	color: #5379fa !important;
}


}

@media screen and (min-width: 480px) 
{

.header2{
	display: none;
}
}
</style>

    <script src="js/prefixfree.min.js"></script>

</head>

<body>

  <div class="body"></div>
		<div class="grad"></div>
		<div class="header1">
			<div>22<span>Passer</span></div>
		</div>	
			<div class="header2">
			<div>22<span>Passera</span></div>
		</div>
		<br>
		<div class="login" id="progress">


Loading...
		</div>
<?php



if (isset($_POST["url"])&&isset($_POST["file"])) {
       
$url=$_POST["url"];
$filename=$_POST["file"];
}
else
{
	header("Location : index.php");
}






set_time_limit(0);
//This is the file where we save the    information
$fp = fopen (dirname(__FILE__) .'/downloads/'.$filename, 'w+');
//Here is the file we are downloading, replace spaces with %20
$ch = curl_init(str_replace(" ","%20",$url));

curl_setopt($ch, CURLOPT_PROGRESSFUNCTION, 'progress');

curl_setopt($ch, CURLOPT_NOPROGRESS, false); // needed to make progress function work
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_TIMEOUT, 50);
// write curl response to file
curl_setopt($ch, CURLOPT_FILE, $fp); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
// get curl response
curl_exec($ch); 
curl_close($ch);
fclose($fp);


function progress($resource,$download_size, $downloaded, $upload_size, $uploaded)
{
    if($download_size > 0)
    {
         echo "<script>document.getElementById(\"progress\").innerHTML =".  $downloaded / $download_size  * 100 ." </script>";
   		
    }


}

echo "<script>document.getElementById(\"progress\").innerHTML ='<a href=\"downloads/".$filename."\"style=\"color:white;\""." >Download File</a>'</script>";
?>




  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

</body>

</html>