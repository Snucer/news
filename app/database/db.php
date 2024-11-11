<?php
require 'connect.php';

function tt($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

//Проверка ошибок
function dbCheckError($query)
{
    $errInfo = $query->errorInfo();

    if($errInfo[0] !== PDO::ERR_NONE)
    {
        echo $errInfo[2];
        exit();
    }
    return true;
}

function selectFirst($table)
{
    global $pdo;
    $sql = "SELECT * FROM $table ORDER BY date DESC";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}


//Получение всех данных из таблицы
function selectAll($table, $limit, $offset)
{
    global $pdo;
    $sql = "SELECT * FROM $table ORDER BY date DESC LIMIT $limit OFFSET $offset";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

//Получение строки из таблицы
function selectOne($table, $params = [])
{
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params))
    {
        $e = 0;
        foreach($params as $key => $value)
        {
            if(!is_numeric($value))
            {
                $value = "'" . $value . "'";
            }
            if($e === 0)
            {
                $sql = $sql . " WHERE $key=$value";
            }
            else
            {
                $sql = $sql . " AND $key=$value";
            }
            $e++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}

//количество записей в таблице news
function countRow($table)
{
    global $pdo;
    $sql = "SELECT COUNT(*) FROM $table ORDER BY date DESC";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchColumn();
}

function printDate($date, $format)
{
    $tmp_date = new DateTime($date);
    return $tmp_date->format($format);
}
?>