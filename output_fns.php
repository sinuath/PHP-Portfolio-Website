<?php

function do_html_URL($url, $name) {
  // output URL as link and br
?>
  <a href="<?php echo $url; ?>"><?php echo $name; ?></a><br />
<?php
}
function count_down($desired_time){
    $today = time();
    $TimeLeftTotal = $desired_time - $today;
    if($TimeLeftTotal < 0) $TimeLeftTotal = 0;
    $TimeLeft = (int)(($TimeLeftTotal)/((60)*(60)));
    $TimeLeftDays = (int)($TimeLeft/24);
    $TimeLeftHrs = (int)($TimeLeft%24);
    $TimeLeftMin = (int)(($TimeLeftTotal/60)%(60));
    echo "<b>".$TimeLeftDays." Days ".$TimeLeftHrs." Hours ".$TimeLeftMin." Minutes"." Left</b>";
}

function display_log($log) {
  // display all details about this book
  if (is_array($log)) {

    echo "<div class=\"log\"><div class=\"date\"><br /> ";
    echo $log['BlogDate'];
    echo "</div><div class=\"title\"> ";
    echo $log['Title'];
    echo "</div><br /> ";
    echo nl2br($log['Blog']);
    echo "<br /><br /><div align=\"center\"><a href=\"log_show_archive.php\">Archive >></a></div>";
    if(isset($_SESSION['admin'])){
        echo "<div class=\"NewNote\" style=\"margin-top: -25px\"><a href=\"log_insert_entry_form.php\"><i class=\"fa fa-pencil-square-o\"></i> New Log</a></div>";
    }
    echo "</div>";
  } else {
    echo "Blog Entry Cannot be Displayed at the moment.";
  }
}

function display_project($PortID, $log) {
  // display all details about this book
  if (is_array($log)) {

    echo "<div class=\"log\">";
    echo "<div class=\"title\">";
    echo $log['Title'];
    echo "</div><br /> ";
    //echo "Short Description: ".$log['ShortDescription'];
    echo "<br /> ";
    echo nl2br($log['Description']);
    echo "<br /><br />";
    if($photo = get_portfolio_photos_by_ID($PortID)){
        echo "<div class=\"projectPictureWrapper\"><div class=\"projectPictureWrapperInner\">";
        echo "<img class=\"projectPicture\" src=\"".$photo."\">";
        if($links = get_portfolio_links_by_ID($PortID)){
            foreach ($links as $row) {
                $Source = $row['URLName'];
                $Link = $row['URL'];

                echo "<p><a href=\"".$Link."\">".$Source."</a></p>";
            }
           
        }
        echo "</div></div>";
    }else{
        echo "<div class=\"projectPictureWrapper\"><div class=\"projectPictureWrapperInner\">";
        
        if($links = get_portfolio_links_by_ID($PortID)){
            foreach ($links as $row) {
                $Source = $row['URLName'];
                $Link = $row['URL'];

                echo "<p><a href=\"".$Link."\">".$Source."</a></p>";
            }
           
        }
        echo "</div></div>";
    }
    echo "</div>";
  } else {
    echo "Blog Entry Cannot be Displayed at the moment.";
  }
}


function display_note($note) {
  // display all details about this book
  if (is_array($note)) {

    echo "<div class=\"log\"><div class=\"title\"> ";
    echo $note['Title'];
    echo "</div><br /> ";
    echo nl2br($note['NOTES']);
    echo "<br /></div>";
  } else {
    echo "<p>Blog Entry Cannot be Displayed at the moment.</p>";
  }
}

function display_dj($DJdetails) {
  // display all details about this book
  if (is_array($DJdetails)) {

    echo "<table>";
    echo "<tr>";
        echo "<td style=\"width: 160px;\">";
            echo "Last Name";
        echo "</td>";
        echo "<td>";
            echo $DJdetails['Lname'];
        echo "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td>";
            echo "First Name";
        echo "</td>";
        echo "<td>";
            echo $DJdetails['Fname'];
        echo "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td>";
            echo "DJ Name";
        echo "</td>";
        echo "<td>";
            echo $DJdetails['DJname'];
        echo "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td>";
            echo "Word Press Name";
        echo "</td>";
        echo "<td>";
            echo $DJdetails['WordPressName'];
        echo "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td>";
            echo "Email";
        echo "</td>";
        echo "<td>";
            echo $DJdetails['Email'];
        echo "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td>";
            echo "Show Name";
        echo "</td>";
        echo "<td>";
            echo $DJdetails['ShowName'];
        echo "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td>";
            echo "Show Day";
        echo "</td>";
        echo "<td>";
            echo $DJdetails['ShowDay'];
        echo "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td>";
            echo "Show Time";
        echo "</td>";
        echo "<td>";
            echo $DJdetails['ShowTime'].$DJdetails['TimePeriod'];
        echo "</td>";
    echo "</tr>";
    echo "</table>";
  } else {
    echo "<p>DJ Cannot be Displayed at the moment.</p>";
  }
}


