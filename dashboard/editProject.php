<!-- <php  include('inc/header.php'); ?> -->
<?php  include('../inc/header.php'); ?>

<?php include('db.php');?>
<?php
    if (!isset($_GET['Project_ID']) or !is_numeric($_GET['Project_ID'])) {
        header("Location:index.php");
    }
    $idd = $_GET['Project_ID'];
    $sql = "SELECT * FROM `project` WHERE `Project_ID`='$idd' LIMIT 1";
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
    <h1 class="text-center col-12 bg-primary py-3 text-white my-2">Edit Info About User</h1>
    <div class="w-[50%] mx-[6%]">
        <form class="my-2 p-3 border" method="POST" action = "UpdateProject.php">
            <div class="form-group">
                <label for="exampleInputName1">Title of project</label>
                <input type="text" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['Project_title']?>" >
            </div>
            <input type="hidden" name="id" value="<?php echo $idd;?>">
            <div class="form-group">
                <label for="exampleInputName1">About project </label>
                <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $row['Descriptions']?>" name="description" class="form-control">
            </div>
         
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
   
    <?php  include('../inc/footer.php'); ?>


 
  