<script src="./js/jquery/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" media="screen" type="text/css" title="Design" href="./themes/css/plucss.css" />
<link href="./themes/css/fleche.css" rel="stylesheet" type="text/css"/>
<div class="logo" style="float: none; color: white; font-size: 30px; background: gray">
    Here we gonna put a big image
</div>
<div class ="reg col sml-12 sml-righted med-5 lrg-">
<ul class="breadcrumb">
    <li><a href="#">First step</a></li>
    <li><a href="#">Second step</a></li>
    <li><a href="#">Last step</a></li>
    <li><a href="#" style="color: red"></a></li>
</ul>
    <form class="formulaire" method="post" action="register.php" enctype="multipart/form-data">
        <h1 class="h5 text-center"><strong><br /><br />Step 1/3</strong></h1>
        <fieldset>
         <label for="firstname">* Firstname :</label> 
         <input name="firstname" type="text" size="10" maxlength="25" id="firstname" placeholder="Your firstname" required/><br />

         <label for="lastname">* Lastname :</label> 
         <input name="lastname" type="text" id="lastname" size="10" maxlength="25" placeholder="Your lastname name" required/><br />

         <label for="email">Email&nbsp;:</label>
         <input id="id_login" name="email" type="email" autofocus="email" class="sml-centered" size="10" maxlength="155" required/><br />

        <label for="password">* Create a Password:</label>
        <input type="password" name="password" id="password" placeholder="Your password" required/><br />

        <label for="confirm">* Confirm your password :</label>
        <input type="password" name="confirm" id="confirm" placeholder="Confirm" required/>
        </fieldset>
    <br />
    <?php echo $this->captchaMessage ?> 
    <span class="capcha-word" style="width: 100px"></span>

        <p>Fields preceded by * are mandatory</p>
        <p><input type="submit" value="Sign up" /></p>
    </form>
</div>
