<?php
/**
 * Template Name: Welcome Page
 */
get_header();
$calendar_data = spp_fn(['fn_name'=>'g365_remote_api', 'arguments'=>['calendar-api', ['target_url'=>get_site_url()]]]);
echo "<pre>"; print_r(testing()); echo "</pre>";

get_footer();