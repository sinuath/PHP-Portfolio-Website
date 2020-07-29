<?php
require 'header.php';
require 'portfolio_sidebar.php';
?>
<div class="project">
<?php
if(!check_admin()){
?>


  <p>&nbsp;</p>
  <p>Hello! Thank you for taking an interest in what I like to build.</p>
  <p>Over the years i've built quite a few applications, and I wanted to share some of the ones I liked the most. They are organized by category
  which you can select on the left to bring up a relevant list. Click on a project and you will see a description, and possibly an image/links to the project.</p>
  <p>As time goes by I hope this section continues to grow.</p>


<?php
}else{ // Admin!
     echo "<p><center><strong>Portfolio Command Center!</strong></center></p>";
    $Title = addslashes(trim($_POST['Title']));
    $ShortDescrip = addslashes(trim($_POST['ShortDescription']));
    $Descrip = addslashes(trim($_POST['Description']));
    /*
    if(!$Title == null){
    echo "Title: ".$Title;
    echo "<br>ShortDescrip: ".$ShortDescrip;
    echo "<br>Description: ".$Descrip;
    }
*/
    if((!$Title == null) && !insert_portfolio_entry($Title, $ShortDescrip, $Descrip)) {
      echo "<p><font color='red'>Portfolio Entry: ".$Title." was Not inserted</font></p>";
    }else if(!$Title == null){
        echo "<p><font color='green'>Portfolio Entry: ".$Title." was inserted</font></p>";
    } 

    portfolio_form();
}     
?>   
</div>

<?php    
require 'footer.php';
?>