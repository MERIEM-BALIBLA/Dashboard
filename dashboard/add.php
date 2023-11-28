<?php  include('../inc/header.php');
       include('../inc/validtaion.php'); ?>
<?php
     
    if(isset($_POST['submit'])){
        $name = santString($_POST['name']);
        $email = santIEmail($_POST['email']);
        $password = santString($_POST['password']);
        if(requiredInput($name) && requiredInput($email) && requiredInput($password)){
            if(minInput($name,3) && maxInput($password,20)){
                if(validateEmail($email)){
                    // $hashed_password = password_hash(password_PASSWORD_DEFAULT);
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO `User`(`name`,`Email_Adress`,`pass_word`) VALUES ('$name','$email','$hashed_password')";
                    $result = mysqli_query($conn,$sql);
                    header("refresh:3;url=index.php");

                    if($result){
                        $succes = "Added Successfully";
                    }
                }else{
                    $error = "Valid your Email";
                }
            }else{
                $error = "The Name must be Grater than 3 caracters / And the Password must be Less than 20 caracters";
            }
        }else {
            $error = "error!!";
        }
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
    <?php if($error): ?>
        <h5><?php echo $error; ?></h5>
    <?php endif; ?>
    <?php if($succes): ?>
        <h5><?php echo $succes; ?></h5>
    <?php endif; ?>
    <div class="flex text-black p-4 w-[90%] m-[2%] pl-[5%] py-[2%] rounded-2xl border">
        <div class="w-[40%]">
            <img src="dog.jpg" alt="">
        </div>
        <div class="w-[50%] mx-[6%]">
        <form class="my-2 p-3 border" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                
                <div class="form-group">
                    <label for="exampleInputName1">Full Name</label>
                    <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="exampleInputName1" >
                </div>
                <!-- <div class="form-group">
                    
                         $query = "SELECT `region` FROM `region` ";
                         $result = mysqli_query($conn, $query);
                         $options = "";
                         while ($row = mysqli_fetch_assoc($result)) {
                            $options .= "<option value='{$row['region']}'>{$row['region']}</option>";
                        }
                    ?>
                    <label for="userSelect">Region</label>
                    <select name="region" id="userSelect" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                      echo $options; ?>
                    </select>
                </div> -->
                <!-- <div class="form-group">  
                    ?>
                    <label for="userSelect">Country</label>
                    <select name="country" id="userSelect" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                      echo $options; ?>
                    </select>
                </div> -->
                <div class="form-group">
                    <label for="exampleInputName1">Email address</label>
                    <input type="text" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="exampleInputPassword1">
                </div>
            
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </form>
        </div>
        
    </div>
   
<?php  include('../inc/footer.php'); ?>

 
  