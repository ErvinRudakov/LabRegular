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
