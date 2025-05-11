<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject_id = $_POST['subject_id'];
    $teacher_id = $_POST['teacher_id'];
    $room_id = $_POST['room_id'];
    $slot_id = $_POST['slot_id'];
    $day_of_week = $_POST['day_of_week'];

    $sql = "INSERT INTO schedule (SubjectID, TeacherID, RoomID, SlotID, DayOfWeek) 
            VALUES ('$subject_id', '$teacher_id', '$room_id', '$slot_id', '$day_of_week')";

    if ($conn->query($sql) === TRUE) {
        $message = "<p class='success'>Schedule added successfully!</p>";
    } else {
        $message = "<p class='error'>Error: " . $conn->error . "</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Schedule</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        .success {
            color: green;
            font-weight: bold;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            width: 150px;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #28a745;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #218838;
        }
        h2{
            font-size: 25px;
            color: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <?php if (!empty($message)) echo $message; ?>

    <h2>ADD SCHEDULE</h2>

    <form action="" method="post">
        <label>Subject ID:</label>
        <input type="text" name="subject_id" required>

        <label>Teacher ID:</label>
        <input type="text" name="teacher_id" required>

        <label>Room ID:</label>
        <input type="text" name="room_id" required>

        <label>Slot ID:</label>
        <input type="text" name="slot_id" required>

        <label>Day of Week:</label>
        <select name="day_of_week">
            <option>Monday</option>
            <option>Tuesday</option>
            <option>Wednesday</option>
            <option>Thursday</option>
            <option>Friday</option>
            <option>Saturday</option>
            <option>Sunday</option>
        </select>

        <button type="submit" class="btn btn-primary">Add Schedule</button>
    </form>

    <a href="view_timetable.php"><button class="btn btn-secondary">View Timetable</button></a>
</div>

</body>
</html>
