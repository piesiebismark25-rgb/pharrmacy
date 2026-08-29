<?php
/**
 * Custom PSR-4 Autoloader
 *
 * Automatically resolves and loads PHP class files based on their namespaces,
 * mimicking Composer's autoloading mechanism.
 *
 * Example: App\Core\Database -> app/Core/Database.php
 */

spl_autoload_register(function ($class) {
    // Define the namespace prefix we are looking for
    $prefix = 'App\\';

    // Map the prefix to the base directory of our application
    // Since this autoload.php file is in /app, the base directory is this folder itself.
    $base_dir = __DIR__ . '/';

    // Check if the class uses our registered namespace prefix
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // The class does not use the 'App\' prefix, pass it to other autoloaders
        return;
    }

    // Extract the relative class name (remove the prefix 'App\')
    $relative_class = substr($class, $len);

    // Convert namespace separators (\) to directory separators (/)
    // and append the '.php' file extension
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // If the file exists, include/require it once
    if (file_exists($file)) {
        require_once $file;
    }
});
