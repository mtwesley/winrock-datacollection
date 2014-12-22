<?php

// include_once 'formhub.php';
include_once 'ona.php';
include_once 'forms.php';
include_once 'functions.php';

function info() {
    // indicator info 
    return array(
        'title' => 'Percentage of children in Worst Forms of Child Labor',
        'headers' => array(
            'percentage' => 'Percentage',
        )
    );
}

function data($values = array()) {
    global $child_monitoring_form;
    
    // setup date range
    if ($values['date_range']) $dquery = array('visited_date' => $values['date_range']);
    else $dquery = array();
    
    // setup formhub helper parameters
    $query = $dquery;
    $fields = array(
        'date_visited',
        'community_code',
        'other_community_code',
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
    $other = array();
    $wfcl = array();
    
    // parse result data
    foreach ($form_data as $data) {
        extract($data);
        
        $community_code = or_other($data, 'community_code', 'other_community_code');
        
        $unique = "$community_code-$household_id-$child_id";
        if (!array_key_exists($unique, $total)) {
            $total[$unique] = true;

            if ($data['work/status'] == 'wfcl') $wfcl["$community_code-$household_id-$child_id"] = true;
            else $other["$community_code-$household_id-$child_id"] = true;
        }        
    }

    // return organized result data
    return array(
        'percentage' => (($total ? count($wfcl) / count($total) : 0) * 100).'%'
    );
}

