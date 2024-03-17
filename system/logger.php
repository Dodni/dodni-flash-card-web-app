<?php 
class Logger {
    public static function logError($message) {
        // Dátum és idő hozzáadása a naplózáshoz
        $timestamp = date('Y-m-d H:i:s');
        $logMessage = "[{$timestamp}] Error: {$message}\n";

        // Naplózás a fájlba
        file_put_contents('error_log.txt', $logMessage, FILE_APPEND);
    }
}
?>