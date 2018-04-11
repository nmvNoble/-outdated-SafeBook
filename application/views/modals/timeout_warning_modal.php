<?php $logged_user = $_SESSION['logged_user']; ?>
<!-- Timeout Warning Modal -->
<head>

<style>
</style>

</head>

<div id="timeoutpopup" class="modal fade" role="dialog">
    <canvas style="position:fixed;" id="canvas5"></canvas>
    <div class="modal-dialog">
        <!-- Timeout Warning  Modal Content-->
        <div class="modal-content">
            <div class="modal-header modal-heading modalbg">                
                <h4 class="modal-title text-center"><strong><i class="glyphicon glyphicon-time"></i>It's almost 8 PM!</strong></h4>
            </div>
            <div class="modal-body">
                <div class = "row"><center>
                        <span style="font-size: 32px">Hey there, <?php echo $logged_user->first_name; ?>!<br> Mukhlat will be saying goodbye by 8 PM!.<br> Make sure to finish what you're doing now!</span><br><br>
                        <button type="button" class="btn buttonsbgcolor textoutliner" data-dismiss="modal" style="color: white;font-size: 24px;">Okay! I understand!</button>
                    
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>