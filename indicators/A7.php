<?php

// include_once 'formhub.php';
include_once 'ona.php';
include_once 'forms.php';

function info() {
    // indicator info 
    return array(
        'title' => 'Percentage of beneficiary children who complete the school year',
        'headers' => array(
            'percentage' => 'Percentage',
        )
    );
}

function data($values = array()) {
    global $school_attendance_form;
    
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
        'children',
    );
    $sort = array('date_visited' => '1');
    $count = false;
    $start = 0;
    $limit = 0;
    
    // use formhub helper to build and execute query and return results
    $form_data = get_form_data($school_attendance_form, $query, $fields, $sort, $count, $start, $limit);
    
    // setup result parsing
    $total = array();
    $completed = array();
    $other = array();
    
    // parse result data
    foreach ($form_data as $data) {
        extract($data);
        foreach ($children as $child) if ($child['children/final_exam_date']) {
            $total["$community_code-$household_id-$child_id"] = true;
            if ($child['children/has_attended_final_exam']) $completed["$community_code-$household_id-$child_id"] = true;
            else $other["$community_code-$household_id-$child_id"] = true;
        }
    }

    // return organized result data
    return array(
        'percentage' => (($total ? count($completed) / count($total) : 0) * 100).'%'
    );
}

