<?php
require __DIR__ . "/data.php";
require_once __DIR__ . "/functions.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $dest ?></title>
</head>
<body>
    <h1><?= $dest ?></h1>
    <br>
    Автор: Vasiliev Dumitru
    <br>
    Кол-во участников: <?= $prs ?>
    <br>
    Бюджет: <?= $budget ?>
    <br><br><br>
    <table>
        <tr>
            <th>№</th>
            <th>Категория</th>
            <th>Название</th>
            <th>Цена</th>
        </tr>
        <?php foreach($rashody as $i => $r): ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $r["kategoriya"] ?></td>
                <td><?= $r["nazvanie"] ?></td>
                <td><?= $r["summa"] . " " . VALYUTA ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p>
        Кол-во расходов: <?= count($rashody) ?>
        <br>
        <?php $total = obshchayaSumma($rashody) ?>
        Сумма расходов: <?= $total ?> <?= VALYUTA ?>
        <br>
        <?= $bpp = $prs > 0 ? summaNaCheloveka($total, $prs) : 0; ?>
        Стоимость на человека: <?= $bpp ?> <?= VALYUTA ?>
        <br>
        Статус бюджета: <?= statusByudzheta($budget, $total) ?>
        <br>
        <?php 
            $maxPriceItemIndex = 0;
            foreach($rashody as $i => $r) {
                if ($r["summa"] > $rashody[$maxPriceItemIndex]["summa"]) {
                    $maxPriceItemIndex = $i;
                }
            }
        ?>
        Самый большой расход: <?= $rashody[$maxPriceItemIndex]["nazvanie"] ?> <?= $rashody[$maxPriceItemIndex]["summa"] ?> <?= VALYUTA ?>

        <br>
        <br>
        <?php 
            $tv = 1000 ;
            $ti = [];
        ?>
        Расходы более <?= $tv ?> <?= VALYUTA ?>:
        <?php 
        foreach($rashody as $r){
            if ($r["summa"] >= $tv) {
                array_push($ti, $r);
            }
        }
        ?>
        <?php if (count($ti) === 0) {?>
            Нет
        <?php } else { ?>
            <ul>
                <?php foreach($ti as $t): ?>
                    <li>
                        <?= $t["nazvanie"] ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php } ?>
        
    </p>
    
</body>
</html>