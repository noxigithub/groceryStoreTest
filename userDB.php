<?php

require_once('db.php');

    class USER_DB extends DatabaseClass {


        public function login($username, $password){

            $db = new DatabaseClass();

            $query = 'SELECT * FROM USERS WHERE userName = ?';

            $userInfo = $db->SelectRecord($query,[$username]);


            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            //password_verify($password, $userInfo[0]['pass'])

            if ($userInfo && $password ==$userInfo[0]['pass']) {

               
                // username and password are valid, create session
                $_SESSION['username'] = $username;
        
                // redirect to dashboard
                header("Location: index.php");
                exit;
            } else {
      
                $_SESSION['error'] = "Invalid username or password.";
            }
                // username or password is invalid, display error message
              
        }

        public function registration($username,$userpassword,$name,$rol){

            $db = new DatabaseClass(); 

            $query = "INSERT INTO USERS(username, pass, name, user_rol ) VALUES (?,?,?,?)";

            $inserted = $db->Insert($query,[$username,$userpassword,$name,$rol]);

            if($inserted == "RECORD SAVED"){
                header("Location: userForm.php");
            }else{
                $_SESSION['error'] = "No se pude registrar el usuario $inserted";
            }
        }

            
            
            
        


    }


?>