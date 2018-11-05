<?php
    include "dbh.inc.php";
    if (isset($_POST['submit'])) {
        $sql = "SELECT `note_name` FROM `uploaded_notes`";
    }
?>