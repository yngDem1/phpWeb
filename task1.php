<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1. Announce script</title>
</head>
<body>
    <?php
    
    $articleLink = 'task2.html';
    $articleText = 
    'Привет! Предлагаем тебе выполнить тестовое в школу разработчиков. 
    Если не получилось выполнить все задания, шанс попасть в школу все равно есть, можно прислать то, что получилось. 
    Мы будем смотреть на правильность выполнения заданий, качество кода, аккуратность. 
    Это будет учитываться не только при поступлении, но и при переходе с первого этапа на второй, так что постарайся показать максимум своих возможностей. ';
    $articlePreview = announcement($articleText);

    function announcement($text, $length = 200) {

        if (mb_strlen($text) < $length) {
            $text = deleteLastSymbols($text);
            return $text;
        } else {
            $text = mb_substr($text, 0, $length);
            $temp = mb_strripos($text, ' ');
            $end = mb_substr($text, $temp - 1);
        
            if (empty($temp)) {
                return deleteLastSymbols($text);
            } elseif (in_array($end, array('.', ',', '!', '?', ':', ';', '"', '«',                                                                                                                                                                                               '»', '...', '(', ')', '-'))) {
                return trim(mb_substr($text, 0, $temp - 1)).'...';
            } else {
                return trim(mb_substr($text, 0, $temp)).'...';
            }
        }
    }

    function deleteLastSymbols($text) {
        $i = strlen($text) - 1;
        $len = strlen($text) - 1;
        $filter = array('.', ',', '!', '?', ':', ';', '"', '«', '»', ' ', '(', ')', '-');
        
        for($i; $i>0; $i--) {
            
            for($j=0; $j<count($filter); $j++) {
                
                if(!strcmp($text[$i], $filter[$j])) {
                    $len--;
                }
            }
                if($len == $i) {
                break;
            }
        }
        
        $text = mb_substr($text, 0, $len);
        $text = $text."...";
        return $text;
    }

    /*
    Из обнаруженных проблем: случай, если в качестве текста (ArticleText) меньше 3 слов.
    Не получилось добиться того, чтобы корректно добавлять многоточие.
    Не получилось добиться генерации ссылок.
    */

    echo $articlePreview;
    ?>
</body>
</html>