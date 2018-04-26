<?php 
$thumb_url = "";
$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
$thumb_url = $thumb_url_array[0];

if(has_post_thumbnail()): ?>
<div id="banner" class="carousel slide internal">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="slide-image-background" style="background-image: url('<?php echo $thumb_url; ?>');"></div>

      <div class="carousel-caption">
        <h2><?php echo get_the_title(); ?></h2>
      </div>

    </div>
  </div>
</div>
<?php else: ?>
<div id="banner" class="carousel slide internal">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="slide-image-background" style="background-image: url('<?php echo get_template_directory_uri() . '/imgs/banner-default.jpg'; ?>');"></div>

      <div class="carousel-caption">
        <h2><?php echo get_the_title(); ?></h2>
      </div>

    </div>
  </div>
</div>
<?php endif; ?>