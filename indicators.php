<?php

session_start();

define('PROJECT_START_YEAR', 2014);

define('APRIL_REGEX', '(%s-1[0-2]-[0-3][0-9]|%s-0[1-3]-[0-3][0-9])');
define('OCTOBER_REGEX', '(%s-0[4-9]-[0-3][0-9])');

if (!$_SESSION['logged_in']) {
    header("Location: login.php");
    die();
}

include_once 'formhub.php';

$info = NULL;
$data = NULL;

$indicator = strtoupper($_GET['indicator']);
$indicator_type = substr($indicator, 0, 1);

switch ($indicator_type) {
    case 'E': $indicator_color = 'red'; break;
    case 'L': $indicator_color = 'green'; break;
    case 'A': $indicator_color = 'purple'; break;    
}

$start_year = PROJECT_START_YEAR;
$current_year = date("m") >=10 ? date('Y') + 1 : date('Y');


if ($indicator and file_exists("indicators/$indicator.php")) {
    include_once "indicators/$indicator.php";
    $info = info();
    for ($year = $start_year; $year <= $current_year; $year++) {
        $data[$year]['april'] = data(array('date_range' => array('$regex' => sprintf(APRIL_REGEX, $year - 1, $year))));
        $data[$year]['october'] = data(array('date_range' => array('$regex' => sprintf(OCTOBER_REGEX, $year))));
    }
}

?><html>
    <head>
        <title>Reports | Winrock ARCH</title>
        <link type="text/css" href="css/style.css" rel="stylesheet" />
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <img class="logo" src="images/winrock_logo_trim.png" />
                <span class="title">Winrock ARCH</span>
                <span class="subtitle winrock-blue"> &nbsp;// Reports</span>
                <ul id="navigation">
                    <li><a class="active" href="reports.php">Reports</a></li>
                    <li><a href="#">Profiles</a></li>
                    <li><a href="#">Account</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <div id="content">
                <?php if ($info and $data): ?>
                    <div id="full" class="<?php echo $indicator_color; ?>">
                        <div class="title">
                            <!--
                            <?php if ($indicator_type == 'E'): ?><img class="icon" src="images/education.png" />
                            <?php elseif ($indicator_type == 'L'): ?><img class="icon" src="images/livelihood.png" />
                            <?php elseif ($indicator_type == 'A'): ?><img class="icon" src="images/additional.png" />
                            <?php endif; ?>
                            -->
                            <span class="indicator-number">E1</span>
                            <?php echo $info['title']; ?>
                        </div>
                    </div>
                    <table class="results">
                        <tr>
                            <td class="blank">&nbsp;</td>
                            <?php for ($year = $start_year; $year <= $current_year; $year++): ?>
                            <td class="year" colspan="2"><?php echo $year; ?></td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td class="blank">&nbsp;</td>
                            <?php for ($year = $start_year; $year <= $current_year; $year++): ?>
                            <td class="month">April</td>
                            <td class="month">October</td>
                            <?php endfor; ?>
                        </tr>
                        <?php foreach ($info['headers'] as $key => $title): ?>
                        <tr>
                            <td class="field"><?php echo $title; ?></td>
                            <?php for ($year = $start_year; $year <= $current_year; $year++): ?>
                            <td class="result"><?php echo $data[$year]['april'][$key]; ?></td>
                            <td class="result"><?php echo $data[$year]['october'][$key]; ?></td>
                            <?php endfor; ?>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    <div id="indicator-error">No indicator information or data found.</div>
                <?php endif; ?>

                <!--
                <div id="right">
                    <div class="title">&nbsp;</div>
                    <table class="fields">
                        <tr><td class="blank">&nbsp;</td></tr>
                        <tr><td class="blank">&nbsp;</td></tr>
                        <tr><td id="field-target" class="field">Target</td></tr>
                        <tr><td id="field-actual" class="field">Actual</td></tr>
                        <tr><td id="field-male" class="field">Male</td></tr>
                        <tr><td id="field-female" class="field">Female</td></tr>
                        <tr><td id="field-cl" class="field">CL</td></tr>
                        <tr><td id="field-cahr" class="field">CAHR</td></tr>
                        <tr><td id="field-under_14" class="field">Under 14</td></tr>
                        <tr><td id="field-over_14" class="field">14 Years or Above</td></tr>
                    </table>
                    <table id="results-2014" class="results">
                        <tr><td class="results-year" colspan="2">2014</td></tr>
                        <tr>
                            <td class="results-month">April</td>
                            <td class="results-month">October</td>
                        </tr>
                        <tr>
                            <td class="result">2000</td>
                            <td class="result">3000</td>
                        </tr>
                        <tr>
                            <td class="result">1500</td>
                            <td class="result">4000</td>
                        </tr>
                        <tr>
                            <td class="result">500</td>
                            <td class="result">2000</td>
                        </tr>
                        <tr>
                            <td class="result">1000</td>
                            <td class="result">2000</td>
                        </tr>
                        <tr>
                            <td class="result">1000</td>
                            <td class="result">3000</td>
                        </tr>
                        <tr>
                            <td class="result">500</td>
                            <td class="result">1000</td>
                        </tr>
                        <tr>
                            <td class="result">1500</td>
                            <td class="result">2500</td>
                        </tr>
                        <tr>
                            <td class="result">0</td>
                            <td class="result">1500</td>
                        </tr>
                    </table>
                    <table id="results-2015" class="results">
                        <tr><td class="results-year" colspan="2">2015</td></tr>
                        <tr>
                            <td class="results-month">April</td>
                            <td class="results-month">October</td>
                        </tr>
                        <tr>
                            <td class="result">2000</td>
                            <td class="result">3000</td>
                        </tr>
                        <tr>
                            <td class="result">1500</td>
                            <td class="result">4000</td>
                        </tr>
                        <tr>
                            <td class="result">500</td>
                            <td class="result">2000</td>
                        </tr>
                        <tr>
                            <td class="result">1000</td>
                            <td class="result">2000</td>
                        </tr>
                        <tr>
                            <td class="result">1000</td>
                            <td class="result">3000</td>
                        </tr>
                        <tr>
                            <td class="result">500</td>
                            <td class="result">1000</td>
                        </tr>
                        <tr>
                            <td class="result">1500</td>
                            <td class="result">2500</td>
                        </tr>
                        <tr>
                            <td class="result">0</td>
                            <td class="result">1500</td>
                        </tr>
                    </table>
                </div>
                -->
            </div>
        </div>
    </body>
</html>