<?php

session_start();

if (!$_SESSION['logged_in']) {
    header("Location: login.php");
    die();
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
                <div id="left" class="red">
                    <div class="title">
                        <img class="icon" src="images/education.png" />
                        Education indicators
                    </div>
                    <ul id="indicators">
                        <li id="indicator-E1" class="indicator">
                            <a href="indicators.php?indicator=E1">
                                <span class="indicator-number">E1</span>
                                <span class="indicator-title">Number of direct beneficiary children provided education or vocational training services</span>
                            </a>
                        </li>
                        <li id="indicator-E2" class="indicator">
                            <a href="indicators.php?indicator=E2">
                            <span class="indicator-number">E2</span>
                            <span class="indicator-title">Number of children engaged in or at high-risk of entering child labor enrolled in formal education services</span>
                            </a>
                        </li>
                        <li id="indicator-E3" class="indicator">
                            <a href="indicators.php?indicator=E3">
                            <span class="indicator-number">E3</span>
                            <span class="indicator-title">Number of children engaged in or at high-risk of entering child labor enrolled in non-formal education services</span>
                            </a>
                        </li>
                        <li id="indicator-E4" class="indicator">
                            <a href="indicators.php?indicator=E4">
                            <span class="indicator-number">E4</span>
                            <span class="indicator-title">Number of children engaged in or at high-risk of entering child labor enrolled in vocational services</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="left" class="green">
                    <div class="title">
                        <img class="icon" src="images/livelihood.png" />
                        Livelihood indicators
                    </div>
                    <ul id="indicators">
                        <li id="indicator-L1" class="indicator">
                            <a href="indicators.php?indicator=L1">
                            <span class="indicator-number">L1</span>
                            <span class="indicator-title">Number of households receiving livelihood services</span>
                            </a>
                        </li>
                        <li id="indicator-L2" class="indicator">
                            <a href="indicators.php?indicator=L2">
                            <span class="indicator-number">L2</span>
                            <span class="indicator-title">Number of adults (18 and over) provided with employment services</span>
                            </a>
                        </li>
                        <li id="indicator-L3" class="indicator">
                            <a href="indicators.php?indicator=L3">
                            <span class="indicator-number">L3</span>
                            <span class="indicator-title">Number of children (16-17) provided with employment services</span>
                            </a>
                        </li>
                        <li id="indicator-L4" class="indicator">
                            <a href="indicators.php?indicator=L4">
                            <span class="indicator-number">L4</span>
                            <span class="indicator-title">Number of individuals provided with economic strengthening services</span>
                            </a>
                        </li>
                        <li id="indicator-L5" class="indicator">
                            <a href="indicators.php?indicator=L5">
                            <span class="indicator-number">L5</span>
                            <span class="indicator-title">Number of individuals provided with services other than employment and economic strengthening</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="left" class="purple">
                    <div class="title">
                        <img class="icon" src="images/additional.png" />
                        Additional indicators
                    </div>
                    <ul id="indicators">
                        <li id="indicator-A1" class="indicator">
                            <a href="indicators.php?indicator=A1">
                            <span class="indicator-number">A1</span>
                            <span class="indicator-title">Percentage of children in Child Labor</span>
                            </a>
                        </li>
                        <li id="indicator-A2" class="indicator">
                            <a href="indicators.php?indicator=A2">
                            <span class="indicator-number">A2</span>
                            <span class="indicator-title">Percentage of children in Worst Forms of Child Labor</span>
                            </a>
                        </li>
                        <li id="indicator-A3" class="indicator">
                            <a href="indicators.php?indicator=A3">
                            <span class="indicator-number">A3</span>
                            <span class="indicator-title">Percentage of children under Hazardous Child Labor</span>
                            </a>
                        </li>
                        <li id="indicator-A4" class="indicator">
                            <a href="indicators.php?indicator=A4">
                            <span class="indicator-number">A4</span>
                            <span class="indicator-title">Number of children engaged in any form of Child Labor during the past six months</span>
                            </a>
                        </li>
                        <li id="indicator-A5" class="indicator">
                            <a href="indicators.php?indicator=A5">
                            <span class="indicator-number">A5</span>
                            <span class="indicator-title">Number of children that received any regular form of education during the past six months</span>
                            </a>
                        </li>
                        <li id="indicator-A6" class="indicator">
                            <a href="indicators.php?indicator=A6">
                            <span class="indicator-number">A6</span>
                            <span class="indicator-title">Percentage of beneficiary children dropping out from formal school</span>
                            </a>
                        </li>
                        <li id="indicator-A7" class="indicator">
                            <a href="indicators.php?indicator=A7">
                            <span class="indicator-number">A7</span>
                            <span class="indicator-title">Percentage of beneficiary children who complete the school year</span>
                            </a>
                        </li>
                        <li id="indicator-A8" class="indicator">
                            <a href="indicators.php?indicator=A8">
                            <span class="indicator-number">A8</span>
                            <span class="indicator-title">Percentage of households with increased sources of income</span>
                            </a>
                        </li>
                        <li id="indicator-A9" class="indicator">
                            <a href="indicators.php?indicator=A9">
                            <span class="indicator-number">A9</span>
                            <span class="indicator-title">Percentage of target households covered by social protection services</span>
                            </a>
                        </li>
                        <li id="indicator-A10" class="indicator">
                            <a href="indicators.php?indicator=A10">
                            <span class="indicator-number">A10</span>
                            <span class="indicator-title">Percentage of target youth 16-17 years old that are self-employed or employed by third parties</span>
                            </a>
                        </li>
                        <li id="indicator-A11" class="indicator">
                            <a href="indicators.php?indicator=A11">
                            <span class="indicator-number">A11</span>
                            <span class="indicator-title">Number of target households referred to existing government and non-government social protection programs</span>
                            </a>
                        </li>
                    </ul>
                </div>

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