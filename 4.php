<?php
include_once __DIR__ . '/simplehtmldom_1_9_1/simple_html_dom.php';
if ($_POST) {
    $htmlArchive = file_get_html('https://terrikon.com/football/italy/championship/archive');

    foreach ($htmlArchive->find('div.tab div.news dl dd a') as $element) {
        $b = $element->href;
        $htmlResult = file_get_html("https://terrikon.com/" . $b);

        foreach ($htmlResult->find('table.big td a ') as $el) {
            $a = trim($el->text());
            if ($a == $_POST['country']) {
                $b = $el->parent()->prev_sibling()->text();
                echo 'Место ' . $b . ' ' . $a . '<br>';
            }
        }
    }
}
?>
<form method="POST" action="/fourthTask.php">
    <input type="text" name="country" placeholder="Введите страну">
    <button type="submit">Ок</button>
</form>


