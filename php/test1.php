<?php 
if (isset($_REQUEST['var'])) {
    echo 'isset<br/>';
} else {
    echo 'notset<br/>';
}

if (empty($_REQUEST['var'])) {
    echo 'empty<br/>';
} else {
    echo 'notempty<br/>';
}

if ($_REQUEST['var'] == null) {
    echo 'null<br/>';
} else {
    echo 'notnull<br/>';
}
?>
