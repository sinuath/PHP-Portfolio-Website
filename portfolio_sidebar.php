<div align="left" class="sidebar">
<ul>
<?php
    
    if($categories = get_portfolio_categories()){
    foreach ($categories as $row) {
        echo "<li>"
                ."<a href=\"portfolio_category.php?Category=".$row['Category']."\">
                     ".$row['Category']."
                  </a>
              </li>";
    }
    }else{
        echo "<li>Portfolio Empty</li>";
    }
    
    
?>
</ul>
</div>