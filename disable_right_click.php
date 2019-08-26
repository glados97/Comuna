<script language="JavaScript">

  window.onload = function() {
    document.addEventListener("contextmenu", function(e){
      e.preventDefault();
    }, false);

    document.addEventListener("keydown", function(e) {
      // "F11" key
      if (event.keyCode == 122) {
        disabledEvent(e);
      }
    }, false);

    function disabledEvent(e){
      if (e.stopPropagation){
        e.stopPropagation();
      } else if (window.event){
        window.event.cancelBubble = true;
      }
      e.preventDefault();
      return false;
    }
  };
</script>
