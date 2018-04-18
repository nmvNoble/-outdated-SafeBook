<?php
include(APPPATH . 'views/header.php');
include(APPPATH . 'views/modals/change_password_and_email_modal.php');
?>
<body>
    <?php
    include(APPPATH . 'views/navigation_bar.php');
    $logged_user = $_SESSION['logged_user'];  
    if (is_null($logged_user)){
        header("Location: http://localhost/SafebookBeta/signin");
        die();
    }
    if (!($user->user_id === $logged_user->user_id)){
        header("Location: http://localhost/SafebookBeta/topic");
    }
    ?>
   
    <div class = "container page">
        <div class = "row">
            <div class = "col-md-12 content-container" style = "padding-top: 20px;">
                <div class = "col-md-6">
                    <!-- User Info -->
                    <div class = "col-md-12" style = "height: 160px;">
                        <div class = "user-profile-info">
                            <div class = "col-xs-3 no-padding" style = "margin-top: 20px;">
                                <img class = "pull-left img-circle user-profile-img" src = "<?php echo $user->profile_url ? base_url($user->profile_url) : base_url('images/default.jpg'); ?>" width = "100px" height = "100px"/>
                            </div>
                            <div class = "col-xs-6 no-padding no-margin">
                                <p class = "no-padding text-info" style = "margin-bottom: 0px;margin-top: 20px;"><strong><?php echo $user->first_name . " " . $user->last_name ?></strong></p>
                                <small class = "no-padding no-margin"><?php echo $user->email ?></small>
                            </div>
                            <?php if ($logged_user->user_id === $user->user_id): ?>
                                <div class = "col-xs-2 no-padding" style = "margin-top: 20px;">
                                    <a class = "pull-right btn btn-gray btn-sm" href = "#edit-profile-modal" data-toggle = "modal"><i class = "fa fa-pencil"></i> Edit Profile</a>
                                    <div class = "pull-right btn btn-gray btn-sm" onclick="$('#changepwe').modal('show');"><i class = "fa fa-pencil"></i> Change Password</div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- User Topics -->
                    <div class = "col-md-12 user-topic-container">
                       
                        <ul class="nav nav-pills nav-justified">
                            <li class="active"><a data-toggle="pill" href="#user-topic-created">Published ebooks</a></li>
                            <li><a data-toggle="pill" href="#user-topic-followed">Cart</a></li>
                        </ul>
                        <br>
                        <div class="tab-content">
                            <div id="user-topic-created" class="tab-pane fade in active">
                                <div class = "col-sm-12 no-padding">
                                    <div class = "user-topic-div">
                                        <ul class="nav">
                                            <?php foreach ($user->topics as $topic): ?>
                                                <li>
                                                    <a class = "user-topic-item" href="<?php echo base_url('topic/view/' . $topic->topic_id); ?>" style = "padding: 5px 30px;">
                                                        <h4 class = "no-padding no-margin text1color" style = "display: inline-block;"><?php echo utf8_decode($topic->topic_name); ?></h4>
                                                        <span class = "pull-right label label-info follower-label"><i class = "fa fa-group"></i> <?php echo $topic->followers ? count($topic->followers) : '0' ?></span>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div id="user-topic-followed" class="tab-pane fade">
                                <div class = "col-sm-12 no-padding">
                                    <div class = "user-topic-div">
                                        <ul class="nav">
                                            <?php foreach ($user->followed_topics as $topic):
                                                    if(!($topic->creator_id === $logged_user->user_id)):?>
                                                <li>
                                                    <a class = "user-topic-item" href="<?php echo base_url('topic/view/' . $topic->topic_id); ?>" style = "padding: 5px 30px;">
                                                        <h4 class = "no-padding no-margin text1color" style = "display: inline-block;"><?php echo utf8_decode($topic->topic_name); ?></h4>
                                                        <!--<span class = "pull-right label label-info follower-label"><i class = "fa fa-group"></i> <?php echo $topic->followers ? count($topic->followers) : '0' ?></span>-->
                                                    </a>
                                                </li>
                                            <?php 
                                            else:
                                                
                                            endif;
                                            endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class = "col-md-6">
                    <!-- User Stats -->
                    <div class = "col-md-12" style = "padding: 40px 30px; height: 160px;">
                        <div class = "col-sm-4 no-left-right-pad">
                            <div class = "col-xs-12 text-center no-left-right-pad">
                                <h2 class = "text-info no-margin"><strong><?php echo count($user->topics); ?></strong></h2>
                                <p>ebooks</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="<?php echo base_url("/js/user.js"); ?>"></script>
    <?php
  //  include(APPPATH . 'views/chat/chat.php');
    include(APPPATH . 'views/modals/edit_profile_modal.php');
    