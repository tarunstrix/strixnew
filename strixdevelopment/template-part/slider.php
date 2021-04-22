
<?php
$arg = array(  
        'post_type' => 'expert',
        'post_status' => 'publish',
        'posts_per_page' => -1, 
        'order' => 'ASC',
    );
 $the_query = new WP_Query( $arg );?>
 <section class="silder-section">
 <?php
 if($the_query->have_posts()) {
   while($the_query->have_posts()){
       
       $the_query->the_post(); ?>
       <div class="slider-part">
       <?php the_post_thumbnail();?>
            
          <?php echo "<h2>". the_title()."</h2>";
        
      
     echo  "<p>".the_field('sub-title');echo "</p>" ?>
       <div class="social-icon">
       <ul class="list-acion">
         <?php
          if(get_field('facebook')){
          ?>
         <li><a href="<?php echo the_field('facebook')?>"><img src="<?php echo get_stylesheet_directory_uri()?>/img/srix (8).png"></a></li>
          <?php  } ?>
           
          <?php  
           if(get_field('twiter')){?>
        <li><a href="<?php the_field('twiter')?>"><img src="<?php echo get_stylesheet_directory_uri()?>/img/twitter.png"></a></li>
          <?php } ?>
        
           <?php if(get_field('pinterest')){?>
          <li><a href="<?php the_field('pinterest');?>"><img src="<?php echo get_stylesheet_directory_uri()?>/img/srix (10).png"></a></li>
         <?php  }  ?>
       
          <?php if(get_field('pinterest')){ ?>
          <li><a href="<?php echo the_field('linkdin');?>"><img src="<?php echo get_stylesheet_directory_uri()?>/img/srix (9).png"></a></li>
          <?php } ?>
 <?php
        
          ?>
          </ul>
 </div>

           
   </div>
   <?php    
   }
     wp_reset_postdata();
 }else{
     
     echo "there is no post found";
 }



?>
</section>
 

 
