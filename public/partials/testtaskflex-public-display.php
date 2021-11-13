<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       Jarosław Livchak
 * @since      1.0.0
 *
 * @package    Testtaskwp
 * @subpackage Testtaskwp/public/partials
 */
?>
<h1>Test task</h1>
<?php $loop = new WP_Query( array( 
  'post_type'      => 'product',
  'posts_per_page' => $quantity,
  'orderby'        => 'rand'
));
?>

<div class="sl147_container">
  <?php 
  while ( $loop->have_posts() ):
    $loop->the_post();
    $_product = wc_get_product( $loop->post->ID );
    ?>

    <div class="sl147_box">
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail("thumbnail"); ?>
      </a>
      <div class="sl147_price_height">

        <?php if($_product->sale_price) :?>

          <div class="sl147_color_discount">
            <?php echo TesttaskFlexGetData::discountPercentage($_product);?>          
          </div>

          <p>
            <span class="sl147_regular_price">
              <?php echo $_product->regular_price.$currency?>
            </span>

            <span class="sl147_color_discount sl147_sale_price">
              <?php echo $_product->sale_price.$currency?>
            </span>

          </p>
        <?php else: ?>
          <div class="sl147_block_middle">
            <?php woocommerce_template_loop_price(); ?>
          </div>

        <?php endif;?>
      </div> 
      <div class="sl147_title">
        <a href="<?php the_permalink(); ?>">
          <?php the_title();?>
        </a>          
      </div>   

      <?php woocommerce_template_loop_add_to_cart(); ?>

    </div>
  <?php endwhile;?>
</div>