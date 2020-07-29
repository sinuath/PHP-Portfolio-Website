<?php



function display_log_form($video = '') {
// This displays the book form.
// It is very similar to the category form.
// This form can be used for inserting or editing books.
// To insert, don't pass any parameters.  This will set $edit
// to false, and the form will go to insert_book.php.
// To update, pass an array containing a book.  The
// form will be displayed with the old data and point to update_book.php.
// It will also add a "Delete book" button.


  // if passed an existing book, proceed in "edit mode"
  $edit = is_array($video);
  $date = date("F j, Y"); // F = Month j = day without leading Zero Y = year 4 digit Page 470 for full list

  // most of the form is in plain HTML with some
  // optional PHP bits throughout
?>

  <form method="post"
        action="<?php echo $edit ? 'log_edit.php' : 'log_insert_entry.php';?>">
  <table border="0">
  <tr class="NotVisible">
    <td>LogID:</td>
    <td><input type="text" name="LogID" 
         value="<?php echo $edit ? $video['LogID'] : ''; ?>" readonly/></td>
  </tr>
  <tr>
    <td>Title:</td>
    <td><input type="text" name="Title" size="40"
               value="<?php echo $edit ? $video['Title'] : ''; ?>" /></td>
  </tr>
  <tr>
    <td>Date:</td>
    <td><input type="text" name="Date"
               value="<?php echo $edit ? $video['BlogDate'] : $date; ?>" /></td>
  </tr>
   <tr>
    <td>Blog:</td>
    <td><textarea id="Blog" wrap="virtual" cols="60" rows="15" name="Blog"><?php echo $edit ? $video['Blog'] : ''; ?></textarea></td>
   </tr>
    <tr>
      <td <?php if (!$edit) { echo "colspan=2"; }?> align="center">
         <?php
            if ($edit)
             // we need the old isbn to find book in database
             // if the isbn is being updated
             echo "<input type=\"hidden\" name=\"LogID\"
                    value=\"".$video['LogID']."\" />";
         ?>
        <input type="submit"
               value="<?php echo $edit ? 'Update' : 'Insert'; ?> Log" />
        </form></td>
        <?php
           if ($edit) {
             echo "<td>
                   <form method=\"post\" action=\"log_delete.php\">
                   <input type=\"hidden\" name=\"LogID\"
                    value=\"".$video['LogID']."\" />
                   <input type=\"submit\" value=\"Delete Log\"/>
                   </form></td>";
            }
          ?>
         </td>
      </tr>
  </table>
  </form>

<?php
}

function display_link_form($PortID) {
?>
  <form method="post"
        action="<?php echo 'portfolio_insert_link.php';?>">
      
      <input class="NotVisible" type="text" name="PortID" 
         value="<?php echo $PortID; ?>" readonly/>
  <table border="0">
      <tr>
          <td>Link Source</td>
          <td>Link</td>
          <td></td>
      </tr>
    <td><input type="text" name="LinkSource" size="15"
               value="<?php echo ''; ?>" /></td>
    <td><input type="text" name="Link" size="30"
               value="<?php echo ''; ?>" /></td>
      <td colspan=2" align="center">
         <?php
            if ($edit)
             // we need the old isbn to find book in database
             // if the isbn is being updated
             echo "<input type=\"hidden\" name=\"PortID\"
                    value=\"".$PortID."\" />";
         ?>
        <input type="submit"
               value="<?php echo 'Insert'; ?> Link" />
        </form></td>
        </tr>
  </table>
  </form>
<?php
}

function display_photo_form($PortID) {
?>
  <form method="post"
        action="<?php echo 'portfolio_insert_photo.php';?>">
      
      <input class="NotVisible" type="text" name="PortID" 
         value="<?php echo $PortID; ?>" readonly/>
  <table border="0">
    <td><input type="text" name="Photo" size="30"
               value="<?php echo ''; ?>" /></td>
      <td colspan=2" align="center">
         <?php
            if ($edit)
             // we need the old isbn to find book in database
             // if the isbn is being updated
             echo "<input type=\"hidden\" name=\"PortID\"
                    value=\"".$PortID."\" />";
         ?>
        <input type="submit"
               value="<?php echo 'Insert'; ?> Photo" />
        </form></td>
        </tr>
  </table>
  </form>
<?php
}

function display_category_form($PortID) {
?>
  <form method="post"
        action="<?php echo 'portfolio_insert_category.php';?>">
  <table border="0">
  <tr class="NotVisible">
    <td>PortID:</td>
    <td><input type="text" name="PortID" 
         value="<?php echo $PortID; ?>" readonly/></td>
  </tr>
  <tr>
    <td><input type="text" name="Category" size="35"
               value="<?php echo ''; ?>" /></td>
      <td colspan=2" align="center">
         <?php
            if ($edit)
             // we need the old isbn to find book in database
             // if the isbn is being updated
             echo "<input type=\"hidden\" name=\"PortID\"
                    value=\"".$PortID."\" />";
         ?>
        <input type="submit"
               value="<?php echo 'Insert'; ?> Category" />
        </form></td>
        </tr>
  </table>
  </form>
<?php
}

