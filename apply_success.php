<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Application Submitted | Coach</title>
    <script src="https://cdn.jsdelivr.net/npm/fireworks-js@2.x/dist/index.umd.js"></script>

<!-- UNPKG -->
<script src="https://unpkg.com/fireworks-js@2.x/dist/index.umd.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
         body {
      margin: 0;
      overflow: hidden;
    }
    .fireworks {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      pointer-events: none;
    }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 ">
    <div class="fireworks"></div>
    <?php include "header.php"; ?>

    <div class="flex flex-col items-center justify-center min-h-screen px-4">
        <div class="bg-white border border-green-200 rounded-2xl shadow-lg max-w-xl w-full p-8 text-center">
            <div class="flex justify-center mb-4">
                <svg class="w-16 h-16 text-green-600" fill="none" stroke="currentColor" stroke-width="1.5"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12l2 2l4 -4m6 2a9 9 0 1 1 -18 0a9 9 0 0 1 18 0z" />
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-green-700 mb-2 ">Application Submitted!</h2>
            <p class="text-gray-600 text-lg">
                Thank you for applying to join us. Our team will review your application shortly.
            </p>
            <p class="text-gray-500 mt-2">
                You will be notified via email once your application is approved.
            </p>
            <a href="index.php" class="inline-block mt-6 px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                Back to Home
            </a>
        </div>
    </div>


    <script>
  const container = document.querySelector('.fireworks')
  const fireworks = new Fireworks.default(container)
  fireworks.start()
</script>
</body>

</html>
