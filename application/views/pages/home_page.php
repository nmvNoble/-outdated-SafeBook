
<?php
include(APPPATH . 'views/header.php');
?>

<body>
    <?php
    include(APPPATH . 'views/navigation_bar.php');
    include(APPPATH . 'views/topic_side_bar.php');
    $logged_user = $_SESSION['logged_user']; 
    if (is_null($logged_user)){
        header("Location: http://localhost/SafebookBeta/signin");
        die();
    }
    
    ?>
<!--    <script src='https://code.responsivevoice.org/responsivevoice.js'></script>-->
    <script type="text/javascript">location.href = 'http://localhost/SafebookBeta/topic';</script>
    <div class = "container page">
        <div class = "row">
            <div class = "col-md-9 home-container">
                <div class = "col-sm-12 home-container">
                    
                    <div class = "clearfix content-container" style="border-radius:20px;">
                    <center>
                                <a id="crettop" class ="btn btn-primary buttonsbgcolor textoutliner" href="#create-topic-modal" data-toggle = "modal" style="margin:1%"><i class = "fa fa-pencil iconin"></i> Create Topic</a>
                                <a id="crettop" class="btn btn-primary buttonsbgcolor textoutliner" href="<?php echo base_url('topic') ?>" style="margin:1%"><i class = "glyphicon glyphicon-list iconin"></i> Go to Topics</a>
                    </center>
                    </div>

                    <!-- CONTENT -->
                    <div class = "col-sm-12 content-container" style="border-radius:20px;">
                        <div class = "col-sm-12">
                            <!-- POST PREVIEW -->
                            <?php
                            if (!empty($posts)):
                                foreach ($posts as $post):
                                    ?>
                                    <div class = "col-xs-12 no-padding post-container" style = "margin-bottom: 20px;border-radius:20px;">
                                        <div class = "user-post-heading no-margin" style="border-radius:20px;"><center>
                                            <a class = "btn btn-link no-padding text1color" href = "<?php echo base_url('user/profile/' . $post->user_id); ?>">
                                                <strong><?php echo $post->first_name . " " . $post->last_name; ?></strong>
                                            </a> 
                                            <span>posted in</span> 
                                            <a class = "btn btn-link no-padding text1color" href = "<?php echo base_url('topic/view/' . $post->topic_id); ?>">
                                                <strong ><?php echo utf8_decode($post->topic_name); ?></strong>
                                            </a><h4 style="display:inline"></h4>
                                            </center>
                                        </div>

                                        <div class = "col-xs-12 user-post-content no-padding">
                                            <!-- Left -->
                                            <div class = "col-xs-1 text-center no-padding" style = "padding-left: 10px;">
                                                <a class = "btn btn-link no-padding text1color" href = "<?php echo base_url('user/profile/' . $post->user_id); ?>">
                                                    <img class = "img-circle" style = "margin: 10px 0px;" width = "65px" height = "65px" src = "<?php echo $post->profile_url ? base_url($post->profile_url) : base_url('images/default.jpg'); ?>"/>
                                                </a><br>
                                                  
                                                
                                                <button class = "downvote-btn btn btn-link btn-xs" value = "<?php echo $post->post_id; ?>">
                                                    <span class = "<?php echo $post->vote_type === '-1' ? 'downvote-text' : '' ?> fa fa-chevron-down vote-text"></span>
                                                </button>
                                            </div>

                                            <!-- Right -->
                                            <div class = "col-xs-11" style = "margin-top: 7px;margin-bottom: 10px;">
                                                <i class = "text-muted" style="display:inline">                            
                                                    
                                                        <a class = "btn btn-link btn-xs no-padding text1color" href = "<?php echo base_url('user/profile/' . $post->user_id); ?>">
                                                            <?php echo $post->first_name . " " . $post->last_name ?>
                                                        </a>
                                                    
                                                      
                                                </i>
                                                <span class = "text-muted pull-right"> <i style = "font-size: 18px"><?php echo date("F d, Y", strtotime($post->date_posted)); ?></i></span><br>
                                                <div class="ptopcolor" style="padding-bottom:15px !important;">
                                                <p class = "home-content-body whitebg2" style = "border-right: none;white-space: pre-wrap;max-width: 714px;"><?php echo utf8_decode($post->post_content); ?></p>
                                                
                                                <span class="whitebg2" style="padding-right: 30px !important;">
                                                <button class = "upvote-btn btn btn-link btn-xs" style = "margin-left: 3px;" value = "<?php echo $post->post_id; ?>">
                                                    <span class = "<?php echo $post->vote_type === '1' ? 'upvote-text' : '' ?> glyphicon glyphicon-star vote-text starroll"></span>
                                                </button>
                                                <span class = "vote-count text-muted" style = "margin-left: 3px;"><?php echo $post->vote_count ? $post->vote_count : '0'; ?></span>
                                                <button class = "btn btn-primary pull-right" id="text2speak" style = "margin-right: 3px;border-radius: 20px;" onclick="readcontent('<?php $stringy = utf8_decode($post->post_content); $stringy1 = str_replace('\'', '`', $stringy); echo trim(preg_replace('/[^A-Za-z0-9()#,%\/?@$*.:+=_~`-]/', ' ', $stringy1)); ?>')"><i class="glyphicon glyphicon-volume-up" style="padding-top: 5px;"></i></button>
                                                </span>
                                                
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class = "user-post-footer no-margin text-right" style="border-radius:20px;">
                                            
                                            <a class = "btn btn-user-post-footer no-up-down-pad" href = "<?php echo base_url('topic/thread/' . $post->post_id); ?>">View Post <i class = "fa fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                            else:
                                ?>
                            <h4 class = "text-center text-warning">Your home page looks empty. Try following or creating more topics!</h4>
                                <?php endif; ?>
                        </div>

                    </div>
                </div>
                <!--<span> <img class = "pinwheel" src = "<?php echo base_url('images/Picture1.png'); ?>"/></span>-->
            </div>

            <?php
            include(APPPATH . 'views/modals/create_topic_modal.php');
            ?>
        </div>
    </div>


        <script type="text/javascript" src="<?php echo base_url("/js/search.js"); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url("/js/post.js"); ?>"></script>
    

    <?php
//    include(APPPATH . 'views/chat/chat.php');