function display_portfolio_form($video = '') {
// This displays the book form.
// It is very similar to the category form.
// This form can be used for inserting or editing books.
// To insert, don't pass any parameters.  This will set $edit
// to false, and the form will go to insert_book.php.
// To update, pass an array containing a book.  The
// form will be displayed with the old data and point to update_book.php.
// It will also add a "Delete book" button.


  // if passed an existing book, proceed in "edit mode"
  $edit = is_array($video);
  $date = date("F j, Y"); // F = Month j = day without leading Zero Y = year 4 digit Page 470 for full list

  // most of the form is in plain HTML with some
  // optional PHP bits throughout
?>

  <form method="post"
        action="<?php echo $edit ? 'portfolio_edit.php' : 'portfolio.php';?>">
  <table border="0">
  <tr class="NotVisible">
    <td>PortID:</td>
    <td><input type="text" name="PortID" 
         value="<?php echo $edit ? $video['PortID'] : ''; ?>" readonly/></td>
  </tr>
  <tr>
    <td>Title:</td>
    <td><input type="text" name="Title" size="53"
               value="<?php echo $edit ? $video['Title'] : ''; ?>" /></td>
  </tr>
  <tr>
    <td>Short Description:</td>
    <td><textarea id="Blog" wrap="virtual" cols="60" rows="2" name="ShortDescription"><?php echo $edit ? $video['ShortDescription'] : ''; ?></textarea></td>
  </tr>
   <tr>
    <td>Description:</td>
    <td><textarea id="Blog" wrap="virtual" cols="60" rows="13" name="Description"><?php echo $edit ? $video['Description'] : ''; ?></textarea></td>
   </tr>
    <tr>
      <td <?php if (!$edit) { echo "colspan=2"; }?> align="center">
         <?php
            if ($edit)
             // we need the old isbn to find book in database
             // if the isbn is being updated
             echo "<input type=\"hidden\" name=\"PortID\"
                    value=\"".$video['PortID']."\" />";
         ?>
        <input type="submit"
               value="<?php echo $edit ? 'Update' : 'Insert'; ?> Project" />
        </form></td>
        <?php
           if ($edit) {
             echo "<td>
                   <form method=\"post\" action=\"portfolio_delete.php\">
                   <input type=\"hidden\" name=\"PortID\"
                    value=\"".$video['PortID']."\" />
                   <input type=\"submit\" value=\"Delete Log\"/>
                   </form></td>";
            }
          ?>
         </td>
      </tr>
  </table>
  </form>

<?php
}

function display_note_form($video = '') {
// This displays the book form.
// It is very similar to the category form.
// This form can be used for inserting or editing books.
// To insert, don't pass any parameters.  This will set $edit
// to false, and the form will go to insert_book.php.
// To update, pass an array containing a book.  The
// form will be displayed with the old data and point to update_book.php.
// It will also add a "Delete book" button.


  // if passed an existing book, proceed in "edit mode"
  $edit = is_array($video);
  $date = date("F j, Y"); // F = Month j = day without leading Zero Y = year 4 digit Page 470 for full list

  // most of the form is in plain HTML with some
  // optional PHP bits throughout
?>

  <form method="post"
        action="<?php echo $edit ? 'edit_note.php' : 'insert_note_entry.php';?>">
  <table border="0">
  <tr class="NotVisible">
    <td>NoteID:</td>
    <td><input type="text" name="NoteID" 
         value="<?php echo $edit ? $video['NoteID'] : ''; ?>" readonly/></td>
  </tr>
  <tr>
    <td>Title:</td>
    <td><input type="text" name="Title" size="40"
               value="<?php echo $edit ? $video['Title'] : ''; ?>" /></td>
  </tr>
   <tr>
    <td>Notes:</td>
    <td><textarea id="Blog" wrap="virtual" cols="60" rows="15" name="Note"><?php echo $edit ? $video['NOTES'] : ''; ?></textarea></td>
   </tr>
    <tr>
        <td>Private:</td>
        <td><input type="checkbox" name="Private" value="1"  <?php if($edit) {if( $video['Private'] =='1') {echo "checked='yes'";}}; ?>/></td>
    </tr>
    <tr>
      <td <?php if (!$edit) { echo "colspan=2"; }?> align="center">
         <?php
            if ($edit)
             // we need the old isbn to find book in database
             // if the isbn is being updated
             echo "<input type=\"hidden\" name=\"NoteID\"
                    value=\"".$video['NoteID']."\" />";
         ?>
        <input type="submit"
               value="<?php echo $edit ? 'Update' : 'Insert'; ?> Note" />
        </form></td>
        <?php
           if ($edit) {
             echo "<td color=\"#e50000\">
                   <div align=\"center\"><a href=\"delete_note.php?NoteID=".$row['NoteID']."\">
                   <i class=\"fa fa-trash-o fa-lg\"></i></a></div></td>";
            }
          ?>
         </td>
      </tr>
  </table>
  </form>

<?php
}

