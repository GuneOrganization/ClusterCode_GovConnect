<?php

include_once 'connection.php';

class Validation
{

    public static function isValidUser($nic)
    {
        $resultSet = Database::search("SELECT * FROM user u
            INNER JOIN user_status s ON u.user_status_id = s.id
            WHERE nic='{$nic}'  AND s.status='Active'");
        if ($resultSet->num_rows != 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function isValidUserWithRole($nic, $userRole)
    {

        $resultSet = Database::search("SELECT * FROM user u
            INNER JOIN user_role r ON u.user_role_id = r.id
            INNER JOIN user_status s ON u.user_status_id = s.id
            WHERE nic='{$nic}' AND r.role='{$userRole}' AND s.status='Active'");

        if ($resultSet->num_rows != 0) {
            return true;
        } else {
            return false;
        }
    }

    
}
