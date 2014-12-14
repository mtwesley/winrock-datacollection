<?php

function get_variable($variable, $key, $other_variable = NULL) {
    if ($key != 'other') return $variable[$key];
    else if (is_array($other_variable)) return $other_variable[$key];
}

$sex = array(
  'male' => 'Male',
  'female' => 'Female',
);

$yes_no = array(
  'yes' => 'Yes',
  'no' => '	No ',
);

$month = array(	
  '1' => 'January',
  '2' => 'February',
  '3' => 'March',
  '4' => 'April',
  '5' => 'May',
  '6' => 'June',
  '7' => 'July',
  '8' => 'August',
  '9' => 'September',
  '10' => 'October',
  '11' => 'November',
  '12' => 'December',
);

$period = array(
  'quarter' => 'Quarterly',
  'annual' => 'Annually',
);

$year = array(
  '2013' => '2013',
  '2014' => '2014',
  '2015' => '2015',
  '2016' => '2016',
  '2017' => '2017',
);

$payment = array(
  'pay' => 'Pay',
  'no_pay' => 'No Pay',
  'in_kind' => 'In Kind',
);

$visited_by = array(
  'lanus' => 'Lanus S. Weh',
  'daniel' => 'Daniel G. Flomo',
  'bob' => 'Bob K. Zaza',
  'mulbah' => 'Mulbah K. Yorgbor',
  'nathan' => 'Nathan W. Birch',
  'marinda' => 'Marinda Williams',
  'rancy' => 'Rancy Gblogbay',
  'jayston' => 'Jayston Zolie',
  'vaye' => 'Allington Vaye',
  'rufus' => 'Rufus Kpanghan',
  'allen' => 'Allen Mehn',
  'marie' => 'Marie Dakiayee',
  'randolph' => 'Randolph Gbartogbay',
  'cyrus' => 'Cyrus Domah',
  'roland' => 'Roland Miapah',
  'kpassay' => 'Kpassay Gizzie',
  'jerry' => 'Jerry Tarpilar',
  'isorin' => 'Isorin Fofona',
  'jefferson' => 'Jefferson Winnie',
  'jesse' => 'Jesse Sims',
  'thony' => 'Thony Bright',
  'lonmence' => 'Lonmence Gboco',
  'emmanuel' => 'Emmanuel Whaboe',
  'michael' => 'Michael Cooper',
  'charles' => 'Charles Karmo',
  'loveline' => 'Loveline S. Collins',
  'other' => 'Add name of new visitor',
);

$enrollment_status = array(
  'enrolled' => 'Currently enrolled',
  'dropout' => 'Dropped out of school',
  'none' => 'Never enrolled',
  'enrolled_truant' => 'Currently enrolled, but not attending regularly',
  'enrolled_atrisk' => 'Enrolled but at the risk of dropping out',
);

$enrollment_program = array(
  'primary' => 'Primary',
  'ayp' => 'Advancing Youth Program (AYP)',
  'msfy' => 'MSF Youth',
  'msfa' => 'MSF Adult',
  'agri' => 'Agri Club',
  'secondary' => 'Secondary (including Junior and Senior levels)',
  'tvet' => 'TVET / Technical training skills (specify what type)',
  'osh' => 'Employment services (OSH training)',
  'none' => 'No involved in any educational program',
);

$livelihood_services = array(
  'employment' => 'Employment Services',
  'mfs' => 'MFS Program',
  'agriculture' => 'Agriculture training',
  'osh' => 'OSH training',
  'iga' => 'IGA training',
  'professional' => 'Professional Rubber training',
  'credit' => 'Credit or Loan Services',
);

$school_type = array(
  'primary' => 'Primary',
  'secondary' => 'Secondary',
  'ayp' => 'AYP',
  'vocational' => 'Formal Vocational Education',
  'none' => 'Not involved in any educational program',
);

