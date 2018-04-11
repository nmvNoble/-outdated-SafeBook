<?php
include(APPPATH . 'views/header.php');
$topic = $post->topic;
$user = $post->user;
?>
<body>
    <?php
    include(APPPATH . 'views/navigation_bar.php');
    ?>
    
    <div id = "thread-page" class = "container page">
        <div class = "row">
            <div class = "col-md-12 content-container no-padding" style = "height: 100%;">
                <a class = "pull-left btn btn-topic-header" style = "display: inline-block; margin-right: 5px;" href="<?php echo base_url('topic/view/' . $topic->topic_id) ?>">
                    <h3 class = "pull-left" style = "margin-top: 3px; margin-bottom: 0px; padding: 2px;">
                        <strong class = "text-info text1color"><i class = "fa fa-chevron-left"></i> 
                            Back
                        </strong>
                    </h3>
    </a>
                
                
                <p class = "wrap post-header-title"><strong><?php echo utf8_decode($post->topic->topic_name); ?>: </strong> 
                    <small>
                        <i>Topic by 
                            <a class = "btn btn-link btn-md no-padding no-margin text1color" href = "<?php echo base_url("user/profile/" . $user->user_id); ?>" style = "margin-bottom: 5px;">
                                <?php echo $user->first_name; ?></a>
                        </i>
                    </small>
                </p>
                <?php if (!empty($post->thread_attachments)): ?>
                    <button value = "<?php echo $post->post_id ?>" id = "thread-attachment-btn" class = "pull-right btn btn-primary buttonsbgcolor">
                        <strong><i class = "fa fa-paperclip" style = "font-size: 16px;"></i> View Thread Attachments</strong>
                    </button>
                <?php endif; ?>
            </div>
            <div class = "col-md-12 content-container">
                <!-- POST -->
                <div class = "col-md-12">
                    <div class="media">
                        <div class="media-left text-center">
                            <?php if (!$post->is_deleted): ?>
                                <img src = "<?php echo $user->profile_url ? base_url($user->profile_url) : base_url('images/default.jpg'); ?>" class="media-object img-circle post-pic"/>
                                
                                
