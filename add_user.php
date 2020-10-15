<?php require_once "classes/Model.php";?>
<?php require_once "header.php";?>
<?php 
$firstname = filter_input(INPUT_POST, 'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$phonenumber = filter_input(INPUT_POST, 'phonenumber');;
$birthdate = filter_input(INPUT_POST, 'birthdate');
$SQLbirthdate = date('Y-m-d', strtotime($birthdate));
$address = filter_input(INPUT_POST, 'address');
$city = filter_input(INPUT_POST, 'city');
$id_role = filter_input(INPUT_POST, 'id_role');
$submit = filter_input(INPUT_POST, 'submit');

    $message = "Stránka byla načtena...";
    if(isset($submit)) {
        $message = "Stránka byla načtena odesláním formuláře...";
        $result = UserModel::addUser($firstname, $lastname, $email, $password, $phonenumber, $birthdate, $address, $city, $id_role);
        if($result) {
            $message .= "Tásk byl úspěšně přídán...";       
        }
        else {
            $message .= "Nebylo možné přidat!!";
        }
    }

?>

<h1>Přidání uživatele...</h1>
<form action="add_user.php"method="post">

    <label for="firstname">Jméno:</label>
            <input type="text" name="firstname"> <br>
    <label for="lastname">Příjmení:</label>
            <input type="text" name="lastname"> <br>
    <label for="email">Email:</label>
            <input name="email" type="email" placeholder="xxxx@yyyy.xy"><br>
    <label for="password">Heslo:</label>
            <input name="password" type="password" placeholder="********"><br>
    <label for="phonenumber">Telefoní číslo:</label>
            <input name="phonenumber" type="number"><br>
    <label for="birthdate">Datum narození:</label>
            <input name="birthdate" type="date"><br>
    <label for="address">Adresa:</label>
            <input name="address" type="text" placeholder="..."><br>
    <label for="city">Město:</label>
            <input name="city" type="text" placeholder="..."><br>
    <label for="id_role">Role:</label>
    <select name="id_role" id="id_role">
                            <?php 
                                    $roles = RoleModel::getRoles();

                                    foreach ($roles as $role) { ?>
                                        <option value="<?= $role->id_role?>"><?= $role->name?></option>
                                    <?php }
                            
                            ?>
            </select> <br>        
    <input type="submit" name="submit" id="submit"> 
    <?php echo $message;?>

</form>
    

<? require_once "footer.php"?>

 