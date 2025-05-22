<?php include "config.php";?>
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


    <div class="px-[10%] py-10 mt-10 flex justify-center w-full">
        <div class="bg-slate-100 shadow border border-slate-300 w-3/6 p-5">
            <h2 class="text-2xl font-bold">Apply For Join Us</h2>
            <p class="text-slate-500 mt-2">Fill all required Fields </p>
            <hr class="my-2">
            <form action="" method="post" class="grid grid-cols-2 gap-5">
                <div class="flex ">
                    <div class="flex-1 flex-col flex">
                        <label for="fullname" class="text-sm text-slate-600">fullname</label>
                        <input type="text" name="fullname" class="border w-full px-3 py-2 rounded bg-white">
                    </div>
                </div>
                <div class="flex ">
                    <div class="flex-1 flex-col flex">
                        <label for="father" class="text-sm text-slate-600">father</label>
                        <input type="text" name="father" class="border w-full px-3 py-2 rounded bg-white">
                    </div>
                </div>
                <div class="flex ">
                    <div class="flex-1 flex-col flex">
                        <label for="email" class="text-sm text-slate-600">email</label>
                        <input type="email" name="email" class="border w-full px-3 py-2 rounded bg-white">
                    </div>
                </div>
                <div class="flex ">
                    <div class="flex-1 flex-col flex">
                        <label for="contact" class="text-sm text-slate-600">contact</label>
                        <input type="text" name="contact" class="border w-full px-3 py-2 rounded bg-white">
                    </div>
                </div>
                <div class="flex ">
                    <div class="flex-1 flex-col flex">
                        <label for="city" class="text-sm text-slate-600">city</label>
                        <select name="city" class="border w-full px-3 py-2 rounded bg-white">
                            <option value="" selected disabled>Select City</option>
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
                            <option value="" selected disabled>Select state</option>
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
                        <input type="text" name="school" class="border w-full px-3 py-2 rounded bg-white">
                    </div>
                </div>
                <div class="flex ">
                      <div class="flex-1 flex-col flex">
                        <label for="nationality" class="text-sm text-slate-600">nationality</label>
                        <input type="text" name="nationality" class="border w-full px-3 py-2 rounded bg-white">
                    </div>
                </div>
                <div class="flex col-span-2">
                      <div class="flex-1 flex-col flex">
                        <label for="gender" class="text-sm text-slate-600">gender</label>
                        <select  name="gender" class="border w-full px-3 py-2 rounded bg-white">
                            <option value="" selected disabled>Select Gender</option>
                            <option>Male</option>
                            <option>female</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 col-span-2">
                    <div class="flex ">
                        <div class="flex-1 flex-col flex">

                            <input type="submit" name="apply" class="bg-teal-700 w-full border px-3 py-2 rounded shadow-sm text-white" value="Apply Now">
                        </div>
                    </div>
                </div>
            </form>
            <?php 
            if(isset($_POST['apply'])){
                $fullname = $_POST['fullname'];
                $father = $_POST['father'];
                $email = $_POST['email'];
                $contact = $_POST['contact'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $school = $_POST['school'];
                $nationality = $_POST['nationality'];
                $gender = $_POST['gender'];


                $query = mysqli_query($connect, "insert into students (fullname, father, contact, email, city, state, gender,school, nationality) value ('$fullname','$father','$contact','$email','$city','$state','$gender','$school','$nationality')");

                if($query){
                    redirect("apply_success.php");
                }
                else{
                    echo "wah na na wah....";
                }
            }
            ?>
        </div>
    </div>



</body>

</html>