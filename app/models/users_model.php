<?php
    class UsersModel {
        public function createUser($username, $email, $password) {
            try {
                // Default values:
        
                // Check if the username already exists in the database
                if ($this->isUsernameExists($username)) {
                    throw new Exception("The provided username is already taken.");
                }
                
                // Check if the email already exists in the database
                if ($this->isEmailExists($email)) {
                    throw new Exception("The provided email is already registered.");
                }
        
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                // Connect to the database
                Database::connect();
        
                // Insert a new user
                $query = "INSERT INTO users (user_id, user_name, user_email, user_pw, user_tos_privacy_policy_date) VALUES (NULL, ?, ?, ?, NOW());";
                $statement = Database::$connection->prepare($query);
                if (!$statement) {
                    throw new Exception("Failed to prepare the user insertion: " . Database::$connection->error);
                }
                $bind_result = $statement->bind_param("sss", $username, $email, $hashed_password);
                if (!$bind_result) {
                    throw new Exception("Failed to bind parameters: " . $statement->error);
                }
                $execute_result = $statement->execute();
                if (!$execute_result) {
                    throw new Exception("Failed to execute the query: " . $statement->error);
                }
        
                // Get the user_id of the inserted user
                $user_id = $statement->insert_id;
        
                $statement->close();
        
                // Set up session for the logged-in user
                session_start();
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;
                $_SESSION['loggedIn'] = "yes";
        
                return true; // Successful insertion
        
            }  catch (Exception $e) {
                // Handle any exceptions
                echo "Error: user creating: " . $e->getMessage();
                return false;
            } finally {
                // Disconnect from the database
                Database::disconnect();
            }
        }

        private function isUsernameExists($username) {
            // Check if the given username already exists in the database
            Database::connect();
            $query = "SELECT COUNT(*) FROM users WHERE user_name = ?";
            $statement = Database::$connection->prepare($query);
            $statement->bind_param("s", $username);
            $statement->execute();
            $statement->bind_result($count);
            $statement->fetch();
            $statement->close();
            Database::disconnect();
            return $count > 0;
        }

        private function isEmailExists($email) {
            // Check if the given email already exists in the database
            Database::connect();
            $query = "SELECT COUNT(*) FROM users WHERE user_email = ?";
            $statement = Database::$connection->prepare($query);
            $statement->bind_param("s", $email);
            $statement->execute();
            $statement->bind_result($count);
            $statement->fetch();
            $statement->close();
            Database::disconnect();
            return $count > 0;
        }

        public function checkAndLogIn($username, $password){
            try {
                // Connect to the database
                Database::connect();
        
                // Check database connection
                if (Database::$connection->connect_error) {
                    throw new Exception("Database connection failed: " . Database::$connection->connect_error);
                }
                
                // Prepare statement
                $query = "SELECT user_id, user_pw FROM users WHERE user_name = ?";
                $statement = Database::$connection->prepare($query);
                if (!$statement) {
                    throw new Exception("Prepare statement failed: " . Database::$connection->error);
                }
                
                // Bind parameters
                $statement->bind_param("s", $username);
        
                // Execute statement
                if (!$statement->execute()) {
                    throw new Exception("Execute statement failed: " . $statement->error);
                }
                
                // Fetch result
                $statement->bind_result($user_id, $hashed_password);
                $statement->fetch();
                $statement->close();
                
                // Verify the password
                if (!password_verify($password, $hashed_password)) {
                    throw new Exception("Incorrect password.");
                }
                
                // Set up session for the logged-in user
                session_start();
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;
                $_SESSION['loggedIn'] = "yes";
                
                // Successful login
                return true;
                
            } catch (Exception $e) {
                // Handle any exceptions
                echo "Error: login failed: " . $e->getMessage();
                return false;
            } finally {
                // Disconnect from the database
                Database::disconnect();
            }
        }

    }
?>