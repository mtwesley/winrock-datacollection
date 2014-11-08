<?php

// include_once 'formhub.php';
include_once 'ona.php';
include_once 'forms.php';

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
    global $workplace_visit_form;
    
    // setup date range
    if ($values['date_range']) $dquery = array('visited_date' => $values['date_range']);
    else $dquery = array();
    
    // setup formhub helper parameters
    $query = $dquery;
    $fields = array(
        'date_visited',
        'community_code',
        'household_id',
        'child_id',
        'child_age',
        'is_working',
    );
    $sort = array('date_visited' => '1');
    $count = false;
    $start = 0;
    $limit = 0;
    
    // use formhub helper to build and execute query and return results
    $form_data = get_form_data($workplace_visit_form, $query, $fields, $sort, $count, $start, $limit);
    
    // setup result parsing
    $total = array();
    $is_working = array();
    $other = array();
    
    // parse result data
    foreach ($form_data as $data) {
        extract($data);
        $total["$community_code-$household_id-$child_id"] = true;
        if ($data['is_working']) $is_working["$community_code-$household_id-$child_id"] = true;
        else $other["$community_code-$household_id-$child_id"] = true;
    }

    // return organized result data
    return array(
        'percentage' => (($total ? count($is_working) / count($total) : 0) * 100).'%'
    );
}