function display_Users($book_array) {
  //display all books in the array passed in
  if ($book_array < 0) {
    echo "<p>No Users currently available</p>";
  } else {
    //create table
    echo "<table width=\"100%\" border=\"0\">";

    //create a table row for each book
      echo "<table border='1'>
      <tr>
      <th>Username</th>
      <th>Name</th>
      <th>Address</th>
      <th>Email</th>
      <th>Admin</th>
      <th>Last Login Date</th>
      </tr>";



      while($row = mysqli_fetch_array($book_array))
        {
        echo "<tr>";
        echo "<td><a href=show_one_User.php?UserName={$row['UserName']}>".$row['UserName']."</a></td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Addr'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . ($row['IsAdmin'] ? 'yes' : 'no') . "</td>";
        echo "<td>" . $row['LLogin'] . "</td>";
        echo "</tr>";
        }
      echo "</table>";



    

    echo "</table>";
  }

  echo "<hr />";
}




function display_playlist_archive($book_array) {
  
  //display all books in the array passed in
  if (!is_array($book_array)) {
    echo "<p>No Playlist entries currently available</p>";
  } else {
    //create table
    //echo "<table width=\"100%\" border=\"0\">";
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr><th width=\"40%\" bgcolor=\"#008080\">Title</th>
            <th bgcolor=\"#008080\">Playlist Date</th>";
    if(check_admin()){
        echo "<th width=\"10%\" bgcolor=\"#008080\">FB</th>
              <th width=\"10%\" bgcolor=\"#008080\">Edit</th>
              <th width=\"10%\" bgcolor=\"#008080\">Delete</th>";
    }
    echo "</table><div class=\"Scrollable\">";
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr>";


    //create a table row for each book
    $counter = 0;
    foreach ($book_array as $row) {
    $counter++;
      
      
      $url = "show_one_playlist_entry.php?PlaylistID=".$row['PlaylistID'];
                  $title = $row['Title'];


                    echo "<tr ".alternate($counter).">
                            <td width=\"40%\"><a href='".$url."'>".$title."</a></td>
                            <td>".$row['PlaylistDate']."</td>";
                   if(check_admin()){
                            echo "<td width=\"10%\">
                                  <a href=\"show_fb_playlist.php?PlaylistID=".$row['PlaylistID']."\">
                                    <i class=\"fa fa-facebook-square\"></i></a></td>";
                            echo "<td width=\"10%\" color=\"#e50000\">
                                  <a href=\"edit_playlist_form.php?PlaylistID=".$row['PlaylistID']."\">
                                    <i class=\"fa fa-cog fa-spin\"></i></a></td>";

                            
                            echo "<td width=\"10%\" color=\"#e50000\">
                                  <a href=\"delete_playlist.php?PlaylistID=".$row['PlaylistID']."\">
                                    <i class=\"fa fa-trash-o fa-lg\"></i></a></td>";
                    }
                    echo "</tr>";
                    
    }

    echo "</table></div>";
  }
  

}

function display_playlist_database($facebook, $playlist) {
        /*
        if(!$facebook){echo "<strong>Playlist: </strong><br>";} else {
            echo "Playlist: ".$playlist['PlaylistDate']."<br>";
        }
        */
	//$line_count = $line_count -1;
        if (!is_array($playlist)) {
            echo "<p>No Playlist entries currently available</p>";
        } else {
            $database = $playlist['Playlist'];
            $line = explode(PHP_EOL, $database);
            $line_count = count($line);
            
            if(!$facebook){
            echo "<center><table border=\"0\" width=\"1200px\" bgcolor=\"black\">\n";
            echo "<tr>
                <th bgcolor=\"#008080\">Song Num</th>
                <th bgcolor=\"#008080\">Title</th>
                <th bgcolor=\"#008080\">Artist</th>
                <th bgcolor=\"#008080\">Album</th>
                <th bgcolor=\"#008080\">Hot?</th>
                <th bgcolor=\"#008080\">Genre</th>";
            echo "<tr>";
            } 



            for ($i=0; $i<$line_count; $i++){
                    $temp1 = null;
                    $artist = explode(" - [", $line[$i]); // artist[0] = artist name artist[1] = album+everything else
                    $arr[0] = $artist[0]; // Artist Name
                    echo "<tr>";
                    $pos = strpos($artist[1], ' #');

                    if($pos){ //arr[1] = track# + everything else
                        $temp1=explode(' #', $artist[1]);
                        $arr[2] = $temp1[0]; // album
                        $temp = explode("] ",$temp1[1]); // temp[0] = track #, temp[1] = Song Name
                        $arr[1] = $temp[0]; // Track Num
                        $arr[3] = $temp[1]; // Song Name
                    }else{
                        $temp = explode("] ",$artist[1]);
                        $arr[1] = "  "; // Track Num
                        $arr[2] = $temp[0]; // Album
                        $arr[3] = $temp[1]; // Song Name
                    }


                    if($facebook){
                        echo "\"".$arr[3]."\" by ".$arr[0]."<br>";
                    }else{



                    echo "<tr>";
                        echo "<td>";
                        echo $arr[1]; // Song Number
                        echo "</td>"; 
                        echo "<td>";
                        echo $arr[3]; // Song Title
                        echo "</td>"; 
                        echo "<td>";
                        echo $arr[0]; // Artist Name
                        echo "</td>"; 
                        echo "<td>";
                        echo $arr[2]; // Album Name
                        echo "</td>"; 
                        echo "<td>";
                        echo "No"; // Hot
                        echo "</td>"; 
                        echo "<td>";
                        echo "alt/indie"; // Hot
                        echo "</td>"; 
                    echo "</tr>";

                    }


            }
            if(!$facebook){echo "</table></center>";}
    }
}