function display_notei_form($video = '') {
// This displays the book form.
// It is very similar to the category form.
// This form can be used for inserting or editing books.
// To insert, don't pass any parameters.  This will set $edit
// to false, and the form will go to insert_book.php.
// To update, pass an array containing a book.  The
// form will be displayed with the old data and point to update_book.php.
// It will also add a "Delete book" button.


  // if passed an existing book, proceed in "edit mode"
  $edit = is_array($video);
  $date = date("F j, Y"); // F = Month j = day without leading Zero Y = year 4 digit Page 470 for full list

  // most of the form is in plain HTML with some
  // optional PHP bits throughout
?>

  <form method="post"
        action="<?php echo $edit ? 'notesi_edit.php' : 'notesi_insert.php';?>">
  <table border="0">
  <tr class="NotVisible">
    <td>NoteID:</td>
    <td><input type="text" name="NoteID" 
         value="<?php echo $edit ? $video['NoteID'] : ''; ?>" readonly/></td>
  </tr>
  <tr>
    <td>Title:</td>
    <td><input type="text" name="Title" size="40"
               value="<?php echo $edit ? $video['Title'] : ''; ?>" /></td>
  </tr>
  <tr>
    <td>Category:</td>
    <td><input type="text" name="Category" size="40"
               value="<?php echo $edit ? $video['Category'] : ''; ?>" /></td>
  </tr>
   <tr>
    <td>Notes:</td>
    <td><textarea id="Blog" wrap="virtual" cols="60" rows="15" name="Note"><?php echo $edit ? $video['NOTES'] : ''; ?></textarea></td>
   </tr>
    <tr>
        <td>Private:</td>
        <td><input type="checkbox" name="Private" value="1"  <?php if($edit) {if( $video['Private'] =='1') {echo "checked='yes'";}}; ?>/></td>
    </tr>
    <tr>
      <td <?php if (!$edit) { echo "colspan=2"; }?> align="center">
         <?php
            if ($edit)
             // we need the old isbn to find book in database
             // if the isbn is being updated
             echo "<input type=\"hidden\" name=\"NoteID\"
                    value=\"".$video['NoteID']."\" />";
         ?>
        <input type="submit"
               value="<?php echo $edit ? 'Update' : 'Insert'; ?> Note" />
        </form></td>
        <?php
           if ($edit) {
             echo "<td color=\"#e50000\">
                   <div align=\"center\"><a href=\"delete_note.php?NoteID=".$row['NoteID']."\">
                   <i class=\"fa fa-trash-o fa-lg\"></i></a></div></td>";
            }
          ?>
         </td>
      </tr>
  </table>
  </form>

<?php
}

function display_dj_blog_form($FormID) {


  // if passed an existing book, proceed in "edit mode"
  $edit = is_array($video);


  // most of the form is in plain HTML with some
  // optional PHP bits throughout
?>

  <form method="post"
        action="insert_dj_blog_entry.php">
  <table border="0">
  <tr class="NotVisible">
    <td>DJID:</td>
    <td><input type="text" name="DJID" 
         value="<?php echo $FormID; ?>" readonly/></td>
  </tr>
  <tr>
    <td>Blog:</td>
    <td><input type="text" name="Blog" size="40"
               value="" /></td>
  </tr>
  <tr>
    <td>Time:</td>
    <td>
         <select name="Time">
            <option value="">Select...</option>
            <option value="30">30 minutes</option>
            <option value="60">60 minutes</option>
          </select> 
    </td>    
  </tr>
    <tr>
      <td align="center">
        <input type="submit"
               value="Insert Blog" />
        </td>
         </td>
      </tr>
  </table>
  </form>

<?php
}

function display_automotive_form() {
?>

  <form method="post" action="Automotive.php">
  <table border="0"  width="100%">
    <tr>
    <td>Maintenance:</td>
    <td>
         <select name="service">
             <option value="">Select...</option>
            <option value="oil">Oil Change</option>
          </select> 
    </td>

  
      <td align="center">
        <input type="submit"
               value="Maintenance" />
        </td>
       </tr>
   
  </table>
  </form>
<?php
}

function display_bp_form() {
?>

  <form method="post" action="bp.php">
  <table border="0"  width="100%">
  <tr class="NotVisible">
    <td>Systolic:</td>
    <td><input type="text" name="BPID" 
         value="" readonly/></td>
  </tr>

    <td>Systolic:</td>
    <td><input type="text" name="Systolic" size="20"
               value="" /></td>

 
    <td>Diastolic:</td>
    <td><input type="text" name="Diastolic" size="20"
               value="" /></td>

  
      <td align="center">
        <input type="submit"
               value="Insert BP" />
        </td>
       
   
  </table>
  </form>
<?php
}

