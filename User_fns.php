<?php


function get_Username($Username, $Where) {
   // query database for the name for a category id
   $conn = db_connect();
   

   
   
   $query = "SELECT DISTINCT sc.UserName
FROM Users2 sc
WHERE NOT EXISTS(
    SELECT * FROM Users2 sc2 
    WHERE sc2.UserName = '".$Where."')";
   
   $result = @$conn->query($query);

   $row = $result->fetch_object();
   return $row->UserName;
}


function get_Users() {


   $conn = db_connect();
   $query = "SELECT UserName, Name, Addr, Email, IsAdmin, LLogin FROM Users2
UNION
SELECT Username, Name, Addr, Email, IsAdmin, LLogin FROM Users2 WHERE IsAdmin = TRUE";
              
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_books = @$result->num_rows;
   if ($num_books == 0) {
      return false;
   }
   //$result = db_result_to_array($result);
   return $result;
}



function get_log_entries() {
   

   $conn = db_connect();
   $query = "select * from LOG order by LOGID desc"; // This needs to be expandable in the future
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_books = @$result->num_rows;
   if ($num_books == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}

function get_dj_blog_entries() {
   

   $conn = db_connect();
   $query = "select * from DJBLOG order by DJBlogID"; // This needs to be expandable in the future
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_books = @$result->num_rows;
   if ($num_books == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}

function get_bp() {
   

   $conn = db_connect();
   $query = "select * from BLOODPRESSURE order by BPID desc"; // This needs to be expandable in the future
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_books = @$result->num_rows;
   if ($num_books == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}

function get_automotive() {
   

   $conn = db_connect();
   $query = "select * from AUTOMOTIVE order by Submission desc"; // This needs to be expandable in the future
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_books = @$result->num_rows;
   if ($num_books == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}

function get_weight() {
   

   $conn = db_connect();
   $query = "select * from WEIGHT order by Submission desc"; // This needs to be expandable in the future
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_books = @$result->num_rows;
   if ($num_books == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}

function get_note_entries() {
   

   $conn = db_connect();
   $query = "select * from NOTES order by NoteID desc"; // This needs to be expandable in the future
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_books = @$result->num_rows;
   if ($num_books == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}

function get_improved_note_entries($Category) {
   
   $conn = db_connect();
   if((!$Category == null)){
        $query = "select * from NOTESI where Category='".$Category."' order by NoteID desc"; // This needs to be expandable in the future
    }else{
         $query = "select * from NOTESI";
    }
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_books = @$result->num_rows;
   if ($num_books == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}


function get_dj_entries() {
   

   $conn = db_connect();
   $query = "select * from DJLIST order by Lname desc"; // This needs to be expandable in the future
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_books = @$result->num_rows;
   if ($num_books == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}

function get_movie_night_entries() {


   $conn = db_connect();
   $query = "select * from MOVIENIGHT order by Letter"; // This needs to be expandable in the future
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_books = @$result->num_rows;
   if ($num_books == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}

function get_request_entries() {


   $conn = db_connect();
   $query = "select * from REQUESTS order by RequestID desc"; // This needs to be expandable in the future
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_books = @$result->num_rows;
   if ($num_books == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}

function get_media_library_entries() {
   

   $conn = db_connect();
   $query = "select * from MEDIALIBRARY order by Submission";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_books = @$result->num_rows;
   if ($num_books == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}


function get_portfolio_projects(){
   

   $conn = db_connect();
   $query = "select * from Portfolio";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_books = @$result->num_rows;
   if ($num_books == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}

function get_note_categories() {
   

   $conn = db_connect();
   $query = "select distinct Category from NOTESI"; // This needs to be expandable in the future
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_books = @$result->num_rows;
   if ($num_books == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}


function get_portfolio_categories() {
   

   $conn = db_connect();
   $query = "select distinct Category from PortfolioCategories"; // This needs to be expandable in the future
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_categories = @$result->num_rows;
   if ($num_categories == 0) {
      return false;
   }

   $result = db_result_to_array($result);
   return $result;

}

function get_portfolio_links_by_ID($PortID) {
   

   $conn = db_connect();
   $query = "select * from PortfolioLinks where PortID=".$PortID; // This needs to be expandable in the future
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_books = @$result->num_rows;
   if ($num_books == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}

function get_portfolio_photos_by_ID($PortID) {
   

   $conn = db_connect();
   $query = "select * from PortfolioPictures where PortID=".$PortID; // This needs to be expandable in the future
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_books = @$result->num_rows;
   if ($num_books == 0) {
      return false;
   }
   /*
   $result = db_result_to_array($result);
   return $result;
   */
   $result = @$result->fetch_assoc();
    return $result['PictureURL'];
}

function get_portfolio_categories_by_ID($PortID) {
   

   $conn = db_connect();
   $query = "select * from PortfolioCategories where PortID=".$PortID; // This needs to be expandable in the future
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_books = @$result->num_rows;
   if ($num_books == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}

function get_projects_by_category($category){
   $conn = db_connect();
   $query = "select PortID from PortfolioCategories where Category='".$category."'"; // This needs to be expandable in the future
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   
   $num_books = @$result->num_rows;
   if ($num_books == 0) {
      return false;
   }
    
    
   $result = db_result_to_array($result);

   return $result;
}


function get_log() {

  $conn = db_connect();
  $query = "select * from LOG order by LOGID desc limit 1";
  $result = @$conn->query($query);
  if (!$result) {
     return false;
  }
  $result = @$result->fetch_assoc();
  return $result;
}

function get_note_details($video) {

  $conn = db_connect();
  $query = "select * from NOTES where NoteID='".$video."'";
  $result = @$conn->query($query);
  if (!$result) {
     return false;
  }
  $result = @$result->fetch_assoc();
  return $result;
}

function get_project_name($PortID) {

  $conn = db_connect();
  $query = "select Title from Portfolio where PortID='".$PortID."'";
  $result = @$conn->query($query);
  if (!$result) {
     return false;
  }
  $result = @$result->fetch_assoc();
  return $result['Title'];
}

function get_project_sd($PortID) {

  $conn = db_connect();
  $query = "select ShortDescription from Portfolio where PortID='".$PortID."'";
  $result = @$conn->query($query);
  if (!$result) {
     return false;
  }
  $result = @$result->fetch_assoc();
  return $result['ShortDescription'];
}

function get_notei_details($video) {

  $conn = db_connect();
  $query = "select * from NOTESI where NoteID='".$video."'";
  $result = @$conn->query($query);
  if (!$result) {
     return false;
  }
  $result = @$result->fetch_assoc();
  return $result;
}

function get_dj_details($djid) {

  $conn = db_connect();
  $query = "select * from DJLIST where DJID='".$djid."'";
  $result = @$conn->query($query);
  if (!$result) {
     return false;
  }
  $result = @$result->fetch_assoc();
  return $result;
}

function get_day_schedule($weekday) {

  $conn = db_connect();
  $query = "select * from DJLIST where ShowDay='".$weekday."'";
  $result = @$conn->query($query);
  if (!$result) {
     return false;
  }
  $result = db_result_to_array($result);
  return $result;
}

function get_dj_lname($djid) {

  $conn = db_connect();
  $query = "select Lname from DJLIST where DJID='".$djid."'";
  $result = @$conn->query($query);
  if (!$result) {
     return false;
  }
  $result = @$result->fetch_assoc();
  return $result['Lname'];
}

function get_dj_fname($djid) {

  $conn = db_connect();
  $query = "select Fname from DJLIST where DJID='".$djid."'";
  $result = @$conn->query($query);
  if (!$result) {
     return false;
  }
  $result = @$result->fetch_assoc();
  return $result['Fname'];
}

function get_playlist_details($video) {

  $conn = db_connect();
  $query = "select * from PLAYLIST where PlaylistID='".$video."'";
  $result = @$conn->query($query);
  if (!$result) {
     return false;
  }
  $result = @$result->fetch_assoc();
  return $result;
}

function get_log_details($video) {

  $conn = db_connect();
  $query = "select * from LOG where LogID='".$video."'";
  $result = @$conn->query($query);
  if (!$result) {
     return false;
  }
  $result = @$result->fetch_assoc();
  return $result;
}

function get_portfolio_details($video) {

  $conn = db_connect();
  $query = "select * from Portfolio where PortID='".$video."'";
  $result = @$conn->query($query);
  if (!$result) {
     return false;
  }
  $result = @$result->fetch_assoc();
  return $result;
}

function get_bp_details($video) {

  $conn = db_connect();
  $query = "select * from BLOODPRESSURE where BPID='".$video."'";
  $result = @$conn->query($query);
  if (!$result) {
     return false;
  }
  $result = @$result->fetch_assoc();
  return $result;
}
