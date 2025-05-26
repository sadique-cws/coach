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

<body class="bg-slate-600">

    <?php include "adminHeader.php";?>



    <div class="px-[10%] py-10 flex gap-10">
        <div class="w-1/5 fixed">
            <?php include "sidebar.php"; ?>
        </div>
        <div class="w-4/5 ml-[30%]">
            <div class="flex justify-between items-center">
                <h3 class="text-xl font-semibold mb-4 text-white">Insert New Course</h3>
                <a href="insert_course.php" class="bg-red-600 text-white px-3 py-2 rounded">Go Back</a>
            </div>
            <form action="insert_course.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                <div>
                    <label class="block mb-1 font-medium text-white">Title</label>
                    <input type="text" name="title" required class="w-full p-2 border border-gray-300 rounded bg-white" />
                </div>
                <div>
                    <label class="block mb-1 font-medium text-white">Category</label>
                    <input type="text" name="category" class="w-full p-2 border border-gray-300 rounded bg-white" />
                </div>
                <div>
                    <label class="block mb-1 font-medium text-white">Fees</label>
                    <input type="number" step="0.01" name="fees" class="w-full p-2 border border-gray-300 rounded bg-white" />
                </div>
                <div>
                    <label class="block mb-1 font-medium text-white">Image</label>
                    <input type="file" name="image" class="w-full p-2 border border-gray-300 rounded bg-white" />
                </div>
                <div>
                    <label class="block mb-1 font-medium text-white">Description</label>
                    <textarea name="description" rows="4" class="w-full p-2 border border-gray-300 rounded bg-white"></textarea>
                </div>
                <div>
                    <label class="block mb-1 font-medium text-white">Instructor</label>
                    <input type="text" name="instructor" class="w-full p-2 border border-gray-300 rounded bg-white" />
                </div>
                <div>
                    <label class="block mb-1 font-medium text-white">Duration</label>
                    <input type="text" name="duration" class="w-full p-2 border border-gray-300 rounded bg-white" />
                </div>

                <div>
                    <button type="submit" name="insert_course" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Insert Course</button>
                </div>
            </form>
            <?php 
            if(isset($_POST['insert_course'])){
                $title = $_POST['title'];
                $category = $_POST['category'];
                $fees = $_POST['fees'];
                $description = $_POST['description'];
                $instructor = $_POST['instructor'];
                $duration = $_POST['duration'];
                
                $image = $_FILES['image']['name'];
                $tmp_image = $_FILES['image']['tmp_name'];

                move_uploaded_file($tmp_image,"../images/$image");

                $query = "insert into courses (title, category, fees, instructor, description, duration, image) value ('$title','$category','$fees','$instructor','$description','$duration','$image')";

                if(insertData($query)){
                    redirect("manage_course.php");
                }
                else{
                    echo "failed";
                }
            }
            ?>
        </div>
    </div>

</body>

</html>