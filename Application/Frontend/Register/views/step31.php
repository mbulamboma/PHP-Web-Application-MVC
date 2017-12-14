<link href="./themes/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="./themes/css/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="./themes/css/bootstrap/form-elements.css" rel="stylesheet" type="text/css"/>
<link href="./themes/css/bootstrap/style.css" rel="stylesheet" type="text/css"/>

<div class="top-content">
    <div class="inner-bg">
        <div class="container">
            <div class="row">        
                <div class="col-sm-7 text">
                    <h1 style="text-shadow: 0 1px 1px black;"><strong>At last!</strong> Update your profil </h1>
                    <div class="description">
                                Your Avatar will help other member see your profil
                                <br />Read our  <a href="./terms.html" style="color: blue"><strong>Terms of use</strong></a>
                       <br /> You have the right to abort the process...
                    </div>
                    <div class="top-big-link">
                        <a class="btn btn-link-1" href="#"><i class="fa fa-home"></i> Go to home</a> or<a class="btn btn-link-2" href="#"> <i class="fa fa-undo"> </i> Abort</a>
                    </div>
                </div>
                <div class="col-sm-5 form-box">
                        <div class="form-top">
                                <div class="form-top-left">
                                        <h3>Last Step</h3>
                                <p>Update your Profil:</p>
                                </div>
                                <div class="form-top-right">
                                        <i class="fa fa-picture-o"></i>
                                </div>
                        </div>
                    
                    <div class="form-bottom">
                            <form role="form" action="#" method="post" class="step2-form">
                                <div style="width: 50%; float: left;" id="image-uploader">
                                    <span>Drag your image here </span>
				</div>
                                <div class="profil img-responsive" id="image" ></div>
                                <div class="col-md-12">
					<div class="progress">
					  	<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
					    	<span class="sr-only">0% Complete (success)</span>
					  	</div>
					</div>
				</div>
                                <div class="avatar-error"></div>
                                <button type="submit" class="btn">Finished <i class="fa fa-check"></i></button>
                            </form>
                    </div>
                </div>
             </div>
        </div>
    </div>

</div>
        <style>
            body{
                margin-top: -8.5%;
                background: whitesmoke;
            }
            
            #image-uploader{
                    border: 1px dotted #555;
                    height: 150px;
                    text-align: center;
                    line-height: 150px;
                    margin-top: 20px;
                    margin-bottom: 20px;
            }
            .profil{
                height: 150px;
                width: 40%; 
                float: right;
                border: 1px dotted transparent;
                margin-left: 20px;
                margin-top: 20px;
                margin-bottom: 20px;
                overflow: hidden;
            }
        </style>

        <!-- Javascript -->
        <script src="./js/jquery/jquery.min.js" type="text/javascript"></script>
        <script src="./js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="./js/jquery/jquery.backstretch.js" type="text/javascript"></script>
        <script src="./js/bootstrap/retina-1.1.0.min.js" type="text/javascript"></script>
        <script src="./js/ajax/upload.js" type="text/javascript"></script>
        <!--[if lt IE 10]>
            <script src="./js/bootstrap/placeholder.js" type="text/javascript"></script>
        <![endif]-->
