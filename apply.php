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
                <?php
                $fields = ["full_name", "father", "email", "contact", "city", "state", "school", "nationality", "gender"];
                foreach ($fields as $field):
                ?>

                        <div class="flex ">
                            <div class="flex-1 flex-col flex">
                                <label for="<?= $field; ?>" class="text-sm text-slate-600"><?= $field; ?></label>
                                
                               <?php 
                               if($field == "gender" || $field == 'nationality'):
                                if($field == "gender"):
                                        $options = ["male","female","others"];
                                    elseif($field == "nationality"):
                                        $options = ["indian","nepali"];
                                    endif;
                                    echo "<select name='$field' class='border w-full bg-white px-3 py-2 rounded'>";
                                    foreach($options as $o):
                                        echo "<option value='$o'>$o</option>";
                                    endforeach;
                                    echo "</select>";
                                else: 
                                    echo "<input type=\"text\" class=\"border w-full bg-white px-3 py-2 rounded\" name=\"<?= $field; ?>\">";
                                endif;
                                ?>
                                        

                            </div>
                        </div>

                <?php endforeach; ?>

                <div class="mb-3">
                        <div class="flex ">
                            <div class="flex-1 flex-col flex">
                              
                                <input type="submit" name="apply"  class="bg-teal-700 w-full border px-3 py-2 rounded shadow-sm text-white" value="Apply Now">
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>



</body>

</html>