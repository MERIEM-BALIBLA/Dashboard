<?php  include('../inc/header.php'); ?>

<?php include('db.php');?>
<?php
    if (!isset($_GET['User_ID']) or !is_numeric($_GET['User_ID'])) {
        header("Location:index.php");
    }
    $idd = $_GET['User_ID'];
    $sql = "SELECT * FROM `User` WHERE `User_ID`='$idd' LIMIT 1";
    $result = mysqli_query($conn,$sql);
    $check = mysqli_num_rows($result);
    if(!$check){
        header("location:index.php");
    }
    $row = mysqli_fetch_assoc($result);
    
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
     
    <h1 class="text-center col-12 bg-primary py-2 text-white my-2">Edit Info About User</h1>
    <div class="w-[50%] mx-[6%]">
        <form class="my-2 p-3 border" method="POST" action = "Update.php">
            <div>
                <label for="exampleInputName1">Full Name</label>
                <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['name']?>" class="form-control" id="exampleInputName1" >
                <input type="hidden" name="id" value="<?php echo $idd;?>">
            </div>
            <div>
                <label for="exampleInputName1">Email address</label>
                <input type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['Email_Adress']?>" name="email"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div>
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="password" class="form-control" id="exampleInputPassword1">
            </div>
         
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
   
    <?php  include('../inc/footer.php'); ?>


 
  