<?php 
// FIx sql injection 
function fixSqlInject($sql) {
    $sql = str_replace('\\','\\\\',$sql);
    $sql = str_replace('\'','\\\'',$sql);
    return $sql;
}

// Lấy dữ liệu bằng phương thức get (ở url)
function getGet($key) {
    $value = '';
    if (isset($_GET[$key])) {
        $value = $_GET[$key];
        $value = fixSqlInject($value);
    };
    return trim($value);
}
// Lấy dữ liệu bằng phương thức get lấy ở ô input
function getPost($key) {
    $value = '';
    if (isset($_POST[$key])) {
        $value = $_POST[$key];
        $value = fixSqlInject($value);
    };
    return trim($value);
}
