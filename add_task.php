<?php require_once "classes/Model.php";?>
<?php 
$title = filter_input(INPUT_POST, 'title');
$description = filter_input(INPUT_POST, 'description');
$datetime_from = filter_input(INPUT_POST, 'datetime_from');
$datetime_to = filter_input(INPUT_POST, 'datetime_to');

    var_dump($title);
    var_dump($description);
    var_dump($datetime_from);
    var_dump($datetime_to);

    $message = "Stránka byla načtena...";
    if(isset($submit)) {
        $message = "Stránka byla načtena odesláním formuláře...";
        $result = TaskModel::addTask($title, $description, $datetime_from, $datetime_to);
        if($result) {
            $message .= "Tásk byl úspěšně přídán...";       
        }
        else {
            $message .= "Nebylo možné přidat!!";
        }
    }

?>

<?php echo $message;?>
<h1>Přidání tasku...</h1>
<form action="add_task.php" method="post">

    <label for="title">Název:</label>
            <input type="text" name="title" placeholder="úkol..."> <br>
    <label for="description">Popis:</label>
            <textarea rows="1" cols="25" name="description" id="description" placeholder="Popisek úkolu..."></textarea> <br>
    <label for="datetime_from">Dokončit úkol od:</label>
            <input name="datetime_from" type="datetime-local"> dd-mm-yyyy <br>
    <label for="datetime_to">Dokončit úkol do:</label>
            <input name="datetime_to" type="datetime-local"> dd-mm-yyyy <br>
    <input type="submit" name="submit" id="submit">  

</form>
    

</body>
</html>
