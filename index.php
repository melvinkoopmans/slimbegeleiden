<?php

session_start();

if ($_SESSION['errors']) {
	$errors = $_SESSION['errors'];
	unset($_SESSION['errors']);
}

if ($_SESSION["mail_success"]) {
	$mail_success = $_SESSION["mail_success"];
	unset($_SESSION['mail_success']);
}

if ($_REQUEST['submit']) {

	$naam = $_REQUEST['naam'];
	$email = $_REQUEST['email'];
	$bericht = $_REQUEST['bericht'];

	$to      = 'info@slimbegeleiden.nl';
	// $to = 'melvin.koopmans@gmail.com';
	$subject = 'Contactformulier: '. $naam;
	$message = $bericht;
	$headers = 'From: ' . $email;

	$errors = [];

	if (empty($naam)) {
		$errors['naam'] = true;
	}

	if (empty($bericht)) {
		$errors['bericht'] = true;
	}

	if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = true;
	}

	if (!count($errors) > 0) {
		mail($to, $subject, $message, $headers);
		$_SESSION["mail_success"] = true;
	}

	$_SESSION["errors"] = $errors;

	header('Location: /#contact-box');

}

require("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Slimbegeleiden.nl | Advies, Begeleiding, Coaching </title>
	<script src="assets/js/jquery-2.1.3.min.js"></script>
	<script src="assets/js/jquery-ui.min.js"></script>
	<script src="assets/js/jquery.mobile.custom.js"></script>
	<script src="assets/js/smoothscroll.js"></script>
	<script src="assets/js/jquery.nicescroll.js"></script>
	<script src="assets/js/slimbegeleiden.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-62427688-1', 'auto');
  ga('send', 'pageview');

</script>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
	<link href='http://fonts.googleapis.com/css?family=Signika' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="favicon.png"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
</head>
<body data-spy="scroll" data-target=".navbar-default">
	<div id="start-box">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#start-box">Slim Begeleiden<span class="nl">.nl</span></a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a class="smoothscroll" href="#start-box">Start</a></li>
						<li><a class="smoothscroll" href="#diensten-box">Mijn werk</a></li>
						<li><a class="smoothscroll" href="#overmij-box">Over mij</a></li>
						<li><a class="smoothscroll" href="#reacties-box">Reacties</a></li>
						<li><a class="smoothscroll" href="#social-media-box">Social Media</a></li>
						<li><a class="smoothscroll" href="#contact-box">Contact</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div id="start-box-content" class="vertical-align">
			ADVIES, BEGELEIDING<br>
			<span id="start-box-content-and">&</span><br>
			COACHING
		</div>
		<div id="start-box-down" class="vertical-align">
			<a href="#diensten-box" class="smoothscroll"><img src="assets/img/down_icon.png"/></a>
		</div>
	</div>
	<div id="diensten-box">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-3">
					<h3><img src="assets/img/group_icon.svg"/> Mijn werk</h3>

<?php echo $advies_begeleiden_coaching; ?>

 </p>
				</div>
				<div class="col-xs-12 col-md-3">
					<h3><img src="assets/img/coach_icon.svg"/> Filosofie</h3>

<?php echo $filosofie; ?>
					</p>
				</div>
				<div class="col-xs-12 col-md-3">
					<h3><img src="assets/img/group_icon.svg"/> Hoe ik werk</h3>

<?php echo $hoe_ik_werk; ?>
					
 </p>
				</div>
				<div class="col-xs-12 col-md-3">
					<h3><img src="assets/img/medal_icon.svg"/> Samenwerking</h3>

<?php echo $samenwerking; ?>
					
				</div>
			</div>
		</div>
	</div>
	<div id="overmij-box">
		<div class="align">
			<div class="container">
				<img src="assets/img/albert.png"/>
				<h3>Ik ben Albert Kaput,</h3>
				<p>
					<?php echo $overmij; ?>
				</p>
			</div>
		</div>
	</div>
	<div id="reacties-box">
		<div class="container">
			<h3>- Reacties -</h3>
			<!-- <img class="image" src="assets/img/albert.png"/> -->
			<img class="image" src="assets/img/reactie.svg" style="width: 150px"/>
			<p>
			<img class="quote-image" src="assets/img/quote.png"/> Sinds de laatste keer dat we elkaar spraken is er veel gebeurd en heb ik het plan doorgezet om te gaan reizen, nu op het moment dat ik dit schrijf zit ik te wachten op Schiphol want mijn vliegtuig richting Singapore vertrekt over een halfuur daarna ga ik drie maanden Australië en een maand Thailand. Onze wekelijkse gesprekken hebben mij enorm geholpen om deze stap te zetten en zonder had ik waarschijnlijk nog steeds de moed niet gehad  
                                                                              om knopen door te hakken. Ontzettend bedankt voor de fijne gesprekken en nieuwe inzichten!" Jongedame van 19 jaar.
                                                                                 
			</p>
		</div>
	</div>
	<div id="social-media-box">
		<div class="align">
			<div class="container">
				<h2>@<?php echo $twitter_naam; ?></h2>
				<div class="dash"></div>
				<div class="latest-tweet">
					"<?php echo $tweet['text']; ?>"<br>
					<span class="tweet-date"><?php echo $tweet['date']; ?></span>
				</div>
			</div>
		</div>
	</div>
	<div id="message-box">
		<div>"Zeg wat je doet en doe wat je zegt"</div>
	</div>
	<div id="contact-box">
		<form method="post" enctype="multipart/form-data">
		<div class="align">
			<div class="container">
				<div class="rows">
					<div class="col-md-8">
						<table>
							<tr>
								<td>Naam:</td>
								<td><input type="text" <?php if ($errors['naam']) { echo 'style="border: 1px solid red;"'; } ?> name="naam"/></td>
							</tr>
							<tr>
								<td>Email:</td>
								<td><input type="email" <?php if ($errors['email']) { ?> style="border: 1px solid red;"  <?php } ?> name="email"/></td>
							</tr>
							<tr>
								<td>Bericht:</td>
								<td><textarea <?php if ($errors['bericht']) { ?> style="border: 1px solid red;" <?php } ?> name="bericht"></textarea></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="submit" value="Versturen"></td>
							</tr>
						</table>
					</div>
					<div class="col-md-4 contact-gegevens">
						<h3>Contactgegevens</h3>
						<table>
							<tr>
								<td>Telefoon:</td>
								<td><a href="tel:0622378114">(06) 22 37 81 14</a></td>
							</tr>
							<tr>
								<td>Email:</td>
								<td><a href="mailto:info@slimbegeleiden.nl">info@slimbegeleiden.nl</a></td>
							</tr>
							<tr>
								<td>Adres:</td>
								<td>Oostburgwal 45<br>6845 CV Arnhem<br>Nederland<br>
								<a href="https://www.google.nl/maps/place/Oostburgwal+45,+6845+CV+Arnhem/@51.9483116,5.8670371,17z/data=!3m1!4b1!4m2!3m1!1s0x47c7a61047b73447:0x2bbfde9f9affb6b4" target="_blank"><img style="height: 24px;width: 24px" src="assets/img/maps.png"/></a></td>
							</tr>
						</table>
						<h3>Social Media</h3>
						<a target="_blank" href="http://www.twitter.com/<?php echo $twitter_naam; ?>"><img src="assets/img/twitter.png"/></a> 
						<a target="_blank" href="<?php echo $facebook; ?>"><img src="assets/img/facebook.png"></a> 
						<a target="_blank" href="<?php echo $linkedin; ?>"><img src="assets/img/linkedin.png"></a>
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>
	<div id="footer">
		<div>Alle rechten voorbehouden &copy; <?php echo date("Y"); ?> SlimBegeleiden.nl</div>
	</div>
</body>
</html>