function display_playlist($facebook, $database) {
        echo "<strong>Foobar Formatting Stuffs: </strong><br>";
	$line = explode(PHP_EOL, $database);
	$line_count = count($line);
	//$line_count = $line_count -1;
        if(!$facebook){
	echo "<center><table border=\"1\" width=\"1100px\" bgcolor=\"black\">\n";
        echo "<tr>
            <th bgcolor=\"#008080\">Song Num</th>
            <th bgcolor=\"#008080\">Title</th>
            <th bgcolor=\"#008080\">Artist</th>
            <th bgcolor=\"#008080\">Album</th>";
        echo "<tr>";
        }



	for ($i=0; $i<$line_count; $i++){
                $temp1 = null;
                $artist = explode(" - [", $line[$i]); // artist[0] = artist name artist[1] = album+everything else
                $arr[0] = $artist[0]; // Artist Name
                echo "<tr>";
                $pos = strpos($artist[1], ' #');
                
                if($pos){ //arr[1] = track# + everything else
                    $temp1=explode(' #', $artist[1]);
                    $arr[2] = $temp1[0]; // album
                    $temp = explode("] ",$temp1[1]); // temp[0] = track #, temp[1] = Song Name
                    $arr[1] = $temp[0]; // Track Num
                    $arr[3] = $temp[1]; // Song Name
                }else{
                    $temp = explode("] ",$artist[1]);
                    $arr[1] = "  "; // Track Num
                    $arr[2] = $temp[0]; // Album
                    $arr[3] = $temp[1]; // Song Name
                }
                     

                if($facebook){
                    echo $arr[3]." - ".$arr[0]."<br>";
                }else{


                          
                echo "<tr>";
                    echo "<td>";
                    echo $arr[1]; // Song Number
                    echo "</td>"; 
                    echo "<td>";
                    echo $arr[3]; // Song Title
                    echo "</td>"; 
                    echo "<td>";
                    echo $arr[0]; // Artist Name
                    echo "</td>"; 
                    echo "<td>";
                    echo $arr[2]; // Album Name
                    echo "</td>"; 
                echo "</tr>";
                
                }
                  
                 
	}
        if(!$facebook){echo "</table></center>";}
}

function display_notes($book_array) {
  echo "<div class=\"project\">";

  if (!is_array($book_array)) {
      
    echo "<p>No log entries currently available</p>";
  } else {
    echo "<center><table border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr><th bgcolor=\"#008080\">Title</th>";
    if(check_admin()){
        echo "<th width=\"15%\" bgcolor=\"#008080\">Edit</th>
              <th width=\"15%\" bgcolor=\"#008080\">Delete</th>";
    }
    echo "</table><div class=\"Scrollable\">";
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr>";

    //create a table row for each book
    $counter = 0;
    foreach ($book_array as $row) {
        $counter++;
      
      if((!check_admin())&&(!$row['Private']))
      {
        $url = "show_one_note_entry.php?NoteID=".$row['NoteID'];
                    $title = $row['Title'];


                      echo "<tr ".alternate($counter).">
                              <td><a href='".$url."'>".$title."</a></td>";
                     if(check_admin()){
                              echo "<td width=\"15%\" color=\"#e50000\">
                                    <div align=\"center\"><a href=\"edit_note_form.php?NoteID=".$row['NoteID']."\">
                                      <i class=\"fa fa-cog fa-spin\"></i></a></div></td>";
                              echo "<td width=\"15%\" color=\"#e50000\">
                                    <div align=\"center\"><a href=\"delete_note.php?NoteID=".$row['NoteID']."\">
                                      <i class=\"fa fa-trash-o fa-lg\"></i></a></div></td>";
                      }
                      echo "</tr>";
      }else if(check_admin()){
        $url = "show_one_note_entry.php?NoteID=".$row['NoteID'];
                    $title = $row['Title'];


                      echo "<tr ".alternate($counter).">
                              <td><a href='".$url."'>".$title."</a></td>";
                     if(check_admin()){
                              echo "<td width=\"15%\" color=\"#e50000\">
                                    <div align=\"center\"><a href=\"edit_note_form.php?NoteID=".$row['NoteID']."\">
                                      <i class=\"fa fa-cog fa-spin\"></i></a></div></td>";
                              echo "<td width=\"15%\" color=\"#e50000\">
                                    <div align=\"center\"><a href=\"delete_note.php?NoteID=".$row['NoteID']."\">
                                      <i class=\"fa fa-trash-o fa-lg\"></i></a></div></td>";
                      }
                      echo "</tr>";          
      }
                    
    }

    echo "</table></center>";
  }
  if(check_admin()){
    echo "<a class=\"NewNote\" href=\"http://sinuath.com/insert_note_entry_form.php\"><i class=\"fa fa-pencil-square-o\"></i> New Note</a>";
  }
  echo "</div>";

}



