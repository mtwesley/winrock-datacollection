<?php

// include_once 'formhub.php';
include_once 'ona.php';
include_once 'forms.php';
include_once 'functions.php';

function info() {
    // indicator info 
    return array(
        'title' => 'Number of households receiving livelihood services',
        'headers' => array(
            'total' => 'Total',
        )
    );
}

function data($values = array()) {
    global $household_monitoring_form;
    
    // setup date range
    if ($values['date_range']) $dquery = array('visited_date' => $values['date_range']);
    else $dquery = array();
    
    // setup formhub helper parameters
    $query = $dquery + array('has_livelihood_services' => 'yes');
    $fields = array(
        'date_visited',
        'community_code',
        'other_community_code',
        'household_id',
    );
    $sort = array('date_visited' => '1');
    $count = false;
    $start = 0;
    $limit = 0;
    
    // use formhub helper to build and execute query and return results
    $form_data = get_form_data($household_monitoring_form, $query, $fields, $sort, $count, $start, $limit);
    
    // setup result parsing
    $total = array();
    
    // parse result data
    foreach ($form_data as $data) {
        extract($data);

        $community_code = or_other($data, 'community_code', 'other_community_code');
        
        $unique = "$community_code-$household_id";
        if (!array_key_exists($unique, $total)) {
            $total[$unique] = true;
        }
    }

    // return organized result data
    return array(
        'total' => count($total)
    );
}

