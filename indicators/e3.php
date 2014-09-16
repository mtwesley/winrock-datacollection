<?php

include_once 'formhub.php';

function info() {
    return array(
        'title' => 'Number of children engaged in or at high-risk of entering child labor enrolled in non-formal education services provided education or vocational services',
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

function data() {        
    global $child_intake_form;
    
    $form_data = get_form_data(
        $child_intake_form, // form
        array('child_educationstatus/school_type' => array('$in' => array('primary', 'jnr_secondary', 'ayp'))), // query
        array('community_code', 'household_code', 'child_id', 'child_sex', 'child_age', 'child_wfcl_or_at_risk_status/child_labor'), // fields
        null, // sort
        false, // count
        0, // start
        0 // limit
    );
    
    $male = array();
    $female = array();
    $under_14 = array();
    $over_14 = array();
    $cl = array();
    $cahr = array();
    
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

