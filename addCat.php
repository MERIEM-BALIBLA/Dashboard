<?php  include('inc/header.php');
       include('inc/validtaion.php'); ?>
<?php
     
    if(isset($_POST['submit'])){
        $categorie = santString($_POST['categorie']);
        $descrip = santIEmail($_POST['description']);
        if(requiredInput($categorie) && requiredInput($descrip)){
            if(minInput($categorie,3) && maxInput($descrip,20)){
                    // $hashed_password = password_hash(password_PASSWORD_DEFAULT);
                    $sql = "INSERT INTO `Categories`(`Categorie_Name`,`description`) VALUES ('$categorie','$descrip')";
                    $result = mysqli_query($conn,$sql);
                    header("refresh:3;url=categories.php");
                    if($result){
                        $succes = "Added Successfully";
                    }
                }
            }else{
                $error = "The Name must be Grater than 3 caracters / And the Password must be Less than 20 caracters";
            }
        }else {
            $error = "error!!";
        }
?>
    <div class="container-fluid"  style="width:100%">
    <nav class="w-[65%] p-2">
     <div class="text-black dark:text-white">
                <div class="flex gap-2">
                  <h2 class="font-bold text-2xl"> Welcome Back,Ali</h2>
                  <img src="Waving Hand Emoji.svg" alt="waving hand">
                </div>
                <p class="text-textG text-base">Here's what's happening with your store touday</p>
            </div>
     </nav>
     <h1>Add New User</h1>
    <!-- <php if($error): ?>
        <h5><php echo $error; ?></h5>
    <php endif; ?>
    <php if($succes): ?>
        <h5><php echo $succes; ?></h5>
    <php endif; ?> -->
    <div class="w-[50%] mx-[6%]">
        
        <form class="my-2 p-3 border" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
                <label>Categorie</label>
                <input type="text" name="categorie" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="exampleInputPassword1">
            </div>
            <input type="hidden" name="id" value="<?php echo $idd;?>">
            <div class="form-group">
                <label for="exampleInputName1">Petite description</label>
                <input type="text" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </form>
    </div>
   
<?php  include('inc/footer.php'); ?>

 
  