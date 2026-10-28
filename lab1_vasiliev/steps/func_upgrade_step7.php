<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $dest = "Orhei";
        $prs = 4;
        $budget = 6000;
        const VALYUTA = "MDL";

        $rashody = [
            [
                "nazvanie" => "Аренда транспорта",
                "kategoriya" => "Транспорт",
                "summa" => 1200
            ],
            [
                "nazvanie" => "Проживание",
                "kategoriya" => "Жильё",
                "summa" => 2400
            ],
            [
                "nazvanie" => "Продукты",
                "kategoriya" => "Питание",
                "summa" => 1000
            ],
            [
                "nazvanie" => "Входные билеты",
                "kategoriya" => "Развлечения",
                "summa" => 500
            ],
            [
                "nazvanie" => "Прочие расходы",
                "kategoriya" => "Прочее",
                "summa" => 300
            ],
        ];

        function obshchayaSumma($arr) {
            $sum = 0;
            foreach($arr as $el) {
                $sum += $el["summa"];
            }
            return $sum;
        }

        function summaNaCheloveka($t, $p) {
            return $t/$p;
        }

        function statusByudzheta($b, $t) {
            if ($t < $b) {
                return "Бюджета достаточно, остаток " . $b - $t . " " . VALYUTA;
            } elseif ($t === $b) {
                return "Бюджет использован полностью";
            } else {
                return "Бюджет превышен, не хватает " . $t - $b . " " . VALYUTA;
            }
        }

        $total = obshchayaSumma($rashody);
        $bpp = $prs > 0 ? summaNaCheloveka($total, $prs) : 0;
    ?>

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
        Сумма расходов: <?= $total ?> <?= VALYUTA ?>
        <br>
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