function display_notes_improved($book_array) {
  if (!is_array($book_array)) {
      
    echo "<p>No log entries currently available</p>";
  } else {
    echo "<center><table border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr><th bgcolor=\"#008080\">Title</th>";
    if(check_admin()){
        echo "<th width=\"15%\" bgcolor=\"#008080\">Edit</th>
              <th width=\"15%\" bgcolor=\"#008080\">Delete</th>";
    }
    echo "</table><div class=\"Scrollable\">";
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr>";

    //create a table row for each book
    $counter = 0;
    foreach ($book_array as $row) {
        $counter++;
      
    if((check_admin()) || (!$row['Private'])){
        $url = "notesi_show_entry.php?NoteID=".$row['NoteID'];
        $title = $row['Title'];
          echo "<tr ".alternate($counter).">
                  <td><a href='".$url."'>".$title."</a></td>";
            if(check_admin()){
                      
                      echo "<td width=\"15%\" color=\"#e50000\">
                            <div align=\"center\"><a href=\"notesi_edit_form.php?NoteID=".$row['NoteID']."\">
                              <i class=\"fa fa-cog fa-spin\"></i></a></div></td>";
                      echo "<td width=\"15%\" color=\"#e50000\">
                            <div align=\"center\"><a href=\"notesi_delete.php?NoteID=".$row['NoteID']."\">
                              <i class=\"fa fa-trash-o fa-lg\"></i></a></div></td>";   
             }       
      }
      echo "</tr>";
               
    }

    echo "</table></center>";
  }
}


function display_djs($book_array) {
  echo "<div class=\"project\">";
  if(check_admin())
  {
  if (!is_array($book_array)) {
      
    echo "<p>No djs currently available</p>";
  } else {
    echo "<center><table border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr><th bgcolor=\"#008080\">Last Name</th>";
    echo "<th bgcolor=\"#008080\">First Name</th>";
    echo "<th width=\"15%\" bgcolor=\"#008080\">WordPress</th>";
    echo "<th width=\"15%\" bgcolor=\"#008080\">Edit</th>
          <th width=\"15%\" bgcolor=\"#008080\">Delete</th>";
    echo "</table><div class=\"Scrollable\">";
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr>";

    //create a table row for each book
    $counter = 0;
    foreach ($book_array as $row) {
        $counter++;
      
      
        $url = "show_one_dj_entry.php?DJID=".$row['DJID'];
                    $DJ = $row['Lname'];


                      echo "<tr ".alternate($counter).">
                              <td><a href='".$url."'>".$DJ."</a></td>";
                      echo "<td>".$row['Fname']."</a></td>";
                     if(check_admin()){
                              echo "<td width=\"15%\" color=\"#e50000\">
                                    <div align=\"center\"><a href=\"http://sinuath.com/insert_dj_blog_form.php?DJID=".$row['DJID']."\">
                                      <i class=\"fa fa-pencil-square-o\"></i></a></div></td>";
                              echo "<td width=\"15%\" color=\"#e50000\">
                                    <div align=\"center\"><a href=\"edit_dj_details_form.php?DJID=".$row['DJID']."\">
                                      <i class=\"fa fa-cog fa-spin\"></i></a></div></td>";
                              echo "<td width=\"15%\" color=\"#e50000\">
                                    <div align=\"center\"><a href=\"delete_dj.php?DJID=".$row['DJID']."\">
                                      <i class=\"fa fa-trash-o fa-lg\"></i></a></div></td>";
                      }
                      echo "</tr>";
      
                    
    }

    echo "</table></center>";
  }
  

    echo "<a class=\"NewNote\" href=\"http://sinuath.com/insert_dj_entry_form.php\"><i class=\"fa fa-pencil-square-o\"></i> New DJ</a>";
  }else{
      echo "One does not simply wander into the admin area";
  }
  echo "</div>";
  
}

function movie_night_form(){
    echo "<div width=\"80%\">";
    display_movie_suggestion_form();
    $suggestions = get_movie_night_entries();
    display_movie_requests($suggestions);
    echo "</div>";
}

function music_request_form(){
    echo "<div width=\"80%\">";
    display_request_form();
    $requests = get_request_entries();
    display_requests($requests);
    echo "</div>";
}

function media_library_form(){
    echo "<div width=\"80%\">";
    display_media_wait_form();
    $requests = get_media_library_entries();
    display_media_library($requests);
    echo "</div>";
}

function portfolio_form(){
    echo "<div width=\"80%\">";
    //display_media_wait_form();
    $requests = get_portfolio_projects();
    display_portfolio($requests);
    echo "<div class=\"rightlink\" width=\"100%\" text-align=\"right\"><a href=\"portfolio_insert.php\">Insert Project</a></div>";
    echo "</div>";
}


function BP_form(){
    echo "<div width=\"80%\">";
    display_bp_form();
    $BlogEntries = get_bp();
    display_bp($BlogEntries);
    echo "</div>";
}

function weight_form(){
    echo "<div width=\"80%\">";
    display_weight_form();
    $BlogEntries = get_weight();
    display_weight($BlogEntries);
    echo "</div>";
}

function Automotive_form(){
    echo "<div width=\"80%\">";
    display_automotive_form();
    $BlogEntries = get_automotive();
    display_automotive($BlogEntries);
    echo "</div>";
}

