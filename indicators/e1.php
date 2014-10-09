<?php

include_once 'formhub.php';
include_once 'forms.php';

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
    if ($values['date_range']) $dquery = array('date_visited' => $values['date_range']);
    else $dquery = array();
    
    // setup formhub helper parameters
    $query = $dquery; // + array('child_educationstatus/school_type' => array('$in' => array('primary', 'jnr_secondary', 'ayp', 'formal')));
    $fields = array(
        'date_visited',
        'community_code',
        'household_code',
        'child_id',
        'child_sex',
        'child_age',
        'child_wfcl_or_at_risk_status/child_labor'
    );
    $sort = null;
    $count = false;
    $start = 0;
    $limit = 0;
    
    // use formhub helper to build and execute query and return results
    $form_data = get_form_data($child_intake_form, $query, $fields, $sort, $count, $start, $limit);
    
    // setup result parsing
    $male = array();
    $female = array();
    $under_14 = array();
    $over_14 = array();
    $cl = array();
    $cahr = array();
    
    // parse result data
    foreach ($form_data as $data) {
        extract($data);
        $total["$community_code-$household_code-$child_id"] = true;
        
        if ($child_sex == 'male') $male["$community_code-$household_code-$child_id"] = true;
        else $female["$community_code-$household_code-$child_id"] = true;
        
        if ($child_age < 14) $under_14["$community_code-$household_code-$child_id"] = true;
        else $over_14["$community_code-$household_code-$child_id"] = true;
        
        if ($data['child_wfcl_or_at_risk_status/child_labor'] == 'child_labor') $cl["$community_code-$household_code-$child_id"] = true;
        else if ($data['child_wfcl_or_at_risk_status/child_labor'] == 'high_risk_child') $cahr["$community_code-$household_code-$child_id"] = true;
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

