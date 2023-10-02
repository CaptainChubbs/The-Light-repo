<?php

class Nurse
{
    public function checkUser($data = array())
    {
        include "connect.php";
        if (!empty($data)) {
            // Check whether the user already exists in the database 
            $checkQuery = "SELECT * FROM nurse WHERE oAuthProvider = '" . $data['oAuthProvider'] . "' AND oAuthId = '" . $data['oAuthId'] . "'";
            $checkResult = $con->query($checkQuery);

            // Add modified time to the data array 
            if (!array_key_exists('modifiedAt', $data)) {
                // $data['modifiedAt'] = date("Y-m-d H:i:s");
                echo "User exists";
            }

            if ($checkResult->num_rows > 0) {
                // Prepare column and value format 
                echo "User exists";
                // $colvalSet = '';
                // $i = 0;
                // foreach ($data as $key => $val) {
                //     $pre = ($i > 0) ? ', ' : '';
                //     $colvalSet .= $pre . $key . "='" . $con->real_escape_string($val) . "'";
                //     $i++;
                // }
                // $whereSql = " WHERE oAuthProvider = '" . $data['oAuthProvider'] . "' AND oAuthId = '" . $data['oAuthId'] . "'";

                // // Update user data in the database 
                // $query = "UPDATE nurse SET " . $colvalSet . $whereSql;
                // $update = $con->query($query);
            } else {
                // Add created time to the data array 
                // if (!array_key_exists('created', $data)) {
                //     $data['createdAt'] = date("Y-m-d H:i:s");
                // }

                // Prepare column and value format 
                $columns = $values = '';
                $i = 0;
                foreach ($data as $key => $val) {
                    $pre = ($i > 0) ? ', ' : '';
                    $columns .= $pre . $key;
                    $values  .= $pre . "'" . $con->real_escape_string($val) . "'";
                    $i++;
                }

                // Insert user data in the database 
                $query = "INSERT INTO nurse (" . $columns . ") VALUES (" . $values . ")";
                $insert = $con->query($query);
            }

            // Get user data from the database
            $result = $con->query($checkQuery);
            $userData = $result->fetch_assoc();
        }

        // Return user data 
        return !empty($userData) ? $userData : false;
    }
}
