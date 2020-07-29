<?php
    require 'header.php';
    echo '<br />';
?>


<p>&nbsp;</p>
<div class="log_entry">
    <center>
    <?php
    echo "<div class=\"title\">New Note</div>";
    if (check_admin()) {
        display_notei_form();
    } else {
        echo "<p>You are not authorized to enter the administration area.</p>";
    }
    ?>
    </center>
</div>


<?php
    echo '<br />';
    require 'footer.php';
?>




