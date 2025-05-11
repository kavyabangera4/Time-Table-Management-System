<?php
include 'db.php';

$sql = "SELECT s.ScheduleID, sub.Name AS SubjectName, t.Name AS TeacherName, 
               c.RoomName, ts.StartTime, ts.EndTime, s.DayOfWeek 
        FROM schedule s
        JOIN subjects sub ON s.SubjectID = sub.SubjectID
        JOIN teachers t ON s.TeacherID = t.TeacherID
        JOIN classrooms c ON s.RoomID = c.RoomID
        JOIN timeslots ts ON s.SlotID = ts.SlotID
        ORDER BY FIELD(s.DayOfWeek, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'), ts.StartTime";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetable</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 30px auto;
            width: 80%;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .no-data {
            font-size: 18px;
            color: red;
            font-weight: bold;
        }
        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-btn:hover {
            background: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Timetable</h2>

    <?php if ($result->num_rows > 0) { ?>
        <table>
            <tr>
                <th>Schedule ID</th>
                <th>Subject</th>
                <th>Teacher</th>
                <th>Room</th>
                <th>Time Slot</th>
                <th>Day</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row["ScheduleID"]; ?></td>
                    <td><?php echo $row["SubjectName"]; ?></td>
                    <td><?php echo $row["TeacherName"]; ?></td>
                    <td><?php echo $row["RoomName"]; ?></td>
                    <td><?php echo $row["StartTime"] . " - " . $row["EndTime"]; ?></td>
                    <td><?php echo $row["DayOfWeek"]; ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p class="no-data">No schedules found.</p>
    <?php } ?>

    <a href="insert_schedule.php" class="back-btn">Add New Schedule</a>
</div>

</body>
</html>

<?php
$conn->close();
?>
