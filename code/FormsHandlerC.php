<?php
session_start();
echo '<a href="index.php">Back</a>';
$str = '';
if (array_key_exists('c',$_SESSION))
{
    foreach ($_SESSION['c'] as $item)
    {
        $item = htmlspecialchars($item);
        $str .= "<li>$item</li>";
    }
}

echo "<ul>$str</ul>";