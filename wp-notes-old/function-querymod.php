<?php
  
// Add sub-page rewrite rule to stores E.g. /stores/williams/events
function stores_sub_page_urls(){
  add_rewrite_tag('%stores_sub_page%', '([^&]+)');
  add_rewrite_rule(
    '^our-stores/([^/]*)/([^/]*)',
    'index.php?store=$matches[1]&stores_sub_page=$matches[2]',
    'top'
  );
  //flush_rewrite_rules();
}
add_action('init', 'stores_sub_page_urls');

// Add sub-page rewrite rule to departments E.g. /departments/bakery/staff-picks
function departments_sub_page_urls(){
  add_rewrite_tag('%departments_sub_page%', '([^&]+)');
  add_rewrite_rule(
    '^our-departments/([^/]*)/([^/]*)',
    'index.php?department=$matches[1]&departments_sub_page=$matches[2]',
    'top'
  );
  //flush_rewrite_rules();
}
add_action('init', 'departments_sub_page_urls');


