<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
 <?php
			 $order_id=$this->uri->segment(3, 0);
			 $product_id=8;

			$Sql1 = $this->db->query("select * from paste_products where product_id='8'");
	        $record1= $Sql1->row_array();

			$productamount=$record1['discount_price'];
		    $productname=$record1['name'];
		    $productshippingamt=$this->uri->segment(4, 0);

			
			?>


          <?php
			$Sql = $this->db->query("select shopping_details.*,retail_online_receipt.invoice_no from shopping_details inner join retail_online_receipt on shopping_details.order_id=retail_online_receipt.payment_id where shopping_details.order_id='".$order_id."'");

	        $record= $Sql->row_array();
			?>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Thank You | Flexiroam </title>
  <meta name="description" content="3G/4G Data available in more than 100 countries, Flexiroam X will change the way you roam internationally &ndash; it&rsquo;s easy, hassle free and affordable, &nbsp;just attach the Flexiroam X microchip on your SIM to start roaming. Flexiroam X allows you to earn up to 100GB free data, download the mobile app to get started.">
  <meta name=”robots” content=”noindex, follow”>

  <meta name="keywords" content="international roaming, international roam, mobile roaming, international call, free phone call, data roaming, roaming, roaming charges,local roaming,roaming,roaming sim,internet roaming,global roaming,international roaming,free phone service,roaming service,broadband roaming,roam,no roaming,att roaming,wireless roaming,roaming europe,nokia roaming,roam international,roaming wireless,free telephone service,roaming international,mobile roaming,gsm roaming,sms roaming,national roaming,us roaming,global roam,roaming charge,cellular roaming,wifi roaming,roaming services,roaming mobile phone,roaming mobile,mobile phone roaming,roaming card,prepaid global roaming,prepaid international roaming,roaming phone,roaming gprs,roaming costs,what is roaming, roam free,cell roaming, 3g roaming,international roaming mobile,international mobile roaming,roaming fees,mobile roaming charges,phone roaming,cheap roaming,global roaming sim,international roaming charges,roaming phones,roaming tariffs,what are roaming charges,roaming numbers,singtel roaming,roaming in gsm,smart roaming,roaming world roaming,data roaming,roaming sims,roaming rates,roaming abroad,roaming us,globe roaming,roaming number,roaming free,cheapest roaming,sim roaming,roaming network,mobile global roaming,network roaming,global roaming mobile,free roam games,international roaming sim,roaming fee,roaming call,roaming tariff,telecom roaming,roam lyrics,roaming cost,roaming calls,roaming cell phone,roaming cell phones,mobile data roaming,3 roaming,international roaming prepaid,roam the collective,cheap international roaming,mobile international roaming,roaming list,telephone roaming,e toll,international roaming rates,roaming on,roaming prices,international roam,cheapest international roaming,cheapest roaming charges, idea roaming,roaming in europe,mobile roaming rates,cheap roaming charges,international roaming phone,international data roaming,roam phone,international roaming costs,global roaming charges,3 international roaming,globe prepaid roaming,globe telecom roaming,overseas roaming,three roaming,global roaming phone,cheapest roaming rates,roaming plans,roam sim,international roaming data,voice roaming,max roam,smart buddy roaming,samsung roaming,international roaming cards, data roaming charges,international roaming blackberry,international roaming service,auto roaming,three international roaming,dan roam,starhub roaming,unlimited roaming,cheap roaming rates,iphone roaming,iphone international roaming,singtel auto roaming,roam express,global data roaming,roaming data,international roaming 3,roaming blackberry,blackberry international roaming,roaming data charges,what is data roaming,roam data,roaming on orange,htc roaming,roaming with iphone,android roaming,international roaming iphone,ipad roaming,call and roam,data roaming blackberry,what is roaming on a cell phone,blackberry data roaming,roam pay,roam meaning,smart roam,blackberry roaming international,iphone 4 roaming,roam definition,iphone roaming," />
  <!-- Facebook -->
  <meta property="og:title" content="Flexiroam X" />
  <meta property="og:description" content="Latest travel hack that will change the way you roam. A revolutionary thin microchip attached to your SIM card that enables you to travel the world." />
  <meta property="og:site_name" content="Flexiroam X">
  <meta property="og:url" content="https://www.flexiroam.com/">
  <meta property="og:image" content="https://www.flexiroam.com/2017/img/earn1gb.jpg">
  <meta property="og:type" content="website">
  <meta property="fb:app_id" content="1352970271383331 " />

  <!-- Twitter -->
  <meta name="twitter:card" content="app">
  <meta name="twitter:site" content="@Flexiroam">
  <meta name="twitter:description" content="A revolutionary thin microchip attached to your SIM card that will change the way you roam forever.">
  <meta name="twitter:app:country" content="MY">
  <meta name="twitter:app:name:iphone" content="Flexiroam X">
  <meta name="twitter:app:id:iphone" content="1084265472">
  <meta name="twitter:app:url:iphone" content="https://itunes.apple.com/au/app/id1084265472?mt=8">
  <meta name="twitter:app:name:ipad" content="Flexiroam X">
  <meta name="twitter:app:id:ipad" content="1084265472">
  <meta name="twitter:app:url:ipad" content="https://itunes.apple.com/au/app/id1084265472?mt=8">
  <meta name="twitter:app:name:googleplay" content="Flexiroam X">
  <meta name="twitter:app:id:googleplay" content="com.flexiroamx">
  <meta name="twitter:app:url:googleplay" content="https://play.google.com/store/apps/details?id=com.flexiroamx">
  
  <!--GA-->
  
  <script>
    (function (i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function () {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-78413491-2', 'auto');  
    ga('require', 'ecommerce');
    ga('ecommerce:addTransaction', {
      'id': '<?=$record['invoice_no'] ?>', // Transaction ID. Required.
      'affiliation': 'Web Shop', // Affiliation or store name.
      'revenue': '<?=$record['amount'] ?>' // total.
    });
    ga('ecommerce:addItem', {
      'id': '<?=$record['invoice_no'] ?>', // Transaction ID. Required.
      'name': 'Flexiroam X Starter Pack', // Product name. Required.
      'price': '<?=$productamount?>', // Unit price.
    });
    ga('ecommerce:send');
    ga('send', 'pageview');
  </script>

  <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/slick.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>themes/css/main.css">

  <!-- external files-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/css/dist/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/css/dist/font-awesome.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/css/dist/hamburgers.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/css/dist/animate.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/css/dist/slick.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/css/dist/slick-theme.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/css/dist/jssocials.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/css/dist/jssocials-theme-flat.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/css/dist/animate.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/css/normalize.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/css/main.min.css" />

  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/css/dist/bootstrap-slider.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/css/dist/jquery.mCustomScrollbar.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/css/dist/odometer-theme-default.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/css/dist/venobox/venobox.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/css/thankyou.min.css" />

  <script type="text/javascript" src="<?php echo base_url(); ?>themes/js/dist/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>themes/js/dist/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>themes/js/dist/modernizr.custom.js"></script>


  <!--  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>-->


  <script src="<?php echo base_url(); ?>themes/js/bootstrap.min.js"></script>
  <script>
    function ebConversionTracker(conv) {
      var ebConversionImg = new Image();
      var ebConversionURL = "HTTPS://bs.serving-sys.com/Serving/ActivityServer.bs?cn=as&ActivityID=" + conv + "&ns=1";
      ebConversionImg.src = ebConversionURL;
    }

    function lt(tracker_url) {
      var trackerpix = new Image();
      trackerpix.src = tracker_url;
    }


    $(window).load(function () {
      // Animate loader off screen
      $(".se-pre-con").fadeOut("slow");;
    });
  </script>
  <style>
      .no-js #loader {
      display: none;
    }
    
    .js #loader {
      display: block;
      position: absolute;
      left: 100px;
      top: 0;
    }
    
    .se-pre-con {
      position: absolute;
      left: 0px;
      top: 127px;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background: url(<?php echo base_url();
      ?>themes/images/Preloader_10.gif) center no-repeat #fff;
    }
    
    @media screen and (max-width: 768px) {
      .se-pre-con {
        top: 97px;
      }
      .slick-arrow {
        display: block;
      }
    }
    
    .order-slider {
      margin-bottom: 20px;
    }
    
    .slick-arrow {
      display: none;
      z-index: 1;
      position: absolute;
      bottom: 5px;
      left: 0;
      width: 25%;
      font-size: 16px;
      color: #fff;
      text-align: center;
      text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
      background-color: #dd2626;
      filter: alpha(opacity=50);
      opacity: .8;
      height: 30px;
      line-height: 30px;
      padding: 0 10px;
    }
    
    .slick-prev {
      left: 0;
      right: auto;
    }
    
    .slick-next {
      right: 0;
      left: auto;
  </style>

  
</head>

<body class="sppg-test">
  <div id="preloader" class="hide">
    <svg id="FRLogo" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 654.7 107.1" xml:space="preserve" class="loading">
      <path class="path path-f" d="M27.1,30.7v16.2h36.2v15.2H27.1v29.5H10.4V15.5h57.7v15.2H27.1z"></path>
      <path class="path path-l" d="M78.8,91.6V15.5h16.7v60.8h37.8v15.2H78.8z"></path>
      <path class="path path-e" d="M145.3,91.6V15.5h57.2v14.9h-40.6v15.4h35.7v14.9h-35.7v16H203v14.9H145.3z"></path>
      <path class="path path-x" d="M265.7,91.6l-17-26.1l-17.1,26.1h-19L239,52.9l-25.4-37.4h19.5l15.9,24.7l16-24.7h19l-25.3,37.2l26.4,38.9H265.7z"></path>
      <path class="path path-i" d="M298.4,91.6V15.5H315v76.1H298.4z"></path>
      <path class="path path-r" d="M386.9,91.6l-22-29.6h-21.7v29.6h-8.6l0-76.1h32.6c16.7,0,27.4,9,27.4,22.7c0,12.7-8.7,20.1-20.6,22.3l23.3,31.1H386.9z M366.6,23.5h-23.4v30.9h23.3c11.4,0,19.5-5.9,19.5-15.8C386,29.1,378.9,23.5,366.6,23.5z"></path>
      <path class="path path-o" d="M442.8,92.9c-23,0-38.5-18.1-38.5-39.2c0-21.1,15.7-39.4,38.8-39.4c23.1,0,38.6,18.1,38.6,39.2C481.6,74.5,465.8,92.9,442.8,92.9z M442.8,22.1c-17.3,0-29.7,13.9-29.7,31.3c0,17.4,12.6,31.5,29.9,31.5c17.3,0,29.7-13.9,29.7-31.3C472.7,36.3,460.1,22.1,442.8,22.1z"></path>
      <path class="path path-a" d="M562.1,91.6h-9.2l-8.9-20.1h-41.3l-9,20.1H485L519.6,15h8L562.1,91.6z M523.5,25l-17.3,38.8h34.6L523.5,25z"></path>
      <path class="path path-m" d="M608.1,70.7h-0.4L580,30.1v61.5h-8.3V15.5h8.7L608,57l27.6-41.5h8.7v76.1h-8.6V30L608.1,70.7z"></path>
    </svg>
  </div>
  <div id="menu_mask"></div>
  <div id="app_banner">
    <div class="app-icon">
      <img src="<?php echo base_url(); ?>img/brand/app-icon.png" alt="">
    </div>
    <div class="app-info">
      <h3>Flexiroam X</h3>
      <div class="app-review">
        <i class="glyphicon glyphicon-star full"></i>
        <i class="glyphicon glyphicon-star full"></i>
        <i class="glyphicon glyphicon-star full"></i>
        <i class="glyphicon glyphicon-star full"></i>
        <i class="glyphicon glyphicon-star empty"></i>
        <!-- <span>(621 <i class="glyphicon glyphicon-user"></i>)</span> -->
      </div>
    </div>
    <div class="app-cta">
      <a href="#" class="close-banner">
        &times;
      </a>
      <a href="#" class="btn download-btn download-link">
        Install
      </a>
    </div>
  </div>
  <div id="topbar" class="fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="https://www.flexiroamx.com">
        <img src="<?php echo siteUrl ?>2017/img/flexiroam_logo.png" alt="">
      </a>
      <div id="main_menu">
        <ul class="navbar">
          <li class="menu-item">
            <a href="<?php echo siteUrl ?>starter-pack-pricing">
              <span>Get Microchip </span>
              <i class="glyphicon glyphicon-tag"></i>
            </a>
          </li>
          <li class="menu-item">
            <a id="download_app_link" href="#" class="download-link">
              <span>Download App </span>
              <i class="glyphicon glyphicon-download"></i>
            </a>
          </li>
        </ul>
        <button id="open_menu_btn" class="hamburger hamburger--emphatic" type="button" aria-label="Menu" aria-controls="navigation">
          <span class="hamburger-label">Menu</span>
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
        <button id="close_menu_btn" class="hamburger hamburger--emphatic is-active hide" type="button" aria-label="Menu" aria-controls="navigation">
          <span class="hamburger-label">Menu</span>
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
        <nav id="navigation" class="menu hide">
          <div class="menu__inner mCustomScrollbar">
            <div class="menu__list">
              <div class="menu__item"><a class="menu__link" href="<?php echo siteUrl ?>">Home</a></div>
              <div class="menu__item"><a class="menu__link" href="<?php echo siteUrl ?>coverage">Coverage</a></div>
              <div class="menu__item"><a class="menu__link" href="<?php echo siteUrl ?>starter-pack-pricing">Pricing</a></div>
              <div class="menu__item"><a class="menu__link" href="<?php echo siteUrl ?>faq">FAQ</a></div>
              <div class="menu__item"><a class="menu__link" href="<?php echo siteUrl ?>tutorials">Tutorials</a></div>
              <div class="menu__item"><a class="menu__link" href="<?php echo siteUrl ?>contact">Contact Us</a></div>
              <!-- <div class="submenu__list">
                <div class="submenu__item"><a href="<?php echo siteUrl ?>about">About Flexiroam</a></div>
                <div class="submenu__item"><a href="http://investor.flexiroam.com/">Investors</a></div>
                <div class="submenu__item"><a href="http://career.flexiroam.com/">Careers</a></div>
                <div class="submenu__item"><a href="http://blog.flexiroam.com/">Blog</a></div>
              </div> -->
              <div class="menu__download">
                <div class="download__item">
                  <a href="https://www.flexiroamx.com/download/?pid=FLEXIROAM&c=MAIN_SIDE&m=ios" target="_blank">
                            <img src="<?php echo siteUrl; ?>2017/img/app-store.png">
                        </a>
                </div>
                <div class="download__item">
                  <a href="https://www.flexiroamx.com/download/?pid=FLEXIROAM&c=MAIN_SIDE&m=and" target="_blank">
                            <img src="<?php echo siteUrl; ?>2017/img/google-play.png">
                        </a>
                </div>
              </div>
            </div>
            <div class="social__button">
              <div class="social__item"><a href="https://www.facebook.com/flexiroam" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
              <div class="social__item"><a href="https://www.twitter.com/flexiroam" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
              <div class="social__item"><a href="https://www.instagram.com/flexiroam" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></div>
              <div class="social__item"><a href="https://www.youtube.com/flexiroam" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></div>
              <div class="social__item"><a href="https://www.linkedin.com/company-beta/2390676/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
  <!-- Download Mobile App Modal -->
  <div id="downloadAppModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Download Flexiroam X Application</h4>
        </div>
        <div class="modal-body">
          <p>Please select the Operating System of your smartphone or mobile devices:</p>
          <div class="download-app">
            <a href="https://www.flexiroamx.com/download/?pid=FLEXIROAM&c=MAIN_POP&m=and" target="_blank"><img src="<?php echo siteUrl ?>2017/img/google-play.png"></a>
            <a href="https://www.flexiroamx.com/download/?pid=FLEXIROAM&c=MAIN_POP&m=ios" target="_blank"><img src="<?php echo siteUrl ?>2017/img/app-store.png"></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="thankyou" class="main">
    <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Thank You</li>
      </ol>
    </div>
    <div class="container-fluid">
      <div class="page-banner">

      </div>
    </div>
    <div class="container main-shop">
      <div class="row">
       

            <div class="thankyou col-sm-8 col-sm-offset-2" id="thank-you">

              <h1>Thank You!</h1>
              <p>Payment of <b>USD <? echo $record['amount']; ?></b> - made sucessfully to Flexiroam.</p>
              <p>Your order is confirmed. This is your confirmation number : <b><?=$record['invoice_no'] ?></b> Please check your email <b><?=$record['billing_email'] ?></b> for your invoice.</p>
              <p>You will receive an email with your tracking number when your item is shipped from our warehouse. Your items will be delivered in <b>3-7 working days.</b></p>
              <div class="btn continue-btn shopcontinue" id="shopping-btn">Continue Shopping</div>
            </div>
           

      </div>
    </div>
  </div>



  <section>
    <div id="shareSec">
      <div class="social-media-sharing">
        <h4>Share this Travel Hack</h4>
        <div id="social_media_share"></div>
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="footer-nav">
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
            <ul class="">
              <h4>Flexiroam X</h4>
              <li><a href="<?php echo siteUrl ?>starter-pack-pricing">Pricing</a></li>
              <li><a href="<?php echo siteUrl ?>coverage">Coverage</a></li>
              <li><a href="<?php echo siteUrl ?>tutorials">Tutorials</a></li>
              <li><a href="<?php echo siteUrl ?>faq">FAQ</a></li>
            </ul>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
            <ul class="">
              <h4>Company</h4>
              <li><a href="<?php echo siteUrl ?>about">About</a></li>
              <li><a href="http://investor.flexiroam.com/">Investors</a></li>
              <li><a href="http://career.flexiroam.com/">Careers</a></li>
              <li class="hide"><a href="http://blog.flexiroam.com/">Blog</a></li>
              <li><a href="https://www.flexiroam.com/app/">Voice App</a></li>
              <li><a href="<?php echo siteUrl ?>brand">Brand Resources</a></li>
            </ul>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <ul class="footer-contact">
              <h4>Contact Us</h4>
              <li>
                Call us
                <p>+60-326318181</p>
              </li>
              <li>
                WhatsApp
                <p>+6019-291-2692</p>
              </li>
              <li>
                Email
                <p>
                  <a href="mailto:support@flexiroam.com" target="_blank">support@flexiroam.com</a>
                </p>
              </li>
            </ul>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div class="footer-cta">
              <img src="<?php echo siteUrl ?>2017/img/brand/app-icon.png" alt="">
              <li>Flexiroam X
                <br />mobile app</li>
              <a href="https://www.flexiroamx.com/download/?pid=FLEXIROAM&c=MAIN_FOOTER&m=ios" target="_blank"><img src="<?php echo siteUrl; ?>2017/img/app-store.png"></a>
              <a href="https://www.flexiroamx.com/download/?pid=FLEXIROAM&c=MAIN_FOOTER&m=and" target="_blank"><img src="<?php echo siteUrl; ?>2017/img/google-play.png"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright">
      <div class="container">
        <!-- <div class="flexiroam-social-media">
                <p>Find us at: </p>
                <a href="https://www.facebook.com/flexiroam" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/flexiroam" target="_blank"><i class="fa fa-instagram"></i></a>
                <a href="https://www.twitter.com/flexiroam" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="https://www.linkedin.com/company/flexiroam" target="_blank"><i class="fa fa-linkedin"></i></a>
              </div> -->
        <div class="row">
          <div class="col-md-6">
            <p>Copyright &copy; 2017 FLEXIROAM Limited. All rights reserved. <a href="<?php echo siteUrl ?>terms">Terms & Conditions</a> | <a href="<?php echo siteUrl ?>privacy">Privacy Policy</a></p>
          </div>
          <div class="col-md-6">
            <p><em>* Your home SIM will be temporarily inactive while switched to Flexiroam X when traveling. Just switch back to access your home SIM when you wish to stop roaming. </em></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script src="https://use.typekit.net/ovk5gdc.js"></script>
  <script>
    try {
      Typekit.load({
        async: true
      });
    } catch (e) {}
  </script>
  <!--  <script type="text/javascript" src="-->
  <?php //echo base_url(); ?>
    <!--themes/js/dist/anime.min.js"></script>-->
    <!--  <script type="text/javascript" src="-->
    <?php //echo base_url(); ?>
      <!--themes/js/dist/block-revealer.js"></script>-->
      <!--  <script type="text/javascript" src="-->
      <?php //echo base_url(); ?>
        <!--themes/js/dist/jssocials.min.js"></script>-->
        <!--  <script type="text/javascript" src="-->
        <?php //echo base_url(); ?>
          <!--themes/js/dist/jquery.mCustomScrollbar.concat.min.js"></script>-->
          <!--  <script type="text/javascript" src="-->
          <?php //echo base_url(); ?>
            <!--themes/js/dist/main.js"></script>-->
            <!--  <script type="text/javascript" src="-->
            <?php //echo base_url(); ?>
              <!--themes/js/vue.js"></script>-->
              <!---->
              <!--  <script src="-->
              <?php //echo base_url(); ?>
                <!--themes/js/slick.min.js"></script>-->
                <!--  <script src="-->
                <?php //echo base_url(); ?>
                  <!--themes/js/main.js"></script>-->
                  <script type="text/javascript" src="<?php echo base_url(); ?>themes/js/dist/anime.min.js"></script>
                  <script type="text/javascript" src="<?php echo base_url(); ?>themes/js/dist/block-revealer.js"></script>
                  <script type="text/javascript" src="<?php echo base_url(); ?>themes/js/dist/jssocials.min.js"></script>
                  <script type="text/javascript" src="<?php echo base_url(); ?>themes/js/dist/jquery.mCustomScrollbar.concat.min.js"></script>
                  <script type="text/javascript" src="<?php echo base_url(); ?>themes/js/dist/main.js"></script>
                  <script type="text/javascript" src="<?php echo base_url(); ?>themes/js/vue.js"></script>

                  <script src="<?php echo base_url(); ?>themes/js/dropzone.js"></script>
                  <script src="<?php echo base_url(); ?>themes/js/backgroundVideo.min.js"></script>
                  <script src="<?php echo base_url(); ?>themes/js/smooth-scroll.min.js"></script>
                  <script src="<?php echo base_url(); ?>themes/js/slick.min.js"></script>
                  <script src="<?php echo base_url(); ?>themes/js/jquery.easy-autocomplete.min.js"></script>
                  <script src="<?php echo base_url(); ?>themes/js/main.js"></script>
                  <script src="<?php echo base_url(); ?>themes/js/remodal.min.js"></script>


                  <nav id="mobile">
                    <div class="header-menus">

                      <div class="header-menus-top">

                        <nav class="secondary" id="secondary-nav">
                          <ul class="nav">
                            <li><a data-scroll href="<?php echo siteUrl; ?>#benefits">Benefits</a></li>
                            <li style="display: none;"><a href="<?php echo siteUrl; ?>#promo">Promo</a></li>
                            <li><a data-scroll href="<?php echo siteUrl; ?>#how-x-works">How X Works</a></li>
                            <li data-video="1"><a data-scroll href="<?php echo siteUrl; ?>#the-x">The X</a></li>
                            <li><a data-scroll href="<?php echo siteUrl; ?>#rates">Rates</a></li>
                            <li><a data-scroll href="<?php echo siteUrl; ?>#coverage">Coverage</a></li>
                          </ul>
                        </nav>
                      </div>

                      <div class="header-menus-bottom">

                        <nav class="store-links">
                          <ul>
                            <li><a href="http://www.flexiroamx.com/download/android" class="google-play" target="_blank">
      <img src="<?php echo base_url(); ?>themes/images/google-play.png"  height="31px" alt="Google Play"/>
  </a></li>
                            <li><a href="http://www.flexiroamx.com/download/ios" class="app-store" target="_blank">
      <img src="<?php echo base_url(); ?>themes/images/app-store.png" height="31px" alt="Apple App Store"/>
  </a></li>
                          </ul>
                        </nav>
                        <nav role="navigation">
                          <ul class="menu cf">
                            <li>
                              <a href="<?php echo siteUrl; ?>about-us">About Us</a>
                            </li>
                            <li>
                              <a href="<?php echo siteUrl; ?>news">News</a>
                            </li>
                            <li>
                              <a href="<?php echo siteUrl; ?>faqs">FAQ</a>
                            </li>
                            <li>
                              <a href="<?php echo siteUrl; ?>tutorials">Tutorials</a>
                            </li>
                            <li>
                              <a href="<?php echo siteUrl; ?>customers">Customers</a>
                            </li>
                            <li>
                              <a href="<?php echo siteUrl; ?>contact">Contact Us</a>
                            </li>
                            <li>
                              <a href="<?php echo siteUrl; ?>terms">Terms &amp; Conditions</a>
                            </li>
                          </ul>
                        </nav>

                      </div>

                    </div>
                    <button class="burger close">Menu</button>
                  </nav>


</body>
<script>
  $('.shopcontinue').on('click', (function (e) {
    window.location.href = "https://www.flexiroam.com/shop";
  }));
</script>

</html>