<?php
include(APPPATH . 'views/header.php');
  $logged_user = $_SESSION['logged_user'];  
$c_topic = $_SESSION['current_topic'];

?>

<body>
    <?php
    include(APPPATH . 'views/navigation_bar.php');
    ?>
    
    <div id = "topic-page" class = "container page" style = "min-height: 100%; height: 100%;">
        <!-- Topic Page Header -->
        <div class = "row">
            <div id = "topic-heading" class = "col-md-12 content-container no-padding">
                <a class = "btn btn-topic-header" href="<?php echo base_url('topic'); ?>">
                    <h4 class = "pull-left topic-header-title no-padding" style = "margin-top: 3px; margin-bottom: 0px;">
                        <strong class = "text-info text1color" style="cursor:pointer;"><i class = "fa fa-chevron-left" style="cursor:pointer;"></i> 
                            Back to ebooks List
                        </strong>
                    </h4>
                </a>
               <?php if(!($c_topic->creator_id === $logged_user->user_id)): if (!$is_followed): ?>
                    <button id = "topic-follow-btn" class = "btn pull-right btn-primary textoutliner" style = "margin: 5px; margin-right: 20px; width: 20%;font-size: 19px;" value = "<?php echo $c_topic->topic_id ?>">
                        <i class = "fa fa-plus-circle"></i> Add to cart
                    </button>
                    <?php else: ?>
                        <button id = "topic-follow-btn" class = "btn pull-right btn-danger textoutliner" style = "margin: 5px; margin-right: 20px; width: 20%;font-size: 19px;" value = "<?php echo $c_topic->topic_id ?>">
                            <i class = "fa fa-minus-circle"></i> Remove from cart
                        <?php endif; ?>
                    </button>
                <?php else:
                endif;
?>
            </div>
        </div>
        <div class = "row">
            <!-- Topic Page Content -->
            <div class = "col-md-12 content-container">
                <!-- Topic Post Preview -->
                <div class = "col-sm-6">
                    <div class = "col-sm-12 topic-description-div no-padding">
                        <h4 class = "no-margin text-center user-topic-header topic-intro-header bar1color">
                            <strong class="textoutliner"><?php echo utf8_decode($c_topic->topic_name); ?></strong>

                            <?php if ($is_moderated || $logged_user->role_id==='1'): ?>
                            <br>
                            <button id = "edit-topic-btn" class = "btn btn-default"><i class = "fa fa-pencil"></i> Edit Description</button>

                            <?php if ($c_topic->creator_id === $logged_user->user_id  || $logged_user->role_id==='1'): ?>
                                <button type = "button" id = "cancel-topic-btn" class = "btn btn-danger" style = "margin-left: 5px;"><i class = "fa fa-trash"></i> Cancel ebook</button>
                            <?php endif; 
                            endif;?>
                        </h4>
                        <div class = "content-container topic-intro-content">
                            <p id = "desc-creator" class = "no-margin text-muted" align = "center">
                                <small><i>by <span class = "no-padding no-margin text1color" ><?php echo $c_topic->user->first_name . " " . $c_topic->user->last_name; ?></span></i></small>
                            </p>
                            <?php if ($is_moderated || $logged_user->role_id==='1'): ?>
                                <div id = "desc-edit" class = "col-md-12 hidden">
                                    <div class = "form-group" style = "margin-bottom: 5px;">
                                        <p class="lead emoji-picker-container">
                                            <textarea id = "edit-topic-text" style="height:100px;" maxlength = "180" class = "form-control" data-emojiable="true"><?php echo $c_topic->topic_description ?></textarea>
                                        </p>
                                    </div>
                                    <div class = "form-group pull-right" style = "margin-top: 0px;">
                                        <button value = "<?php echo $c_topic->topic_id ?>" id = "edit-topic-save" class = "btn btn-primary btn-sm">Save</button>
                                        <button id = "edit-topic-cancel" type = "button" class = "btn btn-gray btn-sm">Cancel</button>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <p id = "desc-container" class = "no-margin wrap text-center">
                                <?php echo utf8_decode($c_topic->topic_description); ?><br>
                                Category: <?php echo utf8_decode($c_topic->category); ?><br>
                                Price: ₱<?php echo utf8_decode($c_topic->price); ?>
                            </p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <?php
    include(APPPATH . 'views/modals/create_post_modal.php');
    include(APPPATH . 'views/modals/topic_members_modal.php');
    include(APPPATH . 'views/modals/cancel_topic_modal.php');
 //   include(APPPATH . 'views/chat/chat.php');
    