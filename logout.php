<?php
// destroy the session if log out has been clicked.
session_start();
session_destroy();
header('Refresh:1; url=FileSharing.html');
echo 'You have been logged out.';
?>