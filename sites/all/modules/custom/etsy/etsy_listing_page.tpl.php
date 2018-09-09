<?php

drupal_add_css(drupal_get_path('module', 'etsy') . '/etsy_listing_page.css');

// TODO: Add funky javascript image display to listing pages 

print '<div class="listing-photos">';

foreach($listing->results[0]->all_images as $image) {
  printf ('<a href="%s" rel="lightbox[listing_photo]" class="listing-photo"><img src="%s" /></a>', $image->image_url_430xN, $image->image_url_75x75);
}
print t('Click photos to enlarge.');
print '</div>';

print _filter_autop($listing->results[0]->description);

printf("$%d %s", $listing->results[0]->price, $listing->results[0]->currency_code);

// FIXME: This string concatenation is temporary and ugly.
printf("%s", l(t('Add to my Etsy shopping cart.'), 'http://www.etsy.com/add_to_cart.php?listing_id=' . $listing->results[0]->listing_id));

print l(t('View my Etsy shopping cart.'), 'https://www.etsy.com/cartcheckout.php');

?>

<pre><?php print_r($listing); ?></pre>