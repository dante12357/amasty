<?php
$conn = new PDO("mysql:host=localhost;dbname=myDB", "root", "root");

$query1 = "SELECT 
    100 + IFNULL((SELECT 
                    SUM(amount)
                FROM
                    transactions
                WHERE
                    to_person_id = id),
            0) - IFNULL((SELECT 
                    SUM(amount)
                FROM
                    transactions
                WHERE
                    from_person_id = id),
            0) res,
    fullname
FROM
    persons
";
$stmt = $conn->query($query1);

while ($row = $stmt->fetch()) {
    echo $row['res'].' Денег у '.$row['fullname'].'</br>';
}

$query2 = "    SELECT 
    SUM(IFNULL((SELECT 
					COUNT(amount)
                FROM
                    transactions
                WHERE
                    to_person_id = persons.id),
            0) + IFNULL((SELECT 
                    COUNT(amount)
                FROM
                    transactions
                WHERE
                    from_person_id = persons.id),
            0)) mycount ,
     name
FROM
    persons, cities
    WHERE city_id = cities.id
    GROUP BY name
ORDER BY mycount DESC  LIMIT 1";

$stmt = $conn->query($query2);

while ($row = $stmt->fetch()) {
    echo 'Больше всего транзакций были связаны с '.$row['name'].'</br>';
}

$query3 = "SELECT 
    transactions.*, cities.name
FROM
    persons
        INNER JOIN
    transactions ON transactions.from_person_id =id
        OR transactions.to_person_id = id
        INNER JOIN
    cities ON city_id = cities.id
    GROUP BY transaction_id, city_id
    HAVING COUNT(city_id) > 1";

$stmt = $conn->query($query3);

while ($row = $stmt->fetch()) {
        echo ' Информация о транзакции: От номера ' . $row['from_person_id'].' номеру ' . $row['to_person_id']. ' сумма ' . $row['amount'] . ' в городе ' . $row['name'] . '</br>';

}
