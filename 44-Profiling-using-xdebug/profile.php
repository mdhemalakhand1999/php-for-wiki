<?php
for($i=0; $i<10; $i++) {
    $result = getResult($i);
    echo "Now displaying result ==== <br/>";
    displayResult($i, $result);
}

function getResult($i) {
    usleep(500);
    return $i % 2 == 0 ? 'even': 'odd';
}

function displayResult($i, $result) {
    usleep(1000);
    printf("%d is %s", $i, $result);
}
phpinfo();