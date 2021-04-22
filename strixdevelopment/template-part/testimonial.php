<?php
$arg = array(  
        'post_type' => 'testimonial',
        'post_status' => 'publish',
        'posts_per_page' => -1, 
        'order' => 'ASC',
    );
 $the_query = new WP_Query( $arg );?>
 <div class="testimonial-slide">
<?php  if($the_query->have_posts()){
        while($the_query->have_posts()){
       $the_query->the_post();?>
     <div class="testimonial-part">
       <div class="thumbnail-testimonial">
       <?php the_post_thumbnail();?>
       </div>
       <div class="review-text">
       <?php the_content()?>
       </div>
       <div class="clint-name">
         <?php echo "<h2>". the_title()."</h2>";?>
         </div>
         <div class="clint-company-name">
        <?php  echo  "<p>".the_field('company-name');echo "</p>";?>
        </div>
          
     </div>
<?php   }
      wp_reset_postdata();
    
}else{
    
 echo "No post found";   
}
?>
</div>

 