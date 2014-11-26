<?php

include_once 'Requests.php';
Requests::register_autoloader();

define('AUTH_TOKEN', 'e386875c22a0a11cb312671cb10acffe37713e00');

define('ASC', 1);
define('DESC', -1);

// lookup forms

$protocol = 'https';
$host     = 'ona.io';
$port     = null;
$path     = "api/v1/data";

try {
    $headers = array('Accept' => 'application/json', 'Authorization' => 'Token '.AUTH_TOKEN);
    $uri =  $protocol.'://'.$host.($port ? ':'.$port : '').($path ? '/'.$path : '');
    $request = Requests::get($uri, $headers, $options);
    foreach ((array) json_decode($request->body, true) as $_f) $forms[$_f['id_string']] = $_f['id'];
} catch (Exception $e) {
    die("Unable to make request to Ona server. Please try again later.");
}

function get_form_data($form, $query = array(), $fields = array(), $sort = null, $count = null, $start = null, $limit = null) {
  global $forms;
  
  $headers = array('Accept' => 'application/json', 'Authorization' => 'Token '.AUTH_TOKEN);
  
  $data = array();
  
  foreach ($form as $formname) {
    $form_id = $forms[$formname];
    
    // lookup data
    
    $protocol = 'https';
    $host     = 'ona.io';
    $port     = null;
    $path     = "api/v1/data/".$form_id;

    $params = array_filter(array(
      'query'  => $query  ? json_encode($query) : $query,
      'fields' => $fields ? json_encode(array_values($fields)) : $fields,
      'sort'   => $sort   ? json_encode($sort) : $sort,
      'count'  => $count  ? intval((bool) $count) : $count,
      'start'  => $start  ? intval($start) : $start,
      'limit'  => $limit  ? intval($limit) : $limit
    ));
	
    $_protocol = $protocol.'://';
    $_host     = $host;
    $_port     = ($port ? ':'.$port : '');
    $_path     = ($path ? '/'.$path : '');
    $_params   = ($params ? '?'.http_build_query($params) : '');
    
    $uri = $_protocol.$_host.$_port.$_path.$_params;
    
    try {
        $request = Requests::get($uri, $headers, $options);
    } catch (Exception $e) {
        die("Unable to make request to Ona server. Please try again later.");
    }
    
    $data += (array) json_decode($request->body, true);
  }
  
  return $data;
}

