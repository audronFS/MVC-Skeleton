
<?php

//Register function defined in the User class.
//This will be a 'create' function as it will be inserting a user's details into the Blogger table in the database.
//This function & insert query has been connected to the HTML registeration form and tested to see if a user can register successfully.
//For logins/logouts: will require a different query & sessions
//*If Blogger is logged in, set to True
//*If not, set to False
//if $_SESSION is true, make sure they see this on the navbar
////i.e. if (ISSET($_SESSION['blogger']))
//if $_SESSION is false, make sure they see this on the navbar
//Layout.php?
//You can choose what to show in that session

class User {

    // we define attributes 
    private $bloggerID;
    private $firstname;
    private $lastname;
    private $username;
    private $email;
    private $hashcode;
    private $datejoined;
    private $profilephoto;
    private $aboutme;

    public function __construct($firstname, $lastname, $username, $email, $hashcode, $datejoined, $profilephoto, $aboutme) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->username = $username;
        $this->email = $email;
        $this->hashcode = $hashcode;
        $this->datejoined = $datejoined;
        $this->profilephoto = $profilephoto;
        $this->aboutme = $aboutme;
    }

    public static function Register() {
        $db = Db::getInstance();
        $req = $db->prepare("Insert into Blogger(BloggerID, FirstName, LastName, Username, Email, Hashcode, DateJoined, AboutMe) values (:BloggerID, :FirstName, :LastName, :Username, :Email, :Hashcode, :DateJoined, :AboutMe)");
        $req->bindParam(':BloggerID', $bloggerID);
        $req->bindParam(':FirstName', $firstname);
        $req->bindParam(':LastName', $lastname);
        $req->bindParam(':Username', $username);
        $req->bindParam(':Email', $email);
        $req->bindParam(':Hashcode', $hashcode);
        $req->bindParam(':DateJoined', $datejoined);
        //$req->bindParam(':ProfilePhoto', $profilephoto);
        $req->bindParam(':AboutMe', $aboutme);


// set parameters and execute
        if (isset($_POST['FirstName']) && $_POST['FirstName'] != "") {
            $filteredFirstName = filter_input(INPUT_POST, 'FirstName', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['LastName']) && $_POST['LastName'] != "") {
            $filteredLastName = filter_input(INPUT_POST, 'LastName', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['Username']) && $_POST['Username'] != "") {
            $filteredUsername = filter_input(INPUT_POST, 'Username', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['Email']) && $_POST['Email'] != "") {
            $filteredEmail = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        if (isset($_POST['Hashcode']) && $_POST['Hashcode'] != "") {
            $filteredHashcode = filter_input(INPUT_POST, 'Hashcode', FILTER_SANITIZE_SPECIAL_CHARS);
        }
//        if (isset($_POST['DateJoined']) && $_POST['DateJoined'] != "") {
//            $filteredDateJoined = filter_input(INPUT_POST, 'DateJoined', FILTER_SANITIZE_SPECIAL_CHARS);
//        }
      if (isset($_POST['AboutMe']) && $_POST['AboutMe'] != "") {
            $filteredAboutMe = filter_input(INPUT_POST, 'AboutMe', FILTER_SANITIZE_SPECIAL_CHARS);
             $aboutme = $filteredAboutMe;  
        }else{$aboutme=null;}

        $firstname = $filteredFirstName;
        $lastname = $filteredLastName;
        $username = $filteredUsername;
        $email = $filteredEmail;
        $hashcode = $filteredHashcode;
        $datejoined = date("Y-m-d");
        //$profilephoto = User::uploadFile($firstname);
        //$aboutme = $filteredAboutMe;
        $req->execute();
//
////upload product image
//        User::uploadFile($firstname); //? what to change to?
    }


    public static function login() { 
        $db = Db::getInstance();
        $req = $db->prepare("SELECT * FROM blogger WHERE Username = :Username AND Hashcode = :Hashcode LIMIT 1");
        $login = htmlentities(addslashes($_POST['Username']));
	$hashcode = htmlentities(addslashes($_POST['Hashcode']));
        $req->bindValue(":Username", $login);
        $req->bindValue(":Hashcode", $hashcode);
        $req->execute();
        
        $register_number=$req->rowCount();
        return $register_number;
        
    }
    public static function logout(){
        session_unset();
        session_destroy();
    }

//
////check for num rows
//        if ($req->num_rows > 0) {
//            //success
//            $req->close();
//            return true;
//        } else {
//            //failure
//            $req->close();
//            return false;
//        } else {
//            die("Error! Could not log in");
//        }
//    }
//
//    public function logout() {
//        session_destroy();
//        session_start();
//    }

       

 
    
    
    
}

//Functions we may need if we create an admin user, or if we decide to make our current blogger a normal blogger user as well as an admin with a range of powers over the blog:
//*All users
//*Find users
//*Add users
//*Update users
//*Remove users
?>
