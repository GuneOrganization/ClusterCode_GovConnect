<?php

    // Test Url
    // http://localhost/ClusterCode_GovConnect/backend/loadSampleSession.php

    session_start();
    require 'connection.php';

    try{
        $resultSet = Database::search("SELECT * FROM user WHERE nic = '200127804509'");
        $_SESSION["user"] = $resultSet->fetch_assoc();
        echo("Success");
    }catch(Exception $e){
        echo($e->getMessage());
    }

?>