<div class="elementor d-flex flex-wrap trip-outer">

<div class="triptwocol col-md-3">

<?php

$post=1;

$arg = array( 'post_type' => 'portfolio',
'posts_per_page'=>6, );



$the_query = new WP_Query( $arg );

// The Loop

if ( $the_query->have_posts() ) {

while ( $the_query->have_posts() ) {

$the_query->the_post();



// setup_postdata($post); ?>

<?php if($post==3){echo '</div> <div class="portfolio col-md-6">' ;}

if($post==4){echo '</div> <div class="portfolio col-md-3">' ;}



?>

<div class="hometripblock hometr<?php echo $post;?>">

<div class="trip-box">
<a href="<?php the_permalink(); ?>">

<div class="tripimg"> <img src="<?php the_field('image-field'); ?>"> </div>

<div class="tripcontent"> <h4><?php the_title(); ?></h4>

<h6> <?php the_field('sub_title'); ?></h6>

<?php if($post==3) { ?><div class="btn triplearnmore"><a href="<?php the_permalink(); ?>">learn more +</a></div><?php } ?>

</div>

</a>

</div>

</div>



<?php $post++; }

}



wp_reset_postdata();



?>

</div>
</div>