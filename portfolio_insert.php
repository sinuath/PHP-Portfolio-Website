<?php
    require 'header.php';
    require 'portfolio_sidebar.php';
?>


<div class="log_entry">
    <center>
    <?php
    echo "<div class=\"title\">New Project</div>";
    if (check_admin()) {
        display_portfolio_form();
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





