<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;

         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
 <meta name="viewport" content="width=550, initial-scale=1">
<title>Nextgen</title>
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" >

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" >

<link rel="stylesheet" href="css/jquery.flipster.min.css">
<link href="css/style.css" rel="stylesheet" type="text/css" >
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.flipster.min.js"></script>

</head>
<body>
	<header>
    	<div class="container">
        	<div class="row">
            	<div class="col-md-3 col-sm-12 col-xs-3">
                	<div class="logo hidden-xs">
                    	<img src="images/logo.png" alt="logo"> <span><span class="blue">NextGen</span><sapn class="orange"> HCM</span></span>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12">
                <div class="phonenumber">
                	<p><span class="fa fa-phone"></span>+1(999) 999 9999</p>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                	<div class="menu">
                    	<nav class="navbar navbar-default">
                              <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                  </button>
                                  <a class="navbar-brand visible-xs" href="#"><img src="images/logo.png" alt="logo"></a>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                  <ul class="nav navbar-nav">
                                    <li class=""><a href="#">Products <span class="sr-only">(current)</span></a></li>
                                    <li><a href="#">Features</a></li>
                                    <li><a href="#">Pricing</a></li>
                                    <li><a href="#">Who we are?</a></li>
                                     <li><a href="#">Contact Us</a></li>
                                  </ul>
                                  <button type="button" class="btn btn-danger pull-right hidden-xs" data-toggle="modal" data-target="#myModal"><span class="fa fa-sign-in"></span>Login</button>

                                </div><!-- /.navbar-collapse -->
                              </div><!-- /.container-fluid -->
							</nav>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Login</h4>
          </div>
          <div class="modal-body">
            <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="slider">
    	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="images/slide_1.jpg" alt="...">
              <div class="carousel-caption">
                <h1>Next Gen <span>HCM</span></h1>
                <h1>30-Day Trial</h1>
                <p>Experience every module completely
</p>
					<button type="button" class="btn btn-warning pull-left">Signup Now !</button>
              </div>
            </div>
            <div class="item">
              <img src="images/slide_2.jpg" alt="...">
              <div class="carousel-caption">

              </div>
            </div>

          </div>

          <!-- Controls -->
           <!--<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>-->
        </div>
    </div>
    <div class="help">
    	<div class="container-fluid">
        	<div class="row">
            	<h3 class="text-center">WE HELP YOU...</h3>
                <ul class="help_services">
                	<li>
                    	<div class="help_con help_width">
                        	<span>Organize</span>
                        </div>
                    </li>
                    <li>
                    	<div class="help_aut help_width">
                        	<span>Automate</span>
                        </div>
                    </li>
                    <li>
                    	<div class="help_emp help_width">
                        	<span>Empower</span>
                        </div>
                    </li>
                    <li>
                    	<div class="help_eng help_width">
                        	<span>Engage</span>
                        </div>
                    </li>
                    <li>
                    	<div class="help_mea help_width">
                        	<span>Measure</span>
                        </div>
                    </li>
                    <li>
                    	<div class="help_app help_width">
                        	<span>Appreciate</span>
                        </div>
                    </li>
                    <li>
                    	<div class="help_out help_width">
                        	<span>Outperform</span>
                        </div>
                    </li>
                </ul>
                <h4 class="text-center feel">Feel your employees' pulse, show you care. Get them Smile.</h4>
            </div>
        </div>
    </div>
    <div class="chart">
    	<div class="container">
        	<div class="row">
            <h2 class="text-center">PULSEHRM OFFERINGS OVERVIEW</h2>
            	<div class="col-md-6 col-lg-8 col-sm-12">
                	<div class="chart_img">
                    	<img src="images/offering_vewimg.png" alt="chart image" class="img-responsive">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-sm-12">
                	<div class="blue_bg">
                    	<p> PulseHRM is a modular and comprehensive cloud based HRMS software with a fully integrated
                        payroll solution aimed at fast growing small to mid-sized organizations. <br>
                        <br>
                        The product is built using the Oracle tech stack with hosting on Oracle cloud that ensures complete confidentiality, integrity <br>
                        and availability of your <br>
                        information – data security <br>
                        aspects that are vital <br>
                        for your business.
                    </p>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="steps">
    	<div class="container">
        	<div class="row">
            	<h2 class="text-center">GET OPERATIONAL IN THREE SIMPLE STEPS
