<?php $logged_user = $_SESSION['logged_user']; ?>
<head>

<style>

</style>

</head>

<div id="ebookdet" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-heading modalbg">
                <button type="button" class="close" style = "padding: 5px;" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center"><strong>Checkout</strong></h4>
            </div>
            <div class="modal-body">
                <div class = "row">
                    <center>
                        <span style="font-size: 32px"></span>
<<<<<<< HEAD
                        
                                <div>
            <ul class="nav">
                <?php
                if(!empty($logged_user->followed_topics)):
                foreach ($logged_user->followed_topics as $topic):
                    if(!($topic->creator_id === $logged_user->user_id)):
                ?>
                <li>
                    <a href="topic/view/<?php echo $topic->topic_id; ?>">
                        <span class = "text-muted"><?php echo utf8_decode($topic->topic_name); ?></span>
                        <span class = "text-muted"> ₱ <?php echo utf8_decode($topic->price); ?></span>
                        <button id = "topic-follow-btn" class = "btn pull-right btn-danger textoutliner" value = "<?php echo $topic->topic_id ?>">
                             <i class = "fa fa-minus-circle"></i> Remove from cart
                    </button>
                    </a>
                </li>
                <?php
                else:
                    
                endif;
                endforeach;
                else:
                endif; ?>
            </ul>
            </div>      
                         <form method = "post">

                        <div class = "pull-right" style = "padding-top: 10px; padding-right: 10px; padding-bottom: 10px">
                            <div class = "form-group" style = "margin-right: 5px;">
                                <input style="font-size: 20px" id = "reauth-email" type = "text" required name = "reauth_email" class = "form-control sign-in-field" placeholder = "Email" autocomplete="off"/>
                            </div>
                            <div class = "form-group" style = "margin-right: 5px;">
                                <input style="font-size: 20px" id = "reauth-password" type = "password" required name = "reauth_password"  class = "form-control sign-in-field" placeholder = "Password" autocomplete="off"/>
                            </div>
                            <div class = "form-group text-center">
                                <button type="submit" class="btn btn-primary buttonsgo" name = "reauthenticate" style = "width: 100%;font-size:24px;">Reauthenticate</button>
                                
                            </div>
=======
                        <div>
                            <ul class="nav">
                                <?php
                                if(!empty($logged_user->followed_topics)):
                                    foreach ($logged_user->followed_topics as $topic):
                                        if(!($topic->creator_id === $logged_user->user_id)):
                                ?>
                                <li>
                                    <a href="topic/view/<?php echo $topic->topic_id; ?>">
                                        <span class = "text-muted"><?php echo utf8_decode($topic->topic_name); ?></span>
                                        <span class = "text-muted"> ₱ <?php echo utf8_decode($topic->price); ?></span>
                                        <button id = "topic-follow-btn" class = "btn pull-right btn-danger textoutliner" value = "<?php echo $topic->topic_id ?>">
                                            <i class = "fa fa-minus-circle"></i> Remove from cart
                                        </button>
                                    </a>
                                </li>
                                <?php
                                    else:
                                        
                                    endif;
                                    endforeach;
                                    else:
                                endif; ?>
                            </ul>
>>>>>>> af72ac288548d5f9cc1d8385f3a05cf2793d884f
                        </div>
                            
                        <form class = "form-inline" id = "reauthenticate" onsubmit = "return reauth();" method = "post">
                            <div class = "pull-right" style = "padding-top: 10px; padding-right: 10px; padding-bottom: 10px">
                                <div class = "form-group" style = "margin-right: 5px;">
                                    <input style="font-size: 20px" id = "reauth-email" type = "text" required name = "reauth_email" class = "form-control sign-in-field" placeholder = "Email"/>
                                </div>
                                <div class = "form-group" style = "margin-right: 5px;">
                                    <input style="font-size: 20px" id = "reauth-password" type = "password" required name = "reauth_password"  class = "form-control sign-in-field" placeholder = "Password"/>
                                </div>
                                <div class = "form-group text-center">
                                    <button type="submit" class="btn btn-primary buttonsgo" style = "width: 100%;font-size:24px;">Reauthenticate</button>
                                </div>
                            </div>
                        </form>
                    
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php 
    if(isset($_POST['reauthenticate'])){
     $servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "safebookbeta";
	$conn = @new mysqli($servername, $username, $password, $dbname);
        $logged_user->user_id;

        // Create connection
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if($logged_user->email == $_POST["reauth_email"] && $logged_user->password == hash('sha256', $_POST["reauth_password"])):
            if(!empty($logged_user->followed_topics)):
                foreach ($logged_user->followed_topics as $topic):

                    if(!($topic->creator_id === $logged_user->user_id)):
                        $sql = "INSERT INTO orders(user_id, product_id, date_order)
                        VALUES ('$logged_user->user_id', '$topic->topic_id', CURRENT_TIMESTAMP )";
                                if (mysqli_query($conn, $sql)) {
                                ;
                                } else {
                                    ;
                                }
                    else:
                    
                    endif;
                endforeach;
            else:
            endif; 
        else:
        endif;

        mysqli_close($conn);
    }
    ?>

    <script type="text/javascript" src="<?php echo base_url("/js/sign_in.js"); ?>">
        
    </script>
