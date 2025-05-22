<?php include "../config.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach</title>
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
            $callingAdmission = mysqli_query($connect, "select * from students where status=0");
            $count = mysqli_num_rows($callingAdmission);
            if($count > 0):
        ?>
            <h2 class="text-2xl mt-10 font-bold text-slate-300">All Admissions (<?= $count; ?>)</h2>
        <div class="flex mt-10">
            <table class="border text-slate-200 border-slate-400 p-3 w-full">
                <thead>
                    <tr>
                        <th class="border border-slate-400 p-3">Id</th>
                        <th class="border border-slate-400 p-3">Name</th>
                        <th class="border border-slate-400 p-3">Father</th>
                        <th class="border border-slate-400 p-3">Contact</th>
                        <th class="border border-slate-400 p-3">Email</th>
                        <th class="border border-slate-400 p-3">City (State)</th>
                        <th class="border border-slate-400 p-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while($row = mysqli_fetch_array($callingAdmission)):
                    ?>
                    <tr>
                        <td class="border border-slate-400 p-3"><?= $row['id'];?></td>
                        <td class="border border-slate-400 p-3"><?= $row['fullname'];?></td>
                        <td class="border border-slate-400 p-3"><?= $row['father'];?></td>
                        <td class="border border-slate-400 p-3"><?= $row['contact'];?></td>
                        <td class="border border-slate-400 p-3"><?= $row['email'];?></td>
                        <td class="border border-slate-400 p-3"><?= $row['city'];?> (<?= $row['state'];?>)</td>
                        <td class="border border-slate-400 p-3">
                            <a href="index.php?approve=<?= $row['id'];?>" class="px-2 py-1 text-sm bg-teal-500 rounded hover:bg-teal-800 text-teal-800 font-bold">Approve</a>
                        </td>
                    </tr>
                    <?php endwhile;?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <h2 class="text-5xl text-slate-400 font-black mt-10">No Admission Records</h2>
        <?php endif;?>
    </div>
</div>

</body>
</html>
<?php 
if(isset($_GET['approve'])){
    $id = $_GET['approve'];

    $query = mysqli_query($connect,"update students SET status=1 where id='$id' and status=0");
    if($query){
        redirect();
    }
}