function display_weight_form() {
?>

  <form method="post" action="weight.php">
  <table border="0"  width="100%">
  <tr class="NotVisible">
    <td>Systolic:</td>
    <td><input type="text" name="WEIGHTID" 
         value="" readonly/></td>
  </tr>

    <td>Weight:</td>
    <td><input type="text" name="weight" size="20"
               value="" /></td>

 


      <td align="center">
        <input type="submit"
               value="Weigh In" />
        </td>
       
   
  </table>
  </form>
<?php
}

function display_dj_form($video = '') {


  // if passed an existing book, proceed in "edit mode"
  $edit = is_array($video);
  $date = date("F j, Y"); // F = Month j = day without leading Zero Y = year 4 digit Page 470 for full list

  // most of the form is in plain HTML with some
  // optional PHP bits throughout
?>

  <form method="post"
        action="<?php echo $edit ? 'edit_dj.php' : 'insert_dj.php';?>">
  <table border="0">
  <tr class="NotVisible">
    <td>DjID:</td>
    <td><input type="text" name="DJID" 
         value="<?php echo $edit ? $video['DJID'] : ''; ?>" readonly/></td>
  </tr>
  <tr>
    <td>Last Name:</td>
    <td><input type="text" name="Lname" size="40"
               value="<?php echo $edit ? $video['Lname'] : ''; ?>" /></td>
  </tr>
  <tr>
    <td>First Name:</td>
    <td><input type="text" name="Fname" size="40"
               value="<?php echo $edit ? $video['Fname'] : ''; ?>" /></td>
  </tr>
  <tr>
    <td>DJ Name:</td>
    <td><input type="text" name="DJname" size="40"
               value="<?php echo $edit ? $video['DJname'] : ''; ?>" /></td>
  </tr>
    <tr>
    <td>Word Press Name:</td>
    <td><input type="text" name="WordPressName" size="40"
               value="<?php echo $edit ? $video['WordPressName'] : ''; ?>" /></td>
  </tr>
  <tr>
    <td>Email:</td>
    <td><input type="text" name="Email" size="40"
               value="<?php echo $edit ? $video['Email'] : ''; ?>" /></td>
  </tr>
  <tr>
    <td>Show Name:</td>
    <td><input type="text" name="ShowName" size="40"
               value="<?php echo $edit ? $video['ShowName'] : ''; ?>" /></td>
  </tr>
  <tr>
    <td>Show Day:</td>
    <td>
         <select name="ShowDay">
            <option value="<?php echo $edit ? $video['ShowDay'] : ''; ?>"><?php echo $edit ? $video['ShowDay'] : 'Select...'; ?></option>
            <option value="monday">Monday</option>
            <option value="tuesday">Tuesday</option>
            <option value="wednesday">Wednesday</option>
            <option value="thursday">Thursday</option>
            <option value="friday">Friday</option>
          </select> 
    </td>
  </tr>
  <tr>
    <td>Show Time:</td>
    <td><input type="text" name="ShowTime" size="8"
               value="<?php echo $edit ? $video['ShowTime'] : ''; ?>" /></td>
  </tr>
  <tr>
    <td>Time Period:</td>
    <td>
         <select name="TimePeriod">
            <option value="<?php echo $edit ? $video['TimePeriod'] : ''; ?>"><?php echo $edit ? $video['TimePeriod'] : 'Select...'; ?></option>
            <option value="am">AM</option>
            <option value="pm">PM</option>
          </select> 
    </td>    
  </tr>
    <tr>
      <td <?php if (!$edit) { echo "colspan=2"; }?> align="center">
         <?php
            if ($edit)
             // we need the old isbn to find book in database
             // if the isbn is being updated
             echo "<input type=\"hidden\" name=\"DJID\"
                    value=\"".$video['DJID']."\" />";
         ?>
        <input type="submit" class="SubmitButton"
               value="<?php echo $edit ? 'Update' : 'Insert'; ?> DJ" />
        </form></td>
        <?php
           if ($edit) {
             echo "<td color=\"#e50000\">
                   <div align=\"center\"><a href=\"delete_dj.php?DJID=".$row['DJID']."\">
                   <i class=\"fa fa-trash-o fa-lg\"></i></a></div></td>";
            }
          ?>
         </td>
      </tr>
  </table>
  </form>

<?php
}



