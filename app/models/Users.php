<?php 

/**
 * models/Users.php - Users model
 * Basic profile data
 */

/* Namespace */
namespace App\Models;

/* Alias */
use PDO;

/**
 * User Model
 */
class User
{
    /* Variables */
    protected $id;
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $password;
    // Allows manipulation of database:
    protected $dbh;

    /**
     * Constructor
     */
    public function __construct($id, $firstname, $lastname, $email, $password, $dbh) {
        /* Sanitise the data */
        $this->id = $id;
        $this->firstname = filter_var($firstname, FILTER_SANITIZE_STRING);
        $this->lastname = filter_var($lastname, FILTER_SANITIZE_STRING);
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $this->password = filter_var($password, FILTER_SANITIZE_STRING);
        $this->dbh = $dbh;
    }  

    /**
     * Get
     */
    public function __get($property)
    {
        if ($property !== "dbh") {
            return $this->$property;
        }
    }

    /**
     * Set
     */
    public function __set($property, $value)
    {
        if ($property !== "dbh") {
            $this->$property = $value;
        }
    }

    /**
     * Insert into database
     */
    public function insert()
    {
        $query = $this->dbh->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (?,?,?,?)");
        return $query->execute([
            $this->firstname, 
            $this->lastname, 
            $this->email, 
            $this->password
        ]);
    }
    
    /**
     * Get the user data by email
     */
    public static function fetchByEmail($dbh, $email)
    {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        $query = $dbh->prepare("SELECT * FROM user WHERE email=?");
        $query->execute([$email]);

        $user = $query->fetch();
        var_dump($user);

        // return false if no user
        if (!$user) { 
            return false; 
        }
        
        return new User($user["id"], $user["firstname"], $user["lastname"], $user["email"], $user["password"]);
    }

}