<?php
declare(strict_types=1);

function get_email(object $db, string $email){
    $sql = "SELECT * FROM admin WHERE email = :email;";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}