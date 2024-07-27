<?php
include('database.php');

$id = $_GET['id'];

$sql = "SELECT * FROM STUDENT WHERE ID = {$id}";
$result = $conn->query($sql);

if($result->num_rows > 0){
    
    $row = $result->fetch_assoc();  

}else{

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include('views/nav.php') ?>

<section class="create-layout">
    <h1>Update record</h1>

    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <div>
            <h2>Name</h2>

            <div class="form-separate">
                
                <div>
                    
                    <input type="text" name="firstname" required value="<?php echo $row['firstname'] ?>"><br>
                    <label for="">Firstname</label>
                </div>
                
                <div>
                    
                    <input type="text" name="lastname" required value="<?php echo $row['lastname'] ?>"><br>
                    <label for="">Lastname</label>
                </div>
            </div>
      

         
        </div>
        <div class="grid-create">
            

            <div>
                <h2>Gender</h2>
                <label for="">Male</label>
                <input type="radio" name="sex" value="male" required <?php echo $row['sex'] == 'male' ? 'checked' : '' ?>>
                
                <label for="">Female</label>
                <input type="radio" name="sex" value="female" required <?php echo $row['sex'] == 'female' ? 'checked' : '' ?>>
                
            </div>
            <div>
                <h2>Age & Birthday</h2>
                <input type="number" name="age" value="<?php echo $row['age'] ?>"> <br>
                <label for="">Age</label> <br>
                <input type="text" name="birthday" value="<?php echo $row['birthday'] ?>"><br>
                <label for="">Birthday</label>
        
            </div>
            <div>
                <h2>Civil Status</h2>
                <input type="radio" name="civilstatus" value="single" required <?php echo $row['civilstatus'] == 'single' ? 'checked' : '' ?>> 
                <label for="">Single</label><br>
                
                <input type="radio" name="civilstatus" value="in a relationship" required <?php echo $row['civilstatus'] == 'in a relationship' ? 'checked' : '' ?>>
                <label for="">In a relationship</label>
        
            
            </div>
        </div>
        
        <div class="grid-create">
            

            <div>
                <h2>Course</h2>
                <label for="">Input your Course</label> <br>
                <input type="text" name="course" required value="<?php echo $row['course'] ?>">
                
              
            </div>
            <div>
                <h2>Learning Modality</h2>
                
                <input type="radio" name="learningmodal" value="flex" required <?php echo $row['learningmodal'] == 'flex' ? 'checked' : '' ?>>
                <label for="">Flex</label> <br>
                <input type="radio" name="learningmodal" value="rad" required <?php echo $row['learningmodal'] == 'rad' ? 'checked' : '' ?>>
                <label for="">RAD</label>
        
            </div>
            <div>
                <h2>Email</h2>
                <label for="">Email</label> <br>
                <input type="email" name="email"  required value="<?php echo $row['email']?>"> 
                
                
            </div>

            
        </div>

        <div>
            <h2>Emergency Contact</h2>

            <div class="form-separate">
                <div>

                    <input type="text" name="emergencycontact" required value="<?php echo $row['emergencycontact']?>"><br>
                    <label for="">Emergency Contact</label>
                </div>
            </div>
      

         
        </div>
    
        <input type="submit" value="submit" name="Submit">
    </form>
</section>
</body>
</html>

<?php

    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $sex = $_POST['sex'];
        $age = $_POST['age'];
        $birthday = $_POST['birthday'];
        $course = $_POST['course'];
        $learningmodal = $_POST['learningmodal'];
        $civilstatus = $_POST['civilstatus'];
        $email = $_POST['email'];
        $emergencycontact = $_POST['emergencycontact'];

        $sql = "UPDATE STUDENT SET firstname = '{$fname}', lastname = '{$lname}' , sex = '{$sex}', age = {$age}, birthday = '{$birthday}', course = '{$course}', learningmodal = '{$learningmodal}', civilstatus = '{$civilstatus}', email = '{$email}', emergencycontact = '{$emergencycontact}' where id = {$id}";

        $result = $conn->query($sql);

        if($result){
            header('Location: index.php');
        }
        
    }

?>