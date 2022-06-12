<?php 

include './partial/header.php';
include './db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $email = $_POST["email"];
    
    $errors = [];
    if(!$firstName){
        $errors[] = 'FirstName is Required';
}
    $errors = [];
    if(!$lastName){
        $errors[] = 'LastName is Required';
}
    $errors = [];
    if(!$email){
        $errors[] = 'Emai is Required';
}
//sending information to database
if(empty($errors)){
    $statement = $pdo->prepare("INSERT INTO customers(FirstName, LastName, Email )
    values(:firstname, :lastname, :email)");
    $statement->bindValue("firstname", $firstName);
    $statement->bindValue("lastname", $lastName);
    $statement->bindValue("email", $email);
    $statement->execute();
    header("location:index.php");
}
}
?>
  
<?php if(!empty($errors)): ?>
    <div class="">
        <?php foreach($errors as $error):?>
            <p><?php echo $error ?></p>
          <?php endforeach?>  
    </div>
    <?php endif ?>

<section class="inputform">

<form action="create.php" method="POST">
<label for="firstname">FirstName</label>
<br>
<input type="text" id="firstname" name="firstname" placeholder="FirstName">
<br><br>
<label for="lastname">LastName</label>
<br>
<input type="text" id="lastname" name="lastname" placeholder="LastName">
<br><br>
<label for="email">Email</label>
<br> 
<input type="email" id="email" name="email" placeholder="Email">
<br>
<input type="submit" id="submit" name="submit" >

</section>


</form>
