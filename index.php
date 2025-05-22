<?php include "config.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach - Explore Our Courses</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #6b7280 0%, #1e3a8a 100%);
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <?php include "header.php";?>

    <!-- Hero Section -->
    <section class="gradient-bg text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Discover Your Path to Success</h1>
            <p class="text-lg md:text-xl mb-8">Explore our curated courses designed to empower your learning journey.</p>
            <a href="#courses" class="inline-block bg-white text-teal-900 px-6 py-3 rounded-full font-semibold hover:bg-teal-100 transition">Browse Courses</a>
        </div>
    </section>

    <!-- Courses Section -->
    <section id="courses" class="container mx-auto px-[10%] py-12">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-10">Our Featured Courses</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php 
            $callingCourse = mysqli_query($connect, "select * from courses where status='active'");
            while($row = mysqli_fetch_array($callingCourse)):
            ?>
            <div class="bg-white rounded-xl overflow-hidden  border hover:shadow-lg hover:scale-105 transition-all duration-300">
                <div class="relative">
                    <img src="images/<?= htmlspecialchars($row['image']);?>" alt="<?= htmlspecialchars($row['title']);?>" class="w-full h-56 object-cover">
                    <div class="absolute top-0 right-0 bg-teal-600 text-white text-xs font-semibold px-3 py-1 rounded-bl-lg">
                        <?= htmlspecialchars($row['category']);?> 
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2"><?= htmlspecialchars($row['title']);?></h3>
                    <p class="text-gray-600 text-sm mb-2"><span class="font-medium">Instructor:</span> <?= htmlspecialchars($row['instructor']);?></p>
                    <p class="text-gray-600 text-sm mb-2"><span class="font-medium">Duration:</span> <?= htmlspecialchars($row['duration']);?></p>
                    <p class="text-gray-500 text-sm mb-4 line-clamp-3"><?= htmlspecialchars($row['description']);?></p>
                    <div class="flex justify-between items-center">
                        <span class="text-3xl font-bold text-teal-600">₹<?= htmlspecialchars($row['fees']);?></span>
                        <a href="#" class="bg-gradient-to-r from-teal-600 to-sky-700 text-white px-4 py-2 rounded-full text-sm font-semibold hover:opacity-90 transition">Enroll Now</a>
                    </div>
                </div>
            </div>
            <?php endwhile;?>
        </div>
    </section>

</body>
</html>