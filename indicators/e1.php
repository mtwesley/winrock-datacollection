<?php

// include_once 'formhub.php';
include_once 'ona.php';
include_once 'forms.php';
include_once 'functions.php';

function info() {
    // indicator info 
    return array(
        'title' => 'Number of direct beneficiary children provided education or vocational training services',
        'headers' => array(
            'total'    => 'Total',
            'male'     => 'Male',
            'female'   => 'Female',
            'under_14' => 'Under 14 Years Old',
            'over_14'  => '14 Years Old or Above',
            'cl'       => 'Child Labor',
            'cahr'     => 'Child at High Risk',
        )
    );
}

function data($values = array()) {
    global $child_intake_form;
    
    // setup date range
    if ($values['date_range']) $dquery = array('visited_date' => $values['date_range']);
    else $dquery = array();
    
    // setup formhub helper parameters
    $query = $dquery + array(
        'education/school_type' => array('$in' => array('primary', 'secondary', 'ayp', 'vocational'))
    );
    $fields = array(
        'date_visited',
        'community_code',
        'household_id',
        'child_id',
        'child_sex',
        'child_age',
        'work/status'
    );
    $sort = array('date_visited' => '1');
    $count = false;
    $start = 0;
    $limit = 0;
    
    // use formhub helper to build and execute query and return results
    $form_data = get_form_data($child_intake_form, $query, $fields, $sort, $count, $start, $limit);
    
    // setup result parsing
    $total = array();
    $male = array();
    $female = array();
    $under_14 = array();
    $over_14 = array();
    $cl = array();
    $cahr = array();
    
    // parse result data
    foreach ($form_data as $data) {
        extract($data);
        
        $community_code = or_other($data, 'community_code', 'other_community');
        
        $total["$community_code-$household_id-$child_id"] = true;
        
        if ($child_sex == 'male') $male["$community_code-$household_id-$child_id"] = true;
        else $female["$community_code-$household_id-$child_id"] = true;
        
        if ($child_age < 14) $under_14["$community_code-$household_id-$child_id"] = true;
        else $over_14["$community_code-$household_id-$child_id"] = true;
        
        if ($data['work/status'] == 'cl') $cl["$community_code-$household_id-$child_id"] = true;
        else if ($data['work_status'] == 'cahr') $cahr["$community_code-$household_id-$child_id"] = true;
    }

    // return organized result data
    return array(
        'total'    => count($total),
        'male'     => count($male),
        'female'   => count($female),
        'under_14' => count($under_14),
        'over_14'  => count($over_14),
        'cl'       => count($cl),
        'cahr'     => count($cahr)
    );
}

