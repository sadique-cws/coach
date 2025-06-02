<?php include "config.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login | Coach</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body>

    <?php include "header.php"; ?>

  <?php
  $loginError = "";
            if (isset($_POST['login'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $password = md5($password);
                    $query = mysqli_query($connect, "select * from students where email='$email' or contact='$email'");
                    $loginedData = mysqli_fetch_array($query);
                    $count = mysqli_num_rows($query);
                    if($count){
                        
                        if($loginedData['password'] == $password){
                            $_SESSION['student'] = $loginedData['email'];
                            redirect("student");
                        }
                        else{
                            $loginError = "Invalid Crediential";
                        }
                    }
                    else{
                        $loginError = "Invalid Email or Phone no";
                    }

               
            }
            ?>
    <div class=" flex justify-center items-center w-full h-screen">
        <div class="shadow border  w-1/4 <?= ($flag) ? 'border-red-500 bg-red-100' : 'border-slate-300 bg-slate-100 ';?> p-5">
            <h2 class="text-2xl font-bold">Student Login Here</h2>
            <p class="text-slate-500 mt-2">Fill Email & Password</p>
            <hr class="my-2">
          
            <form action="" method="post" class="grid grid-cols-1 gap-5">
               
                <div class="flex ">
                    <div class="flex-1 flex-col flex">
                        <label for="email" class="text-sm text-slate-600">email or contact no</label>
                        <input type="text" name="email" value="<?= (isset($_POST['email']))? $_POST['email']: null?>" class="border w-full px-3 py-2 rounded bg-white">
                    </div>
                </div>
               
                <div class="flex ">
                    <div class="flex-1 flex-col flex">
                        <label for="password" class="text-sm text-slate-600">password</label>
                        <input type="password" name="password" class="border w-full px-3 py-2 rounded bg-white">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="flex w-full">
                        <div class="flex-1 flex-col flex">
                            <input type="submit" name="login" class="bg-teal-700 w-full border px-3 py-2 rounded shadow-sm text-white" value="Login Now">
                        </div>
                    </div>
                </div>

                <p class="text-red-500 font-semibold text-sm"><?= $loginError; ?></p>
            </form>

        </div>
    </div>



</body>

</html>