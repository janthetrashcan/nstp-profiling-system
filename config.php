<?php
// config.php - Place this in your www directory

// Check if npm run dev is running
function isNpmRunning() {
    if (PHP_OS === 'Windows') {
        exec('tasklist /FI "IMAGENAME eq node.exe" /FO CSV', $output);
        return count($output) > 1; // More than 1 line means node is running
    }
    return false;
}

// If npm isn't running, start it
if (!isNpmRunning()) {
    if (PHP_OS === 'Windows') {
        pclose(popen('start /B npm run dev', 'r'));
    }
}

// Continue with your Laravel application
require_once __DIR__ . '/public/index.php';