function display_movie_requests($request_array) {
  
  
  
  if (!is_array($request_array)) {
    echo "<p>No request entries currently available</p>";
  } else {
    echo "<table class=\"MovieRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr><th width=\"5%\" bgcolor=\"#008080\">Letter</th>";
    echo "<th width=\"84%\" bgcolor=\"#008080\">Movie</th>";
    if(check_admin()){
        echo "<th width=\"60px\" bgcolor=\"#008080\">Delete</th>";
    }
    echo "</table><div class=\"Scrollable\">";
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr>";

    //create a table row for each book
    $counter = 0;
    foreach ($request_array as $row) {
        $counter++;
        
        $Letter = $row['Letter'];
        $Movie = $row['Movie'];

  



        echo "<tr ".alternate($counter)."><td width=\"7%\">".$Letter."</td>";
        echo "<td width=\"90%\">".$Movie."</a></td>";
        if(check_admin()){
                 echo "<td width=\"60px\" color=\"#e50000\">
                       <div align=\"center\"><a href=\"movie_night_delete.php?Movie=".$row['Movie']."\">
                         <i class=\"fa fa-trash-o fa-lg\"></i></a></div></td>";
         }
        echo "</tr>";
                    
    }

    echo "</table></div>";
  }
  

}

function display_requests($request_array) {
  
  
  
  if (!is_array($request_array)) {
    echo "<p>No request entries currently available</p>";
  } else {
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr><th width=\"36%\" bgcolor=\"#008080\">Artist</th>";
    echo "<th width=\"53%\" bgcolor=\"#008080\">Song</th>";
    if(check_admin()){
        echo "<th width=\"60px\" bgcolor=\"#008080\">Delete</th>";
    }
    echo "</table><div class=\"Scrollable\">";
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr>";

    //create a table row for each book
    $counter = 0;
    foreach ($request_array as $row) {
        $counter++;
        
        $Artist = $row['Artist'];
        $Song = $row['Song'];
        $YouTubeQuery = $Artist."+".$Song;

        $url = "https://www.youtube.com/results?search_query=".$YouTubeQuery;



        echo "<tr ".alternate($counter)."><td width=\"36%\"><a href='".$url."'>".$Artist."</a></td>";
        echo "<td width=\"53%\">".$Song."</a></td>";
        if(check_admin()){
                 echo "<td width=\"60px\" color=\"#e50000\">
                       <div align=\"center\"><a href=\"music_request_delete.php?RequestID=".$row['RequestID']."\">
                         <i class=\"fa fa-trash-o fa-lg\"></i></a></div></td>";
         }
        echo "</tr>";
                    
    }

    echo "</table></div>"; // Ends Scrollable div
  }
  

}

function display_media_library($request_array) { 
    
  if (!is_array($request_array)) {
    echo "<p>No request entries currently available</p>";
  } else {
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr><th width=\"60%\" bgcolor=\"#008080\">Media</th>";
    echo "<th width=\"23%\" bgcolor=\"#008080\">Date</th>";
    if(check_admin()){
        echo "<th width=\"60px\" bgcolor=\"#008080\">Delete</th>";
    }
    echo "</table><div class=\"Scrollable\">";
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr>";


    $counter = 0;
    foreach ($request_array as $row) {
        $counter++;
        
       
        $Media = $row['media'];
        $Date = $row['Submission'];





        echo "<tr ".alternate($counter)."><td width=\"60%\">".$Media."</td>";
        echo "<td width=\"23%\">".date("M d, Y",strtotime($Date))."</a></td>";
        if(check_admin()){
                 echo "<td width=\"60px\" color=\"#e50000\">
                       <div align=\"center\"><a href=\"media_library_delete.php?RequestID=".$row['media']."\">
                         <i class=\"fa fa-trash-o fa-lg\"></i></a></div></td>";
         }
        echo "</tr>";
                    
    }

    echo "</table></div>";
  }
  

}

function display_project_photos($PortID) { 
   
    $photo = get_portfolio_photos_by_ID($PortID);
    //display_portfolio($requests);
    
  if (!$photo) {
    echo "<p>No requested entries currently available</p>";
  } else {
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr><th bgcolor=\"#008080\">Photo Link</th>";
    //echo "<th width=\"23%\" bgcolor=\"#008080\">Date</th>";
    if(check_admin()){
        echo "<th width=\"60px\" bgcolor=\"#008080\">Delete</th>";
    }
    echo "</table><div class=\"Scrollable\">";
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr>";

    
       


        $Link = $photo;
       // $Date = $row['Submission'];

        echo "<tr>";
        echo "<td><a href=\"".$Link."\">".$Link."</a></td>";
        //echo "<td width=\"23%\">".date("M d, Y",strtotime($Date))."</a></td>";
        if(check_admin()){
                 echo "<td width=\"60px\" color=\"#e50000\">
                       <div align=\"center\"><a href=\"project_photo_delete.php?PhotoID=".$photo."\">
                         <i class=\"fa fa-trash-o fa-lg\"></i></a></div></td>";
         }
        echo "</tr>";              
  
    echo "</table></div>";
  }
}

function display_project_links($PortID) { 
   
    $request_array = get_portfolio_links_by_ID($PortID);
    //display_portfolio($requests);
    
  if (!is_array($request_array)) {
    echo "<p>No request entries currently available</p>";
  } else {
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr><th bgcolor=\"#008080\">Link Source</th>";
    echo "<th width=\"60%\" bgcolor=\"#008080\">Link</th>";
    //echo "<th width=\"23%\" bgcolor=\"#008080\">Date</th>";
    if(check_admin()){
        echo "<th width=\"60px\" bgcolor=\"#008080\">Delete</th>";
    }
    echo "</table><div class=\"Scrollable\">";
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr>";

    $counter = 0;
    foreach ($request_array as $row) {
        $counter++;

        $Source = $row['URLName'];
        $Link = $row['URL'];
       // $Date = $row['Submission'];

        echo "<tr ".alternate($counter)."><td>".$Source."</td>";
        echo "<td  width=\"60%\"><a href=\"".$Link."\">".$Link."</a></td>";
        //echo "<td width=\"23%\">".date("M d, Y",strtotime($Date))."</a></td>";
        if(check_admin()){
                 echo "<td width=\"60px\" color=\"#e50000\">
                       <div align=\"center\"><a href=\"project_link_delete.php?LinkID=".$row['PortLinkID']."\">
                         <i class=\"fa fa-trash-o fa-lg\"></i></a></div></td>";
         }
        echo "</tr>";              
    }
    echo "</table></div>";
  }
}

