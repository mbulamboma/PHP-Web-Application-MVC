<script src="./js/jquery/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" media="screen" type="text/css" title="Design" href="./themes/css/plucss.css" />
<div class="auth col sml-12 sml-centered med-5 lrg-3">
    <div class="logo">
    <img src="./images/logo.jpg" style="margin-left: 40%;"  width="90">
    </div>
    <div class="connexion">
    <form method="POST" id="form_auth" action="index.php">
        <fieldset>
              <h1 class="h5 text-center"><strong>Connexion</strong></h1>
              <div class="errors"></div>
              <div class="blinder"> </div>
                <div class="loader"><div class="loader1"> <div class="loader2"> </div> </div></div>
              <div class="grid">
                <div class="col sml-12">
                    <label for="email">Email&nbsp;:</label>
                    <input id="id_login" name="email" type="email" autofocus="email" class="sml-centered" size="10" maxlength="255" required/>
                </div>
              </div>
            <div class="grid">
                <div class="col sml-12">
                    <label for="password">Password:</label>
                    <input id="id_password" name="password" type="password" class="full-width" size="10" maxlength="255" required/> 
                </div>
            </div>
            <div class="grid">
                <div class="col sml-12 text-center">
                    <input id="btn" class="red" type="submit" value="Submit" />
                </div>
            </div>
        </fieldset>
    </form>
    <p class="text-center">
        <small><a class="red" href="index.php">Home</a> -or Become a member: <a href="register.php">Register</a></small>
    </p>
</div>
    
</div>
<script src="./js/ajax/login.js" type="text/javascript"></script>

    <style>
        .loader{ margin-left: 18%; position: absolute; z-index: 10;border: 10px solid transparent; border-radius: 50%; border-top: 10px solid yellow; border-bottom:  8px solid yellow; width: 120px; height: 120px; animation: rotationback 3s linear infinite}
        .loader1{  margin: auto;border: 8px solid red; border-radius: 50%;width: 100px; height: 100px; animation: rotation 3s linear infinite}
        .loader2{  margin: auto;border: 8px solid transparent; border-radius: 50%; border-top: 8px solid blue; border-bottom: 8px solid #494949; width: 80px; height: 80px; animation: rotation 2s linear infinite}
        .blinder{ margin: auto; margin-top: -8%; margin-left: -5%;width: 91%; position: absolute; z-index: 9;height: 250px;background: #fff; opacity: .8; border-radius: 30px;}
        
        @keyframes rotation{ 0%{transform: rotate(0deg);} 100%{transform: rotate(360deg);}}
        @keyframes rotationback{ 0%{transform: rotate(360deg);} 100%{transform: rotate(0deg);}}
    </style>
  
