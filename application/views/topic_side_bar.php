<?php
$logged_user = $_SESSION['logged_user'];
    if (is_null($logged_user)){
        header("Location: http://localhost/SafebookBeta/signin");
        die();
    }
include(APPPATH . 'views/modals/ebook_details_modal.php');
?>
    
<!-- Sidebar -->
<div class="col-md-3" style = "padding-left: 0px; margin-right:1%;margin-left: 3.5%;width:22.5%">
    <div class = "col-xs-12 home-sidebar content-container" style="border-radius:20px;">
        <!--Header-->
        <div class = "clearfix content-container" style="border-radius:20px;cursor: pointer;position: relative" id = "side-topics-followed-btn" >
            <i class="fa fa-chevron-down pull-left" style="display: inline;position: absolute;top:40%;cursor: pointer;"></i>
                            
                        <a class="text1color" style="color: black" href = "<?php echo base_url('user/profile/' . $logged_user->user_id); ?>">
                            <img class = "pull-left img-rounded home-prof-pic topictop" src = "<?php echo $logged_user->profile_url ? base_url($logged_user->profile_url) : base_url('images/default.jpg') ?>">
                        
                        <div class = "col-sm-4 home-user-text">
                            <div class = "home-username text1color"><strong><?php echo $logged_user->first_name . " " . $logged_user->last_name;?></strong></div>

<!--                            <i class = "fa fa-caret-right header-arrow"></i> 
                            <div class="home-dropdown dropdown">
                                <button class="btn btn-link dropdown-toggle home-username text1color" type="button" data-toggle="dropdown"><strong>Home</strong>
                                    <i class="caret"></i></button>
                                <ul class="dropdown-menu">
                                    <li><a href="home">Home</a></li>
                                    <li><a href="topic">Topic</a></li>
                                </ul>
                            </div>-->
                        </div>
                        </a>
 </div>
        <div id = "side-topics-followed">
        <!--<h3 class = "text-center text-info no-padding no-margin text1color" style = "margin-bottom: 10px;"><strong>Topic Shortcuts</strong></h3>-->
        <!--<a id = "side-topics-created-btn" class = "btn btn-sm btn-block no-padding sidebar-header-btn buttonsbgcolor">-->
            <h4 class="ptopcolor textoutliner" style="border-radius: 2px;color: white">Your ebooks</h4>
        <!--</a>-->
        <div class = "sidebar-topic-div">
            <ul class="nav">
                <?php
                if(!empty($logged_user->topics)):
                foreach ($logged_user->topics as $topic):
                ?>
                <li>
                    <a href="topic/view/<?php echo $topic->topic_id; ?>">
                        <span class = "text-muted" style="cursor:pointer;"><?php echo utf8_decode($topic->topic_name); ?></span>
                    </a>
                </li>
                <?php
                endforeach;
                else:
                ?>
                <li><h5 class = "text-center text-warning">No ebooks here!</h5></li>
                <?php endif; ?>
            </ul>
        </div>



        <!--<a id = "side-topics-followed-btn" class = "btn btn-block no-padding sidebar-header-btn buttonsbgcolor">-->
        <h4 class="ptopcolor textoutliner" style="border-radius: 2px;color: white">Cart</h4>
        <!--</a>-->
        <div class = "sidebar-topic-div">
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
                        <button id = "topic-follow-btn2" class = "btn pull-right btn-danger textoutliner" value = "<?php echo $topic->topic_id ?>">
                             X
                    </button>
                    </a>
                    
                </li>
                <?php
                else:
                    
                endif;
                endforeach;
                else:
                ?>
                <li><h5 class = "text-center text-warning">No ebooks here!</h5></li>
                <?php endif; ?>
            </ul>
        </div>
        
        <center><div class="btn btn-primary buttonsbgcolor textoutliner" onclick="$('#ebookdet').modal('show');">Checkout
        </div></center>
        <?php
        $servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "safebookbeta";
	$conn = @new mysqli($servername, $username, $password, $dbname);
        
        $conn->close();
        ?>
        <img class = "pinwheel1" src = "<?php echo base_url('images/Picture1.png'); ?>"/></div>
    
    </div>
</div>

<!-- SCRIPTS -->
<!--topic sidebar collapsed or expanded script-->
<script>
//function tpsidebar(){
//    if($("#side-topics-followed").is(":visible"))
//        document.cookie='tpsidebar=0;path=/;';
//    else
//        document.cookie='tpsidebar=1;path=/;';
//}
//
//</script>
<script>var $draggable = $('.draggable').draggabilly();</script>
<!--<script type="text/javascript" src="<?php echo base_url("/js/side_bar.js"); ?>"></script>-->
<!-- END SCRIPTS -->
<!-- End Sidebar -->