<?php $logged_user = $_SESSION['logged_user']; ?>
<!-- Play Modal -->
<head>
<!--<link href="<?php echo base_url('bubble-pop-master/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">-->
<script src="<?php echo base_url('bubble-pop-master/js/helpers.js'); ?>"></script> 
<script src="<?php echo base_url('bubble-pop-master/js/box2d.js'); ?>"></script> 
<script src="<?php echo base_url('bubble-pop-master/js/game.js'); ?>"></script> 
<script src="<?php echo base_url('bubble-pop-master/js/base.js'); ?>"></script> 
<script src="<?php echo base_url('bubble-pop-master/js/debugDraw.js'); ?>"></script> 
<style>

</style>

</head>

<div id="playpopup" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width:800px;">
        <!-- Play Modal Content-->
        <div class="modal-content">
            <div class="modal-header modal-heading modalbg">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center"><strong><i class="fa fa-gamepad"></i> Play</strong></h4>
            </div>
            <div class="modal-body">
                <div class = "row"><center>
                    <h1>Meet Bubble POP!</h1>
            <br>
            <div class="text-center" id="canvasforpop">
                <button onclick="playbubblepop()" class="btn buttonsbgcolor textoutliner" id="playbut" style="color: white;font-size: 24px;">Play</button>
            </div>
            <br>
            <h3>Click out same colored groups<br>
            Gain score<br>
            Enjoy the physics<br> </h3>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">  
           
            function playbubblepop(){
                document.getElementById('playbut').style.display = 'none';
                document.getElementById('canvasforpop').innerHTML += '<canvas id="playingpop" style="cursor: pointer;" width="640" height="480" tabindex=\'1\'></canvas>';
                using(Box2D, "b2.+");
                init();                
                animate();}
        </script>