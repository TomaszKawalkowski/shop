<?php


class User
{
    static private $conn;
    private $id;
    private $first_name;
    private $last_name;
    private $address;
    private $email;


    public static function setConnection(mysqli $db)
    {
        self::$conn = $db;

    }


    public static function register($first_name, $last_name, $email, $password, $password2, $address)
    {
        if ($password != $password2) {
            return false;
        }
        if (($last_name || $email || $password || $password2) == null) {
            return false;
        }
        $hashedpassword = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (first_name, last_name, email, password, address) VALUES ('$first_name', '$last_name', '$email', '$hashedpassword', '$address')";

        $re = self::$conn->query($sql);

        if ($re == true) {
            $newId = self::$conn->insert_id;
            $newUser = new User($newId, $first_name, $last_name, $email, $address);
            return $newUser;

        }
        echo self::$conn->error;

        return false;
    }

    static public function logIn($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $re = self::$conn->query($sql);
        if ($re->num_rows == 1) {
            if ($re == true) {
                if ($re->num_rows == 1) {
                    $row = $re->fetch_assoc();
                    if (password_verify($password, $row["password"])) {
                        $loggedUser = new User($row['id'], $row["first_name"], $row["last_name"], $row["email"], $row["address"]);
                        return $loggedUser;
                    }
                    return false;
                }
            }
        }
    }


    public
    function __construct($id, $first_name, $last_name, $email, $address)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->address = $address;

    }

    public static
    function editUser($first_name, $last_name, $email, $address)
    {
        $sql = "UPDATE users SET

        first_name = '$first_name',
        last_name = '$last_name',
        address = '$address'
        WHERE email = '$email'";
        $re = self::$conn->query($sql);

        if ($re == true)
            $sql = "SELECT * FROM users WHERE email = '$email'";
        $re = self::$conn->query($sql);
        if ($re->num_rows == 1) {
            if ($re == true) {
                if ($re->num_rows == 1) {
                    $row = $re->fetch_assoc();

                    $loggedUser = new User($row['id'], $row["first_name"], $row["last_name"], $row["email"], $row["address"]);
                    return $loggedUser;
                }
                return false;
            }
        }
    }


    public
    function getEmail()
    {
        return $this->email;
    }

    public
    function getFirstName()
    {
        return $this->first_name;
    }

    public
    function getLastName()
    {
        return $this->last_name;
    }

    public
    function getAddress()
    {
        return $this->address;
    }


}