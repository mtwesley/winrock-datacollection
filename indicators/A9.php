<?php

// include_once 'formhub.php';
include_once 'ona.php';
include_once 'forms.php';

function info() {
    // indicator info 
    return array(
        'title' => 'Percentage of target households covered by social protection services',
        'headers' => array(
            'percentage' => 'Percentage',
        )
    );
}

function data($values = array()) {
    global $household_monitoring_form;
    
    // setup date range
    if ($values['date_range']) $dquery = array('visited_date' => $values['date_range']);
    else $dquery = array();
    
    // setup formhub helper parameters
    $query = $dquery;
    $fields = array(
        'date_visited',
        'community_code',
        'household_id',
        'has_social_protection_services',
    );
    $sort = array('date_visited' => '1');
    $count = false;
    $start = 0;
    $limit = 0;
    
    // use formhub helper to build and execute query and return results
    $form_data = get_form_data($household_monitoring_form, $query, $fields, $sort, $count, $start, $limit);
    
    // setup result parsing
    $total = array();
    $has_services = array();
    $other = array();
    
    // parse result data
    foreach ($form_data as $data) {
        extract($data);
        $total["$community_code-$household_id"] = true;
        if ($data['has_social_protection_services']) $has_services["$community_code-$household_id"] = true;
        else $other["$community_code-$household_id"] = true;
    }

    // return organized result data
    return array(
        'percentage' => (($total ? count($has_services) / count($total) : 0) * 100).'%'
    );
}

