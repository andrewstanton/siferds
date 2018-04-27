<?php 
$thumb_url = "";
$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
$thumb_url = $thumb_url_array[0];

if(has_post_thumbnail()): ?>
<div id="home-slider" class="carousel slide index">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="slide-image-background" style="background-image: url('<?php echo $thumb_url; ?>');"></div>

      <div class="carousel-caption">

        <?php echo "<h1>" . get_the_title() . "</h1>"; ?>

      </div>

    </div>
  </div>
</div>
<?php endif; ?>