<?php
session_start();
session_destroy();
header('Location: ../'); // Redirect to the homepage or login page
exit();