</h2>
				<img src="images/signup_steps.png" class="center-block img-responsive" alt="sign up">
                <div class="guide">
                <img src="images/need_steps.jpg" alt="step" class="img-responsive center-block ">
                	<div class="guidtext">
                    <p class="text-center">Need help strategizing.</p>
<p class="text-center">Our consultants are on your side</p></div>
					<button type="button" class="btn btn-warning btn_fixed center-block">Signup Now !</button>
				</div>
            </div>
        </div>
    </div>
    <div class="Filiper_slider">
    	<div class="container">
        	<div class="row">
            <h1 class="text-center">try it</h1>
            <article id="demo-default" class="demo">

            	<div id="coverflow">

        <ul class="flip-items">
            <li data-flip-title="Red">
                <img src="images/1_@.jpg">
            </li>
            <li data-flip-title="Razzmatazz" data-flip-category="Purples">
                <img src="images/2.jpg">
             </li>
            <li data-flip-title="Deep Lilac" data-flip-category="Purples">
                <img src="images/3.jpg">
            </li>
            <li data-flip-title="Daisy Bush" data-flip-category="Purples">
                <img src="images/2.jpg">
            </li>
            <li data-flip-title="Cerulean Blue" data-flip-category="Blues">
                <img src="images/2.jpg">
            </li>
            <li data-flip-title="Dodger Blue" data-flip-category="Blues">
                <img src="images/2.jpg">
            </li>
            <li data-flip-title="Cyan" data-flip-category="Blues">
                <img src="images/2.jpg">
            </li>
            <li data-flip-title="Robin's Egg" data-flip-category="Blues">
                <img src="images/2.jpg">
            </li>
            <li data-flip-title="Deep Sea" data-flip-category="Greens">
                <img src="images/2.jpg">
            </li>
            <li data-flip-title="Apple" data-flip-category="Greens">
                <img src="images/2.jpg">
            </li>
        </ul>
    </div>
    </article>
            </div>
        </div>
    </div>
    <div class="testimonial">

            		<div class="carousel-reviews broun-block">
    <div class="container">
        <div class="row">
        <h1 class="text-center">THE BUZZ AROUND...</h1>
            <div id="carousel-reviews" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
                    <div class="item active">
                	    <div class="col-md-6 col-sm-6">
        				    <div class="block-text rel zmin">


						        <p>Never before has there been a good film portrayal of ancient Greece's favourite myth. So why would Hollywood start now? This latest attempt at bringing the son of Zeus to the big screen is brought to us by X-Men: The last Stand director Brett Ratner. If the name of the director wasn't enough to dissuade ...</p>
							    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
					        </div>
							<div class="person-text rel">
				                <img alt="" src="images/stech_logo.png">
								<a title="" href="#">Anna</a>
								<i>from Glasgow, Scotland</i>
							</div>
						</div>
            			<div class="col-md-6 col-sm-6 hidden-xs">
						    <div class="block-text rel zmin">


        						<p>The 2013 movie "The Purge" left a bad taste in all of our mouths as nothing more than a pseudo-slasher with a hamfisted plot, poor pacing, and a desperate attempt at "horror." Upon seeing the first trailer for "The Purge: Anarchy," my first and most immediate thought was "we really don't need another one of these."  </p>
					            <ins class="ab zmin sprite sprite-i-triangle block"></ins>
				            </div>
							<div class="person-text rel">
				                <img alt="" src="images/g11n_logo.png">
						        <a title="" href="#">Ella Mentree</a>
								<i>United States</i>
							</div>
						</div>

                    </div>
                    <div class="item">
                        <div class="col-md-6 col-sm-6">
        				    <div class="block-text rel zmin">

						        <p>Never before has there been a good film portrayal of ancient Greece's favourite myth. So why would Hollywood start now? This latest attempt at bringing the son of Zeus to the big screen is brought to us by X-Men: The last Stand director Brett Ratner. If the name of the director wasn't enough to dissuade ...</p>
							    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
					        </div>
							<div class="person-text rel">
								 <img alt="" src="images/g11n_logo.png">
								<a title="" href="#">Anna</a>
								<i>from Glasgow, Scotland</i>
							</div>
						</div>
            			<div class="col-md-6 col-sm-6 hidden-xs">
						    <div class="block-text rel zmin">


        						<p>The 2013 movie "The Purge" left a bad taste in all of our mouths as nothing more than a pseudo-slasher with a hamfisted plot, poor pacing, and a desperate attempt at "horror." Upon seeing the first trailer for "The Purge: Anarchy," my first and most immediate thought was "we really don't need another one of these."  </p>
					            <ins class="ab zmin sprite sprite-i-triangle block"></ins>
				            </div>
							<div class="person-text rel">
								 <img alt="" src="images/g11n_logo.png">
						        <a title="" href="#">Ella Mentree</a>
								<i>United States</i>
							</div>
						</div>

                    </div>

                </div>
                <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                </a>
            </div>
        </div>
    </div>
