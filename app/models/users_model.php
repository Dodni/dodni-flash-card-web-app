<?php
class UsersModel {
    public function createUser($username, $email, $password) {
        try {
            $user_tos_privacy_policy = 'Y';
            $user_activated = 'N';

            // pw hashing
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            // Connect to the database
            Database::connect();

            // Insert a new user
            $query = "INSERT INTO users (user_id, user_name, user_email, user_pw, user_tos_privacy_policy, user_tos_privacy_policy_date, user_activated) VALUES (NULL, ?, ?, ?, ?, NOW(), ?);";
            $statement = Database::$connection->prepare($query);
            if (!$statement) {
                throw new Exception("A felhasználó beszúrásának előkészítése sikertelen volt: " . Database::$connection->error);
            }
            $bind_result = $statement->bind_param("sssss", $username, $email, $hashed_password, $user_tos_privacy_policy, $user_activated);
            if (!$bind_result) {
                throw new Exception("A bind_param hívása sikertelen volt: " . $statement->error);
            }
            $execute_result = $statement->execute();
            if (!$execute_result) {
                throw new Exception("A lekérdezés végrehajtása sikertelen volt: " . $statement->error);
            }

            $statement->close();

            return true; // Sikeres beszúrás

        }  catch (Exception $e) {
            // Kezeljük az esetleges kivételeket
            echo "Hiba: felhasználó létrehozása: " . $e->getMessage();
            return false;
        } finally {
            // Kapcsolat bontása az adatbázissal
            Database::disconnect();
        }
    }    
}
?>
