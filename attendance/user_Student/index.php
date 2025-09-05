<?php
require_once "../core/classLoaders.php";

echo "hello student";

$courses = $obj_Student->readAll("courses");
$enrollment = $obj_Enrollment->getEnrollment($_SESSION['username']);
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

    <h1 class="font-bold text-2xl">Enroll to Course</h1>
    <form id="createEnrollmentForm">

        <label for="courseTitle">Title</label>
        <select id="formCourseTitle" class="border px-3 py-2 w-full" name="courseTitle" required>
            <?php foreach($courses as $course): ?>
                <option value="<?= $course['title'] ?>"><?= $course['title'] ?></option>
            <?php endforeach ?>
        </select>

        <button class="px-6 py-2 bg-blue-500 rounded-full text-lg text-white font-semibold hover:bg-blue-700">Enroll</button>
    </form>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">#</th>
                <th class="border p-2">Course Title</th>
                <th class="border p-2">Date Enrolled</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($enrollment as $e): ?>
                <tr class="text-center">
                    <td class="border p-2"><?= $e['id'] ?></td>
                    <td class="border p-2"><?= $e['course_title'] ?></td>
                    <td class="border p-2"><?= $e['date_enrolled'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <script src="scripts_Student.js"></script>
</html>