</div>

    </div>
    <div class="thebest">
    	<div class="container">
        	<div class="row">
            <div class="text">
            	<h1 class="text-center">WE HELP YOU BE THE BEST</h1>
                <p class="text-center">Welcome to a world class, cloud-based, integrated HRMS and Payroll solution from Evam Tech Labs Pvt. Ltd.</p>
                <p class="text-center">Thank you for taking the time to get to know us better.
</p>
</div>
<div class="text">
	<p class="text">Our professional experience includes entrepreneurship, consulting, product development and customer services. With a vibrant team that has over 100+ man-years of product development experience, we combine this vast knowledge with fresh talent from top engineering and business schools to constantly challenge ourselves.
</p>
</div>
<div class="text">
	<p class="text">We are here to re-invent the enterprise-wide solutions for SMBs and help you focus on your most important asset - your employees. Our aim is to bring you the best solutions on technology platforms that Fortune 100 companies use, at a fraction of the usual cost and in turn help your business grow exponentially
</p>

</div>
<div class="text">
	<p class="text-center">We are based out of Hyderabad with sales offices in Bangalore and Mumbai. If you would want to know more, please visit us at <a href="#">www.evamlabs.com.</a></p>
</div>
<div class="text">
	<p class="text-center">Register today for a free demo and let us help you be the best.

