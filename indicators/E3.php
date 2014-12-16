<?php

// include_once 'formhub.php';
include_once 'ona.php';
include_once 'forms.php';

function info() {
    // indicator info 
    return array(
        'title' => 'Number of children engaged in or at high-risk of entering child labor enrolled in non-formal education services',
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
    global $child_enrollment_form, $child_intake_form, $child_monitoring_form;
    
    // setup date range
    if ($values['date_range']) $dquery = array('visited_date' => $values['date_range']);
    else $dquery = array();
    
    // setup formhub helper parameters
    $query = $dquery + array('education/school_type' => array('$in' => array('mfs', 'agri', 'osh')));
    $fields = array(
        'date_visited',
        'community_code',
        'other_community_code',
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
    
    // setup result parsing
    $total = array();
    $status = array();
    $male = array();
    $female = array();
    $under_14 = array();
    $over_14 = array();
    $cl = array();
    $cahr = array();
    
    $enrollment_data = get_form_data($child_enrollment_form, $query, $fields, $sort, $count, $start, $limit);
    foreach ($enrollment_data as $data) {
        extract($data);
        
        $community_code = or_other($data, 'community_code', 'other_community_code');
        $work_status = $data['work/status'];
        
        $unique = "$community_code-$household_id-$child_id";
        if (!array_key_exists($unique, $total)) {
            $total[$unique] = true;

            if ($child_sex == 'male') $male[$unique] = true;
            else $female[$unique] = true;

            if ($child_age < 14) $under_14[$unique] = true;
            else $over_14[$unique] = true;
        }
    }

    $monitoring_data = get_form_data($child_monitoring_form, $query, $fields, $sort, $count, $start, $limit);
    foreach ($monitoring_data as $data) {
        extract($data);
        
        $community_code = or_other($data, 'community_code', 'other_community_code');
        $work_status = $data['work/status'];
        
        $unique = "$community_code-$household_id-$child_id";
        if (!array_key_exists($unique, $status) and array_key_exists($unique, $total)) {
            $status[$unique] = true;
            
            // update age from monitoring if possible
            if ($child_age < 14) $under_14[$unique] = true;
            else $over_14[$unique] = true;

            if (in_array($work_status, array('cl', 'wfcl', 'hcl'))) $cl[$unique] = true;
            else if ($work_status == 'cahr') $cahr[$unique] = true;
        }
    }

    $intake_data = get_form_data($child_intake_form, $query, $fields, $sort, $count, $start, $limit);
    foreach ($intake_data as $data) {
        extract($data);
        
        $community_code = or_other($data, 'community_code', 'other_community_code');
        $work_status = $data['work/status'];
        
        $unique = "$community_code-$household_id-$child_id";
        if (!array_key_exists($unique, $status) and array_key_exists($unique, $total)) {
            $status[$unique] = true;

            if (in_array($work_status, array('cl', 'wfcl', 'hcl'))) $cl[$unique] = true;
            else if ($work_status == 'cahr') $cahr[$unique] = true;
        }
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