function ShowDay() {


  // most of the form is in plain HTML with some
  // optional PHP bits throughout
?>

  <form method="post"
        action="Show_day.php">
  <table border="0">
  <tr>
    <td>Show Day:</td>
    <td>
         <select name="ShowDay">
            <option value="">Select...</option>
            <option value="monday">Monday</option>
            <option value="tuesday">Tuesday</option>
            <option value="wednesday">Wednesday</option>
            <option value="thursday">Thursday</option>
            <option value="friday">Friday</option>
          </select> 
    </td>
  </tr>
    <tr>
      <td align="right">

        <input type="submit" class="SubmitButton"
               value="View Schedule"/>
        </form></td>
         </td>
      </tr>
  </table>
  </form>

<?php
}
function display_movie_suggestion_form() {
  // most of the form is in plain HTML with some
  // optional PHP bits throughout
    
?>
  <form method="post" action="movie_night.php">
  <table border="0" width="100%">
  <tr>
    <td>Letter:</td>
    <td><input type="text" name="Letter" size="1"
               value="" /></td>
    <td>Movie:</td>
    <td><input type="text" name="Movie" size="32"
               value="" /></td>

      <td>
        <input type="submit" value="Suggest" />
    </td>
   </tr>
      
  </table>
  </form>

<?php
}

function display_notesi_options(){
    
    $categories = get_note_categories();
    
    echo "<div width=\"80%\">";
   ?>
  <form method="post" action="notesi.php">
  <center>
  <table border="0" width="60%">
    <td>Category:</td>
    <td>
         <select name="Category" width="100%">
    <?php
    foreach ($categories as $row) {
        echo "<option value=\"".$row['Category']."\">".$row['Category']."</option>";
    }
    ?>
            </select> 
    </td>
      <td>
        <input type="submit" value="Request" />
    </td>
  
      
  </table>
  </center>
  </form>

<?php 
echo "</div>";
}

function display_request_form() {
  // most of the form is in plain HTML with some
  // optional PHP bits throughout
    
?>
  <form method="post" action="music_request.php">
  <table border="0" width="100%">
  <tr>
    <td>Artist:</td>
    <td><input type="text" name="Artist" size="20"
               value="" /></td>
    <td>Song:</td>
    <td><input type="text" name="Song" size="32"
               value="" /></td>

      <td>
        <input type="submit" value="Request" />
    </td>
   </tr>
      
  </table>
  </form>

<?php
}

function display_media_wait_form() {
  // most of the form is in plain HTML with some
  // optional PHP bits throughout
    
?>
  <form method="post" action="media_library.php">
  <table border="0" width="100%">
  <tr>
    <td>Media:</td>
    <td>Month:</td>
    <td>Day:</td>
    <td>Year:</td>
    
    <td> <!-- Keeping things symmetrical for submit button -->
    </td>
   </tr>
   <tr>
    <td><input type="text" name="Media" size="20"
               value="" /></td>
    <td>
        <!-- 
        <input type="text" name="Date" size="32"
               value="" />
        -->
        <select name="Month" width="100%">
            <option value="01">January</option>
            <option value="02">February</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08">August</option>
            <option value="09">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>  
        </select> 
    </td>
        
     
            
    <td><input type="text" name="Day" size="10"
               value="" /></td>
    <td><input type="text" name="Year" size="10"
               value="" /></td>
      <td>
        <input type="submit" value="Request" />
    </td>
   </tr>
      
  </table>
  </form>

<?php
}


function display_playlist_form($video = '') {
// This displays the book form.
// It is very similar to the category form.
// This form can be used for inserting or editing books.
// To insert, don't pass any parameters.  This will set $edit
// to false, and the form will go to insert_book.php.
// To update, pass an array containing a book.  The
// form will be displayed with the old data and point to update_book.php.
// It will also add a "Delete book" button.


  // if passed an existing book, proceed in "edit mode"
  $edit = is_array($video);
  
  $ShowDate = strtotime('next Friday');
  $date = date("F j, Y", $ShowDate); // F = Month j = day without leading Zero Y = year 4 digit Page 470 for full list
  $year = date("Y", $ShowDate);
  // most of the form is in plain HTML with some
  // optional PHP bits throughout
?>

  <form method="post"
        action="<?php echo $edit ? 'edit_playlist.php' : 'insert_playlist_entry.php';?>">
  <table border="0">
  <tr class="NotVisible">
    <td>PlaylistID:</td>
    <td><input type="text" name="PlaylistID"
         value="<?php echo $edit ? $video['PlaylistID'] : ''; ?>" readonly/></td>
  </tr>
  <tr>
    <td>Title:</td>
    <td><input type="text" name="Title" size="40"
               value="<?php echo $edit ? $video['Title'] : 'Spring # '.$year; ?>" /></td>
  </tr>
  <tr>
    <td>Date:</td>
    <td><input type="text" name="Date"
               value="<?php echo $edit ? $video['PlaylistDate'] : $date; ?>" /></td>
  </tr>
   <tr>
    <td>Playlist:</td>
    <td><textarea id="Blog" wrap="virtual" cols="60" rows="15" name="Playlist"><?php echo $edit ? $video['Playlist'] : ''; ?></textarea></td>
   </tr>
    <tr>
      <td <?php if (!$edit) { echo "colspan=2"; }?> align="center">
         <?php
            if ($edit)
             // we need the old isbn to find book in database
             // if the isbn is being updated
             echo "<input type=\"hidden\" name=\"PlaylistID\"
                    value=\"".$video['PlaylistID']."\" />";
         ?>
        <input type="submit"
               value="<?php echo $edit ? 'Update' : 'Insert'; ?> Playlist" />
        </form></td>
        <?php
           if ($edit) {
             echo "<td>
                   <form method=\"post\" action=\"delete_playlist.php\">
                   <input type=\"hidden\" name=\"PlaylistID\"
                    value=\"".$video['PlaylistID']."\" />
                   <input type=\"submit\" value=\"Delete Playlist\"/>
                   </form></td>";
            }
          ?>
         </td>
      </tr>
  </table>
  </form>

<?php
}