function display_project_categories($PortID) { 
   
    $request_array = get_portfolio_categories_by_ID($PortID);
    //display_portfolio($requests);
    
  if (!is_array($request_array)) {
    echo "<p>No request entries currently available</p>";
  } else {
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr><th bgcolor=\"#008080\">Category</th>";
    //echo "<th width=\"23%\" bgcolor=\"#008080\">Date</th>";
    if(check_admin()){
        echo "<th width=\"60px\" bgcolor=\"#008080\">Delete</th>";
    }
    echo "</table><div class=\"Scrollable\">";
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr>";

    $counter = 0;
    foreach ($request_array as $row) {
        $counter++;

        $Category = $row['Category'];
       // $Date = $row['Submission'];

        echo "<tr ".alternate($counter)."><td>".$Category."</td>";
        //echo "<td width=\"23%\">".date("M d, Y",strtotime($Date))."</a></td>";
        if(check_admin()){
                 echo "<td width=\"60px\" color=\"#e50000\">
                       <div align=\"center\"><a href=\"project_category_delete.php?PortCatID=".$row['PortCatID']."\">
                         <i class=\"fa fa-trash-o fa-lg\"></i></a></div></td>";
         }
        echo "</tr>";              
    }
    echo "</table></div>";
  }
}

function display_portfolio($request_array) { 
    
  if (!is_array($request_array)) {
    echo "<p>No request entries currently available</p>";
  } else {
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr><th bgcolor=\"#008080\">Title</th>";
    if(check_admin()){
        echo "<th width=\"10%\" bgcolor=\"#008080\">Photo</th>";
        echo "<th width=\"10%\" bgcolor=\"#008080\">Links</th>";
        echo "<th width=\"12%\" bgcolor=\"#008080\">Category</th>";
        echo "<th width=\"10%\" bgcolor=\"#008080\">Edit</th>
              <th width=\"12%\" bgcolor=\"#008080\">Delete</th>";
    }
    echo "</table><div class=\"Scrollable\">";
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr>";


    $counter = 0;
    foreach ($request_array as $row) {
        $counter++;
        
       
        $Title = $row['Title'];
        $url = "portfolio_view_project.php?PortID=".$row['PortID'];


        


/*
                   echo "<tr ".alternate($counter).">
                            <td width=\"50%\"><a href='".$url."'>".$Title."</a></td>
*/
       echo "<tr ".alternate($counter).">";
       echo "<td ><a href='".$url."'>".$Title."</a></td>";
            
        if(check_admin()){
            echo "<td width=\"10%\" color=\"#e50000\">
                            <div align=\"center\"><a href=\"portfolio_photo_form.php?PortID=".$row['PortID']."\">
                              <i class=\"fa fa-picture-o\" aria-hidden=\"true\"></i></a></div></td>";
            echo "<td width=\"11%\" color=\"#e50000\">
                            <div align=\"center\"><a href=\"portfolio_link_form.php?PortID=".$row['PortID']."\">
                              <i class=\"fa fa-link\" aria-hidden=\"true\"></i></a></div></td>";
            echo "<td width=\"12%\" color=\"#e50000\">
                            <div align=\"center\"><a href=\"portfolio_category_form.php?PortID=".$row['PortID']."\">
                              <i class=\"fa fa-plus-square-o\"></i></a></div></td>";
            echo "<td width=\"11%\" color=\"#e50000\">
                            <div align=\"center\"><a href=\"portfolio_edit_form.php?PortID=".$row['PortID']."\">
                              <i class=\"fa fa-cog fa-spin\"></i></a></div></td>";
                 echo "<td width=\"9%\" color=\"#e50000\">
                       <div align=\"center\"><a href=\"portfolio_delete.php?PortID=".$row['PortID']."\">
                         <i class=\"fa fa-trash-o fa-lg\"></i></a></div></td>";
         }
        echo "</tr>";
                    
    }

    echo "</table></div>";
  }
  

}


function display_archive($book_array) {
  echo "<div class=\"project\">";

  if (!is_array($book_array)) {
    echo "<p>No log entries currently available</p>";
  } else {

    echo "<center><table border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr><th  bgcolor=\"#008080\">Title</th>
            <th width=\"23%\" bgcolor=\"#008080\">Blog Date</th>";
    if(check_admin()){
        echo "<th width=\"15%\" bgcolor=\"#008080\">Edit</th>
              <th width=\"15%\" bgcolor=\"#008080\">Delete</th>";
    }
    echo "</table><div class=\"Scrollable\">";
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr>";

    //create a table row for each book
    $counter = 0;
    
    foreach ($book_array as $row) {
       
       $counter++;
      
      
      $url = "log_show_one_entry.php?LogID=".$row['LogID'];
                  $title = $row['Title'];


                    echo "<tr ".alternate($counter).">
                            <td ><a href='".$url."'>".$title."</a></td>
                            <td width=\"23%\" align=\"left\">".$row['BlogDate']."</td>";
                   if(check_admin()){
                            echo "<td width=\"15%\" color=\"#e50000\">
                                  <div align=\"center\"><a href=\"log_edit_form.php?LogID=".$row['LogID']."\">
                                    <i class=\"fa fa-cog fa-spin\"></i></a></div></td>";
                            echo "<td width=\"15%\" color=\"#e50000\">
                                  <div align=\"center\"><a href=\"log_delete.php?LogID=".$row['LogID']."\">
                                    <i class=\"fa fa-trash-o fa-lg\"></i></a></div></td>";
                    }
                    echo "</tr>";
                    
    }

    echo "</table></center>";
  }
  echo "</div>";

}


