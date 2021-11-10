<?php 

/**
 * models/Users.php - Users model
 * Basic profile data
 */

/* Namespace */
namespace App\Models;

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
     * Get methods
     */
    public function getFirstname() { return $this->firstname; }
    public function getLastname() { return $this->lastname; }
    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->password; }

    /**
     * Set methods
     */
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * Constructor
     */
    public function __construct($id, $firstname, $lastname, $email, $password, $dbh) {
        /* Sanitise the data */
        $this->id = $id;
        $this->firstname = filter_var($firstname, FILTER_SANITIZE_STRING);
        $this->lastname = filter_var($lastname, FILTER_SANITIZE_STRING);
        $this->email = filter_var($email, FILTER_SANITIZE_STRING);
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
    public static function fetchByEmail($dbh)
    {
        // NEEDS UPDATING TO BE FOR ONE SPECIFIC USER
        // Sanitise car ID
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        // Prepare the DB and execute the query
        $query = $dbh->prepare("SELECT * FROM user WHERE email = ?");
        $results = $query->execute([$email])->fetchAll(PDO::FETCH_ASSOC);
        // create the instance
        $user = new Car(
            $result["id"], 
            $result["firstname"], 
            $result["lastname"], 
            $result["email"], 
            $result["password"], 
            $dbh
        )
            );
        }

        return $user;
    }

}