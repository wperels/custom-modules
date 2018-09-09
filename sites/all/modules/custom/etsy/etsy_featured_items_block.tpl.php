<?php

drupal_add_css(drupal_get_path('module', 'etsy') . '/etsy_featured_items_block.css');

if($response->count) {
  foreach($response->results as $item) {
    
    printf('<div class="etsy-featured-listing"><img src="%s" />%s<br />$%d %s</div>', 
      $item->image_url_50x50, 
      l($item->title, 'store/listing/' . $item->listing_id),
      $item->price,
      $item->currency_code);
  }
} else {
  printf('<p>%s</p>', t('This shop has no featured items at this time.'));
}