</p>
</div>
	<div class="align text-center">
    	<button type="button" class="btn btn-warning">Register</button>
    </div>
            </div>
        </div>
    </div>
    <div class="contact">
    	<div class="container">
        	<div class="row">
            <h1 class="text-center">CONTACT US</h1>
            	<div class="col-sm-4">
                	<div class="form_cont">
                    	<form class="form-horizontal">
                              <div class="form-group form-group-lg">

                                <div class="col-sm-10">
                                  <input class="form-control" type="text" id="formGroupInputLarge" placeholder="Full Name*">
                                </div>
                              </div>
                              <div class="form-group form-group-lg">

                                <div class="col-sm-10">
                                  <input class="form-control" type="text" id="formGroupInputSmall" placeholder="Phone*">
                                </div>
                              </div>

                              <div class="form-group form-group-lg">

                                <div class="col-sm-10">
                                  <select class="form-control">
                                      <option>Select a Country*</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                    </select>
                                </div>
                              </div>
                              <div class="form-group form-group-lg">

                                <div class="col-sm-10">
                                  <input class="form-control" type="text" id="formGroupInputSmall" placeholder="How can wb help you?*">
                                </div>
                              </div>
						</form>
                    </div>
                </div>
                <div class="col-sm-4">
                	<div class="form_cont">
                    	<form class="form-horizontal">
                              <div class="form-group form-group-lg">

                                <div class="col-sm-10">
                                  <input class="form-control" type="text" id="formGroupInputLarge" placeholder="Business E-mail Address*">
                                </div>
                              </div>
                              <div class="form-group form-group-lg">

                                <div class="col-sm-10">
                                  <input class="form-control" type="text" id="formGroupInputSmall" placeholder="Company Name*">
                                </div>
                              </div>

                              <div class="form-group form-group-lg">

                                <div class="col-sm-10">
                                  <select class="form-control">
                                      <option>Area of Interest*</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                    </select>
                                </div>
                              </div>
                              <div class="form-group form-group-lg">

                                <div class="col-sm-5">
                                  <img src="images/image.jpg"  class="code" alt="code">
                                </div>
                                <div class="col-sm-5">
                                  <input class="form-control" type="text" id="formGroupInputSmall" placeholder="Eneter Code">
                                </div>
                              </div>
						</form>
                    </div>
                </div>
                <div class="col-sm-4">
                	<p class="contact_add">
                        <strong>Evam Tech Labs Pvt. Ltd. </strong> <br>
                        Plot No. 14, Rohini Layout<br>
                        Madhapur, Hyderabad<br>
                        Telangana - 500081<br><br>
                        +91-40-32595768<br>
                        Email: <a href="mailto:info@pulsehrm.com" style="color:#ff7400">info@pulsehrm.com</a>
                    </p>
                </div>
                <div class="clearfix"></div>
                <div class="align text-center">
    	<button type="button" class="btn btn-warning">Submit!</button>
    </div>
            </div>
        </div>
    </div>
    <div class="footer">
    	<div class="container">
        	<div class="row">
            	<nav class="pull-left" >
                	<a href="#">PulseHRM Lite | </a> <a href="#">Features |</a> <a href="#">Pricing |</a> <a href="#">Who we are? |</a>  <a href="#">Blog | </a> <a href="#">Contact Us |</a>  <a href="#">Terms</a> | <a href="#">Privacy policy</a><br>
                    © 2014 <a target="_blank" href="#" title="">PulseHRM.com</a>. All Rights Reserved.
                </nav>
                <div class="pull-right">
                	<div class="social">
                    	<a href="#" target="_blank"><i class="fa fa-facebook"></i> </a>
                    <a href="#" class="socialmedia_icons" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="signup">
        <h2 class="text-center">Sign up Now!</h2>
        <div id="fpi_title" class="rotate fpi_title"><h2>SIGN UP</h2></div>
        		<form class="fix">

                      <div class="form-group">

                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Full Name">
                      </div>
                      <div class="form-group">

                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                       <div class="form-group">

                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                      </div>
                      <div class="form-group">

                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                       <div class="form-group">

                        <select class="form-control">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                      <div class="form-group">

                        <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                      </div>
                       <div class="form-group">

                        <select class="form-control">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                      </div>
                      <div class="checkbox">
      <label>
        <input type="checkbox"> I agree to User Agreement
      </label>
    </div>
 				<button type="submit" class="btn btn-danger">Submit</button>
				</form>
        </div>
    </div>
<script>
    var coverflow = $("#coverflow").flipster({
        style: 'flat',
        spacing: -0.25
    });
</script>
<script>
$(window).scroll(function(){
    if ($(window).scrollTop() >= 70) {
       $('header').addClass('fixed-header');
    }
    else {
       $('header').removeClass('fixed-header');
    }
});
</script>
<script>
$(document).ready(function() {
    $("#fpi_title").click(function(){
		$(".signup").toggleClass("show");

});
});
</script>
</body>
</html>