$school_name = array(
  'zannah' => 'Zannah Public School',
  'gono' => 'Gono Town Public School',
  'morcee' => 'Morcee Town Public School',
  'kpolon' => 'Kpolon Public School',
  'pleemu' => 'Pleemu Public School',
  'nyehn' => 'Nyehn Public #2',
  'kpannah' => 'Kpannah Larsue Public School',
  'zingbor' => 'Zingbor Public School',
  'gwekpolosue' => 'Gwekpolosue Public School',
  'larkay' => 'Larkay Town Public School',
  'ora' => 'Ora Gene Public School',
  'cole' => 'Cole Town Public School',
  'yeamen' => 'Yeamen Public School',
  'willie' => 'Willie Town Public School',
  'holder' => 'Holder Town Public School',
  'sackie' => 'Sackie Gbomoh Public School',
  'sherman' => 'Sherman Farm Public School',
  'farsia' => 'Farsia Kromah Public School',
  'goba' => 'Goba Public School ',
  'bahr' => 'Bahr Town Public School',
  'june' => 'June L. Moore Public School ',
  'jovahn' => 'Jovahn Public School ',
  'nyehnp' => 'Nyehn Public School ',
  'george' => 'George C. Nuquay Sr. Public School ',
  'dekegar' => 'Dekegar Public School ',
  'dartu' => 'Dartu-Ta  Public School ',
  'boweh' => 'Boweh Public School',
  'mehnpa' => 'Mehnpa Public School',
  'gbanla' => 'Gbanla Public School',
  'gohn' => 'Gohn-Nyazeh Public School',
  'kpoyekpoah' => 'Kpoyekpoah Public School',
  'gbayblin' => 'Gbayblin Public School',
  'lampa' => 'Lampa Public  School',
  'yarsonnoh' => 'Yarsonnoh Public School',
  'flumpa' => 'Flumpa Public School',
  'blohn' => 'Blohn Public School',
  'gbanquoi' => 'Gbanquoi Public School ',
  'nyasin' => 'Nyasin Public School',
  'gipo' => 'Gipo Public School ',
  'kpalla' => 'Kpalla Public School ',
  'marcus' => 'Marcus G. Dohn Public School',
  'twayen' => 'Twayen Preliminary Academy',
  'burtein' => 'Burtein Public School ',
  'other' => 'Enter name of new school',
);

$work_activity = array(
  'toting_latex' => 'Toting Latex',
  'rubber_factory' => 'Rubber Factory',
  'selling_in_streets' => 'Selling in streets/markets',
  'construction_sites' => 'Construction sites',
  'coal_burning' => 'Coal Burning',
  'livestock_production' => 'Livestock Production',
  'tapping_rubber' => 'Tapping rubber',
  'fishing' => 'Fishing',
  'rock_crushing' => 'Rock Crushing',
  'sugar_cane' => 'Sugar Cane Production',
  'sugar_cane_rum' => 'Sugar Cane Rum Making',
  'rice' => 'Rice Production',
  'brushing_rubber_trees' => '	Brushing under rubber trees ',
  'mining_quarrying' => 'Mining/quarrying',
  'other_manufacturing_processing' => 'Other Manufacturing/processing (non-rubber)',
  'domestic_work' => 'Domestic work (not house chores)',
  'small_family' => 'Small family enterprise',
  'other_services' => 'Services (tailoring, restaurant, etc)',
  'cleaning_rubber' => 'Cleaning rubber cups',
  'rock_gravel' => 'Rock/Gravel packing',
  'other_agriculture' => 'Other Agriculture (specify)',
  'other_non_agriculture' => 'Other Non-Agriculture (specify)',
);

$work_condition = array(
  'excessive_hours' => 'Excessive hours per day ',
  'no_schooling' => 'Unable to attend school due to work (for children aged 15 and below)',
  'heavy_lifting' => 'Required to lift/carry heavy loads',
  'poor_ventilation' => 'Exposes to poorly ventilated work environment (dust, fumes, etc.)',
  'no_adult_supervision' => 'Works in absence of adult supervision (if under 16 years old)',
  'chemical_exposure' => 'Handles pesticides, fertilizer or other chemicals (including acid for rubber) ',
  'excessive_noise' => 'Exposed to excessive noise',
  'poor_lighting' => 'Working under poor lighting conditions',
  'night_work' => 'During the night time hours (from 8pm to 6am)',
  'no_protective_gear' => 'Works in absence of protective gear, when protective gear is needed',
  'causes_illness' => 'Causes illness or excessive tiredness ',
  'heavy_machinery' => 'Operates heavy machinery',
  'underground_mines' => 'In underground mines',
  'under_water' => 'Under water',
  'at_heights' => 'Works at heights',
  'extreme_temperatures' => 'Extreme heat or cold or work that involves fire',
  'sharp_tools' => 'Uses sharp cutting tools (knives, cutlass, etc.)',
  'repetitive_movement' => 'Carries out work that requires repetitive movement (ergonomic movement)',
);

$work_time = array(
  'before_school' => 'Before school hours morning',
  'after_school' => 'After school hours evening',
  'during_school' => 'During school hours',
  'during_peak_season' => 'During peak work season',
  'at_night' => 'At night (after 8pm)',
  'irregular_hours' => 'Irregular hours ',
  'during_weekend' => 'During the weekend',
  'all_day' => 'All day / Full time',
  'school_holidays' => 'During school holidays',
);

$work_status = array(
  'wfcl' => 'Worst Forms of Child Labor (WFCL)',
  'hcl' => 'Hazardous Child Labor (HCL)',
  'cl' => 'Child Labor (CL)',
  'cahr' => 'Child at High Risk of Child Labor (CAHR)',
);

