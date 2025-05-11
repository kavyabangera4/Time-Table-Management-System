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
if ($result->num_rows > 0) {
    echo "<h2>Timetable</h2>";
    echo "<table border='1'>
            <tr>
                <th>Schedule ID</th>
                <th>Subject</th>
                <th>Teacher</th>
                <th>Room</th>
                <th>Time Slot</th>
                <th>Day</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["ScheduleID"]."</td>
                <td>".$row["SubjectName"]."</td>
                <td>".$row["TeacherName"]."</td>
                <td>".$row["RoomName"]."</td>
                <td>".$row["StartTime"]." - ".$row["EndTime"]."</td>
                <td>".$row["DayOfWeek"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No schedules found.";
}

$conn->close();
?>
