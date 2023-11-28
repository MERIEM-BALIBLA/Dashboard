<?php  include('inc/header.php'); ?>
<?php
    $sql = "SELECT `project`.`Project_title`, `project`.`Descriptions`, `user`.`name`, `project`.`Project_ID`,`Categories`.`Categorie_Name`
        FROM `project`
        LEFT JOIN `user` ON `user`.`User_ID` = `project`.`User_ID`
        LEFT JOIN `Categories` ON `Categories`.`Categorie_ID` = `project`.`Categorie_ID`";
    $result = mysqli_query($conn, $sql);
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

    <!-- <h1 class="text-center col-12 bg-primary py-3 text-white my-2">Home Page</h1> -->
    <div>
        <div class="w-full p-6">
            <table class="border-collapse border border-gray-300 bg-gray-100 w-full">
                <thead>
                    <tr class="bg-gray-300">
                    <!-- <th class="border-y border-gray-100 bg-gray-50/50 p-2" scope="col">#</th> -->
                    <th class="border-y border-gray-100 bg-gray-50/50 p-2" scope="col">User</th>
                    <th class="border-y border-gray-100 bg-gray-50/50 p-2" scope="col">Title of the Project</th>
                    <th class="border-y border-gray-100 bg-gray-50/50 p-2" scope="col">Categorie</th>
                    <th class="border-y border-gray-100 bg-gray-50/50 p-2" scope="col">About Project</th>
                    <th class="border-y border-gray-100 bg-gray-50/50 p-2" scope="col">Edit</th>
                    <th class="border-y border-gray-100 bg-gray-50/50 p-2" scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(mysqli_num_rows($result) > 0):?>
                        <?php while($row = mysqli_fetch_assoc($result)):?>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2"><?php echo $row['name']?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo $row['Project_title']?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo $row['Categorie_Name']?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo $row['Descriptions']?></td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <a class="middle none center mr-4 rounded-lg bg-green-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
  data-ripple-light="true" href="editProject.php?Project_ID=<?php echo $row['Project_ID']?>"> edit <i class="fa fa-edit"></i> </a>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                     <a class="middle none center mr-4 rounded-lg bg-red-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"data-ripple-light="true" href="deleteProject.php?Project_ID=<?php echo $row['Project_ID']?>">delete <i class="fa fa-close"></i> </a>
                                </td>
                            </tr>
                        <?php endwhile;?>
                    <?php endif;?>
                </tbody>
            </table>
            <div class="flex items-center justify-center p-4">
            <button class="w-[10%] text-xl text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a class="nav-link" href="addProject.php">Add New</a></button>
            </div>
        </div>
    </div>

    
<?php  include('inc/footer.php'); ?>

 
  