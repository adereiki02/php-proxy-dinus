<?php
//hide warning
error_reporting(1);
// Initialize the session
session_start();


// check cookie
if ( isset($_COOKIE['login'] )) {
	if ( $_COOKIE['login'] == 'true') {
		$_SESSION['login'] = true;
	}
}

// check session
if ( isset($_SESSION["login"]) ) {
	header("Location: index.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Halaman Login</title>
</head>
<body>
	<div class="container">
		<div class="w-25 mx-auto text-center mt-5">
			<div class="card bg-primary text-light">
				<div class="card-body">
				<h2 class="card-title">Proxy Login</h2>
				<p style="padding-bottom:-15px;">Login menggunakan akun SiAdin!</p>	
				<form method="POST" action="">
					<div class="form-group" align="left" style="padding-top:15px;">
						<label for="username">NIM</label>
						<input class="form-control" type="text" name="nim" id="nim">
					</div>
					<div class="form-group" align="left" style="padding-top:15px;">
						<label for="password">Password</label>
						<input class="form-control" type="password" name="password" id="password">
					</div>
					<div>
						<input type="checkbox" name="remember" id="remember">
						<label for="remember">Ingat saya</label>
					</div>			
					<div align="center" style="padding-top:15px;">		
						<button class="btn btn-light" type="submit" name="login">Login</button>
					</div>
				</form>
            		</div>
				</div>
			</div>


</body>
</html>

<?php
		//cek akun
		if( isset($_POST["login"])) {

			$nim = $_POST["nim"];
			$password = $_POST["password"];
			
			//verif password
			//if( password_verify($password, $row['password']) ) {

				//set session
				$_SESSION["login"] = true;


				// cek remember me 
				if ( isset($_POST['remember']) ){
					//buat cookie
					setcookie('id', $row['id'], time() + 60);
					setcookie('key', hash('sha256', $row['nim'], time()+60));
				}


				header("Location: index.php");
				exit;
			//


		}

		//inisialisasi library
		$curl = curl_init();


		curl_setopt_array($curl, array(
		CURLOPT_URL => 'http://academic.dinus.ac.id/api/login',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => "nim={$nim}&password={$password}",
		CURLOPT_HTTPHEADER => array(
			'Content-Type: application/x-www-form-urlencoded'
		)
		));


		$response = curl_exec($curl);



		curl_close($curl);	
		
		

		/*
		if ( isset($_SESSION["login"]) ) {
			header("Location: index.php");
		}
		*/
		
		?>
