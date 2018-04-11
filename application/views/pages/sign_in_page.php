<?php
include(APPPATH . 'views/header.php');
?>
<script src="<?php echo base_url('zxcvbn-master/dist/zxcvbn.js'); ?>"></script>
<script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
<script>document.cookie = "timing=0;" + ";path=/"; </script>

<body class = "sign-in">
    <div class = "container-fluid">
        <!-- Logo -->
        <div class = "row sign-in-logo"><img src = "<?php echo base_url('images/logo/mukhlatlogo1.png'); ?>"></div>

        <!-- Content -->
        <div class = "row sign-in-content">
            <!--Sign In-->
            <div class = "col-md-10 col-md-offset-1" style = "margin-bottom: 2%; ">
                <div id = "sign-in-container" class = "col-md-12 content-container no-padding">
                    <form class = "form-inline" id = "log-in-form" onsubmit = "timeLogIn(); return log_in()" method = "post">
                        <div class ="form-group">
                            <h3 class = "sign-in-header no-padding no-margin" style = "margin-left: 40px; padding: 10px;"><strong>Log In</strong></h3>
                        </div>
                        <div class = "pull-right" style = "padding-top: 10px; padding-right: 10px; padding-bottom: 10px">
                            <div class = "form-group" style = "margin-right: 5px;">
                                <input style="font-size: 20px" id = "log-in-email" type = "text" required name = "log_in_email" class = "form-control sign-in-field" placeholder = "Email"/>
                            </div>
                            <div class = "form-group" style = "margin-right: 5px;">
                                <input style="font-size: 20px" id = "log-in-password" type = "password" required name = "log_in_password"  class = "form-control sign-in-field" placeholder = "Password"/>
                            </div>
                            <div class = "form-group text-center">
                                <button type="submit" class="btn btn-primary buttonsgo" style = "width: 100%;font-size:24px;">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!--Registration-->
            <div class = "col-md-10 col-md-offset-1">
                <div id = "sign-up-container" class = "col-md-12 content-container no-padding">
                    <div class = "col-md-12 sign-in-div">
                        <center style="padding-bottom: 2%"><a href="#regi" data-toggle="collapse" ><h3 class = "sign-in-header btn btn-success buttonsgo" style = "font-size:24px;">Sign Up to Mukhlat!</h3></a></center>
                        <div id="regi" class="collapse">
                            <div class = "sign-in-form">
                            <form id = "sign-up-form" onsubmit = "return sign_up()" method = "post">
                                <div class = "col-xs-10 form-group register-field" style = "font-size:24px;">What is your first name?
                                    <input type = "text" required name = "first_name" class = "form-control sign-in-field" placeholder = "First Name" maxlength = "25">
                                </div>
                                <div class = "col-xs-10 form-group register-field" style = "font-size:24px;">What is your last name?
                                    <input type = "text" required name = "last_name" class = "form-control sign-in-field" placeholder = "Last Name" maxlength = "25">
                                </div>
                                <div class = "col-xs-10 form-group register-field" style = "font-size:24px;">What is your email?
                                    <input type = "email" required name = "sign_up_email" class = "form-control sign-in-field" placeholder = "Email Address" maxlength = "45">
                                </div>
                                <div class = "col-xs-7 form-group register-field" style = "font-size:24px;">When is your birthday:
                                    <input type = "date" required name = "sign_up_birthday" class = "form-control sign-in-field" id="birhdate10"><br>

                                </div>
                                <div class = "col-xs-2 form-group register-field" style = "font-size:24px;">Role
                                    <select class = "form-control" name = "sign_up_role" style = "font-size:24px;">
                                        <?php foreach ($roles as $role) : ?>
                                            <option style = "font-size:24px;" value="<?php echo $role->role_id; ?>"><?php echo $role->role_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class = "password-field col-xs-6 form-group register-field" style = "font-size:24px;">Make a password.
                                        <input style = "font-size:24px;" id="password1" type = "password" required name = "sign_up_password" class = "form-control sign-in-field sign-up-password" placeholder = "Password" >
                                        <meter max="4" id="password-strength-meter" style="width:100%;"></meter>
                                            <p id="password-strength-text"></p>
                                </div>
                                <div class = "password-field col-xs-6 form-group register-field" style = "font-size:24px;">Type that password again, just to be sure.
                                    <input style = "font-size:24px;" id = "sign-up-retype" type = "password" required class = "form-control sign-in-field" placeholder = "Retype Password">
                                </div>
                                <div class = "text-center">
                                    <button onclick="window.scrollTo(0, document.body.scrollHeight);" type = "submit" class = "btn btn-success" style="width:100%; font-size:24px;">Register</button>
                                </div>
                                
                            </form>
                               
                    </div>
                </div></div>
            </div>
        </div>
    </div>

