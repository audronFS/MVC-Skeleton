
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
//Functions we may need if we create an admin user, or if we decide to make our current blogger a normal blogger user as well as an admin with a range of powers over the blog:
//*All users
//*Find users
//*Add users
//*Update users
//*Remove users

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
        } else {
            $aboutme = null;
        }

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

        $register_number = $req->rowCount();
        return $register_number;
    }

    public static function logout() {
        session_unset();
        session_destroy();
    }

//    public function logout() {
//        session_destroy();
//        session_start();
//    }

    
    //Original query in fetch.php
    public static function search() {
        $connect = mysqli_connect("localhost", "root", "", "pets"); //database connection
        $output = '';

        if (isset($_POST["query"])) {
            $search = mysqli_real_escape_string($connect, $_POST["query"]); //This function is used to create a legal SQL string that you can use in an SQL statement. 
            //The given string is encoded to an escaped SQL string, taking into account the current character set of the connection.
            //This is good to use and avoids sql injection
            $query = "
  SELECT * FROM blogpost
  WHERE BlogPostName LIKE '%" . $search . "%'
  OR BlogPostSubName LIKE '%" . $search . "%' 
  OR BlogPostContent LIKE '%" . $search . "%' 

 "; //MySQL query with placeholders
//} else {
//    $query = "
//  SELECT * FROM blogpost ORDER BY BlogPostName
// ";
        }
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Title </th>
     <th>Subtitle</th>
     <th>Blog Post</th>
     <th></th>
     <th></th>
    </tr>
 ';
            while ($row = mysqli_fetch_array($result)) {//while the function is fetching the array, display the title, date published, quantity in stock of the page.
                $output .= '
   <tr>
    <td>' . $row["BlogPostName"] . '</td>
    <td>' . $row["BlogPostSubName"] . '</td>
    <td>' . $row["BlogPostContent"] . '</td>

   </tr>
  ';
            }
            echo $output;
        } else {
            echo 'Blog post not found.';
        }
    }

    
    //2nd attempt: trying to make the function work with PDO DB connection
    
//    public static function search() {
//        $list = [];
//        $db = Db::getInstance();
//        $search = ($_POST["query"]);
//        
//        if (isset($_POST["query"])) {
//        $req = $db->query("SELECT * FROM blogpost
//        WHERE BlogPostName LIKE '%" . $search . "%'
//         OR BlogPostSubName LIKE '%" . $search . "%' 
//         OR BlogPostContent LIKE '%" . $search . "%' 
//         OR BlogPostPhoto LIKE '%" . $search . "%'");
//        }
//        // we create a list of blogposts objects from the database results
//        foreach ($req->fetchAll() as $rows) {
//            $list[] = new BlogPost($blogpost['BloggerID'], $blogpost['PetTypeID'], $blogpost['CategoryID'], $blogpost['BlogPostID'], $blogpost['BlogPostName'], $blogpost['BlogPostSubName'], $blogpost['BlogPostContent'], $blogpost['BlogPostPhoto'], $blogpost['DatePosted']);
//            //$petTypeID['PetTypeID'],$categoryID['CategoryID '],
//        }
//        return $list;
//        
//         if ($req->rowCount() > 0) {
//            $output .= '
//  <div class="table-responsive">
//   <table class="table table bordered">
//    <tr>
//     <th>Title </th>
//     <th>Subtitle</th>
//     <th>Blog Post</th>
//     <th>Photo</th>
//
//     <th></th>
//     <th></th>
//    </tr>
// ';
//            foreach ($list as $row) {//while the function is fetching the array, display the title, date published, quantity in stock of the page.
//                $output .= '
//   <tr>
//    <td>' . $row["BlogPostName"] . '</td>
//    <td>' . $row["BlogPostSubName"] . '</td>
//    <td>' . $row["BlogPostContent"] . '</td>
//    <td>' . $row["BlogPostPhoto"] . '</td>
//
//   </tr>
//  ';
//            }
//            echo $output;
//        } else {
//            echo 'Blog post not found.';
//        }
//    }
    
    
    //4th attempt- turning mysqli into PDO query
    
//public static function search () {
//    $db = Db::getInstance();
//    $req = $db->prepare("SELECT * FROM blogpost
//         WHERE BlogPostName LIKE '%" . $search . "%'
//         OR BlogPostSubName LIKE '%" . $search . "%' 
//         OR BlogPostContent LIKE '%" . $search. "%'");
//        
//    $req->setFetchMode(PDO::FETCH_ASSOC);
//    $req->execute([':BlogPostName' => $blogPostName]);
//    $req->execute([':BlogPostSubName' => $blogPostSubName]);
//    $req->execute([':BlogPostContent' => $blogPostContent]);
//
//     foreach ($req->fetchAll() as $rows) {
//            $list[] = new BlogPost($blogpost['BloggerID'], $blogpost['PetTypeID'], $blogpost['CategoryID'], $blogpost['BlogPostID'], $blogpost['BlogPostName'], $blogpost['BlogPostSubName'], $blogpost['BlogPostContent'], $blogpost['BlogPostPhoto'], $blogpost['DatePosted']);   
//        }
//        return $list;
//        
//         if ($req->rowCount() > 0) {
//            $output .= '
//  <div class="table-responsive">
//   <table class="table table bordered">
//    <tr>
//     <th>Title </th>
//     <th>Subtitle</th>
//     <th>Blog Post</th>
//     <th></th>
//     <th></th>
//    </tr>
// ';
//            foreach ($list as $row) {//while the function is fetching the array, display the title, date published, quantity in stock of the page.
//                $output .= '
//   <tr>
//    <td>' . $row["BlogPostName"] . '</td>
//    <td>' . $row["BlogPostSubName"] . '</td>
//    <td>' . $row["BlogPostContent"] . '</td>
//
//   </tr>
//  ';
//            }
//            echo $output;
//        } else {
//            echo 'Blog post not found.';
//        }
//    }


    

    
} //closing tag



//$statement = $pdo_conn->prepare($query);
//$statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
//$statement->execute();
//if(!$statement->rowCount()){
////if the results is null
//echo "no result found";
//}else{
//$result = $statement->fetchAll();
//}

?>
