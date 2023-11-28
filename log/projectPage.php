<?php include('header.php')?>
<section class="flex justify-center items-center flex-wrap pt-12 w-full gap-8 p-20">
    <!-- Le reste de votre contenu ici -->
            <?php
                $sql = "SELECT * FROM `project` ORDER BY `Project_ID` DESC";
                $result = mysqli_query($conn,$sql);
            ?>
                <?php if(mysqli_num_rows($result) > 0):?>
                <?php while($row = mysqli_fetch_assoc($result)):?> 
    <div class="flex flex-col gap-8 justify-center items-center rounded-[18px] drop-shadow-[0px_2px_28px_0px_#3E35780A] shadow-[0px_2px_28px_0px_#3E35780A] bg-white dark:bg-cardGrey p-8 w-[329px]">
              <div class="flex justify-center items-center flex-col gap-4">
                <img src="../images/job-logo-1.png.svg" alt="first-job-logo"> 
              <h3 class="dark:text-slate-50 text-defaultText font-poppins font-semibold text-xl"><?php echo $row['Project_title']?></h3>
              <p class="text-mainBlue dark:text-mainPurple font-poppins font-normal text-base"><?php echo $row['Descriptions']?></p>
              </div>
              <div class="flex justify-center items-center flex-col gap-4 w-full">
                <div class="flex justify-between items-center flex-row w-full">
                  <img src="../images/List → Item → SVG (4).svg" alt="money-bag">
                  <p class="font-poppins text-[15px] font-medium text-center text-defaultText dark:text-slate-50">$14,000 - $25,000</p>
                  <p class="font-poppins text-[15px] font-medium text-center text-textGrey">/monthly</p>
                </div>
                <div class="flex justify-between items-center flex-row w-full">
                  <img src="../images/List → Item → SVG (5).svg" alt="money-bag">
                  <p class="font-poppins text-[15px] font-medium text-center text-defaultText dark:text-slate-50">London, England</p>
                  <p class="font-poppins text-[15px] font-medium text-center text-textGrey underline">View Maps</p>
                </div>
              </div>
              <div class="flex justify-center items-center flex-row w-full gap-4">
                <div class="rounded-full aspect-square w-[50px] bg-[#FF5353] flex justify-center items-center"><img src="../images/SVG (3).svg" alt="heart-emoji"></div>
                <button type="button" class="text-slate-50 rounded-full bg-blue-500 py-2 px-8 flex justify-center items-center dark:bg-mainPurple font-poppins text-base font-medium w-full">Apply Now</button>
              </div>
    </div>
            <?php endwhile;?> 
            <?php endif;?>
</section>