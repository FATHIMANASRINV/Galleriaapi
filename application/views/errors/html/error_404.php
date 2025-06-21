<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->config =& get_config();

if (isset($_SERVER['SERVER_ADDR']))
{
	if (strpos($_SERVER['SERVER_ADDR'], ':') !== FALSE)
	{
		$server_addr = '['.$_SERVER['SERVER_ADDR'].']';
	}
	else
	{
		$server_addr = $_SERVER['SERVER_NAME'];
	}

	$base_url = (is_https() ? 'https' : 'http').'://'.$server_addr
	.substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_FILENAME'])));
}
else
{
	$base_url = 'http://localhost/';
} 
?>
<html lang="en-US" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page Not Found</title>
	<link rel="apple-touch-icon" sizes="180x180" href="<?= $base_url ?>assets/images/logo/favicon1.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= $base_url ?>assets/images/logo/favicon1.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= $base_url ?>assets/images/favicon/favicon1.png">
	<link rel="shortcut icon" type="image/x-icon" href="<?= $base_url ?>assets/images/favicon/favicon1.png">
	<meta name="theme-color" content="#ffffff">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
	<link href="<?= $base_url ?>assets/backend/css/theme.min.css" rel="stylesheet" id="style-default">
</head>
<body>
	<main class="main" id="top">
		<div class="container" data-layout="container">
			<script>
				var isFluid = JSON.parse(localStorage.getItem('isFluid'));
				if (isFluid) {
					var container = document.querySelector('[data-layout]');
					container.classList.remove('container');
					container.classList.add('container-fluid');
				}
			</script>
			<div class="row flex-center min-vh-100 py-6 text-center">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xxl-5"><a class="d-flex flex-center mb-4" href="#"><img class="me-2" src="<?= $base_url ?>assets/images/logo/logo.png" alt="" width="58" /><span class="font-sans-serif fw-bolder fs-5 d-inline-block">Matrix</span></a>
					<div class="card">
						<div class="card-body p-4 p-sm-5">
							<div class="fw-black lh-1 text-300 fs-error">404</div>
							<p class="lead mt-4 text-800 font-sans-serif fw-semi-bold w-md-75 w-xl-100 mx-auto">The page you're looking for is not found.</p>
							<hr />
							<p>Make sure the address is correct and that the page hasn't moved. If you think this is a mistake.</p><a class="btn btn-primary btn-sm mt-3" href="<?= $base_url ?>"><span class="fas fa-home me-2"></span>Take me home</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
</html>