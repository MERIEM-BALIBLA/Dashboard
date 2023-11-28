<?php  include('inc/header.php');
       include('inc/validtaion.php'); ?>
<?php
     $query = "SELECT User_ID FROM User";
     $result = mysqli_query($conn, $query);
     $options = "";
     while ($row = mysqli_fetch_assoc($result)) {
         $options .= "<option value='{$row['User_ID']}'>{$row['User_ID']}</option>";
     }
    if(isset($_POST['submit'])){
        $name = santString($_POST['name']);
        $skil = santString($_POST['skil']);
        // $ID = santString($_POST['ID']);
        // $password = santString($_POST['password']);
        if(requiredInput($name) && requiredInput($skil)){
            if(minInput($name,3) && maxInput($skil,10)){
                // if(validateEmail($email)){
                //     // $hashed_password = password_hash(password_PASSWORD_DEFAULT);
                //     $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO `freelencer`(`nick_name`,`skil`) VALUES ('$name','$skil')";
                    $result = mysqli_query($conn,$sql);
                    header("refresh:1;url=freelencer.php");
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
    <h1>Add New Project</h1>
    <!-- <php if($error): ?>
        <h5 class="alert alert-danger text-center"><php echo $error; ?></h5>
    <php endif; ?>
    <php if($succes): ?>
        <h5 class="alert alert-success text-center"><php echo $succes; ?></h5>
    <php endif; ?> -->
    <div class="flex col-md-6 offset-md-3 w-full">
        <!-- <div class="w-[30%]" style="background-image: url('dog.webp');"> -->
            <!-- <img src="dog.webp" alt="Image from URL"> -->
        <!-- </div>         -->
        <div class="w-[50%] mx-[6%]">
        <form class="my-2 p-3 border" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <!-- <div class="form-group">
                    <label for="exampleInputName1">User ID</label>
                    <input type="text" name="ID" class="form-control" id="exampleInputName1" >
                </div> -->
                <div class="form-group">
                    <label for="userSelect">User ID</label>
                    <select name="ID" id="userSelect" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                     <?php echo $options; ?>
                    </select>
                </div>
            <input type="hidden" name="id" value="<?php echo $idd;?>">

                <div class="form-group ">
                    <div><label for="exampleInputName1">Create your own Nickname</label></div>
                    <input type="text" name="name" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="exampleInputName1" >
                </div>
                <div class="form-group">
                    <div><label for="exampleInputName1">Skils</label></div>
                    <input type="text" name="skil" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
            
        </form>
        </div>
    </div>
   
<?php  include('inc/footer.php'); ?>

 
  