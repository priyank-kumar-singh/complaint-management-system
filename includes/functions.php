<?php
function console_log($data) {
    $output = $data;
    if (is_array($output)) {
        $output = implode(',', $output);
    }
    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

function date_local($data) {
    $date = date_create($data);
    return date($date, 'F d-Y');
}

function datetime_local($data) {
    $date = date_create($data);
    return date_format($date, 'F d-Y h:i A');
}

function datetime_local2($data) {
    $date = date_create($data);
    return date_format($date, 'd-m-Y h:i A');
}
?>
