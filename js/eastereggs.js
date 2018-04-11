    function catpeek(){
      $('#peek').show().delay('500').animate({
        bottom: '0',
        right:'0'
      }).delay('900').animate({
        bottom: '-500px',
        right:'-500px'
      });
    };