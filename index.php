<?php
session_start();
if(isset($_SESSION['apiToken'])) {
	echo'
		<html>
			<head>
				<meta http-equiv="REFRESH" content="0;url=dashboard.php">
			</head>
		</html>
		';
}else {
	echo '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Financiamiento - Boxisleep</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="formLogin" name="formLogin">
              <h1>Login</h1>
              <div>
                <input type="text" id="usuario_login_admin" class="form-control" placeholder="Usuario" name="username" required="" />
              </div>
              <div>
                <input type="password" id="pass_login_admin" class="form-control" placeholder="Password" name="password" required="" />
              </div>
              <div class="errorLogin" style="text-shadow:none">                	
              </div>
              <div>
                <button class="btn btn-default submit" id="loginBtnForm">Log in</button>
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>
              <div class="clearfix"></div>
              <div class="separator">               

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1>
                    <figure id="logoLogin">
                      <svg version="1.1" baseProfile="tiny" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 165.7 25.2" overflow="scroll" xml:space="preserve">
                        <g id="XMLID_28540_">
                            <g id="XMLID_30310_">
                              <circle id="XMLID_30311_" fill="none" cx="8.3" cy="17.3" r="2.7"></circle>
                            </g>
                            <g id="XMLID_28541_">
                              <g id="XMLID_29688_">
                                <path id="XMLID_29722_" d="M17.4,17.7c0,4.6-3.6,7.4-8.8,7.4H0V0.2h8c5.1,0,8.1,2.9,8.1,6.8c0,1.9-0.9,3.5-2.2,4.7                 C15.9,13.1,17.4,15.1,17.4,17.7z M5.2,9.8H8c1.7,0,2.9-0.7,2.9-2.2c0-1.4-1.2-2.2-2.9-2.2H5.2V9.8z M12.2,17.3                 c0-1.6-1.3-2.7-3.5-2.7H5.2v5.2h3.4C11,19.9,12.2,18.9,12.2,17.3z"></path>
                                <path id="XMLID_29720_" d="M59.8,12.6L69,25.1h-6.3L56.7,17l-6.1,8.1h-6.3l9.2-12.4L44.3,0.2h6.3l6.1,8.1l6.1-8.1H69L59.8,12.6z"></path>
                                <path id="XMLID_29718_" d="M70.5,0.2h5.2v24.8h-5.2V0.2z"></path>
                                <path id="XMLID_29716_" d="M83.2,18.7c0.3,3.2,3.1,5,5.8,5c3.4,0,5.5-1.8,5.5-4.4c0-3.2-2.8-4.7-5.9-6.2                 c-3.6-1.8-6.6-3.2-6.6-7.2c0-3.4,3-5.8,6.7-5.8c3.6,0,6.2,2.6,6.5,5.8h-1.7c-0.3-2.4-2.2-4.3-4.8-4.3c-2.8,0-5,1.8-5,4.2                 c0,3.2,2.5,4.3,5.4,5.6c4,1.9,7.1,3.9,7.1,7.8c0,3.6-3,6-7.2,6c-3.8,0-7.2-2.5-7.4-6.5H83.2z"></path>
                                <path id="XMLID_29714_" d="M112.5,23.5v1.6h-11.6V0.2h1.6v23.2H112.5z"></path>
                                <path id="XMLID_29712_" d="M117.7,1.8v9.6h8.4V13h-8.4v10.4h10.8v1.6h-12.4V0.2h12.4v1.6H117.7z"></path>
                                <path id="XMLID_29710_" d="M134.6,1.8v9.6h8.4V13h-8.4v10.4h11.2v1.6H133V0.2h12.8v1.6H134.6z"></path>
                                <path id="XMLID_29689_" d="M165.7,8.1c0,5.1-3.6,7.8-8.4,7.8h-5.5v9.2h-2V0.2h7.5C162,0.2,165.7,2.9,165.7,8.1z M164,8.1                 c0-4.2-2.9-6.2-6.7-6.2h-5.5v12.4h5.5C161.2,14.3,164,12.3,164,8.1z"></path>
                              </g>
                              <path id="XMLID_29680_" fill="#00C6C1" d="M32.1,0.5C25.4,0.5,20,5.9,20,12.6c0,6.7,5.4,12.2,12.2,12.2c6.7,0,12.1-5.4,12.1-12.2                C44.3,5.9,38.9,0.5,32.1,0.5z M25.2,14.7l-1.2,1.2c-0.2,0.2-0.6,0.2-0.8,0l-0.1-0.1c-0.2-0.2-0.2-0.6,0-0.8l1.2-1.2                c0.2-0.2,0.6-0.2,0.8,0l0.1,0.1C25.4,14.1,25.4,14.5,25.2,14.7z M24.2,11.9C24,11.5,24,11,24.3,10.8c0.1,0,0.3,0,0.4,0                c0.6,0.7,1.2,1.5,1.9,2.1c3.8,3.3,9.7,2.5,12.6-1.5c0.2-0.2,0.3-0.4,0.5-0.6c0.1,0,0.2,0,0.3,0c0.5,0.2,0.5,0.4,0.2,0.9                C36.6,17.3,27.9,17.4,24.2,11.9z M28.6,16.8l-0.7,1.5c-0.1,0.3-0.5,0.4-0.7,0.3l-0.1,0c-0.3-0.1-0.4-0.5-0.3-0.7l0.7-1.5                c0.1-0.3,0.5-0.4,0.7-0.3l0.1,0C28.6,16.2,28.7,16.5,28.6,16.8z M32.7,19c0,0.3-0.2,0.6-0.6,0.6h-0.1c-0.3,0-0.6-0.2-0.6-0.6v-1.7                c0-0.3,0.2-0.6,0.6-0.6h0.1c0.3,0,0.6,0.2,0.6,0.6V19z M37.3,18.6L37.3,18.6c-0.4,0.2-0.7,0-0.8-0.3l-0.7-1.5                c-0.1-0.3,0-0.6,0.3-0.7l0.1,0c0.3-0.1,0.6,0,0.7,0.3l0.7,1.5C37.7,18.2,37.6,18.5,37.3,18.6z M41.2,15.9c-0.2,0.2-0.6,0.2-0.8,0                l-1.2-1.2c-0.2-0.2-0.2-0.6,0-0.8l0.1-0.1c0.2-0.2,0.6-0.2,0.8,0l1.2,1.2C41.4,15.3,41.4,15.7,41.2,15.9L41.2,15.9z"></path>
                            </g>
                        </g>
                      </svg>
                    </figure>                    
                  </h1>
                  <p>©2018 All Rights Reserved. Boxisleep</p>
                </div>
              </div>
            </form>
          </section>
        </div>        
      </div>
    </div>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script async type="text/javascript" src="build/js/main.js"></script>
  </body>
</html>
	';
}
?>







