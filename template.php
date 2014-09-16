<?php

include_once 'formhub.php';

if ($indicator = strtolower($_GET['indicator']) and file_exists("indicators/$indicator.php")) {
    include_once "indicators/$indicator.php";
    $info = info();
    $data = data();
}

?><html>
<head>
    <title>Winrock ARCH Reports</title>
    <style type="text/css">
        body,
        html {
            margin: 0;
            padding: 0;
            width: 100%;
        }

        #wrapper {
            margin: 0 auto;
            width: 800px;
        }

        #indicators {
            margin: 0;
            padding: 0;
        }

        #indicators li {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        #indicators li a,
        #indicators li a:visited {
            margin: 5px;
            padding: 5px 10px;
            display: block;
            background-color: #f8f8f8;
            color: #000;
            text-decoration: none;
        }
        
        #indicators li a:hover {
            background-color: #eee;
        }
        
        #indicator-title,
        #indicator-error {
            padding: 5px 0;
        }
        
        #indicator-title {
            font-size: 30px;
            font-weight: bold;
        }

        #filters {
            border: 1px solid;
        }

        .filter {
            padding: 5px;
            border-top: 1px solid;
        }

        .filter:first-child {
            border-top: none;
        }

        #results {
            width: 100%;
            padding: 5px 0;
            border-collapse: collapse;
        }

        #results th,
        #results td {
            padding: 5px;
            border: 1px solid;
        }
        
        
        #sidebar {
            float: left;
            width: 200px;
        }
        
        #main {
            float: right;
            width: 600px;
        }
        
        #main .title
        
    </style>
</head>
<body>
<div id="wrapper">
    <div id="sidebar">
        <ul id="indicators">
            <li><a class="<?php if ($indicator == 'E1') echo 'active'; ?>" href="?indicator=E1" title="Number of direct beneficiary children provided education or vocational training services">E.1</a></li>
            <li><a class="<?php if ($indicator == 'E2') echo 'active'; ?>" href="?indicator=E2" title="Number of children engaged in or at high-risk of entering child labor enrolled in formal education services provided education services">E.2</a></li>
            <li><a class="<?php if ($indicator == 'E3') echo 'active'; ?>" href="?indicator=E3" title="Number of children engaged in or at high-risk of entering child labor enrolled in non-formal education services provided education">E.3</a></li>
            <li><a class="<?php if ($indicator == 'E4') echo 'active'; ?>" href="?indicator=E4" title="Number of children engaged in or at high-risk of entering child labor enrolled in vocational services">E.4</a></li>
        </ul>
    </div>
    <div id="main">
        <?php if ($info and $data): ?>
        <div id="indicator-title"><?php echo $info['title']; ?></div>
        <table id="results">
            <?php foreach ($info['headers'] as $key => $title): ?>
            <tr>
                <td><?php echo $title; ?></td>
                <td><?php echo $data[$key]; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?>
        <div id="indicator-error">No indicator information or data found.</div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>

