<?php include "../config.php";
redirectIfNotLogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Course | Coach</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body class="bg-slate-300">

    <?php include "adminHeader.php"; ?>



    <div class="px-[10%] py-10 flex gap-10">
        <div class="w-1/5 fixed">
            <?php include "sidebar.php"; ?>
        </div>
        <div class="w-4/5 ml-[30%]">
            <div class="flex justify-between items-center">
                <h3 class="text-xl font-semibold mb-4 text-white">Insert New Course</h3>
                <a href="insert_course.php" class="bg-red-600 text-white px-3 py-2 rounded">Go Back</a>
            </div>
            <?php
            $titleError = "";
            $categoryError = "";
            $feesError = "";
            $descriptionError = "";
            $instructorError = "";
            $durationError = "";
            $imageError = "";


            if (isset($_POST['insert_course'])) {
                $title = $_POST['title'];
                $category = $_POST['category'];
                $fees = $_POST['fees'];
                $description = $_POST['description'];
                $instructor = $_POST['instructor'];
                $duration = $_POST['duration'];
                $image = $_FILES['image']['name'];
                $tmp_image = $_FILES['image']['tmp_name'];


                // title validation
                if (empty($title)) {
                    $titleError = "TItle is Required";
                } elseif (!preg_match("/^[A-z ]+$/", $title)) {
                    $titleError = "Title must be a string";
                } elseif (strlen($title) <= 3) {
                    $titleError = "title must be more than 3 characters";
                }

                // category validation
                if (empty($category)) {
                    $categoryError = "Category is Required";
                } elseif (strlen($category) <= 3) {
                    $categoryError = "category must be more than 3 Characters";
                } elseif (!preg_match("/^[A-z ]+$/", $category)) {
                    $categoryError = "Category must be a string";
                }

                // fees validation
                if (empty($fees)) {
                    $feesError = "Fees is Required";
                } elseif (!preg_match("/^[0-9]+$/", $fees)) {
                    $feesError = "Fees must be Positive integer";
                }

                //description Validation
                if (empty($description)) {
                    $descriptionError = "Description is Required";
                }
                 elseif (strlen($description) <= 20) {
                    $descriptionError = "description must be more than 20 Characters";
                }

                //instructor
                if (empty($instructor)) {
                    $instructorError = "instructor is Required";
                } elseif (!preg_match("/^[A-z ]+$/", $instructor)) {
                    $instructorError = "instructor must be a string";
                } elseif (strlen($instructor) <= 3) {
                    $instructorError = "instructor must be more than 3 Characters";
                }

                // image 
                $imageType =$_FILES['image']['type']; 
                $imageSize = $_FILES['image']['size'];

                $extension = ["image/png", "image/jpg","image/jpeg","image/gif"];

                if (!in_array($imageType, $extension)){
                    $imageError = "Image file must be png, jpg, jpeg, gif only";
                }
                elseif($imageSize >=  1 * 1024 * 1024){
                    $imageError = "Image must be 1 MB or Below";
                }
                
                // duation
                if (empty($duration)) {
                    $durationError = "$duration is Required";
                } elseif (!preg_match("/^[0-9]+$/", $duration)) {
                    $durationError = "duration must be Positive integer";
                }


                if ($titleError == "" && $descriptionError == "" && $feesError == "" && $categoryError == "" && $instructorError == "" && $imageError == "" && $durationError == "") {
                    move_uploaded_file($tmp_image, "../images/$image");

                    $query = "insert into courses (title, category, fees, instructor, description, duration, image) value ('$title','$category','$fees','$instructor','$description','$duration','$image')";

                    if (insertData($query)) {
                        redirect("manage_course.php");
                    } else {
                        echo "failed";
                    }
                }
            }
            ?>
            <form action="insert_course.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                <div>
                    <label class="block mb-1 font-medium text-white">Title</label>
                    <input type="text" name="title" value="<?= (isset($_POST['title']))? $_POST['title'] : null;?>" class="w-full p-2 border border-gray-300 rounded bg-white" />
                    <p class="text-red-900  text-sm"><?= $titleError; ?></p> 
                </div>
                <div>
                    <label class="block mb-1 font-medium text-white">Category</label>
                    <input type="text" name="category" value="<?= (isset($_POST['category']))? $_POST['category'] : null;?>" class="w-full p-2 border border-gray-300 rounded bg-white" />
                    <p class="text-red-900  text-sm"><?= $categoryError; ?></p> 

                </div>
                <div>
                    <label class="block mb-1 font-medium text-white">Fees</label>
                    <input type="number" step="0.01" name="fees" value="<?= (isset($_POST['fees']))? $_POST['fees'] : null;?>" class="w-full p-2 border border-gray-300 rounded bg-white" />
                    <p class="text-red-900  text-sm"><?= $feesError; ?></p> 

                </div>
                <div>
                    <label class="block mb-1 font-medium text-white">Image</label>
                    <input type="file" name="image" class="w-full p-2 border border-gray-300 rounded bg-white" />
                    <p class="text-red-900  text-sm"><?= $imageError; ?></p> 

                </div>
                <div>
                    <label class="block mb-1 font-medium text-white">Description</label>
                    <textarea name="description" rows="4" class="w-full p-2 border border-gray-300 rounded bg-white"><?= (isset($_POST['description']))? $_POST['description'] : null;?></textarea>
                    <p class="text-red-900  text-sm"><?= $descriptionError; ?></p> 

                </div>
                <div>
                    <label class="block mb-1 font-medium text-white">Instructor</label>
                    <input type="text" name="instructor" value="<?= (isset($_POST['instructor']))? $_POST['instructor'] : null;?>" class="w-full p-2 border border-gray-300 rounded bg-white" />
                    <p class="text-red-900  text-sm"><?= $instructorError; ?></p> 

                </div>
                <div>
                    <label class="block mb-1 font-medium text-white">Duration</label>
                    <input type="text" name="duration" class="w-full p-2 border border-gray-300 rounded bg-white" />
                    <p class="text-red-900  text-sm"><?= $durationError; ?></p> 

                </div>

                <div>
                    <button type="submit" name="insert_course" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Insert Course</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>