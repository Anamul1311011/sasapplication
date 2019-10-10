<!DOCTYPE html>
<html lang="en">
<?php require("header.php");?>

  <body id="wrap" style="background-color:#000">
    <nav class="navbar navbar-inverse" id="topMenu">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <?php require('menu.php');?>
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-md-12">
           <section class="big-background">
           		<div class="logo"><a href="#"><img src="images/logo.png" alt="logo"/></a></div>
           		<div id="bgndVideo" class="player" 
                	data-property="{videoURL:'https://www.youtube.com/watch?v=dmywhL8r0oQ',containment:'body',autoPlay:true, 
                    mute:false, startAt:0, opacity:1}">
                </div> 
        	</section>           
        </div><!--/.col-md-12-->
      </div><!--/row-->
      <?php require('b_menu.php');?>
    </div><!--/.container-->
           <?php require("footer.php");?>
  </body>
</html>
