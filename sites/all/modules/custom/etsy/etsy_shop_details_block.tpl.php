<?php

drupal_add_css(drupal_get_path('module', 'etsy') . '/etsy_shop_details_block.css');

if($response->count) {
  printf('<div class="etsy-shop-details"><img src="%s" /><h3>%s</h3>%s<br />%d listings<br /><a href="%s">%s</a></div>', 
    $response->results[0]->image_url_75x75,
    $response->results[0]->user_name,
    $response->results[0]->city,
    $response->results[0]->listing_count,
    $response->results[0]->url,
    t('Visit my Etsy shop')
    );  
}
else {
  printf('<p>%s</p>', t('No details are available for this shop.'));
}
