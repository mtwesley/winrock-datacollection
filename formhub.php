<?php

include_once 'Requests.php';
Requests::register_autoloader();

define('USERNAME', 'archdemo');
define('PASSWORD', 'Liberia123');

define('ASC', 1);
define('DESC', -1);

$beneficiary_workplace_visit_form = array(
  'Beneficiary_WorkplaceVisit_20140110',  
);

$child_enrollment_form = array(
  'Child_Enrollment_Form_20140305',
  'Child_Enrollment_Form_20140314'
);

$child_intake_form = array(
  'Child_Intake_Form_20140321'
);

$child_monitoring_form = array(
  'Child_Monitoring_Form_20140110'
);

$household_intake_form = array(
  'Household_Intake_Form_20140110'
);

$household_monitoring_form = array(
  'Household_Monitoring_Form_20140110'
);

$school_attendance_form = array(
  'School_Attendance_Form_20140110'
);

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
        die("Unable to make request to Formhub server. Please try again.");
    }
    
    $data += (array) json_decode($request->body, true);
  }
  
  return $data;
}

