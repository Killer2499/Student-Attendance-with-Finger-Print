<?php 
include("include/init.php");



if (isset($_POST['submit']))
   {
   
    $first_name = escape($_POST['first_name']);
    $last_name = escape($_POST['last_name']);
    $username = escape($_POST['username']);
    $email = escape($_POST['email']);
    $password = escape($_POST['password']);


            /*
             --------------------------------------
                  If somthing is empty
             --------------------------------------
            */

             if (empty($first_name)|| empty($last_name) || empty($username) || empty($email) || empty($password)) {
               $_SESSION['message'] = "One or more fields are empty";
               header("Location: signup.php?signup=empty");
               exit();

             }



          /*
           --------------------------------------
                If input characters are valid
           --------------------------------------
          */

            else
            {

                  if( !preg_match("/^[a-zA-Z]*$/u", $first_name) ||  !preg_match("/^[a-zA-Z]*$/u", $last_name))
                  {
                    $_SESSION['message'] = "Invalid Name";

                    header("Location: signup.php?signup=invalid");
                    exit();

                  }

                  else
                  {
                              /*
           --------------------------------------
                Check if email is valid
           --------------------------------  ------

          */
                          if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                            # code...
                            $_SESSION['message'] = "Invalid Email Address";

                            header("Location: signup.php?signup=EMAIL");
                            exit();

                          }

                          else
                          {
                            $sql = "select * from users where username = '$username'";
                            $result = query($sql);
                            $row = row_count($result);

                                if($row> 0)
                                {
                                  $_SESSION['message'] = "username already exist";
                                  header("Location: signup.php?signup=usertaken");
                                  exit();
                                }

                                else
                                {


                                  if($_POST['confirm_password'] != $password)
                                  {
                                  $_SESSION['message'] = "Password Unmatched";
                                  header("Location: signup.php?signup=usertaken");
                                  exit();
                                  }
                                  else
                                  {
                                                        /*
                                           --------------------------------------
                                               Password Hashing
                                           --------------------------------------

                                          */

                                  $hashpwd = password_hash($password,PASSWORD_DEFAULT);

                                               /*
                                           --------------------------------------
                                               Inserting User into Database
                                           --------------------------------------

                                          */
                                    $sql  = "insert into users (first_name,last_name,username,email,password) values('$first_name','$last_name','$username','$email','$hashpwd')";

                                    $result = query($sql);
                                    $_SESSION['message'] = "User added successfully.";
                                    header("Location: signup.php?signup=success");
                                    exit();
                                }
                              }
                          }
                  }

            }

    
              
    $profilepic=$_FILES['profilepic'];
    $profilepic_Name=$_FILES['profilepic']['name'];
    $profilepic_Type=$_FILES['profilepic']['type'];
    $profilepic_Error=$_FILES['profilepic']['error'];
    $profilepic_Size=$_FILES['profilepic']['size'];
    $profilepic_Temp=$_FILES['profilepic']['tmp_name'];

    $profilepic_Ext=explode('.',$profilepic_Name);
    $profilepic_Actualext=strtolower(end($profilepic_Ext));

    $allowed=array('jpg');

    if(in_array($profilepic_Actualext,$allowed)){
        if($profilepic_Error===0){
            if($profilepic_Size<1000000){
                $profilepic_Name_New='profile'.$username.'.'.$profilepic_Actualext;
                $profilepic_Destination='profilepic/'.$profilepic_Name_New;
                move_uploaded_file($profilepic_Temp,$profilepic_Destination);
                $dbc=mysqli_connect('localhost','root','','studentatt');
                $query="UPDATE add_student Set image =1 where Name='$username'";
                $result=mysqli_query($dbc,$query);
                                  
            }
            else{
                echo 'The file is too big to upload';
            }

        }
        else{
            echo 'Something went wrong during uploading';
        }

    }
    else{
        echo 'You cannot upload files of this type';
    }
    
    

    }

    else
    {
      header("Location: signup.php");
      exit();
    }



 ?>