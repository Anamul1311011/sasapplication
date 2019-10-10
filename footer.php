
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/style.js"></script>
   <!-- <script src="js/jquery-1.11.1.min.js"></script>-->
    <script src="js/device.min.js"></script> <!--OPTIONAL JQUERY PLUGIN-->
    <script src="js/jquery.mb.YTPlayer.js"></script>
    <script src="js/custom.js"></script>
	<script>
      $('.arrow').click(function() {
        if($(this).hasClass('arrow'))
        {
            $(this).addClass('downArrow').removeClass('arrow');
        }
        else
        {
           $(this).addClass('arrow').removeClass('downArrow');
        }
      });
      
     $("#arrow").click(function () {
        $(".slide").slideToggle("fast");
      });
	  
       $("#wrap").hover(function () {
        $("#topMenu").slideToggle("slow");
      });
</script>