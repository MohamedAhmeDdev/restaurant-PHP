<?php 

include './partial/header.php';
include './db.php';

$id = $_GET['id'] ?? null;

if(!$id){
    header('location: index.php');
    exit;
}

$statement = $pdo->prepare("SELECT * FROM CUSTOMERS WHERE CustomerID= :id");
$statement->bindValue(":id", $id);   
$statement->execute();
$customer = $statement->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

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
//updating information to database
if(empty($errors)){
    $statement = $pdo->prepare("UPDATE  CUSTOMERS SET FirstName = :firstname, LastName= :lastname, Email= :email
     WHERE CustomerID= :id");
    $statement->bindValue("firstname", $firstName);
    $statement->bindValue("lastname", $lastName);
    $statement->bindValue("email", $email);
     $statement->bindValue(":id", $id);   
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

<form  method="POST">
<label for="firstname">FirstName</label>
<br>
<input type="text" id="firstname" name="firstname" placeholder="FirstName"
value="<?php echo $customer ["FirstName"] ?>">
<br><br>
<label for="lastname">LastName</label>
<br>
<input type="text" id="lastname" name="lastname" placeholder="LastName"
value="<?php echo $customer ["LastName"] ?>">
<br><br>
<label for="email">Email</label>
<br> 
<input type="email" id="email" name="email" placeholder="Email"
value="<?php echo $customer ["Email"] ?>">
<br>
<input type="submit" id="submit" name="submit" >

</section>
</form>
