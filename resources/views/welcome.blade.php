<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Digitalna posjetnica</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Bootstrap App Landing Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Small Apps Template v1.0">
  
  <!-- theme meta -->
  <meta name="theme-name" content="small-apps" />

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  
  <!-- PLUGINS CSS STYLE -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  <link rel="stylesheet" href="plugins/fancybox/jquery.fancybox.min.css">
  <link rel="stylesheet" href="plugins/aos/aos.css">

  <!-- CUSTOM CSS -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body class="body-wrapper" data-spy="scroll" data-target=".privacy-nav">

<nav class="navbar main-nav navbar-expand-lg px-2 px-sm-0 py-2 py-lg-0">
  <div class="container">
    <a class="navbar-brand" href="{{ '/' }}"><img src="images/logo.png" width="45" height="45" alt="logo">Digitalna posjetnica</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="ti-menu"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item @@about">
          <a class="nav-link" href="{{ route('login') }}">Prijavi se</a>
        </li>
        <li class="nav-item @@contact">
          <a class="nav-link" href="{{ route('register') }}">Registriraj se</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!--====================================
=            Hero Section            =
=====================================-->
<section class="section gradient-banner">
	<div class="shapes-container">
		<div class="shape" data-aos="fade-down-left" data-aos-duration="1500" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-up-right" data-aos-duration="1000" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
		<div class="shape" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300"></div>
		<div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="100"></div>
		<div class="shape" data-aos="zoom-out" data-aos-duration="2000" data-aos-delay="500"></div>
		<div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="200"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-up" data-aos-duration="500" data-aos-delay="0"></div>
		<div class="shape" data-aos="fade-down" data-aos-duration="500" data-aos-delay="0"></div>
		<div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="100"></div>
		<div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="0"></div>
	</div>
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 order-2 order-md-1 text-center text-md-left">
				<h1 class="text-white font-weight-bold mb-4">Sve što jeste. U jednom linku.</h1>
				<p class="text-white mb-5">Izradite račun da bi ste upravljali vlastitim podacima.</p>
				<a  href="{{ route('register') }}" class="btn btn-main-md">Napravite račun</a>
			</div>
			<div class="col-md-6 text-center order-1 order-md-2">
				<img class="img-fluid" src="images/background.png" alt="screenshot">
			</div>
		</div>
	</div>
</section>
<!--====  End of Hero Section  ====-->

<section class="section pt-0 position-relative pull-top">
	<div class="container">
		<div class="rounded shadow p-5 bg-white">
			<div class="row">
				<div class="col-lg-4 col-md-6 mt-5 mt-md-0 text-center">
					<i class="ti-sharethis text-primary h1"></i>
					<h3 class="mt-4 text-capitalize h5 ">S lakoćom podijelite vaš profil</h3>
					<p class="regular text-muted">Podijelite vlastiti QR kôd sa drugim korisnicima kako bi ste podijelili vlastite podatke.</p>
				</div>
				<div class="col-lg-4 col-md-6 mt-5 mt-md-0 text-center">
					<i class="ti-pencil-alt text-primary h1"></i>
					<h3 class="mt-4 text-capitalize h5 ">Upravljajte vašim podacima</h3>
					<p class="regular text-muted">Podijelite informacije o sebi, uključujući vaše omiljene društvene mreže te omiljene aplikacije za komunikaciju.</p>
				</div>
				<div class="col-lg-4 col-md-12 mt-5 mt-lg-0 text-center">
					<i class="ti-download
                    text-primary h1"></i>
					<h3 class="mt-4 text-capitalize h5 ">Spremanje kontakta u imenik</h3>
					<p class="regular text-muted">Dozvolite korisnicima da s lakoćom preuzmu Vaš kontakt na vlastiti uređaj.</p>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!--==================================
=            Feature Grid            =
===================================-->
<section class="feature section pt-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 ml-auto justify-content-center">
				<!-- Feature Mockup -->
				<div class="image-content" data-aos="fade-right">
					<img class="img-fluid" src="images/feature/feature-new-01.png" width="500" height="500" alt="iphone">
				</div>
			</div>
			<div class="col-lg-6 mr-auto align-self-center">
				<div class="feature-content">
					<!-- Feature Title -->
					<h2>S lakoćom podijelite profil putem QR Kôda</h2>
					<!-- Feature Description -->
					<p class="desc">Pokažite Vašem prijatelju, poslovnom kolegi Vaš osobni QR kôd i podijelite informacije o Vama.</p>
				</div>

			</div>
		</div>
	</div>
</section>



<footer>
  <div class="text-center bg-dark py-4">
    <small class="text-secondary">Copyright &copy; <script>document.write(new Date().getFullYear())</script>. Digitalna vizitka </small class="text-secondary">
  </div>
</footer>


  <!-- To Top -->
  <div class="scroll-top-to">
    <i class="ti-angle-up"></i>
  </div>
  
  <!-- JAVASCRIPTS -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/bootstrap.min.js"></script>
  <script src="plugins/slick/slick.min.js"></script>
  <script src="plugins/fancybox/jquery.fancybox.min.js"></script>
  <script src="plugins/syotimer/jquery.syotimer.min.js"></script>
  <script src="plugins/aos/aos.js"></script>
  <!-- google map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g"></script>
  <script src="plugins/google-map/gmap.js"></script>
  
  <script src="js/script.js"></script>
</body>

</html>
