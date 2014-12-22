<?php

// include_once 'formhub.php';
include_once 'ona.php';
include_once 'forms.php';
include_once 'functions.php';

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
        'other_community_code',
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
        
        $community_code = or_other($data, 'community_code', 'other_community_code');
        
        foreach ($children as $c_data) {
            $household_id = $c_data['children/household_id'];
            $child_id = $c_data['children/child_id'];
            
            $final_exam_date = $c_data['children/final_exam_date'];
            $has_attended_final_exam = $c_data['children/has_attended_final_exam'];
            
            $unique = "$community_code-$household_id-$child_id";
            if ($final_exam_date) {
                $total[$unique] = true;
                
                if ($has_attended_final_exam) $completed[$unique] = true;
                else $other[$unique] = true;
            }
        }
    }

    // return organized result data
    return array(
        'percentage' => (($total ? count($completed) / count($total) : 0) * 100).'%'
    );
}

