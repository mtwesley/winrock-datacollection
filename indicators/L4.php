<?php

// include_once 'formhub.php';
include_once 'ona.php';
include_once 'forms.php';
include_once 'functions.php';

function info() {
    // indicator info 
    return array(
        'title' => 'Number of individuals provided with economic strengthening services',
        'headers' => array(
            'total'  => 'Total',
            'male'   => 'Male',
            'female' => 'Female'
        )
    );
}

function data($values = array()) {
    global $household_monitoring_form, $household_intake_form;
    
    // setup date range
    if ($values['date_range']) $dquery = array('visited_date' => $values['date_range']);
    else $dquery = array();
    
    // setup formhub helper parameters
    $query = $dquery;
    $lv_query = array('has_livelihood_services' => 'yes');
    $fields = array(
        'date_visited',
        'community_code',
        'other_community_code',
        'household_id',
        'individuals',
        'livelihood_services'
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
    
    $monitoring_data = get_form_data($household_monitoring_form, $query + $lv_query, $fields, $sort, $count, $start, $limit);
    foreach ($monitoring_data as $data) {
        extract($data);

        $community_code = or_other($data, 'community_code', 'other_community_code');
        
        foreach ($livelihood_services as $s_data) {
            foreach ($s_data['livelihood_services/service_individuals'] as $si_data) {
                $individual_id = $si_data['livelihood_services/service_individuals/individual_id'];
                
                $unique = "$community_code-$household_id-$individual_id";
                if (!array_key_exists($unique, $total)) {
                    $total[$unique] = true;
                }
            }
        }
        
        foreach ($individuals as $i_data) {
            $individual_id = $i_data['individuals/individual_id'];
            $individual_sex = $i_data['individuals/individual_sex'];
            
            $unique = "$community_code-$household_id-$individual_id";
            if (array_key_exists($unique, $total) and !array_key_exists($unique, $status)) {
                $status[$unique] = true;

                if ($individual_sex == 'male') $male[$unique] = true;
                else $female[$unique] = true;
            }
        }
    }

    $intake_data = get_form_data($household_intake_form, array(), $fields, $sort, $count, $start, $limit);
    foreach ($intake_data as $data) {
        extract($data);
        
        $community_code = or_other($data, 'community_code', 'other_community_code');
        
        foreach ($individuals as $i_data) {
            $individual_id = $i_data['individuals/individual_id'];
            $individual_sex = $i_data['individuals/individual_sex'];
            
            $unique = "$community_code-$household_id-$individual_id";
            if (array_key_exists($unique, $total) and !array_key_exists($unique, $status)) {
                $status[$unique] = true;

                if ($individual_sex == 'male') $male[$unique] = true;
                else $female[$unique] = true;
            }
        }
    }

    // return organized result data
    return array(
        'total'  => count($total),
        'male'   => count($male),
        'female' => count($female)
    );
}

