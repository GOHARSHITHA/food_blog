<?php

    $db=mysqli_connect('localhost','root','','blog');
    $title=$_POST['title'];
    $content=$_POST['content'];
    #$filename=$_FILES['img']['name'];
    $target = "../images/";
    $file_type = strtolower(pathinfo($_FILES['img']['name'],PATHINFO_EXTENSION));
    $target_file = $target.basename(md5("goharshitha".$_FILES['img']['name']).".".$file_type);
    $file=md5("goharshitha".$_FILES['img']['name']).".".$file_type;
    if($file_type=="png" || $file_type=="jpg" || $file_type=="jpeg"){
        if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file)){
            $sql=mysqli_query($db,"INSERT INTO `blog`(`title`, `content`, `image`) VALUES ('$title','$content','$file')");
            if($sql){
                echo"success!!";
            }
            else{
                echo"Try Once Again!";
            }
        }
        else{
            echo"Image not moved!";
        }
    }
    else{
        echo"Image not accepted!!";
    }

?>