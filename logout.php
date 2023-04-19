<?php
require 'config.php';
session_unset();
session_destroy();
echo "<script>window.location.href='http://localhost:82/project/admin/index.php'</script>";

?>