function display_Shows($book_array) {
  

  if (!is_array($book_array)) {
    echo "<p>No log entries currently available</p>";
  } else {

    echo "<center><table border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr><th width=\"20%\" bgcolor=\"#008080\">Time</th>
            <th bgcolor=\"#008080\">Show</th>";
    
    echo "</table><div class=\"Scrollable\">";
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr>";
   
    //create a table row for each book
    $counter = 0;
    
    
    foreach ($book_array as $row) {
       
       $counter++;
      
      
      $url = "edit_dj_details_form.php?DJID=".$row['DJID'];
                  $ShowTime = $row['ShowTime'];


                    echo "<tr ".alternate($counter).">
                            <td width=\"20%\">".$ShowTime." ".$row['TimePeriod']."</td>
                            <td align=\"left\"><a href='".$url."'>".$row['Fname']." ".$row['Lname']."</a> ".$row['ShowName']."</td>";
                   
                    echo "</tr>";
                    
    }
    
    echo "</table></center>";
  }
  
  

}


function display_dj_blogs($book_array) {
  echo "<div class=\"project\">";

  if (!is_array($book_array)) {
    echo "<p>No blog entries currently available</p>";
  } else {
    if(check_admin()){
    echo "<center><table border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr><th width=\"35%\" bgcolor=\"#008080\">Blog</th>
            <th width=\"10%\" bgcolor=\"#008080\">Time(min)</th>";
    echo "<th width=\"15%\" bgcolor=\"#008080\">Last Name</th>
            <th width=\"15%\" bgcolor=\"#008080\">First Name</th>";
    echo "<th width=\"15%\" bgcolor=\"#008080\">Submission</th>";
    echo "<th width=\"15%\" bgcolor=\"#008080\">Delete</th>";
    
    echo "</table><div class=\"Scrollable\">";
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr>";

    //create a table row for each book
    
    foreach ($book_array as $row) {
        $counter = 0;
        $counter++;
      
      
                   $title = $row['Blog'];
                   $DJID = $row['DJID'];
                   $time = strtotime($row['Submission']);
                   $Submission = date("M j, Y", $time);
                   $DJLname = get_dj_lname($DJID);
                   $DJFname = get_dj_fname($DJID);
                   
                   
                    echo "<tr ".alternate($counter).">
                            <td width=\"35%\">".$title."</td>
                            <td width=\"10%\" align=\"left\">".$row['Time']."</td>";
                   echo "<td width=\"15%\" align=\"left\"><a href=\"show_one_dj_entry.php?DJID=".$row['DJID']."\">".$DJLname."</a></td>";
                   echo "<td width=\"15%\" align=\"left\">".$DJFname."</td>";
                   echo "<td width=\"15%\" align=\"left\">".$Submission."</td>";
                   
                    echo "<td width=\"10%\" color=\"#e50000\">
                          <div align=\"center\"><a href=\"delete_dj_blog.php?DJBlogID=".$row['DJBlogID']."\">
                            <i class=\"fa fa-trash-o fa-lg\"></i></a></div></td>";
                    
                    echo "</tr>";
        
    }

    echo "</table></center>";
    }
  }
  echo "</div>";

}

function display_bp($book_array) {
 
  if (!is_array($book_array)) {
    echo "<p>No bp entries currently available</p>";
  } else {
    if(check_admin()){
    echo "<center><table border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr><th width=\"30%\" bgcolor=\"#008080\">Systolic</th>
            <th width=\"30%\" bgcolor=\"#008080\">diastolic</th>";
    echo "<th width=\"30%\" bgcolor=\"#008080\">Submission</th>";
    
    echo "<th width=\"10%\" bgcolor=\"#008080\">Delete</th>";
    
    echo "</table><div class=\"Scrollable\">";
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr>";

    //create a table row for each book
    
    foreach ($book_array as $row) {
        $counter = 0;
        $counter++;
      
      

                   $systolic = $row['systolic'];
                   $diastolic = $row['diastolic'];
                   $time = strtotime($row['Submission']);
                   $Submission = date("M j, Y", $time);

                   
                   
                    echo "<tr ".alternate($counter).">
                           
                            
                        <td width=\"30%\" align=\"left\">".$systolic."</td>";
                   echo "<td width=\"30%\" align=\"left\">".$diastolic."</td>";
                   echo "<td width=\"30%\" align=\"left\">".$Submission."</td>";
                    echo "<td width=\"10%\" color=\"#e50000\">
                          <div align=\"center\"><a href=\"bp_delete.php?BPID=".$row['BPID']."\">
                            <i class=\"fa fa-trash-o fa-lg\"></i></a></div></td>";
                    
                    echo "</tr>";
        
    }

    echo "</table></center>";
    }
    
  }  

}

