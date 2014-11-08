<?php

// include_once 'formhub.php';
include_once 'ona.php';
include_once 'forms.php';

function info() {
    // indicator info 
    return array(
        'title' => 'Number of children engaged in any form of Child Labor during the past six months',
        'headers' => array(
            'total' => 'Total',
        )
    );
}

function data($values = array()) {
    global $child_monitoring_form;
    
    // setup date range
    if ($values['date_range']) $dquery = array('visited_date' => $values['date_range']);
    else $dquery = array();
    
    // setup formhub helper parameters
    $query = $dquery + array('work/status' => array('$in' => array('cl', 'hcl', 'wfcl')));
    $fields = array(
        'date_visited',
        'community_code',
        'household_id',
        'child_id',
        'work/status',
    );
    $sort = array('date_visited' => '1');
    $count = false;
    $start = 0;
    $limit = 0;
    
    // use formhub helper to build and execute query and return results
    $form_data = get_form_data($child_monitoring_form, $query, $fields, $sort, $count, $start, $limit);
    
    // setup result parsing
    $total = array();
    
    // parse result data
    foreach ($form_data as $data) {
        extract($data);
        $total["$community_code-$household_id-$child_id"] = true;
    }

    // return organized result data
    return array(
        'total' => count($total)
    );
}

