<?php
$user = $post->user;
$logged_user = $_SESSION['logged_user'];
if ($post->parent_id !== '0'):
    ?>
    <div class = "media" style = "border-left: 2px solid gray;">
        <?php if (!$post->is_deleted): ?>
        
            <div class = "media-left text-center no-margin no-padding">
                <img src="<?php echo $user->profile_url ? base_url($user->profile_url) : base_url('images/default.jpg'); ?>" class="img-circle reply-pic pull-left">
                <div class = "pull-left text-center" style="margin-left: 15px;">
                    
<!--                    <button class = "downvote-btn btn btn-link btn-xs" value = "<?php echo $post->post_id; ?>">
                        <span class = "<?php echo $post->vote_type === '-1' ? 'downvote-text' : '' ?> fa fa-chevron-down vote-text"></span>
                    </button>-->
                </div>
            </div>
            
        <?php else: ?>
            <div class = "media-left"></div>
        <?php endif; ?>
        <div class="media-body">
            <?php
            if (!$post->is_deleted):
                if ($user->user_id === $logged_user->user_id):
                    ?>
                    <!-- Delete Button -->
                    <button value = "<?php echo $post->post_id ?>" class = "delete-btn pull-right btn btn-sm btn-danger"><i class = "fa fa-trash"></i> Delete</button>
                <?php endif; ?>
                <button class = "reply-btn btn btn-sm btn-gray" style = "margin-right: 5px;margin-left: 10px;margin-bottom: 10px;" value = "<?php echo $post->post_id; ?>">
                    <i class = "fa fa-reply"></i> Reply
                </button>
                <?php if ($post->user->user_id === $logged_user->user_id): ?>
                    <!-- Edit Button -->
                    <button class = "edit-btn pull-right btn btn-sm btn-gray" style = "margin-right: 5px;"  value = "<?php echo $post->post_id; ?>"><i class = "fa fa-pencil"></i> Edit</button>
                <?php endif;
                ?>
                
                <?php if ($post->post_title): ?>
                    <!--<h4 class = "no-padding no-margin text-muted"><strong><?php echo utf8_decode($post->post_title); ?></strong></h4>-->
                    <small>
                        <i>by <a class = "btn btn-link btn-xs no-padding no-margin text1color" href = "<?php echo base_url("user/profile/" . $post->user->user_id); ?>"><?php echo $post->user->first_name . " " . $post->user->last_name ?></a></i>
                        <span class = "text-muted"><i style = "font-size: 18px;"><?php echo date("F d, Y", strtotime($post->date_posted)); ?></i></span>
                    </small>
                <?php else: ?>
                    <a style = "margin-left: 7px;" class = "btn btn-link no-padding btn-lg pull-left text1color" href = "<?php echo base_url('user/profile/' . $user->user_id); ?>"><strong><?php echo $user->first_name . " " . $user->last_name; ?></strong></a>
                    
                    <span class = "text-muted pull-right"><i style = "font-size: 18px;margin-right: 7px;"><?php echo date("F d, Y", strtotime($post->date_posted)); ?></i></span>
                <?php endif; ?>
                <?php if (!empty($post->attachments)): ?>
                    <div> 
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
                            <p><i class = "text-muted bg-info"><?= $attachment->caption; ?></i></p>
                        <?php endif; ?>
                    </div>
                    <?php
                endif;
                ?><div class="ptopcolor" style="padding-bottom:15px !important;">
                <p class = "post-conten whitebg2" style = "margin-top: 5px;white-space: pre-wrap;"><?php echo utf8_decode($post->post_content); ?></p>
                    
                <span class="whitebg2" style="padding-right: 30px !important;">
                <button class = "upvote-btn btn btn-link btn-xs" style = "margin-left: 3px;" value = "<?php echo $post->post_id; ?>">
                        <span class = "<?php echo $post->vote_type === '1' ? 'upvote-text' : '' ?> glyphicon glyphicon-star vote-text starroll"></span>
                    </button>
                    <span class = "vote-count text-muted" style = "margin-left: 3px;"><?php echo $post->vote_count ? $post->vote_count : '0'; ?></span>
                    <button class = "btn btn-primary pull-right" id="text2speak" style = "margin-right: 3px;border-radius: 20px;" onclick="readcontent('<?php $stringy = utf8_decode($post->post_content); $stringy1 = str_replace('\'', '`', $stringy); echo trim(preg_replace('/[^A-Za-z0-9()#,%\/?@$*.:+=_~`-]/', ' ', $stringy1)); ?>')"><i class="glyphicon glyphicon-volume-up" style="padding-top: 5px;"></i></button>
                </span>
                    </div>
                    <br>
            <?php else: ?>
                <div class="media-heading">
                    <h4 class = "no-padding no-margin text-danger">Deleted Post</h4>
                </div>
                    <p class = "post-content text-muted" style = "margin-top: 15px"><i>This post has been deleted.</i></p><br>
            <?php endif; ?>
            <?php
            foreach ($post->replies as $child):
                $data['post'] = $child;
                $this->load->view('post_replies', $data);
            endforeach;
            ?>
        </div>
    </div>
    <?php
else:
    foreach ($post->replies as $child):
        $data['post'] = $child;
        $this->load->view('post_replies', $data);
    endforeach;
endif;
