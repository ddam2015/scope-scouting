<?php

//needed functions for g365 integrations and usage
function g365_conn( $data_key = null, $data_args = null, $data_key_2 = null, $data_args_2 = null ) {
  $grassroots_keys = get_option( 'ss_g365_connector' );
  if( empty($grassroots_keys['connector_data']['trans_key'])  || empty($grassroots_keys['connector_data']['trans_id']) ) return 'Missing Key and/or ID credentials, please contact your administrator.';
  # Create a connection
  $url = ( strpos(site_url(), 'dev.') === false ) ? 'https://sportspassports.com/data-request/' : 'https://dev.sportspassports.com/data-request/';
  $response = wp_remote_post( $url, array(
    'timeout' => 45,
    'body'    => ['data_key' => $data_key, 'data_args' => $data_args, 'data_key_2' => $data_key_2, 'data_args_2' => $data_args_2],
    'headers' => array(
      'Authorization' => 'Basic ' . base64_encode( $grassroots_keys['connector_data']['trans_key'] .  $grassroots_keys['connector_data']['trans_id'] ),
      'origin_url'    => site_url()
      )
    )
  );
  if ( is_wp_error( $response ) ) {
     return $response->get_error_message();
  }
  $result = json_decode($response['body']);
  return $result->message;
}

?>