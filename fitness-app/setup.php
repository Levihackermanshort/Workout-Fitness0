<?php

// Database setup script
echo "Setting up Fitness Journal Database...\n";

try {
    // Try to connect using PDO (more commonly available than mysqli)
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    
    // Create database if it doesn't exist
    $pdo->exec("CREATE DATABASE IF NOT EXISTS fitness_journal_db");
    $pdo->exec("USE fitness_journal_db");
    
    // Read SQL file
    $sql = file_get_contents(__DIR__ . '/database/fitness_journal_db.sql');
    
    // Split into individual queries
    $queries = array_filter(array_map('trim', explode(';', $sql)));
    
    foreach ($queries as $query) {
        if ($query === '' || preg_match('/^--/', $query)) {
            continue;
        }
        try {
            $pdo->exec($query);
        } catch (PDOException $e) {
            // Ignore errors for existing tables/constraints
            if (strpos($e->getMessage(), 'already exists') === false && 
                strpos($e->getMessage(), 'Duplicate') === false) {
                throw new Exception('Query failed: ' . $e->getMessage());
            }
        }
    }
    
    $pdo = null;
    
    echo "Database setup completed successfully!\n";
    echo "Sample data has been inserted.\n";
    echo "\nTest credentials:\n";
    echo "Username: john_doe, Password: password123\n";
    echo "Username: jane_smith, Password: password123\n";
    echo "Username: mike_j, Password: password123\n";
    echo "Username: sarah_w, Password: password123\n";
    echo "Username: david_b, Password: password123\n";
    
} catch (PDOException $e) {
    echo "Error setting up database: " . $e->getMessage() . "\n";
} catch (Exception $e) {
    echo "Error setting up database: " . $e->getMessage() . "\n";
}
