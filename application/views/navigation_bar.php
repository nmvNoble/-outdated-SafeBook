<?php
$logged_user = $_SESSION['logged_user'];
    if (is_null($logged_user)){
        header("Location: http://localhost/SafebookBeta/signin");
        die();
    }
$unanswered = $logged_user->unanswered_invites + $logged_user->unanswered_requests;
?>
<?php 
   if (!isset($_SESSION)) {
         header("Location:http://localhost/SafebookBeta/signin/logout"); /* Redirect browser */
   }
?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    

<script src="<?php echo base_url('draggabilly-master/dist/draggabilly.pkgd.min.js'); ?>"></script>

<!-- Nav Bar -->



    <nav class = "navbar navbar-default navbar-font navbar-fixed-top" style = "box-shadow: 0px 1px 2px #ccc;">
        <div class = "container-fluid"  style="margin:0.5%;">
            <div class = "navbar-header" style = "margin-left: 50px;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
                <a id ="logom" class = "draggable navbar-brand" href = "<?php echo base_url('topic') ?>" style="font-weight: bold;color: white;font-size: 24px !important;">Safebook</a>

            </div>
            <div class = "collapse navbar-collapse" id = "nav-collapse">
                <div class = "nav-left-end">
                    <form action = "<?php echo base_url('search'); ?>" class="navbar-left" role = "search" method = "GET" style="width:30%; margin-top:0.555%; margin-left:1%; margin-right:4%;">
                        <span class="input-group">
                            <div class="input-group-btn" style="display: inline-block;">
                                <input required type="text" name = "search-key" class="form-control" placeholder="Search for ebooks" id="search" style="width: 400px; font-size: 22px">
                                <button class="btn btn-default search-btn tooltip1" type="submit">
                                    <i class="glyphicon glyphicon-search buttonsgo" style="cursor: pointer"></i><span class="tooltiptext1" style="width:150px;">Start search</span>
                                </button>
                                </div>
                        </span>

                        
                    </form>
                </div>

                            <div class="navbaricons2">
                            <a onclick="window.speechSynthesis.cancel();" id="logout-btn" class="navbaricons" href="<?php echo base_url('signin/logout'); ?>" style="margin-right:4%;"><i class = "glyphicon glyphicon-log-out iconin"></i>Logout
                                </a>

<!--                            <a class="navbaricons" href="#customize-theme" data-toggle = "modal">
                                        <i class = "fa fa-paint-brush iconin"></i>Colors
                                <span class="tooltiptext">Change the colors of the site!</span>
                            </a>-->
                                    </a>
                            
<!--                            <a class="navbaricons" id = "notif-btn" href="#notif-modal" data-toggle = "modal" <?php echo (int) $logged_user->unread_notifs > 0 ? "data-value = \"" . $logged_user->unread_notifs . "\"" : "" ?>>
                                    <?php if ((int) $logged_user->unread_notifs > 0): ?>
                                    <span id = "notif-badge" class = "badge" style="float:right;background: red;"><?php echo $logged_user->unread_notifs ?></span>
                                    <?php endif; ?>    
                                    <i class = "glyphicon glyphicon-exclamation-sign iconin"></i>News    
                                <span class="tooltiptext">You can check your notifications here!</span>  
                            </a>-->
                            <div class="vl"  style="margin-right:0.3%;"></div>
 
                                <!--<a class="navbaricons" href="<?php echo base_url('topic') ?>"><strong class="iconin"><i class = "glyphicon glyphicon-list iconin"></i>ebooks</strong></a>-->
                                <a class="navbaricons" href="<?php echo base_url('topic') ?>"><strong class="iconin"><i id="home2" class = "glyphicon glyphicon-home iconin"></i></i>Home</strong></a>
                               
                                <div class="navbarprofileicon">
                                <img class = "img-circle nav-prof-pic iconin" src = "<?php echo $logged_user->profile_url ? base_url($logged_user->profile_url) : base_url('images/default.jpg') ?>"/> 
                                <?php echo $logged_user->first_name; ?></div>

                </div>
            </div>
        </div>
    </nav>
<!-- Nav Bar Script -->
<script type="text/javascript" src="<?php echo base_url("/js/nav_bar.js"); ?>"></script>
<!--<script src="<?php // echo base_url('js/usagetimer.js'); ?>"></script>-->
<script>var $draggable = $('.draggable').draggabilly();</script>
<!--highlighted text reader script-->
<!--<script>
var synth = window.speechSynthesis;
var voices90 = synth.getVoices();

function getSelectionText() { //highlight desired text to read
    var text = "";
    if (window.getSelection) {
        text = window.getSelection().toString();
    } else if (document.selection && document.selection.type !== "Control") {
        text = document.selection.createRange().text;
    }
    return text;
}

document.addEventListener('keydown', function(e) {
  if (e.keyCode === 16) { //press shift to read higlighted text
    var msg = new SpeechSynthesisUtterance(getSelectionText());
    msg.voice = voices90[2];
    synth.speak(msg);
  }
  if(e.keyCode === 17){ //press ctrl to stop reading
     window.speechSynthesis.cancel();
  }
});

</script>

read post content reader script
        <script>
function readcontent(value) {
    if(!(speechSynthesis.speaking)){
    var value2 = value.replace(/`/g, "'");
    var reader = new SpeechSynthesisUtterance(value2);
    window.speechSynthesis.speak(reader);
    }
    else{
        window.speechSynthesis.cancel();
    }
  }

</script>-->
<!-- End Nav Bar -->



<?php // include(APPPATH . 'views/modals/notifications_modal.php'); ?>
<?php // include(APPPATH . 'views/modals/customize_modal.php'); ?>