<?php

class AjaxCrud
{
    private $host = "localhost";
    private $user = "root";
    private $db = "school";
    private $pass = "";
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
    }

    public function showData($table)
    {
        $sql = "SELECT * FROM `$table`";
        $q = $this->conn->query ($sql) or die("failed!");
        while ($row = mysqli_fetch_assoc ($q)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getById($addid, $table)
    {
        $sql = "SELECT * FROM $table WHERE add_id = $addid";
        $q   = $this->conn->query ($sql);
        $row = mysqli_fetch_assoc ($q);
        return $row;
    }

    public function UserUpdate($id, $name, $fname, $mname, $gender, $bdate, $roll, $blood, $religion, $adclass, $sec, $phone, $address, $image, $table)
    {
        $sql = "UPDATE `sms_student` SET `name` =$name WHERE `add_id`='$id '";
        $this->conn->query ($sql);
        return true;

    }

    public function insertData($name, $fname, $mname, $gender, $birthdate, $contact, $address, $blood, $religion,  $admitclass, $section, $roll, $regiid, $admitdate, $newname, $table)
    {
        $sql = "INSERT INTO `$table` (`name`, `fname`, `mname`, `gender`, `birthdate`, `contact`, `address`, `blood`, `religion`, `admitclass`, `section`, `roll`, `registartionid`, `admitdate`, `studentimage`)";
        $sql .= "VALUES ('$name','$fname','$mname','$gender','$birthdate','$contact','$address','$blood','$religion','$admitclass','$section','$roll','$regiid','$admitdate','$newname')";
        $this->conn->query ($sql);
    }

    public function deleteData($id, $table)
    {
        $sql = "DELETE FROM $table WHERE `id` = '$id'";
        $this->conn->query ($sql);
    }
}

?>
