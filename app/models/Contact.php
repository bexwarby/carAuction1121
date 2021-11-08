<?php

/**
 * models/Contact.php - Contact model
 * Ables contact form data to be sent to the database.
 */

/* Namespace */
namespace App\Models;

/* Alias */
use PDO;

/**
 * Contact Model
 */
class Contact
{

    /* Variables */
    protected $id;
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $phone;
    protected $message;
    // Allows manipulation of database:
    protected $dbh;

    /**
     * Constructor
     */
    public function __construct($id, $firstname, $lastname, $email, $phone, $message, $dbh)
    {
        /* Sanitise the data */
        $this->id = $id;
        $this->firstname = filter_var($firstname, FILTER_SANITIZE_STRING);
        $this->lastname = filter_var($lastname, FILTER_SANITIZE_STRING);
        $this->email = filter_var($email, FILTER_SANITIZE_STRING);
        $this->phone = filter_var($phone, FILTER_SANITIZE_STRING);
        $this->message = filter_var($message, FILTER_SANITIZE_STRING);
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
        $query = $this->dbh->prepare("INSERT INTO contact (firstname, lastname, email, phone, message) VALUES (?,?,?,?,?)");
        return $query->execute([
            $this->firstname, 
            $this->lastname, 
            $this->email, 
            $this->phone, 
            $this->message
        ]);
    }

}
