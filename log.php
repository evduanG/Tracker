<?php
include('functions.php');
$json = file_get_contents('data.json');
$data = json_decode($json, 1);
if (is_array($data)) {
    ksort($data);
}

switch ($_GET['mode']) {
    case 'stop':
        stop($_GET['id'], $data);
        break;
    case 'remove':
        remove($_GET['id'], $data);
        break;
    case 'build':
        build($data);
        break;
    case "tally":
        tally($data);
        break;
    case "newTesk":
        echo "<script>console.log('Debug Objects: " . "in newTesk " . $_GET['task'] . "' );</script>";
        newTesk($data, $_GET['task']);
        break;
    case "restor":
        restor($data);
        break;
    case "restorStatus":
        restorStatus($_GET['id'], $data);
        break;
}