function display_automotive($book_array) {
 
  if (!is_array($book_array)) {
    echo "<p>No Maintenance entries currently available</p>";
  } else {
    if(check_admin()){
    echo "<center><table border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr><th width=\"50%\" bgcolor=\"#008080\">Service Type</th>";
    echo "<th width=\"40%\" bgcolor=\"#008080\">Submission</th>";
    
    echo "<th width=\"10%\" bgcolor=\"#008080\">Delete</th>";
    
    echo "</table><div class=\"Scrollable\">";
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr>";

    //create a table row for each book
    
    foreach ($book_array as $row) {
        $counter = 0;
        $counter++;
      
      

                   $service = $row['service'];
                   $time = strtotime($row['Submission']);
                   $Submission = date("M j, Y", $time);

                   
                   
                    echo "<tr ".alternate($counter).">";
                   echo "<td width=\"50%\" align=\"left\">".$service."</td>";
                   echo "<td width=\"40%\" align=\"left\">".$Submission."</td>";
                    echo "<td width=\"10%\" color=\"#e50000\">
                          <div align=\"center\"><a href=\"delete_maintenance.php?service=".$row['service']."\">
                            <i class=\"fa fa-trash-o fa-lg\"></i></a></div></td>";
                    
                    echo "</tr>";
        
    }

    echo "</table></center>";
    }
    
  }  

}

function display_weight($book_array) {
 
  if (!is_array($book_array)) {
    echo "<p>No bp entries currently available</p>";
  } else {
    if(check_admin()){
    echo "<center><table border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr><th width=\"60%\" bgcolor=\"#008080\">Weight</th>";
    echo "<th width=\"30%\" bgcolor=\"#008080\">Submission</th>";
    
    echo "<th width=\"10%\" bgcolor=\"#008080\">Delete</th>";
    
    echo "</table><div class=\"Scrollable\">";
    echo "<table class=\"MusicRequest\" border=\"0\" width=\"100%\" bgcolor=\"black\">\n";
    echo "<tr>";

    //create a table row for each book
    
    foreach ($book_array as $row) {
        $counter = 0;
        $counter++;
      
      


                   $weight = $row['weight'];
                   $time = strtotime($row['Submission']);
                   $Submission = date("M j, Y", $time);

                   
                   
                    echo "<tr ".alternate($counter).">";
                   echo "<td width=\"60%\" align=\"left\">".$weight."</td>";
                   echo "<td width=\"30%\" align=\"left\">".$Submission."</td>";
                    echo "<td width=\"10%\" color=\"#e50000\">
                          <div align=\"center\"><a href=\"weight_delete.php?WEIGHTID=".$row['WEIGHTID']."\">
                            <i class=\"fa fa-trash-o fa-lg\"></i></a></div></td>";
                    
                    echo "</tr>";
        
    }

    echo "</table></center>";
    }
    
  }  

}

function alternate($counter){
    if(($counter%2) == 1)
    {
        $alternate = "class=\"odd\"";
    }else{
        $alternate = "class=\"even\"";
    }
    return $alternate;
}





function display_login_form() {
  // dispaly form asking for name and password
?>
<br />
<br />
<br />
<center>
 <form method="post" action="login.php">
 <table class="login" bgcolor="#191919">
   <tr>
     <td>Username:</td>
     <td><input type="text" name="username"/></td></tr>
   <tr>
     <td>Password:</td>
     <td><input type="password" name="passwd"/></td></tr>
   <tr>
     <td colspan="2" align="center">
     <input type="submit" class="SubmitButton" style="" value="Log in"/></td></tr>
   <tr>
 </table></form>
</center>
<?php
}

function display_admin_menu() {
?>
<div id="Navigation">
<ul class="topNav">
        <?php public_links(); ?> 
        
        &nbsp;
        <!--
        This is where Admin Pages go :)
           Admin:  
        <a href="Personal.php">Personal</a> 
        -->
</ul>
</div>
<?php
echo "<br /><br /><br />";
}

function display_user_menu() {
?>
<div id="Navigation">
<ul class="topNav">
        <?php public_links(); ?>  
</ul>
</div>
<?php
echo "<br /><br /><br />";
}

function display_public_menu() {
?>
<div id="Navigation">
<ul class="topNav">
        <?php public_links(); ?>
</ul>
</div>
<?php
echo "<br /><br /><br />";
}
function public_links() {
?>
        <a href="index.php">Log</a>    
        <a href="portfolio.php">Portfolio</a>  
        <a href="notesi.php">Notes</a>
        <a href="me.php">About Me</a>   
<?php
}

function display_button($target, $image, $alt) {
  /*echo "<div align=\"center\"><a href=\"".$target."\">
          <img src=\"images/".$image.".gif\"
           alt=\"".$alt."\" border=\"0\" height=\"50\"
           width=\"135\"/></a></div>";*/
    
    echo "<div align=\"center\"><a href=\"".$target."\">
          Edit Item</a></div>";
}

function display_form_button($image, $alt) {
  echo "<div align=\"center\"><input type=\"image\"
           src=\"images/".$image.".gif\"
           alt=\"".$alt."\" border=\"0\" height=\"50\"
           width=\"135\"/></div>";
}

?>
