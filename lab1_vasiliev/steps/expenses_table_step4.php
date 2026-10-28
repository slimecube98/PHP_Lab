<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
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
    </p>
</body>
</html>