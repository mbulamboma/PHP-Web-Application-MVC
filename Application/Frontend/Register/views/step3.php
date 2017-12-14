<!DOCTYPE html>
<!-- saved from url=(0062)http://webapplayers.com/inspinia_admin-v2.7.1/form_wizard.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>American Corner | Wizards</title>
    <link href="./themes/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="./themes/css/bootstrap/regsteps/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="./themes/css/bootstrap/regsteps/custom.css" rel="stylesheet" type="text/css"/>
    <link href="./themes/css/bootstrap/regsteps/jquery.steps.css" rel="stylesheet" type="text/css"/>
    <link href="./themes/css/bootstrap/regsteps/animate.css" rel="stylesheet" type="text/css"/>
    <link href="./themes/css/bootstrap/regsteps/style.css" rel="stylesheet" type="text/css"/>
</head>

<body class=" pace-done">
  <div class="pace  pace-inactive">
  <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Wizard with Validation</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="http://webapplayers.com/inspinia_admin-v2.7.1/form_wizard.html#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="http://webapplayers.com/inspinia_admin-v2.7.1/form_wizard.html#">Config option 1</a>
                                    </li>
                                    <li><a href="http://webapplayers.com/inspinia_admin-v2.7.1/form_wizard.html#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <h2>
                                Validation Wizard Form
                            </h2>
                            <p>
                                This example show how to use Steps with jQuery Validation plugin.
                            </p>

                            <form id="form" action="#" class="wizard-big wizard clearfix" role="application" novalidate="novalidate"><div class="steps clearfix"><ul role="tablist"><li role="tab" class="first current error" aria-disabled="false" aria-selected="true"><a id="form-t-0" href="http://webapplayers.com/inspinia_admin-v2.7.1/form_wizard.html#form-h-0" aria-controls="form-p-0"><span class="current-info audible">current step: </span><span class="number">1.</span> Account</a></li><li role="tab" class="disabled" aria-disabled="true"><a id="form-t-1" href="http://webapplayers.com/inspinia_admin-v2.7.1/form_wizard.html#form-h-1" aria-controls="form-p-1"><span class="number">2.</span> Profile</a></li><li role="tab" class="disabled" aria-disabled="true"><a id="form-t-2" href="http://webapplayers.com/inspinia_admin-v2.7.1/form_wizard.html#form-h-2" aria-controls="form-p-2"><span class="number">3.</span> Warning</a></li><li role="tab" class="disabled last" aria-disabled="true"><a id="form-t-3" href="http://webapplayers.com/inspinia_admin-v2.7.1/form_wizard.html#form-h-3" aria-controls="form-p-3"><span class="number">4.</span> Finish</a></li></ul></div><div class="content clearfix">
                                <h1 id="form-h-0" tabindex="-1" class="title current">Account</h1>
                                <fieldset id="form-p-0" role="tabpanel" aria-labelledby="form-h-0" class="body current" aria-hidden="false">
                                    <h2>Account Information</h2>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>Username *</label>
                                                <label id="userName-error" class="error" for="userName">This field is required.</label><input id="userName" name="userName" type="text" class="form-control required error" aria-required="true">
                                            </div>
                                            <div class="form-group">
                                                <label>Password *</label>
                                                <label id="password-error" class="error" for="password">This field is required.</label><input id="password" name="password" type="text" class="form-control required error" aria-required="true">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password *</label>
                                                <label id="confirm-error" class="error" for="confirm">This field is required.</label><input id="confirm" name="confirm" type="text" class="form-control required error" aria-required="true">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="text-center">
                                                <div style="margin-top: 20px">
                                                    <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                <h1 id="form-h-1" tabindex="-1" class="title">Profile</h1>
                                <fieldset id="form-p-1" role="tabpanel" aria-labelledby="form-h-1" class="body" aria-hidden="true" style="display: none;">
                                    <h2>Profile Information</h2>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>First name *</label>
                                                <input id="name" name="name" type="text" class="form-control required" aria-required="true">
                                            </div>
                                            <div class="form-group">
                                                <label>Last name *</label>
                                                <input id="surname" name="surname" type="text" class="form-control required" aria-required="true">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Email *</label>
                                                <input id="email" name="email" type="text" class="form-control required email" aria-required="true">
                                            </div>
                                            <div class="form-group">
                                                <label>Address *</label>
                                                <input id="address" name="address" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <h1 id="form-h-2" tabindex="-1" class="title">Warning</h1>
                                <fieldset id="form-p-2" role="tabpanel" aria-labelledby="form-h-2" class="body" aria-hidden="true" style="display: none;">
                                    <div class="text-center" style="margin-top: 120px">
                                        <h2>You did it Man :-)</h2>
                                    </div>
                                </fieldset>

                                <h1 id="form-h-3" tabindex="-1" class="title">Finish</h1>
                                <fieldset id="form-p-3" role="tabpanel" aria-labelledby="form-h-3" class="body" aria-hidden="true" style="display: none;">
                                    <h2>Terms and Conditions</h2>
                                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required" aria-required="true"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                                </fieldset>
                            </div><div class="actions clearfix"><ul role="menu" aria-label="Pagination"><li class="disabled" aria-disabled="true"><a href="#previous" role="menuitem">Previous</a></li><li aria-hidden="false" aria-disabled="false"><a href="#next" role="menuitem">Next</a></li><li aria-hidden="true" style="display: none;"><a href="#finish" role="menuitem">Finish</a></li></ul></div></form>
                        </div>
                    </div>
                    </div>
                
                </div>



    <!-- Mainly scripts -->
    <script src="./js/jquery/jquery-3.1.1.min.js" ></script>
    <script src="./js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="./js/jquery/regsteps/jquery.metisMenu.js" type="text/javascript"></script>
    <script src="./js/jquery/regsteps/jquery.slimscroll.min.js" type="text/javascript"></script>

    <!-- Custom and plugin javascript -->
    <script src="./js/bootstrap/regsteps/inspinia.js" type="text/javascript"></script>
    <script src="./js/bootstrap/pace.min.js" type="text/javascript"></script>

    <!-- Steps -->
    <script src="./js/jquery/regsteps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="./js/jquery/regsteps/jquery.validate.min.js"></script>


    <script>
        $(document).ready(function(){
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
                        }
                    });
       });
    </script>
</body>
</html>