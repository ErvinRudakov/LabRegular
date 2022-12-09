<!--//1.Регулярные выражения-->
<!--// a-->
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>Регулярные выражения (a)</title>-->
<!--</head>-->
<!--<body>-->
<!--    <form name="regular" action="RegularFormHandlerA.php" method="post">-->
<!--        <input type="text" name="str"/>-->
<!--        <input type="submit" name="OK" value="Submit"/>-->
<!--    </form>-->
<!--</body>-->
<!--</html>-->

<!--// b-->
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>Регулярные выражения (b)</title>-->
<!--</head>-->
<!--<body>-->
<!--    <form name="regular" action="RegularFormHandlerB.php" method="post">-->
<!--        <input type="text" name="str"/>-->
<!--        <input type="submit" name="OK" value="Submit"/>-->
<!--    </form>-->
<!--</body>-->
<!--</html>-->
<?php
session_start();
if (
array_key_exists('surname', $_POST)
&& array_key_exists('name', $_POST)
&& array_key_exists('age', $_POST)
)
{
    $_SESSION['surname'] = $_POST['surname'];
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['age'] = $_POST['age'];
    header('Location: FormsHandlerB.php');
}
elseif (
array_key_exists('name', $_POST)
&& array_key_exists('payment', $_POST)
&& array_key_exists('age', $_POST)
&& array_key_exists('breakfast', $_POST)
) {
    $_SESSION['c'] = [
        'name' => $_POST['name'],
        'age' => $_POST['age'],
        'payment' => $_POST['payment'],
        'breakfast' => $_POST['breakfast'],
    ];
    header('Location: FormsHandlerC.php');
}
?>
<!--//2.Форма.Сессии и Куки-->
<!--// a-->
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>Форма.Сессии и куки (a)</title>-->
<!--</head>-->
<!--<body>-->
<!--<form name="forms" action="FormsHandlerA.php" method="post">-->
<!--    <textarea rows="4" cols="35" name="content1"></textarea>-->
<!--    <input type="submit" name="OK" value="Submit">-->
<!--</form>-->
<!--</body>-->
<!--</html>-->

<!--// b-->
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>Форма.Сессии и куки (b)</title>-->
<!--</head>-->
<!--<body>-->
<!--<form name="forms" action="" method="post">-->
<!--    <p>Surname:<p>-->
<!--        <input type="text" name="surname"/>-->
<!--    <p>Name:<p>-->
<!--        <input type="text" name="name"/>-->
<!--    <p>Age:<p>-->
<!--        <input type="text" name="age"/>-->
<!--    <input type="submit" name="OK" value="Submit">-->
<!--</form>-->
<!--</body>-->
<!--</html>-->
<!--<a href="FormsHandlerB.php">Show</a>-->

<!--// c-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Форма.Сессии и куки (c)</title>
</head>
<body>
<form name="forms" action="" method="post">
    <p>Name:<p>
        <input type="text" name="name"/>
    <p>Age:<p>
        <input type="text" name="age"/>
    <p>Payment:<p>
        <input type="text" name="payment"/>
    <p>Breakfast:<p>
        <input type="text" name="breakfast"/>
        <input type="submit" name="OK" value="Submit">
</form>
</body>
</html>
<a href="FormsHandlerC.php">Show</a>

<!--//3.Файлы-->
<?php
function myScanDir(string $dir): array
{
return array_diff(scandir($dir), ['..', '.']);
}
function getFiles(array $directories): array
{
$result = [];
foreach ($directories as $directory)
{
$files = myScanDir('files/' .$directory);
foreach ($files as $file)
{
$path = 'files/' . $directory . '/' . $file;
$content = file_get_contents($path);
$result[] = [
'category' => $directory,
'header' => preg_replace('/.txt$/','', $file),
'content' => $content,
];
}
}
return $result;
}
$categories = myScanDir('./files');

$categoriesHTML = '';
foreach ($categories as $category)
{
$categoriesHTML .= "<option>$category</option>";
}

echo '<form action="" method="post">
    <p>Email<p>
        <input type="email" name="email"/>
    <p>Category<p>
        <select name="category">'
            . $categoriesHTML .
            '</select>
    <p>Header<p>
        <input type="text" name="header"/>
    <p>Content<p>
        <textarea rows="10" cols="40" name="content"></textarea>
        <input type="submit" name="OK" value="Submit">
</form>';
if (
array_key_exists('email', $_POST)
&& array_key_exists('category', $_POST)
&& array_key_exists('header', $_POST)
&& array_key_exists('content', $_POST)
)
{
$file = fopen('files/' . $_POST['category'] . '/' . $_POST['header'] .'.txt', 'wb');
fwrite($file, $_POST['content']);
}
$ads = getFiles($categories);
$tableContent = '';
foreach ($ads as $ad)
{
$tableContent .= '<tr><td>'.$ad['category'].'</td><td>'.$ad['header'].'</td><td>'.$ad['content'].'</td></tr>';
}

if ($tableContent)
{
echo '<table border="1">
    <tr>
        <th>Category</th>
        <th>Header</th>
        <th>Content</th>
    </tr>
    '.$tableContent.'
</table>';
}