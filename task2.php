<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 2. Help for Petya</title>
</head>
<body>
    <?php

    /*
    Для начала - опишем задачу. Дано: N - fatalErr, M - warn.
    Представим четыре условия в виде логических выражений:
    N => N;
    M => 2M; - warnMakesTwice
    2M => N; - warnsMakesException
    2N => 0; - exceptionsGetsFixed

    Отбросим первое логическое выражение, поскольку оно не несет практического смысла.
    Таким образом, при реализации задачи появляются три функции.
    */

    $N = $_GET["fatalErr"];
    $M = $_GET["warn"];
    $counter = 0;

    function warnMakesTwice() {
        $M =+ 1;
        $counter =+ 1;
    };

    function warnsMakesException() {
        $M =- 2;
        $N =+ 1;
        $counter =+ 1;
    };

    function exceptionGetsFixed() {
        $N =- 2;
        $counter =+ 1;
    };

    /*
    Чтобы программа успешно работала, необходимо задать приоритет действий.
    Приоритет действий реализуется через кратные числа.
    */

    do {
        if ($N >= 2) {
            exceptionGetsFixed();
        }

        if (($M % 2 != 0) or ($M <= 2)) {
            warnMakesTwice();
        }

        if ($M % 2 == 0) {
            warnsMakesException();
        }

        if (($N != 0) and ($M == 0)) {
            echo '-1';
        }
    
    } while (($N != 0) and ($M != 0));

    echo $counter;
    
    ?>
</body>
</html>