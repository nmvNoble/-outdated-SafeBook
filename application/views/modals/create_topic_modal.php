
<!-- Create Topic Modal -->
<div id="create-topic-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Create Topic Modal Content-->
        <div class="modal-content">
            <div class="modal-header modal-heading modalbg">
                <button type="button" class="close" style = "padding: 5px;" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong>Publish an ebook</strong></h4>
            </div>
            <form enctype = "multipart/form-data" id = "create-topic-form" action = "topic/create" method = "POST">
                <div class="modal-body">
                    <div class="form-group"><!-- check if title is already taken -->
                        <label for = "title">Title:</label>
                            <input type="text" style="height: 50px;" required class="form-control" name = "topic_name" maxlength="35" id = "topic-title" placeholder = "Title of your topic"/>
                        <p id="charsRemaining1">Characters Left: 35</p>
                        <div class="charLimitMessage" id="charLimitMessage1"><center>Oops! You've used up all the letters and numbers for your title!</center></div>
                    </div>
                    <div class="form-group"><!-- check if description exceeds n words-->
                        <label for = "description">Description:</label>
                            <textarea class = "form-control" style="height: 100px;" required name = "topic_description" maxlength="180" id = "topic-description" placeholder = "Tell something about your topic!"></textarea>
                        <p id="charsRemaining2">Characters Left: 180</p>    
                        <div class="charLimitMessage" id="charLimitMessage2"><center>Oops! You've used up all the letters and numbers for your topic!</center></div>
                    
                    </div>
                    
                    <div class="form-group"><!-- check if description exceeds n words-->
                        <label for = "category">Genre:</label>
                             <input type="text" style="height: 50px;" required class="form-control" name = "category" maxlength="35" placeholder = "genre" id="genre"/>
                    </div>
                    
                    <div class="form-group"><!-- check if description exceeds n words-->
                        <label for = "price">Price:</label>
                            <input type="number" required class = "form-control" name ="price" min="1" step="any" placeholder = "1" id="price"/>
                    
                    </div>
                    
                    <br>
                     <div id = "attachment-buttons" class = "form-group">
                    <label id = "img-label" class="btn btn-primary buttonsbgcolor">
                            <input id = "attach-img" accept = "image/*" type="file" name = "topic_image" style = "display: none;">
                            <p id = "image-text2" class = "attach-btn-text"><i class = "fa fa-file-image-o"></i> Add Image</p>
                        </label>
                     </div>

                </div>
                <div class = "modal-footer" style = "padding: 5px; border-top: none; padding-bottom: 10px; padding-right: 10px;">
                    <a id = "create-topic-btn" class ="btn btn-primary buttonsbgcolor" data-toggle = "modal">Publish an ebook</a>
                </div>
            </form>
            
        </div>
    </div>
</div>

<!--Confirmation of topic creation modal-->

<div id="create-confirmation-modal" tabindex="-1" class="modal fade" role="dialog" style = "margin-top: 50px; margin-right: 15px;">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header modal-heading">
                <button type="button" class="close" style = "padding: 5px;" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong>Confirm ebook publication?</strong></h4>
            </div>
            <div class="modal-body">
                <button id = "create-topic-proceed" type = "submit" class = "btn btn-success">Proceed</button>
                <button class = "btn btn-Danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

    <script type="text/javascript">
    var charCount1=35, charCount2=180;
    
    $('.modal-body').keyup(function(event) 
    {
        document.getElementById('charsRemaining1').innerHTML='Characters Left: '+(charCount1-document.getElementById('topic-title').value.length);
        document.getElementById('charsRemaining2').innerHTML='Characters Left: '+(charCount2-document.getElementById('topic-description').value.length);

        if(document.getElementById('topic-title').value.length>=35)
        {  
            document.getElementById('charLimitMessage1').style.display = "block";
        }
        
        else
            document.getElementById('charLimitMessage1').style.display = "none";
        
        if(document.getElementById('topic-description').value.length>=180)
        {  
            document.getElementById('charLimitMessage2').style.display = "block";
        }  
        
        else
            document.getElementById('charLimitMessage2').style.display = "none";
//              
    });  
</script>
    
<script type="text/javascript" src="<?php echo base_url("/js/topic.js"); ?>"></script>

    
<!-- END SCRIPTS -->