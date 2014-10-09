<?php

include_once 'Requests.php';
Requests::register_autoloader();

define('USERNAME', 'archdemo');
define('PASSWORD', 'Liberia123');

define('ASC', 1);
define('DESC', -1);

function get_form_data($form, $query = array(), $fields = array(), $sort = null, $count = null, $start = null, $limit = null) {
  $username = USERNAME;
  $password = PASSWORD;
  
  $headers = array('Accept' => 'application/json');
  $options = array('auth' => array($username, $password));
  
  $data = array();
  
  foreach ($form as $formname) {
    $protocol = 'https';
    $host     = 'formhub.org';
    $port     = null;
    $path     = "$username/forms/$formname/api";
    
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
        die("Unable to make request to Formhub server. Please try again later.");
    }
    
    $data += (array) json_decode($request->body, true);
  }
  
  return $data;
}

