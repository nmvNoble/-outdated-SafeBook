
<head>

<style>
</style>

</head>

<div id="changepwe" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-heading modalbg">                
                <h4 class="modal-title text-center"><strong>Change password?</strong></h4>
            </div>
            <div class="modal-body">
                <div class = "row"><center>
                                                 <form class = "form-inline" method = "post">

                        <div class = "pull-right" style = "padding-top: 10px; padding-right: 10px; padding-bottom: 10px">
                            <div class = "form-group" style = "margin-right: 5px;">
                                <input style="font-size: 20px" id = "new-password" type = "password" required name = "new_password"  class = "form-control sign-in-field" placeholder = "New Password" autocomplete="off"/>
                            </div><br>
                            <div class = "form-group" style = "margin-right: 5px;">
                                <input style="font-size: 20px" id = "reauth-email" type = "email" required name = "reauth_email2" class = "form-control sign-in-field" placeholder = "Email" autocomplete="off"/>
                            </div>
                            <div class = "form-group" style = "margin-right: 5px;">
                                <input style="font-size: 20px" id = "reauth-password" type = "password" required name = "reauth_password2"  class = "form-control sign-in-field" placeholder = "Password" autocomplete="off"/>
                            </div>
                            <div class = "form-group text-center">
                                <button type="submit" class="btn btn-primary buttonsgo" name = "reauthenticate2" style = "width: 100%;font-size:24px;">Reauthenticate</button>
                                
                            </div>
                        </div>
                    </form>
                    
                    </center>
                </div>
            </div>
        </div>
    </div>
     <?php 
    if(isset($_POST['reauthenticate2'])){
     $servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "safebookbeta";
	$conn = @new mysqli($servername, $username, $password, $dbname);
        $userid = $logged_user->user_id;

        // Create connection
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if($logged_user->email == $_POST["reauth_email2"] && $logged_user->password == hash('sha256', $_POST["reauth_password2"])):

            $newpass = hash('sha256',$_POST["new_password"]);
                   
                        $sql = "SET sql_safe_updates=0; UPDATE tbl_users
                        SET password = '$newpass' WHERE '$userid' == user_id" ;
                                if (mysqli_query($conn, $sql)) {
                                ;
                                } else {
                                    ;
                                }

        else:
        endif;

        mysqli_close($conn);
    }
?>
</div>

   