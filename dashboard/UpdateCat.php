<!-- <php  include('inc/header.php'); ?> -->
<?php  include('../inc/header.php'); ?>

<?php include('inc/validtaion.php'); ?> 

<?php
    if(isset($_POST['submit'])){
        $categorie = santString($_POST['categorie']);
        $descrip = santIEmail($_POST['description']);
        if(requiredInput($categorie) && requiredInput($descrip)){
            $idd = $_POST['id'];
            if(minInput($categorie, 3) && maxInput($descrip, 20)){
                $sql = "UPDATE `Categories` SET `Categorie_Name`='$categorie',`description`='$descrip' WHERE `Categorie_ID`='$idd'";
            }
            $result = mysqli_query($conn, $sql);
            if($result){
                $succes = "Updated Successfully";
                header("refresh:3;url=categories.php");
            } else {
                $error = "Error in the query execution.";
            }
        } else {
            $error = "The Name must be greater than 3 characters / And the Password must be less than 20 characters";
        }
    } else {
        $error = "Error!!";
    }
?>

   <h1 class="text-center col-12 bg-info py-3 text-white my-2">Update Info About Project</h1>
    <?php if($error): ?>
        <h5 class="alert alert-danger text-center"><?php echo $error; ?></h5>
        <a href="javascript:history.go(-1)" class="btn btn-primary"><< GO BACK</a>
    <?php endif; ?>
    <?php if($succes): ?>
        <h5 class="alert alert-success text-center"><?php echo $succes; ?></h5>
    <?php endif; ?>
    <?php  include('../inc/footer.php'); ?>


 
  