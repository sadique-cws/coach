<?php include "config.php";

$fullnameError = "<p class='text-red-600 font-semibold text-xs'>";
$fatherError = "<p class='text-red-600 font-semibold text-xs'>";
$emailError = "<p class='text-red-600 font-semibold text-xs'>";
$contactError = "<p class='text-red-600 font-semibold text-xs'>";
$passwordError = "<p class='text-red-600 font-semibold text-xs'>";

$flag = false;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Join Us | Coach</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body>

    <?php include "header.php"; ?>

  <?php
            if (isset($_POST['apply'])) {
                $fullname = $_POST['fullname'];
                $father = $_POST['father'];
                $email = $_POST['email'];
                $contact = $_POST['contact'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $school = $_POST['school'];
                $nationality = $_POST['nationality'];
                $gender = $_POST['gender'];
                $password = $_POST['password'];


                // validation
                
                if ($fullname == "") {
                    $fullnameError .= "Fullname is required";
                    $flag = true;
                } 
                elseif (!preg_match("/^[A-z ]{3,}$/", $fullname)) {
                    $fullnameError .= "Fullname is Invalid or must be atleast 3 character";
                    $flag = true;
                } 
                if ($father == "") {
                    $flag = true;
                    $fatherError .= "Father is required";
                } 
                elseif (!preg_match("/^[A-z ]{3,}$/", $father)) {
                    $flag = true;
                    $fatherError .= "father is Invalid";
                } 
                if ($email == "") {
                    $emailError .= "Email is required";
                    $flag = true;
                } 
                elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailError .= "Email is Invalid";
                    $flag = true;
                }
                if ($contact == "") {
                    $contactError .= "contact is required";
                    $flag = true;
                } 
                elseif (!preg_match("/^[6-9]{1}[0-9]{9}$/", $contact)) {
                    $contactError .= "contact is Invalid";
                    $flag = true;
                } 

                if(strlen($password) <= 6){
                    $passwordError = "Password must be atleast 6 character ";
                    $flag = true;
                }

                if(!$flag){
                    $password = md5($password);
                    $query = mysqli_query($connect, "insert into students (fullname, father, contact, email, city, state, gender,school, nationality, password) value ('$fullname','$father','$contact','$email','$city','$state','$gender','$school','$nationality','$password')");

                    if ($query) {
                        redirect("apply_success.php");
                    } else {
                        echo "wah na na wah....";
                    }
                }

                $fullnameError .= "</p>";
                $fatherError .= "</p>";
                $emailError .= "</p>";
                $contactError .= "</p>";
                $passwordError .= "</p>";
            }
            ?>
    <div class="px-[10%] py-10 mt-10 flex justify-center w-full">
        <div class="shadow border <?= ($flag) ? 'border-red-500 bg-red-100' : 'border-slate-300 bg-slate-100 ';?>  w-3/6 p-5">
            <h2 class="text-2xl font-bold">Apply For Join Us</h2>
            <p class="text-slate-500 mt-2">Fill all required Fields </p>
            <hr class="my-2">
          
            <form action="" method="post" class="grid grid-cols-2 gap-5">
                <div class="flex ">
                    <div class="flex-1 flex-col flex">
                        <label for="fullname" class="text-sm text-slate-600">fullname</label>
                        <input type="text" name="fullname" value="<?= (isset($_POST['fullname']))? $_POST['fullname']: null?>" class="border w-full px-3 py-2 rounded bg-white">
                        <?= $fullnameError; ?>
                    </div>
                </div>
                <div class="flex ">
                    <div class="flex-1 flex-col flex">
                        <label for="father" class="text-sm text-slate-600">father</label>
                        <input type="text" name="father" value="<?= (isset($_POST['father']))? $_POST['father']: null?>" class="border w-full px-3 py-2 rounded bg-white">
                        <?= $fatherError; ?>

                    </div>
                </div>
                <div class="flex ">
                    <div class="flex-1 flex-col flex">
                        <label for="email" class="text-sm text-slate-600">email</label>
                        <input type="text" name="email" value="<?= (isset($_POST['email']))? $_POST['email']: null?>" class="border w-full px-3 py-2 rounded bg-white">
                        <?= $emailError; ?>
                    </div>
                </div>
                <div class="flex ">
                    <div class="flex-1 flex-col flex">
                        <label for="contact" class="text-sm text-slate-600">contact</label>
                        <input type="text" name="contact" value="<?= (isset($_POST['contact']))? $_POST['contact']: null?>" class="border w-full px-3 py-2 rounded bg-white">
                        <?= $contactError; ?>

                    </div>
                </div>
                <div class="flex ">
                    <div class="flex-1 flex-col flex">
                        <label for="city" class="text-sm text-slate-600">city</label>
                        <select name="city" class="border w-full px-3 py-2 rounded bg-white">
                            <?php 
                            if(isset($_POST['city'])){
                                $city = $_POST['city'];
                                echo "<option value='$city' selected>$city</option>";
                            }
                            ?>
                            <option value="">Select City</option>
                            <option>Purnea</option>
                            <option>katihar</option>
                            <option>Ranchi</option>
                        </select>
                    </div>
                </div>
                <div class="flex ">
                    <div class="flex-1 flex-col flex">
                        <label for="state" class="text-sm text-slate-600">state</label>
                        <select name="state" class="border w-full px-3 py-2 rounded bg-white">
                            <?php 
                            if(isset($_POST['state'])){
                                $state = $_POST['state'];
                                echo "<option value='$state' selected>$state</option>";
                            }
                            ?>
                            <option value="">Select state</option>
                            <option>Bihar</option>
                            <option>J&K</option>
                            <option>UP</option>
                            <option>MP</option>
                            <option>UK</option>

                        </select>
                    </div>
                </div>
                <div class="flex ">
                    <div class="flex-1 flex-col flex">
                        <label for="school" class="text-sm text-slate-600">school</label>
                        <input type="text" name="school" value="<?= (isset($_POST['school']))? $_POST['school']: null?>" class="border w-full px-3 py-2 rounded bg-white">
                    </div>
                </div>
                <div class="flex ">
                    <div class="flex-1 flex-col flex">
                        <label for="nationality" class="text-sm text-slate-600">nationality</label>
                        <input type="text" name="nationality" value="<?= (isset($_POST['nationality']))? $_POST['nationality']: null?>" class="border w-full px-3 py-2 rounded bg-white">
                    </div>
                </div>
                <div class="flex col-span-2">
                    <div class="flex-1 flex-col flex">
                        <label for="gender" class="text-sm text-slate-600">gender</label>
                        <select name="gender" class="border w-full px-3 py-2 rounded bg-white">
                            <?php 
                            if(isset($_POST['gender'])){
                                $gender = $_POST['gender'];
                                echo "<option value='$gender' selected>$gender</option>";
                            }
                            ?>
                            <option value="">Select Gender</option>
                            <option>Male</option>
                            <option>female</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>

                <div class="flex ">
                    <div class="flex-1 flex-col flex">
                        <label for="password" class="text-sm text-slate-600">password</label>
                        <input type="password" name="password" class="border w-full px-3 py-2 rounded bg-white">
                        <?= $passwordError; ?>

                    </div>
                </div>

                <div class="mb-3 col-span-2">
                    <div class="flex w-full">
                        <div class="flex-1 flex-col flex">

                            <input type="submit" name="apply" class="bg-teal-700 w-full border px-3 py-2 rounded shadow-sm text-white" value="Apply Now">
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>



</body>

</html>