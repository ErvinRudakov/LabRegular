<?php
session_start();
echo '<a href="index.php">Back</a>';
echo "<p>Surname: {$_SESSION['surname']}</p>";
echo "<p>Name: {$_SESSION['name']}</p>";
echo "<p>Age: {$_SESSION['age']}</p>";