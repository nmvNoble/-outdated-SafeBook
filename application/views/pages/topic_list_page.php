<?php
include(APPPATH . 'views/header.php');
?>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
    <?php
    include(APPPATH . 'views/navigation_bar.php');
    include(APPPATH . 'views/topic_side_bar.php');
    ?>
    
    <!-- CODE HERE -->
    </div>

    <div class = "container page">
        <div class = "row">
            <div class = "col-md-9 home-container">
                <div class = "col-md-12 home-container">
                    <!-- HEADER -->
                    <div class = "clearfix content-container" style="border-radius:20px;">

                    <div id = "topic-list" class = "list-group">
                        <?php foreach ($topics as $topic): ?>
                        
                        <!--retrieving the cover photo-->
                    <a class="topic-grid1" id="topicGcolor" href = "<?php echo base_url('topic/view/' . $topic->topic_id); ?>">
                        <?php

                        $conn = @new mysqli($servername, $username, $password, $dbname);

                        $sql = "SELECT file_url FROM tbl_covers WHERE topic_id = '$topic->topic_id'";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        echo '<img src=" '.$row['file_url'].' " width = "100%" height="230px" style="position:relative;" />';
                        $conn->close();
                        }?>

                                <h4 class = "text-info no-padding no-margin text1color topicheader"><?php echo utf8_decode($topic->topic_name); ?></h4><br>
                                <small class="topicheader2"><i>by <?php echo $topic->user->first_name . " " . $topic->user->last_name; ?></i></small>
<!--                                <div class="topic-grid-icons">
                                    <div class = "label label-info follower-label draggable"><i class = "fa fa-group"></i> 
                                        <?php echo $topic->followers ? count($topic->followers) : '0' ?> <i class = "fa fa-comments"></i> 
                                            <?php echo $topic->post_count; ?></div>
                                </div>-->
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php
            include(APPPATH . 'views/modals/create_topic_modal.php');
            ?>
        </div>
    </div>

        <script type="text/javascript" src="<?php echo base_url("/js/search.js"); ?>"></script>

 <?php
  //  include(APPPATH . 'views/chat/chat.php');
    