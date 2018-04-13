<?php
include(APPPATH . 'third_party/fusioncharts.php');
?>

<!-- User Record Modal -->
<div id = "record-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-heading text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"style = "display: inline-block;">Record of <?php echo $user->first_name . " " . $user->last_name ?></h4>
            </div>
            <div class="modal-body text-center">
                <div class = "row">
                    <img src = "<?php echo $user->profile_url ? base_url($user->profile_url) : base_url("images/default.jpg"); ?>" class = "img-circle" width = "100px" height = "100px" />
                    <h5 class = "text-info no-margin"><strong><?php echo $user->first_name . " " . $user->last_name ?></strong></h5>
                    <p class = "text-muted"><i><?php echo $user->email; ?></i></p>
                    <div class = "col-sm-12">
                        <ul class = "nav nav-tabs nav-justified">
                            <li class = "active"><a href = "#topic-record" data-toggle = "tab">Ebooks</a></li>
                        </ul>
                    </div>
                    <div class = "col-sm-12">
                        <div class="tab-content">
                            <!--TOPICS TAB-->
                            <div id="topic-record" class="tab-pane fade in active record-tab">
                                <div class = "col-sm-6">
                                    <h2 class = "text-info"><strong><?php echo $record->topic_count ?></strong></h2>
                                    <p>Ebooks Published</p>
                                </div>
                                <div class = "col-sm-6">
                                    <h2 class = "text-info"><strong><?php echo $record->followed_topic_count ?></strong></h2>
                                    <p>Ebooks Owned</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>