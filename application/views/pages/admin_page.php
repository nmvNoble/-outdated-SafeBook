<?php
include(APPPATH . 'views/header.php');
$logged_user = $_SESSION['logged_user']; 
    if (is_null($logged_user)){
        header("Location: http://localhost/SafebookBeta/signin");
        die();
    }
?>
<script src="<?php echo base_url('zxcvbn-master/dist/zxcvbn.js'); ?>"></script>
<body class = "sign-in">
    <div id = "admin-page" class = "container" style = "margin-top: 30px;">
        <div class = "row">
            <!-- Admin Header -->
            <div class = "col-md-8 col-md-offset-2 content-container" style = "margin-bottom: 5px;">
                <h3 class = "text-info no-margin" style = "display: inline-block; padding-left: 10px; margin-top: 5px;"><strong><?php echo $logged_user->first_name . " " . $logged_user->last_name ?></strong></h3>
                <a href = "<?php echo base_url('signin/logout'); ?>" class = "pull-right btn btn-primary btn-md" style = "margin-right: 20px;">Log Out</a>
            </div>
            
            <div class = "col-md-8 col-md-offset-2 content-container">
                
                <a class="navbaricons" href="<?php echo base_url('topic') ?>"><strong class="iconin"><i class = "glyphicon glyphicon-list iconin"></i>ebooks</strong></a>
            </div>
            
            <!-- Admin Content -->
            <div class = "col-md-8 col-md-offset-2 content-container">
                <div class = "col-md-12">
                    <form action = "javascript:void(0);" role="search">
                        <div class="input-group" style = "width: 100%">
                            <input type="text" class="form-control search-text" placeholder="&#xF002; Search for a user" id = "search-user-list">
                        </div>
                    </form>
                </div>
                <div class = "col-md-12 admin-user-list">
                    <ul id = "user-list" class = "list-group">
                        <?php foreach ($users as $user): ?>
                            <li class = "list-group-item admin-list-item">
                                <img src = "<?php echo $user->profile_url ? base_url($user->profile_url) : base_url('images/default.jpg') ?>" class = "no-padding pull-left img-circle" width = "45px" height = "45px"/> 
                                <h4 class = "no-padding admin-list-name"><?php echo $user->first_name . " " . $user->last_name ?> 
                                    <!-- ADMIN -->
                                    <?php if ($user->role_id === '1'): ?>
                                        <i class = "text-muted btn-sm no-padding">Administrator <?php echo ($logged_user->user_id === $user->user_id) ? '(You)' : '' ?></i>
                                        <!-- USERS //put modal -->
                                    <?php elseif ($user->role_id === '2'): ?>
                                        <button value = "<?php echo $user->user_id ?>" class = "record-view-btn btn btn-link btn-xs"><i class = "fa fa-question-circle-o"></i> <i>Record of <?php echo $user->first_name ?></i></button>
                                    <?php endif ?>
                                </h4>
                                <?php
                                if ($logged_user->user_id !== $user->user_id):
                                    if ($user->is_enabled):
                                        ?>
                                        <button type = "button" value = "<?php echo $user->user_id ?>" class = "toggle-account pull-right btn btn-danger admin-list-btn">Disable</button>
                                    <?php else: ?>
                                        <button type = "button" value = "<?php echo $user->user_id ?>" class = "toggle-account pull-right btn btn-success admin-list-btn">Enable</button>
                                    <?php
                                    endif;
                                endif;
                                ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class = "col-md-8 col-md-offset-2 content-container"><h1 class = "sign-in-header" style = "font-size:34px;">Create a New Account</h1>
            <form id = "sign-up-form" onsubmit = "return sign_up()" method = "post">
                                <div class = "col-xs-10 form-group register-field" style = "font-size:24px;">First name:
                                    <input type = "text" required name = "first_name" class = "form-control sign-in-field" placeholder = "First Name" maxlength = "25">
                                </div>
                                <div class = "col-xs-10 form-group register-field" style = "font-size:24px;">Last name:
                                    <input type = "text" required name = "last_name" class = "form-control sign-in-field" placeholder = "Last Name" maxlength = "25">
                                </div>
                                <div class = "col-xs-10 form-group register-field" style = "font-size:24px;">Email address:
                                    <input type = "email" required name = "sign_up_email" class = "form-control sign-in-field" placeholder = "Email Address" maxlength = "45">
                                </div>
                                <div class = "col-xs-7 form-group register-field" style = "font-size:24px;">Birthdate:
                                    <input type = "date" required name = "sign_up_birthday" class = "form-control sign-in-field" id="birhdate10"><br>

                                </div>
                                <div class = "col-xs-2 form-group register-field" style = "font-size:24px;">Role
                                    <select class = "form-control" name = "sign_up_role" style = "font-size:24px;">
                                        
                                            <option style = "font-size:24px;" value="1">Administrator</option>
                                        
                                    </select>
                                </div>
                                <div class = "password-field col-xs-6 form-group register-field" style = "font-size:24px;">Password:
                                        <input style = "font-size:24px;" id="password1" type = "password" required name = "sign_up_password" class = "form-control sign-in-field sign-up-password" placeholder = "Password" >

                                </div>
                                <div class = "password-field col-xs-6 form-group register-field" style = "font-size:24px;">Retype password:
                                    <input style = "font-size:24px;" id = "sign-up-retype" type = "password" required class = "form-control sign-in-field" placeholder = "Retype Password">
                                </div>
                                <div class = "text-center">
                                    <button onclick="window.scrollTo(0, document.body.scrollHeight);" type = "submit" class = "btn btn-success" style="width:100%; font-size:24px;" id="registeri">Register</button>
                                </div>
                                
                            </form>
                </div>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo base_url("/js/admin.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("/js/search.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("/js/sign_in.js"); ?>"></script>
    <?php
    include(APPPATH . "views/modals/user_record_modal.php");?>
</body>
</html>