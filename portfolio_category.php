<?php

// include function files for this application
require_once('header.php');
require 'portfolio_sidebar.php';






    if($category = htmlspecialchars($_GET['Category'])){
        /*
        echo "<div class=\"project\" align=\"center\">";
        echo "Projects in the category of: ".$category;
        echo "</div>";
        echo "<br><br>";
         
         */
        
        if($projects = get_projects_by_category($category)){
            foreach ($projects as $row) {
              //  echo $row['PortID'].", ";
                
                echo "<div class=\"project2\"><a href=\"portfolio_view_project.php?PortID=".$row['PortID']."\"><div class=\"linkArea\">";
                echo "<div class=\"ProjectTitle\">";
                    
                    echo "<p>".get_project_name($row['PortID'])."</p>";
                    ?>
                 
                </div>
                <div class="description">
                    <?php
                    echo nl2br(get_project_sd($row['PortID']));
                    ?>
                </div></div></a>
              </div>
              <br><br>
<?php
           }

        }else{
            
            echo "<div class=\"project\" align=\"center\">";
            echo "<strong>There seems to be a mistake.</strong>";
            echo "<p>Category: ".$category."</p>";
            echo "<p>There are no projects with that specified category. "
            . "Perhaps the developer picked a bouqet of whoopsiedaisies.</p>";
            echo "</div>";
        }
    }else{
        echo "<div class=\"project\" align=\"center\">";
        echo "<p>There's something wrong with the category. </p>";
        echo "</div>";
    }
    
    
    // Add Insertion form that has a preexisting category list. 
    // Insert Category if they've already submitted the form. 




require_once('footer.php');

?>
