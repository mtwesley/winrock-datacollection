<?php

// include_once 'formhub.php';
include_once 'ona.php';
include_once 'forms.php';
include_once 'function.php';

function info() {
    // indicator info 
    return array(
        'title' => 'Percentage of target youth 16-17 years old that are self-employed or employed by third parties',
        'headers' => array(
            'percentage' => 'Percentage',
        )
    );
}

function data($values = array()) {
    global $child_monitoring_form, $workplace_visit_form;
    
    // setup date range
    if ($values['date_range']) $dquery = array('visited_date' => $values['date_range']);
    else $dquery = array();
    
    // setup formhub helper parameters
    $query = $dquery + array('child_age' => array('$in' => array('16', '17')));
    $fields = array(
        'date_visited',
        'community_code',
        'other_community_code',
        'household_id',
        'child_id',
        'child_age',
        'is_working',
    );
    $sort = array('date_visited' => '1');
    $count = false;
    $start = 0;
    $limit = 0;
    
    $total = array();
    $working = array();
    $other = array();
    
    $monitoring_data = get_form_data($child_monitoring_form, $query, $fields, $sort, $count, $start, $limit);
    foreach ($monitoring_data as $data) {
        extract($data);
        
        $community_code = or_other($data, 'community_code', 'other_community_code');
        
        $unique = "$community_code-$household_id-$child_id";
        if (!array_key_exists($unique, $total)) {
            $total[$unique] = true;
        }
    }

    
    $workplace_data = get_form_data($workplace_visit_form, $query, $fields, $sort, $count, $start, $limit);
    foreach ($workplace_data as $data) {
        extract($data);
        
        $community_code = or_other($data, 'community_code', 'other_community_code');
        
        $unique = "$community_code-$household_id-$child_id";
        if (array_key_exists($unique, $total) and $is_working == 'yes') {
            $working[$unique] = true;
        }
    }

    // return organized result data
    return array(
        'percentage' => (($total ? count($working) / count($total) : 0) * 100).'%'
    );
}

