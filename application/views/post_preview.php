<div id = "post-preview">
    <div class = "col-md-12 content-container post-preview">
        <div class = "col-sm-2 no-padding">
            <img class = "pull-left img-circle" width = "85px" height = "85px" src = "<?php echo $post->user->profile_url ? base_url($post->user->profile_url) : base_url('images/default.jpg') ?>">
            <div class = "text-center"><br><br>
                <button class = "upvote-btn btn btn-link btn-xs" style = "margin-left: 3px;" value = "<?php echo $post->post_id; ?>">
                    <span class = "<?php echo $post->vote_type === '1' ? 'upvote-text' : '' ?> glyphicon glyphicon-star vote-text starroll"></span>
                </button>
                <span class = "vote-count text-muted" style = "margin-left: 3px;"><?php echo $post->vote_count ? $post->vote_count : '0'; ?></span>
                <br>
<!--                <button class = "downvote-btn btn btn-link btn-xs" value = "<?php echo $post->post_id; ?>">
                    <span class = "<?php echo $post->vote_type === '-1' ? 'downvote-text' : '' ?> fa fa-chevron-down vote-text"></span>
                </button>-->
            </div>
        </div>
        <div class = "col-sm-10" style = "text-overflow: ellipsis;">
            <!--<h4 class = "text-muted no-margin wrap"><strong><?php echo utf8_decode($post->post_title); ?></strong></h4>-->
            <span class = "text-muted" style = "font-size: 12px;"></span>
            <a class = "btn btn-link home-content-body-username text1color" href = "<?php echo base_url('user/profile/' . $post->user->user_id); ?>"><i><?php echo $post->user->first_name . " " . $post->user->last_name; ?></i></a>
            <i class = "home-content-body-date pull-right" style="font-size: 18px;"><?php echo date("F d, Y", strtotime($post->date_posted)); ?></i>
            <p class = "post-content text-muted" style = "font-weight: lighter;white-space: pre-wrap;"><?php echo utf8_decode($post->post_content); ?></p>
        </div>
    </div>
    <a style="text-decoration: none;" href="<?php echo base_url('topic/thread/' . $post->post_id); ?>">
        <button class = "btn btn-block btn-primary buttonsbgcolor" style="border:0;font-size: 22px"> View Post Thread </button>
    </a>
</div>

<!-- SCRIPTS -->
<script type="text/javascript" src="<?php echo base_url("/js/post.js"); ?>"></script>
<!-- END SCRIPTS -->