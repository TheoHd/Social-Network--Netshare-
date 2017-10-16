<?php   
        $allowedExts = array("jpg", "jpeg", "gif", "png", "bmp"); 
        $extension = end(explode(".", $_FILES["file"]["name"])); 
        echo $_FILES["file"]["size"]; 
         
        if ( 
            ( 
            ($_FILES["file"]["type"] == "image/gif") 
            || ($_FILES["file"]["type"] == "image/jpeg") 
            || ($_FILES["file"]["type"] == "image/png") 
            || ($_FILES["file"]["type"] == "image/pjpeg") 
            ) 
            && ($_FILES["file"]["size"] < 2000000) 
            && in_array($extension, $allowedExts)) 
          { 
     
     
         if ($_FILES["file"]["error"] > 0) 
                { 

                    echo "Return Code: " . $_FILES["file"]["error"] . "<br />"; 

                } else { 

                    echo "Upload: " . $_FILES["file"]["name"] . "<br />"; 
                    echo "Type: " . $_FILES["file"]["type"] . "<br />"; 
                    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />"; 
                    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />"; 
                 
                    if (file_exists("avatar/" . $_FILES["file"]["name"])) { 
                      echo $_FILES["file"]["name"] . " already exists. "; 
                    } else { 
                      move_uploaded_file($_FILES["file"]["tmp_name"], 
                      "avatar/" . $_FILES["file"]["name"]); 
                      echo "Stored in: " . "upload/" . $_FILES["file"]["name"]; 
                    } 
                } 

          }    else { 
     
            echo $_FILES["file"]["type"]."<br />"; 
              echo "Invalid file"; 

          } 

     
     
     
     
?> 

<!DOCTYPE html > 
<html> 

    <head> 

        <title>HTML Template</title> 

    </head> 

    <body> 
     
        <form action="" method="post" enctype="multipart/form-data"> 
            <label for="file">Filename:</label> 
            <input type="file" name="file" id="file" />  
            <br /> 
            <input type="submit" name="submit" value="Submit" /> 
        </form> 

    </body> 
</html>