<script>
   document.cookie = 'birthday=0;path=/';
   
    var now = new Date();
    var nexttimed = new Date();
    var time1 = now.getTime();
    var time2 = now.getTime()+(3600 * 1000);
    
    document.cookie = "nexttimed1=;path=/"; 
    document.cookie = "nexttimed2=;path=/"; 
    document.cookie = "blur=0;path=/"; 
    document.cookie = "warned=0;path=/"; 
    document.cookie = "dance=;path=/"; 
    
    function timeLogIn()
    {
        now.setTime(time1);
        nexttimed.setTime(time2);
        var hours = now.getHours();
        var mins = now.getMinutes();
        var secs = now.getSeconds();
        var meridiem = 'AM';
        
        if(now.getHours()>12)
        {
            hours=hours-12;
            meridiem='PM';
        }
        
        if(now.getMinutes()<10)
        {
            mins = '0' + mins;
        }
        
        if(now.getSeconds()<10)
        {
            secs = '0' + secs;
        }
            
        document.cookie = 'loginTime=' + hours + ':' + mins + ':' + secs + '  ' + meridiem + ';path=/';
        document.cookie = "loginTime1=" + now.getHours() + ";path=/"; 
        document.cookie = "loginTime2=" + now.getMinutes() +";path=/"; 
        document.cookie = "nexttimed1=" + nexttimed.getHours() +";path=/"; 
        document.cookie = "nexttimed2=" + nexttimed.getMinutes() +";path=/"; 
        document.cookie = "score=0;path=/"; 
        document.cookie = "randomcolors=0;path=/"; 
        document.cookie = "MouseTrail=0;" + ";path=/";
        document.cookie = "blur=0;" + ";path=/"; 
        return;
    }

</script>

<!--password strength checker-->
<script type="text/javascript">
        var strength = {
                0: "Worst ☹",
                1: "Bad ☹",
                2: "Weak ☹",
                3: "Good ☺",
                4: "Strong ☺"
        };

        var password = document.getElementById('password1');
        var meter = document.getElementById('password-strength-meter');
        var text = document.getElementById('password-strength-text');

        password.addEventListener('input', function()
        {
            var val = password.value;
            var result = zxcvbn(val);

            // Update the password strength meter
            meter.value = result.score;

            // Update the text indicator
            if(val !== "") {
//                text.innerHTML = "Strength: " + "<strong>" + strength[result.score] + "</strong>" + "<br><span class='feedback'>" + result.feedback.warning + "<br>" + result.feedback.suggestions + "<br></span"; 
                if(strength[result.score]==='Worst ☹' && password.value.length<8)
                    text.innerHTML = "Strength: " + "<strong style='color:red'>" + strength[result.score] + "</strong>" + "<br><span class='feedback' style='color:red'>" + "Your password is too short! Try using more letters and numbers!" + "<br>" + "<br></span"; 
                
                else if(strength[result.score]==='Worst ☹' && password.value.length<8)
                    text.innerHTML = "Strength: " + "<strong style='color:red'>" + strength[result.score] + "</strong>" + "<br><span class='feedback' style='color:red'>" + "Your password is very easy to crack! Try using different letters and numbers!" + "<br>" + "<br></span"; 
                    
                else if(strength[result.score]==='Bad ☹'  && password.value.length<8)
                    text.innerHTML = "Strength: " + "<strong style='color:orange'>" + strength[result.score] + "</strong>" + "<br><span class='feedback' style='color:orange'>" + "Your password is still easy to crack! Try using different letters and numbers!" + "<br>" + "<br></span"; 
                
                else if(strength[result.score]==='Weak ☹')
                    text.innerHTML = "Strength: " + "<strong style='color:yellow'>" + strength[result.score] + "</strong>" + "<br><span class='feedback' style='color:yellow'>" + "Your password is still easy to crack!" + "<br>" + "<br></span"; 
                    
                else if(strength[result.score]==='Good ☺')
                    text.innerHTML = "Strength: " + "<strong style='color:green'>" + strength[result.score] + "</strong>" + "<br><span class='feedback' style='color:green'>" + "Your password is good!" + "<br>" + "<br></span"; 
                    
                else if(strength[result.score]==='Strong ☺')
                    text.innerHTML = "Strength: " + "<strong style='color:blue'>" + strength[result.score] + "</strong>" + "<br><span class='feedback' style='color:blue'>" + "Your password is strong!" + "<br>" + "<br></span"; 
              
            }
            else {
                text.innerHTML = "";
            }
        });
</script>    

    <script type="text/javascript" src="<?php echo base_url("/js/sign_in.js"); ?>"></script>

</body>
</html>