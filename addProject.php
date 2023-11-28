<?php  include('inc/header.php');
       include('inc/validtaion.php'); ?>
<?php
     
    if(isset($_POST['submit'])){
        $title = santString($_POST['title']);
        $description = santString($_POST['description']);
        $ID = santString($_POST['ID']);
        if(requiredInput($title) && requiredInput($description)){
            if(minInput($title,3) && maxInput($description,20)){
                    $sql = "INSERT INTO `project`(`User_ID`,`Project_title`,`Descriptions`) VALUES ('$ID','$title','$description')";
                    $result = mysqli_query($conn,$sql);
                    header("refresh:3;url=projects.php");
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
    <div class="flex col-md-6 offset-md-3 w-full">
        <div class="w-[50%] mx-[6%]">
        <form class="my-2 p-3 border" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <?php
                $query = "SELECT User_ID FROM User";
                $result = mysqli_query($conn, $query);
                $options = "";
                while ($row = mysqli_fetch_assoc($result)) {
                    $options .= "<option value='{$row['User_ID']}'>{$row['User_ID']}</option>";
                }
            ?>
                <div>
                    <label>User ID</label>
                    <select name="ID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                     <?php echo $options; ?>
                    </select>
                </div>
            <input type="hidden" name="id" value="<?php echo $idd;?>">

                <div>
                    <div><label>Title of project</label></div>
                    <input type="text" name="title" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="exampleInputName1" >
                </div>
                <div>
                    <div><label>Description</label></div>
                    <input type="text" name="description" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <?php
                    $query = "SELECT Categorie_Name FROM Categories";
                    $result = mysqli_query($conn, $query);
                    $options = "";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $options .= "<option value='{$row['Categorie_Name']}'>{$row['Categorie_Name']}</option>";
                    }?>
                <div>
                    <label>Categorie</label>
                    <select name="categorie" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                     <?php echo $options; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
            
        </form>
        </div>
    </div>
   
<?php  include('inc/footer.php'); ?>

 
  