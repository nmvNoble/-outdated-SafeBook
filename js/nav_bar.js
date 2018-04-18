$(document).ready(function() {
    $.ajax({
        url: window.location.origin + "/SafebookBeta/notifications",
        context: document.body
    });

    $.ajax({
        url: window.location.origin + "/SafebookBeta/topic/refresh",
        context: document.body
    });
    

    $("#notif-btn").on("click", function() {
        var notif_count = $("#notif-btn").data("value");
        $.ajax({
            url: window.location.origin + "/SafebookBeta/notifications/read",
            success: function() {
                $("#notif-badge").remove();
                var new_notif_count = $("#notif-label").html() - notif_count;
                if (new_notif_count === 0) {
                    $("#notif-label").remove();
                } else {
                    $("#notif-label").html(new_notif_count);
                }
            }
        });
    });

    $(".invite-accept").on("click", function() {
        var inv_btn = $(this);
        var id = inv_btn.val();
        $.ajax({
            url: window.location.origin + "/SafebookBeta/invite/accept/invite/" + id,
            success: function(data) {
                //return data of user and topic
                var add_span = "<div class = 'invite-action text-success col-xs-12' style = 'padding: 15px; font-size: 12px;'>" +
                        "<i class = 'fa fa-check'></i> You have accepted the invite of " +
                        "<a class = 'btn btn-link btn-xs no-padding no-margin' style = 'padding-bottom: 3px;' href = '" + window.location.origin + "/SafebookBeta/user/profile/" + data.user_id + "'>"
                        + "<strong>" + data.first_name + " " + data.last_name + "</strong></a>. " +
                        "Check out <a class = 'btn btn-link btn-xs no-padding no-margin' style = 'padding-bottom: 3px;' href = '" + window.location.origin + "/SafebookBeta/topic/view/" + data.topic_id + "'>"
                        + "<strong>" + data.topic_name + "</strong></a>!</div>";
                var list_item = inv_btn.closest('.notif-item');
                list_item.html(add_span);
                list_item.addClass("list-group-item-success");
            }
        });
    });

    $(".invite-decline").on("click", function() {
        var inv_btn = $(this);
        var id = inv_btn.val();
        $.ajax({
            url: window.location.origin + "/SafebookBeta/invite/decline/invite/" + id,
            success: function(data) {
                var add_span = "<div class = 'invite-action text-danger col-xs-12' style = 'padding: 15px; font-size: 12px;'>" +
                        "<i class = 'fa fa-close'></i> You have declined the invite of " +
                        "<a class = 'btn btn-link btn-xs no-padding no-margin' style = 'padding-bottom: 3px;' href = '" + window.location.origin + "/SafebookBeta/user/profile/" + data.user_id + "'>"
                        + "<strong>" + data.first_name + " " + data.last_name + "</strong></a> to moderate" +
                        " <a class = 'btn btn-link btn-xs no-padding no-margin' style = 'padding-bottom: 3px;' href = '" + window.location.origin + "/SafebookBeta/topic/view/" + data.topic_id + "'>"
                        + "<strong>" + data.topic_name + "</strong></a>!</div>";
                var list_item = inv_btn.closest('.notif-item');
                list_item.html(add_span);
                list_item.addClass("list-group-item-danger");
            }
        });
    });

    $(".request-accept").on("click", function() {
        var inv_btn = $(this);
        var id = inv_btn.val();

        $.ajax({
            url: window.location.origin + "/SafebookBeta/invite/accept/request/" + id,
            success: function(data) {
                var add_span = "<div class = 'invite-action text-success col-xs-12' style = 'padding: 15px; font-size: 12px;'>" +
                        "<i class = 'fa fa-check'></i> You have accepted the request of " +
                        "<a class = 'btn btn-link btn-xs no-padding no-margin' style = 'padding-bottom: 3px;' href = '" + window.location.origin + "/SafebookBeta/user/profile/" + data.user_id + "'>"
                        + "<strong>" + data.first_name + " " + data.last_name + "</strong></a> in " +
                        " <a class = 'btn btn-link btn-xs no-padding no-margin' style = 'padding-bottom: 3px;' href = '" + window.location.origin + "/SafebookBeta/topic/view/" + data.topic_id + "'>"
                        + "<strong>" + data.topic_name + "</strong></a>!</div>";
                var list_item = inv_btn.closest('.notif-item');
                list_item.html(add_span);
                list_item.addClass("list-group-item-success");
            }
        });
    });

    $(".request-decline").on("click", function() {
        var inv_btn = $(this);
        var id = inv_btn.val();
        
        $.ajax({
            url: window.location.origin + "/SafebookBeta/invite/decline/request/" + id,
            success: function(data) {
                var add_span = "<div class = 'invite-action text-danger col-xs-12' style = 'padding: 15px; font-size: 12px;'>" +
                        "<i class = 'fa fa-close'></i> You have declined the request of " +
                        "<a class = 'btn btn-link btn-xs no-padding no-margin' style = 'padding-bottom: 3px;' href = '" + window.location.origin + "/SafebookBeta/user/profile/" + data.user_id + "'>"
                        + "<strong>" + data.first_name + " " + data.last_name + "</strong></a> in" +
                        " <a class = 'btn btn-link btn-xs no-padding no-margin' style = 'padding-bottom: 3px;' href = '" + window.location.origin + "/SafebookBeta/topic/view/" + data.topic_id + "'>"
                        + "<strong>" + data.topic_name + "</strong></a>!</div>";
                var list_item = inv_btn.closest('.notif-item');
                list_item.html(add_span);
                list_item.addClass("list-group-item-danger");
            }
        });
    });
});