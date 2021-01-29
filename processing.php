<?php

if ($_GET['mode'] == 'check' and $_GET['card']) {
    if (check_card($_GET['card'])) {
        echo "ok";
    } else {
        echo "no";
    }

}
function check_card($card)
{
    #проверяет код и сверяет его с базой данных
    $dsn = 'mysql:dbname=school;host=localhost';
    $user = 'root';
    $password = 'root';
    $pdo = new PDO($dsn, $user, $password);
    #Запрос

    $sth = $pdo->prepare("SELECT * FROM students WHERE card_id = :card");
    $sth->bindValue(':card', $card);
    $sth->execute();
    $result = $sth->fetch();

    if ($result) {
        return true;
    } else {
        return false;
    }
}

?>
