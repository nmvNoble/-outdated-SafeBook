        var now = new Date();
        var now2 = new Date();
        var time = now.getTime();
        var time2 = now.getTime()+(1800 * 1000);
        now.setTime(time);
        now2.setTime(time2);

        var nowH = now.getHours();
        var nowM = now.getMinutes();

        var blur = Number(getCookie("blur"));
    
        if(Number(getCookie("nexttimed1"))<nowH && (Number(getCookie("nexttimed2"))-30)<=nowM)
        {
            blur = blur+1;
            document.cookie = "nexttimed1=" + now2.getHours() +";path=/"; 
            document.cookie = "nexttimed2=" + now2.getMinutes() +";path=/"; 
            document.cookie = "blur=" + blur + ";path=/"; 
            $('#timepopup').modal('show');
        }

        if(Number(getCookie("nexttimed1"))===nowH && (Number(getCookie("nexttimed2")))<=nowM)
        {
            blur = blur+1;
            document.cookie = "nexttimed1=" + now2.getHours() +";path=/"; 
            document.cookie = "nexttimed2=" + now2.getMinutes() +";path=/"; 
            document.cookie = "blur=" + blur + ";path=/"; 
            $('#timepopup').modal('show');
        }
        
        function forceTimeout()
        {
            blur = blur+1;
            document.cookie = "blur=" + blur + ";path=/"; 
            $('#timepopup').modal('show');
        }
        
        function removeBlur()
        {
            blur = 0;
            document.cookie = "blur=" + blur + ";path=/"; 
            location.reload();
        }