function foobar_playlist_form() {
// displays html change password form
?>
    <p>You can copy a foobar playlist just by selecting your songs and ctrl + c, but it paste's in a form that i find inconvenient.</p>
    <p>This little webapp exists so i can reformat my list before i print, and i may do more with it later but for now that's all it'll do.</p>
     <p>&nbsp;</p>
   <br />
   
    <FORM ACTION="foobar.php" METHOD=POST>
        <table border="0">
        <col width="100"><col width="410"><col width="10">
        <tr>
        Database Fields: <textarea id="database"  cols="60" rows="15" name="database"></textarea> </BR> </BR>
        </tr>
        
        <tr>
        <td>For Facebook:</td>
        <td><input type="checkbox" name="facebook" value="1"/></td>
        </tr>
        <tr>
        <td></td>
        <td></td>
        <td><INPUT TYPE="submit" value="Foobar PL"></td>
        </tr>

    </table></FORM>
<?php
}



function insert_playlist_entry($Title, $PlaylistDate, $Playlist) {
// insert a new book into the database

   $conn = db_connect();

   // check book does not already exist
   $query = "select *
             from PLAYLIST
             where Title='".$Title."'";

   $result = $conn->query($query);
   if ((!$result) || ($result->num_rows!=0)) {
     return false;
   }

   // insert new log entry
   $query = "insert into PLAYLIST values
            (null, '".$Title."', '".$PlaylistDate."',
             '".$Playlist."')";

   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function insert_portfolio_entry($Title, $ShortDescrip, $Descrip) {
// insert a new book into the database

   $conn = db_connect();

   // insert new log entry
   $query = "insert into Portfolio values
            (null, '".$Title."', '".$ShortDescrip."',
             '".$Descrip."')";

   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function insert_log_entry($Title, $BlogDate, $Blog) {
// insert a new book into the database

   $conn = db_connect();

   // check book does not already exist
   $query = "select *
             from LOG
             where Title='".$Title."'";

   $result = $conn->query($query);
   if ((!$result) || ($result->num_rows!=0)) {
     return false;
   }

   // insert new log entry
   $query = "insert into LOG values
            (null, '".$Title."', '".$BlogDate."',
             '".$Blog."')";

   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function insert_dj_blog_entry($DJID, $Blog, $Time, $Submission) {
// insert a new book into the database

   $conn = db_connect();



   // insert new log entry
   $query = "insert into DJBLOG values
            (null, '".$DJID."', '".$Blog."',
             '".$Time."', '".$Submission."')";

   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function insert_BP_entry($DJID, $Blog, $Time, $Submission) {
// insert a new book into the database

   $conn = db_connect();



   // insert new log entry
   $query = "insert into BLOODPRESSURE values
            (null, '".$Blog."',
             '".$Time."', '".$Submission."')";

   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}




function insert_weight_entry($WEIGHTID, $weight, $Submission) {
// insert a new book into the database

   $conn = db_connect();



   // insert new log entry
   $query = "insert into WEIGHT values
            (null, '".$weight."', '".$Submission."')";

   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function insert_notei_entry($Title, $Category, $Note, $Private) {
// insert a new book into the database

   $conn = db_connect();

   // check book does not already exist
   $query = "select *
             from NOTESI
             where Title='".$Title."'";

   $result = $conn->query($query);
   if ((!$result) || ($result->num_rows!=0)) {
     //return false;
     return "Title: ".$Title." Already Exists";
   }

   // insert new log entry
   $query = "insert into NOTESI values
            (null, '".$Title."', '".$Category."', 
             '".$Note."', '".$Private."')";

   $result = $conn->query($query);
   //$result = mysqli_query($conn, $query);
   if (!$result) {
     return "Failed to Insert Note";
   } else {
     //return true;
     return "Success";
   }
}

function insert_project_category($PortID, $CatID){
// insert a new book into the database

   $conn = db_connect();

   // insert new log entry
   $query = "insert into PortfolioCategories values
            (null, '".$PortID."', '".$CatID."')";

   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function insert_project_link($PortID, $source, $link){
// insert a new book into the database

   $conn = db_connect();

   // insert new log entry
   $query = "insert into PortfolioLinks values
            (null, '".$PortID."', '".$source."', '".$link."')";

   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function insert_project_photo($PortID, $photo){
// insert a new book into the database

   $conn = db_connect();

   // insert new log entry
   $query = "insert into PortfolioPictures values
            ('".$PortID."', '".$photo."')";

   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function insert_dj($Lname, $Fname, $DJname, $WordPressName, $Email, $ShowName, $ShowDay, $ShowTime, $TimePeriod) {
// insert a new book into the database

   $conn = db_connect();

   // check book does not already exist


   // insert new log entry
   $query = "insert into DJLIST values
            (null, '".$Lname."', '".$Fname."',
             '".$DJname."', '".$WordPressName."',
             '".$Email."', '".$ShowName."',
             '".$ShowDay."',   
             '".$ShowTime."', '".$TimePeriod."')";

   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function insert_movie_entry($Letter, $Movie) {
// insert a new book into the database

   $conn = db_connect();


   // insert new log entry
   $query = "insert into MOVIENIGHT values
            ('".$Letter."', 
             '".$Movie."')";

   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function insert_request_entry($Song, $Artist) {
// insert a new book into the database

   $conn = db_connect();


   // insert new log entry
   $query = "insert into REQUESTS values
            (null, '".$Song."', 
             '".$Artist."')";

   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function insert_media_library_entry($Media, $Date) {
// insert a new book into the database


   $Date=date("Y-m-d",strtotime($Date));
   $conn = db_connect();


   // insert new log entry
   $query = "insert into MEDIALIBRARY values
            ('".$Media."', 
             '".$Date."')";

   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function insert_User($UserName, $passwd, $Name, $Addr, $Email, $Admin) {
// insert a new book into the database

   $conn = db_connect();

   // check book does not already exist
   $query = "select *
             from Users2
             where UserName='".$UserName."'";

   $result = $conn->query($query);
   if ((!$result) || ($result->num_rows!=0)) {
     return false;
   }

   // insert new book
   $query = "insert into Users2 values
            ('','".$UserName."', sha1('".$passwd."'), '".$Name."',
             '".$Addr."', '".$Email."', FALSE, NULL, FALSE)";

   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}



function insert_Admin($UserName, $passwd, $Name, $Addr, $Email, $Admin) {
// insert a new book into the database

   $conn = db_connect();

   // check book does not already exist
   $query = "select *
             from Users2
             where Username='".$UserName."' AND IsAdmin = 1";

   $result = $conn->query($query);
   if ((!$result) || ($result->num_rows!=0)) {
     return false;
   }

   // insert new book
   $query = "insert into Users2 values
            ('','".$UserName."', sha1('".$passwd."'), '".$Name."',
             '".$Addr."', '".$Email."', TRUE, NULL, FALSE)";
   
   
   

   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function update_category($catid, $catname) {
// change the name of category with catid in the database

   $conn = db_connect();

   $query = "update categories
             set catname='".$catname."'
             where catid='".$catid."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function update_Playlist($PlaylistID, $Title, $Date, $Playlist) {
// change details of book stored under $oldisbn in
// the database to new details in arguments

   $conn = db_connect();

   $query = "update PLAYLIST
             set Title= '".$Title."',
             PlaylistDate = '".$Date."',
             Playlist = '".$Playlist."'
             where PlaylistID = '".$PlaylistID."'";

   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function update_Note($NoteID, $Title, $Note, $Private) {
// change details of book stored under $oldisbn in
// the database to new details in arguments

   $conn = db_connect();

   $query = "update NOTES
             set Title= '".$Title."'
             NOTES = '".$Note."',
             Private = '".$Private."'
             where NoteID = '".$NoteID."'";

   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function update_Notei($NoteID, $Title, $Category, $Note, $Private) {
// change details of book stored under $oldisbn in
// the database to new details in arguments

   $conn = db_connect();

   $query = "update NOTESI
             set Title= '".$Title."',
             Category = '".$Category."',
             NOTES = '".$Note."',
             Private = '".$Private."'
             where NoteID = '".$NoteID."'";

   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function update_automotive_entry($service, $Submission) {
// insert a new book into the database

   $conn = db_connect();



   // insert new log entry
   $query = "update AUTOMOTIVE
            set Submission='".$Submission."'
            where service='".$service."'";


   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function update_Log($LogID, $Title, $Date, $Blog) {
// change details of book stored under $oldisbn in
// the database to new details in arguments

   $conn = db_connect();

   $query = "update LOG
             set Title= '".$Title."',
             BlogDate = '".$Date."',
             Blog = '".$Blog."'
             where LogID = '".$LogID."'";

   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function update_Portfolio($PortID, $Title, $ShortDescrip, $Descrip) {
// change details of book stored under $oldisbn in
// the database to new details in arguments

   $conn = db_connect();

   $query = "update Portfolio
             set Title= '".$Title."',
             ShortDescription = '".$ShortDescrip."',
             Description = '".$Descrip."'
             where PortID = '".$PortID."'";

   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function update_DJ($DJID, $Lname, $Fname, $DJname, $WordPressName, $Email, $ShowName, $ShowDay, $ShowTime, $TimePeriod) {
// change details of book stored under $oldisbn in
// the database to new details in arguments

   $conn = db_connect();

   $query = "update DJLIST
             set Lname= '".$Lname."',
             Fname = '".$Fname."',
             DJname = '".$DJname."',
             WordPressName = '".$WordPressName."',
             Email = '".$Email."',
             ShowName = '".$ShowName."',
             ShowDay = '".$ShowDay."',
             ShowTime = '".$ShowTime."',
             TimePeriod = '".$TimePeriod."'
             where DJID = '".$DJID."'";

   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}


function update_User($UserName, $passwd, $Name, $Addr, $Email, $Admin, $Where) {
// change details of book stored under $oldisbn in
// the database to new details in arguments
   $conn = db_connect();
   $test2 = $_SESSION['UserName'];

   $query = "update Users2
             set UserName= '".$UserName."',
             Password = sha1('".$passwd."'),
             Name = '".$Name."',
             Addr = '".$Addr."',
             Email = '".$Email."',
             IsAdmin = '$Admin'
             where UserName = '".$Where."'";

   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}



function update_Admin($UserName, $passwd, $Name, $Addr, $Email, $Admin) {
// change details of book stored under $oldisbn in
// the database to new details in arguments

   $conn = db_connect();

   $query = "update Users2
             set UserName= '".$UserName."',
             Password = sha1('".$passwd."'),
             Name = '".$Name."',
             Addr = '".$Addr."',
             Email = '".$Email."'
             IsAdmin = FALSE
             where UserName = '".$UserName."'";
   
   
 


   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function delete_category($FormID) {
// Deletes the book identified by $isbn from the database.
   $conn = db_connect();

   $query = "delete from PortfolioCategories
             where PortCatID='".$FormID."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function delete_link($FormID) {
// Deletes the book identified by $isbn from the database.
   $conn = db_connect();

   $query = "delete from PortfolioLinks
             where PortLinkID='".$FormID."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function delete_photo($FormID) {
// Deletes the book identified by $isbn from the database.
   $conn = db_connect();

   $query = "delete from PortfolioPictures
             where PictureURL='".$FormID."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function delete_User($UserName) {
// Deletes the book identified by $isbn from the database.

   $conn = db_connect();

   $query = "delete from Users2
             where UserName='".$UserName."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function delete_playlist($PlaylistID) {
// Deletes the book identified by $isbn from the database.

   $conn = db_connect();

   $query = "delete from PLAYLIST
             where PlaylistID='".$PlaylistID."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function delete_log($FormID) {
// Deletes the book identified by $isbn from the database.

   $conn = db_connect();

   $query = "delete from LOG
             where LogID='".$FormID."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function delete_portfolio_project($PortID) {
// Deletes the book identified by $isbn from the database.

   $conn = db_connect();

   $query = "delete from PortfolioCategories
             where PortID='".$PortID."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } 
   
   $query = "delete from Portfolio
             where PortID='".$PortID."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function delete_notei($FormID) {
// Deletes the book identified by $isbn from the database.

   $conn = db_connect();

   $query = "delete from NOTESI
             where NoteID='".$FormID."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function delete_dj($FormID) {
// Deletes the book identified by $isbn from the database.

   $conn = db_connect();

   $query = "delete from DJLIST
             where DJID='".$FormID."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function delete_dj_blog($FormID) {
// Deletes the book identified by $isbn from the database.

   $conn = db_connect();

   $query = "delete from DJBLOG
             where DJBlogID='".$FormID."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function delete_bp_entry($FormID) {
// Deletes the book identified by $isbn from the database.

   $conn = db_connect();
   echo "BPID: "+$FormID;
   $query = "delete from BLOODPRESSURE
             where BPID='".$FormID."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function delete_weight_entry($FormID) {
// Deletes the book identified by $isbn from the database.

   $conn = db_connect();
   echo "WEIGHTID: "+$FormID;
   $query = "delete from WEIGHT
             where WEIGHTID='".$FormID."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function delete_movie($FormID) {
// Deletes the book identified by $isbn from the database.

   $conn = db_connect();

   $query = "delete from MOVIENIGHT
             where Movie='".$FormID."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function delete_request($FormID) {
// Deletes the book identified by $isbn from the database.

   $conn = db_connect();

   $query = "delete from REQUESTS
             where RequestID='".$FormID."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function delete_media($FormID) {
// Deletes the book identified by $isbn from the database.
   $conn = db_connect();

   $query = "delete from MEDIALIBRARY
             where media='".$FormID."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}





?>