<!--                                <button class = "downvote-btn btn btn-link btn-xs" value = "<?php echo $post->post_id; ?>">
                                    <span class = "<?php echo $post->vote_type === '-1' ? 'downvote-text' : '' ?> fa fa-chevron-down vote-text"></span>
                                </button>-->
                            <?php endif; ?>
                        </div>
                        <div class="media-body" style="position:relative">
                            <?php if (!$post->is_deleted): ?>
                                <?php if ($user->user_id === $logged_user->user_id || $is_moderated): ?>
                                    <!-- Delete Button -->
                                    <button value = "<?php echo $post->post_id ?>" class = "delete-btn pull-right btn btn-danger"><i class = "fa fa-trash"></i> Delete</button>
                                <?php endif; ?>

                                <!-- Reply Button -->
                                <button class = "reply-btn pull-left btn btn-gray" style = "margin-right: 5px;font-size: 18px;position: absolute;bottom:0;" value = "<?php echo $post->post_id; ?>"><i class = "fa fa-reply"></i> Comment</button>

                                <?php if ($user->user_id === $logged_user->user_id): ?>
                                    <!-- Edit Button -->
                                    <button value = "<?php echo $post->post_id ?>" class = "edit-btn pull-right btn btn-gray" style = "margin-right: 5px;"><i class = "fa fa-pencil"></i> Edit</button>
                                <?php endif; ?>

                                <!-- Post Heading -->
                                <div class="media-heading">
                                    <?php if ($post->post_title): ?>
                                    <!--<h4 class = "no-padding no-margin text-muted"><strong><?php echo utf8_decode($post->post_title); ?></strong></h4>-->
                                        <small>
                                            <i><a class = "btn btn-link btn-xs no-padding no-margin text1color"  href = "<?php echo base_url("user/profile/" . $user->user_id); ?>"><?php echo $user->first_name . " " . $user->last_name ?></a></i>
                                            <span class = "text-muted pull-right"><i style = "font-size: 18px;margin-right: 7px;"><?php echo date("F d, Y", strtotime($post->date_posted)); ?></i></span>
                                        </small>
                                    <?php else: ?>
                                        <a class = "btn btn-link no-padding btn-lg pull-left" href = "<?php echo base_url('user/profile/' . $user->user_id); ?>"><strong><?php echo $user->first_name . " " . $user->last_name; ?></strong></a>
                                        <span class = "text-muted"><i style = "font-size: 18px;"><?php echo date("F d, Y", strtotime($post->date_posted)); ?></i></span>
                                    <?php endif; ?>
                                </div>
                                <!-- Attachment -->
                                <?php if (!empty($post->attachments)): ?>
                                    <?php
                                    foreach ($post->attachments as $attachment):
                                        if ($attachment->attachment_type_id === '1'):
                                            ?>
                                            <img src = "<?= base_url($attachment->file_url); ?>" width = "300px"/>
                                        <?php elseif ($attachment->attachment_type_id === '2'): ?>
                                            <audio src = "<?= base_url($attachment->file_url); ?>" controls></audio>
                                        <?php elseif ($attachment->attachment_type_id === '3'): ?>
                                            <video src = "<?= base_url($attachment->file_url); ?>" width = "300px" controls/></video>
                                        <?php elseif ($attachment->attachment_type_id === '4'): ?>
                                            <a href = "<?= base_url($attachment->file_url); ?>" download><i class = "fa fa-file-o"></i> <i class = "text" style = "font-size: 12px;"><?= utf8_decode($attachment->caption); ?></i></a>
                                            <?php
                                        endif;
                                    endforeach;
                                    if ($attachment->attachment_type_id !== '4'):
                                        ?>
                                        <p><i class = "text-muted bg-info"><?= utf8_decode($attachment->caption); ?></i></p>
                                    <?php
                                    endif;
                                endif;
                                ?><div class="ptopcolor" style="margin-bottom:50px;padding-bottom:15px !important;">
                                
                                <p class = "post-content whitebg2" style = "margin-top: 5px;white-space: pre-wrap;"><?php echo utf8_decode($post->post_content) ?></p>
                                
                                <span class="whitebg2" style="padding-right: 30px !important;">
                                <button class = "upvote-btn btn btn-link btn-xs" style = "margin-left: 3px;" value = "<?php echo $post->post_id; ?>">
                                    <span class = "<?php echo $post->vote_type === '1' ? 'upvote-text' : '' ?> glyphicon glyphicon-star vote-text starroll"></span>
                                </button>
                                <span class = "vote-count text-muted" style = "margin-left: 3px;"><?php echo $post->vote_count ? $post->vote_count : '0'; ?></span> 
                                <button class = "btn btn-primary pull-right" id="text2speak" style = "margin-right: 3px;border-radius: 20px;" onclick="readcontent('<?php $stringy = utf8_decode($post->post_content); $stringy1 = str_replace('\'', '`', $stringy); echo trim(preg_replace('/[^A-Za-z0-9()#,%\/?@$*.:+=_~`-]/', ' ', $stringy1)); ?>')"><i class="glyphicon glyphicon-volume-up" style="padding-top: 5px;"></i></button>
                                </span>        
                                        </div>
<?php else: ?>                  
                                <div class="media-heading">
                                    <h4 class = "no-padding no-margin text-danger">Deleted Post</h4>
                                </div>
                                <p class = "post-content" style = "margin-top: 15px"><i>This post has been deleted.</i></p>
<?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- COMMENTS -->
                <div class = "col-md-12 reply-header" style="font-size:22px">
                    Comments
                </div>
                <div class = "col-md-12 content-container reply-container">
                    <?php
                    if (!empty($replies)):
                        echo $replies;
                    else:
                        ?>
                        <h4 class = "text-center text-warning no-padding no-margin"><strong>This post has no comments yet!</strong></h4>
<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="<?php echo base_url("/js/post.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url("/js/topic.js"); ?>"></script>
    <?php
//    include(APPPATH . 'views/chat/chat.php');
    include(APPPATH . 'views/modals/create_reply_modal.php');
    include(APPPATH . 'views/modals/edit_post_modal.php');
    include(APPPATH . 'views/modals/delete_post_modal.php');
    