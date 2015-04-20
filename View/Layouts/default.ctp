<!DOCTYPE html>

    




	<?php echo $this->Html->charset(); ?>
	<title>
		Omsa
	</title>
	<?php
		echo $this->Html->meta('icon');

echo $this->Html->meta('utf-8');

  // echo $this->Html->script('');
  // echo $this->Html->script('');
       
       // no se toca esta parte de aqui
    
    
		echo $this->Html->script("angular");
		echo $this->Html->script("lodash");
		echo $this->Html->script("angular-google-maps.min");
		echo $this->Html->script("ngGeolocation");
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
				
// echo $this->Html->css('foundation.min');
// echo $this->Html->css('main');
//   echo $this->Html->css('app');
// echo $this->Html->script('modernizr.foundation');
//   echo $this->Html->css('ligature'); //no tocar
//       echo $this->Html->css('ninja-slider'); //no tocar
//      echo $this->Html->script('ninjaVideoPlugin');
//      echo $this->Html->script('ninja-slider');
     echo $this->Html->css('zerogrid');
     echo $this->Html->css('jquery.fancybox');
     echo $this->Html->script('jquery');
     echo $this->Html->script('jquery.fancybox');
     // echo $this->Html->script('jquery-migrate-1.1.1');
     // echo $this->Html->script('bgstretcher');
     // echo $this->Html->script('css3-mediaqueries.js');

	?>
 



    
<body >
<!--   <nav>

     <div class="twelve columns header_nav">
     <div class="row">
      
        <ul id="menu-header" class="nav-bar horizontal">
        
         <li class="active"><a href="index.html">Home</a></li>
      
          <li class="has-flyout">
           <a href="#">Example Pages</a><a href="#" class="flyout-toggle"></a>
            <ul class="flyout"><!-- Flyout Menu -->
              <!-- <li class="has-flyout"><a href="blog.html">Blog</a></li> -->
             <!--  <li class="has-flyout"><a href="blog_single.html">Blog Single Page</a></li>
              <li class="has-flyout"><a href="products-page.html">Products Page</a></li>
              <li class="has-flyout"><a href="product-single.html">Product Single</a></li>
              <li class="has-flyout"><a href="pricing-table.html">Pricing Table</a></li>
              <li class="has-flyout"><a href="contact.html">Contact Page</a></li>
            </ul> 
          </li><!-- END Flyout Menu -->
      
         <!--  <li class=""><a href="galleries.html">Boxed Gallery</a></li>
          <li class=""><a href="portfolio.html">Portfolio Gallery</a></li>
          <li class=""><a href="pinterest-style.html">Pinterest Gallery</a></li>
          <li class=""><a href="tiles.html">Tiles</a></li>
      
        </ul>
        
        <script type="text/javascript">
         //<![CDATA[
         $('ul#menu-header').nav-bar();
          //]]>
        </script>
        
      </div>  
      </div>
      
</nav>
       -->

     <header id="header">
            <h1 style="text-align:center"  >SILTRAP</h1>
              <h2 class="welcome_text"></h2>    
        
</header>
 


	

// <script>
$(document).ready(function()
{

  window.setInterval(function()
    {

      $("a#inline").fancybox(
        {
          afterLoad: function()
          {
            setTimeout(function()
            {
              $.fancybox.close();
            },
            3000 //tiempo que dura en cerrar 

            )
          }
        }).trigger('click');


    },
    100000 //tiempo que dura en abrir 
    );
  



});
</script>


    <section id="content">
  <a id="inline" style="display:none;" href="#data">Test</a>
  <div style="display:none;">
    <div id="data">
      SILTRAP introduce tu publicidad
 </section> 
 
 </div>
<div class="block"> 
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
	</div>

  <footer>

      <div class="row">
      
          <div class="twelve columns footer">
              <a href="http://twitter.com/dieterarno" class="lsf-icon" style="font-size:16px; margin-right:15px" title="twitter">Twitter</a> 
              <a href="http://csstemplateheaven.com/csstemplateheaven" class="lsf-icon" style="font-size:16px; margin-right:15px" title="facebook">Facebook</a>
              <a href="http://csstemplateheaven.com/csstemplateheaven" class="lsf-icon" style="font-size:16px; margin-right:15px" title="pinterest">Pinterest</a>
              <a href="http://twitter.com/dieterarno" class="lsf-icon" style="font-size:16px" title="instagram">Instagram</a>
          </div>
          
      </div>

</footer>     

<!-- ######################## Scripts ######################## --> 

    <!-- Included JS Files (Compressed) -->
    <script src="javascripts/foundation.min.js" type="text/javascript"></script> 
    <!-- Initialize JS Plugins -->
     <script src="javascripts/app.js" type="text/javascript"></script>

</body>
</html>
