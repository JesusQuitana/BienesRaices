<?php

require 'app.php';

function template(string $nombre) {
    include TEMPLATE_URL . $nombre . '.php';
}

?>