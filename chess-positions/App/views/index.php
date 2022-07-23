<?php
/**
 * @var \App\PositionModel $position
*/
?>

<!DOCTYPE html>
<html lang="EN">
<head>
    <title>Chess Board HTML5</title>
    <meta charset="UTF-8">
    <style>
        .box { text-align: center; }
        .centered { display: inline-block; margin: 0; }
        .chess-board { border-spacing: 0; border-collapse: collapse; }
        .chess-board th { padding: .5em; }
        .chess-board td { border: 1px solid; width: 3em; height: 3em; text-align: center; vertical-align: middle; }
        .chess-board .white { background: #f0d9b5; }
        .chess-board .black { background: #b58863; }
        p {text-align: center;}
    </style>
</head>
    <body>
        <div>
            <p>Позиция по FEN нотации: <?= $position->getFenString(); ?></p>
            <p>Предстоит ход: <?= $position->getNextStep(); ?></p>
            <p>Возможные рокировки: <?= $position->getCastling(); ?></p>
            <p>Прыдидущие ходы пешкой на 2 поля: <?= $position->getPrevStep(); ?></p>
            <p>Последние ходы без взятий или движения пешек: <?= $position->getLastStep(); ?></p>
            <p>Предстоит ход номер: <?= $position->getStepNumber(); ?></p>
        </div>
        <div class="box">
            <div class="centered">
                <table class="chess-board">
                    <tbody>
                    <tr>
                        <th></th>
                        <th>a</th>
                        <th>b</th>
                        <th>c</th>
                        <th>d</th>
                        <th>e</th>
                        <th>f</th>
                        <th>g</th>
                        <th>h</th>
                    </tr>
                    <?php foreach ($position->generateChessBoardArray() as $key => $chunk) {
                        $rowNumber = abs($key - 8);
                        $evenClass = $rowNumber % 2 == 0 ? 'white' : 'black';
                        $unEvenClass = $evenClass == 'white' ? 'black' : 'white';
                        ?>
                        <tr>
                            <th><?= $rowNumber; ?></th>
                            <?php foreach ($chunk as $position => $symbol) { ?>
                                <td class="<?= $position % 2 == 0 ? $evenClass : $unEvenClass; ?>">
                                    <?= $symbol; ?>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>