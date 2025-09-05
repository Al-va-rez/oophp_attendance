<?php

require_once "../core/classLoaders.php";

echo "hello admin";

$courses = $obj_Course->readAll("courses");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</head>
<body>
    <button type="button" onclick="location.href='../core/handleForms.php?btn_Logout=1'" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700">
        Logout
    </button>

    <h1 class="font-bold text-2xl">Create Course</h1>
    <form id="createCourseForm">

        <label for="courseCode">Code</label>
        <input type="text" id="formCourseCode" name="courseCode" class="inputBox" required>
        
        <label for="courseTitle">Title</label>
        <input type="text" id="formCourseTitle" class="inputBox" name="courseTitle" required>
        
        <label for="courseUnits">Units</label>
        <input type="number" id="formCourseUnits" class="inputBox" name="courseUnits" required>

        <button class="px-6 py-2 bg-blue-500 rounded-full text-lg text-white font-semibold hover:bg-blue-700">Create</button>
    </form>

    <h2 class="text-2xl font-bold mb-4">COURSES</h2>
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">#</th>
                <th class="border p-2">Code</th>
                <th class="border p-2">Title</th>
                <th class="border p-2">Units</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($courses as $course): ?>
                <tr class="text-center">
                    <td class="border p-2"><?= $course['id'] ?></td>
                    <td class="border p-2"><?= $course['code'] ?></td>
                    <td class="border p-2"><?= $course['title'] ?></td>
                    <td class="border p-2"><?= $course['units'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <script src="scripts_Admin.js"></script>
</body>
</html>