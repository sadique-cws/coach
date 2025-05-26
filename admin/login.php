<?php include "../config.php";


// $password = md5("123456789");
// mysqli_query($connect,"insert into admin (email,password) value ('rock@gmail.com','$password')");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="bg-slate-600">

<div class="px-[10%] py-10 flex gap-10 justify-center h-screen items-center">
    <div class="w-4/12">
        <div class="bg-teal-200 rounded shadow-lg h-auto p-5">
            <h2 class="text-teal-900 text-2xl font-bold">Admin Login Here</h2>
            <hr class="my-5">
            <form action="" method="post">
                <div class="mb-2 flex flex-col">
                    <label for="" class="text-teal-900 text-lg font-semibold">Email / Username</label>
                    <input type="text" name="email" placeholder="Enter reg email" class="border px-3 py-2 rounded w-full" id="">
                </div>
                <div class="mb-2 flex flex-col">
                    <label for="" class="text-teal-900 text-lg font-semibold">Password</label>
                    <input type="password" name="password" placeholder="Enter reg email" class="border px-3 py-2 rounded w-full" id="">
                </div>
                <div class="my-3">
                    <input type="submit" name="login" class="bg-teal-800 text-white w-full px-3 py-2 rounded">
                </div>
            </form>
            <?php 
            if(isset($_POST['login'])){
                $email = $_POST['email'];
                $password = $_POST['password'];


                $query = mysqli_query($connect,"select * from admin where email ='$email'");

                $count = mysqli_num_rows($query);
                $data = mysqli_fetch_array($query);

                if($count > 0){
                    if($data['password'] == md5($password)){
                        $_SESSION['admin'] = $email;
                        redirect();
                    }
                    else{
                        echo "<p class='text-red-600 font-bold text-lg'>invalid credential</p>";
                    }
                }
                else{
                    echo "<p class='text-red-600 font-bold text-lg'>email or username is invalid</p>";
                }
            }
            ?>
        </div>
    </div>
</div>

</body>
</html>