$community_code = array(
  'pmz' => 'PMZ',
  'pmg' => 'PMG',
  'pmm' => 'PMM',
  'pmgb' => 'PMGB',
  'pmg' => 'PM',
  'nys' => 'NYS',
  'nyk' => 'NYK',
  'nyz' => 'NYZ',
  'nyw' => 'NYW',
  'nyh' => 'NYH',
  'gwsg' => 'GWSG',
  'coms' => 'COMS',
  'comt' => 'COMT',
  'comv' => 'COMV',
  'ymw' => 'YMN',
  'vym' => 'VYM',
  'cot' => 'COT',
  'com' => 'COM',
  'gwe' => 'GWE',
  'gws' => 'GWS',
  'gba' => 'GBA',
  'brt' => 'BRT',
  'kt' => 'KT',
  'znc' => 'ZNC',
  'ny' => 'NY',
  'ngt' => 'NGT',
  'dkk' => 'DKK',
  'dt' => 'DT',
  'bwh' => 'BWH',
  'mpa' => 'MPA',
  'gbl' => 'GBL',
  'gblk' => 'GBLK',
  'gblkp' => 'GBLKP',
  'gby' => 'GBY',
  'gbylp' => 'GBYLP',
  'ysn' => 'YSN',
  'flp' => 'FLP',
  'bln' => 'BLN',
  'gbq' => 'GBQ',
  'gbqn' => 'GBQN',
  'gpo' => 'GPO',
  'kpa' => 'KPA',
  'kpaz' => 'KPAZ',
  'dhn' => 'DHN',
  'dhnb' => 'DHNB',
  'other' => 'Add new Community Code',
);

$household_head = array(
  'child' => 'Child Headed',
  'female' => 'Female Headed',
  'male' => 'Male Headed',
  'male_single' => 'Single Parent Male',
  'female_single' => 'Single Parent Female',
  'female_elderly' => 'Elderly Female',
  'male_elderly' => 'Elderly Male',
  'female_disability' => 'Female Headed with a disability',
  'male_disability' => 'Male Headed with a disability',
  'other' => 'Add name of new Household Type',
);

$household_head_relation = array(
  'head' => 'Head',
  'spouse' => 'Spouse/Partner',
  'child' => 'Son/Daughter',
  'child_in_law' => 'Son/Daughter in-law',
  'child_adopted' => 'Adopted/fostered child',
  'child_grand' => 'Grand Child',
  'parent_grand' => 'Grandmother/father',
  'child_step' => 'Step Child',
  'parent' => 'Parent of the head or spouse',
  'sibling' => 'Sister/Brother',
  'nephew_neice' => 'Nephew/Neice',
  'uncle_aunt' => 'Aunt/Uncle',
  'cousin' => 'Cousin',
  'parent_in_law' => 'Father/Mother in-law',
  'servant' => 'Servant',
  'non_relative' => 'Non-relative',
  'other' => 'Add name of new Household Role',
);

$household_service = array(
  'scholarship' => 'Scholarship',
  'family_planning' => 'Family Planning',
  'vaccination' => 'Health Clinic (Vaccination)',
  'maternal_child_care' => 'Health Clinic (Maternal or Child Health Care)',
  'malaria_treatment' => 'Health Clinic (Malaria Treatment)',
  'other_health' => 'Health Clinic (Other)',
  'mosquito_net' => 'Mosquito Net Distribution',
  'agricultural' => 'Agricultural Inputs',
  'financial_services' => 'Loan or Financial Services',
  'clean_water' => 'Clean Water (working hand pump)',
  'other' => 'Other (Specify)',
);

$marital_status = array(
  'married' => 'Married',
  'never_married' => 'Never Married',
  'divorced' => 'Divorced',
  'living_together' => 'Living Together',
  'widowed' => 'Widowed',
);

$income_source = array(
  'rubber_owner' => 'Rubber Production on own land',
  'rubber_operator' => 'Rubber Production on someone else\'s land',
  'coal' => 'Coal Burning',
  'sugarcane' => 'Sugarcane Production',
  'sugarcane_rum' => 'Sugarcane Rum Production',
  'construction' => 'Construction',
  'mining' => 'Mining',
  'vegetable_fruit_owner' => 'Vegetable/Fruit farming on own land',
  'vegetable_fruit_operator' => 'Vegetable/Fruit farming on someone else\'s land',
  'land_owner' => 'Lease land or Property',
  'servicing' => 'Engaged in service based business (e.g. transport, tailoring)',
  'trading' => 'Engaged in trade/petty selling',
  'artisan' => 'Artisan',
  'livestock' => 'Livestock Farming',
  'professional' => 'Professional Salaried position (e.g. teacher, nurse)',
  'remittances' => 'Remittances from family members',
  'other' => 'Other (Specify)',
);

$institution = array(
  'government' => 'Government',
  'international_ngo' => 'International NGO',
  'local_ngo' => 'Local NGO',
  'community_group' => 'Community Group',
);

