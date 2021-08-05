$subpage = get_query_var('departments_sub_page');

$subpage = isset($wp_query->query_vars['departments_sub_page']) ? strtolower($wp_query->query_vars['departments_sub_page']) : '';
