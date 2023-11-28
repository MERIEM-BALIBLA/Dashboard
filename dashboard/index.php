<!-- <php  include('inc/header.php'); ?> -->
<?php  include('../inc/header.php'); ?>

<?php
    $sql = "SELECT * FROM `User`";
    $result = mysqli_query($conn,$sql);
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
    <div class="w-full">
        <!-- <h1 class="text-center col-12 bg-primary py-3 text-white my-2">Home Page</h1> -->
        <div class="w-full p-6">
            <table class="border-collapse border border-gray-300 bg-gray-100" style="width:100%">
                <thead>
                    <tr class="bg-gray-300">
                    <!-- <th class="border-y border-gray-100 bg-gray-50/50 p-2" scope="col">#</th> -->
                    <th class="border-y border-gray-100 bg-gray-50/50 p-2" scope="col">Name</th>
                    <!-- <th class="border-y border-gray-100 bg-gray-50/50 p-2" scope="col">Country</th> -->
                    <th class="border-y border-gray-100 bg-gray-50/50 p-2" scope="col">Email</th>
                    <th class="border-y border-gray-100 bg-gray-50/50 p-2" scope="col">Edit</th>
                    <th class="border-y border-gray-100 bg-gray-50/50 p-2" scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(mysqli_num_rows($result) > 0):?>
                        <?php while($row = mysqli_fetch_assoc($result)):?>
                            <tr>
                                <!-- <th class="border border-gray-300 px-4 py-2"> echo $row['User_ID']</th> -->
                                <!-- <td class="border border-gray-300 px-4 py-2"><php echo $row['name']?></td> -->
                                <td class="border border-gray-300 px-4 py-2"><?php echo $row['name']?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo $row['Email_Adress']?></td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <a class="middle none center mr-4 rounded-lg bg-green-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    data-ripple-light="true" href="edit.php?User_ID=<?php echo $row['User_ID']?>"> edit <i class="fa fa-edit"></i> </a>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <a class="middle none center mr-4 rounded-lg bg-red-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    data-ripple-light="true" href="delete.php?User_ID=<?php echo $row['User_ID']?>">delete <i class="fa fa-close"></i> </a>
                                </td>
                            </tr>
                        <?php endwhile;?>
                    <?php endif;?>
                </tbody>
            </table>
            <div class="flex items-center justify-center p-4">
            <button class="w-[10%] text-xl text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><a class="nav-link" href="add.php">Add New</a></button>
            </div>
        </div>
    </div>
    <?php  include('../inc/footer.php'); ?>


 
  