<?php include "../config.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Courses Coach</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="bg-slate-600">
<?php include "adminHeader.php";?>



<div class="px-[10%] py-10 flex gap-10">
    <div class="w-1/5">
       <?php include "sidebar.php";?>
    </div>
    <div class="w-4/5">
        

        <?php 
            $callingCourses = mysqli_query($connect, "select * from courses");
            $count = mysqli_num_rows($callingCourses);
            if($count > 0):
        ?>
           <div class="flex justify-between items-center mt-10">
             <h2 class="text-2xl font-bold text-slate-300">All Courses (<?= $count; ?>)</h2>
            <a href="insert_course.php" class="bg-orange-600 text-white px-3 py-2 text-md rounded">Add First Course</a>

           </div>
        <div class="flex mt-10">
            <table class="border text-slate-200 border-slate-400 p-3 w-full">
                <thead>
                    <tr>
                        <th class="border border-slate-400 px-3 py-1">Id</th>
                        <th class="border border-slate-400 px-3 py-1">title</th>
                        <th class="border border-slate-400 px-3 py-1">Instructor</th>
                        <th class="border border-slate-400 px-3 py-1">Fees</th>
                        <th class="border border-slate-400 px-3 py-1">Batch</th>
                        <th class="border border-slate-400 px-3 py-1">Image</th>
                        <th class="border border-slate-400 px-3 py-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while($row = mysqli_fetch_array($callingCourses)):
                    ?>
                    <tr>
                        <td class="border border-slate-400 px-3 py-1"><?= $row['id'];?></td>
                        <td class="border border-slate-400 px-3 py-1"><?= $row['title'];?></td>
                        <td class="border border-slate-400 px-3 py-1"><?= $row['instructor'];?></td>
                        <td class="border border-slate-400 px-3 py-1"><?= $row['fees'];?></td>
                        <td class="border border-slate-400 px-3 py-1"></td>
                        <td class="border border-slate-400 px-3 py-1">
                            <img src="../images/<?= $row['image'];?>" width="100px" alt=""/>
                        </td>
                      
                        <td class="border border-slate-400 px-3 py-1">
                            <div class="flex gap-1">
                                <a href="" class="bg-red-600 text-white px-3 py-2 rounded hover:bg-red-700">X</a>
                                <a href="" class="bg-green-600 text-white px-3 py-2 rounded hover:bg-green-700">Edit</a>
                                <a href="" class="bg-amber-600 text-white px-3 py-2 rounded hover:bg-amber-700">Edit</a>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile;?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <h2 class="text-5xl text-slate-400 font-black my-10">No Courses Records Found</h2>
            <a href="insert_course.php" class="bg-orange-600 text-white px-3 py-2 text-2xl rounded">Add First Course</a>

        <?php endif;?>
    </div>
</div>

</body>
</html>