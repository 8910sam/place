<?php 
error_reporting(0);
include("side.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Break-Even Point Chart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Break-Even Point Chart</h1>
        <form>
            <div class="form-group">
                <label for="dataSelect">Select Financial Data:</label>
                <select class="form-control" id="dataSelect">
                    <option value="1">Data Set 1</option>
                    <option value="2">Data Set 2</option>
                    <!-- Add more options for different data sets -->
                </select>
            </div>
            <button type="button" class="btn btn-primary" id="generateChartBtn">Generate Chart</button>
        </form>
        <div id="chartContainer" class="mt-4"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
<script>
$(document).ready(function () {
    // When the "Generate Chart" button is clicked
    $("#generateChartBtn").click(function () {
        const selectedData = $("#dataSelect").val();

        // Send an AJAX request to fetch the selected data
        $.ajax({
            url: "fetch_data.php",
            method: "POST",
            data: { selectedData: selectedData },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    generateChart(data);
                } else {
                    alert("No data available for the selected dataset.");
                }
            },
            error: function () {
                alert("Error fetching data from the server.");
            }
        });
    });

    // Function to generate the break-even point chart
    function generateChart(data) {
        const chart = new CanvasJS.Chart("chartContainer", {
            title: {
                text: "Break-Even Point Chart"
            },
            data: [{
                type: "line",
                dataPoints: data
            }]
        });

        chart.render();
    }
});
</script>
<?php
// Connect to your database (replace with your database credentials)
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data based on the selected dataset
$selectedData = $_POST["selectedData"];
$sql = "SELECT * FROM break_even_data WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $selectedData);
$stmt->execute();
$result = $stmt->get_result();

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = array(
        "x" => $row["x_axis_value"], // Replace with the appropriate column name for the x-axis
        "y" => $row["y_axis_value"]  // Replace with the appropriate column name for the y-axis
    );
}

$stmt->close();
$conn->close();

// Send the data as JSON
echo json_encode($data);
?>
Replace "x_axis_value" and "y_axis_value" with the actual column names in your database that correspond to the x and y-axis values for your break-even chart.

5. Run your application:

Make sure you have a web server with PHP support to run this application. When you select a financial dataset and click the "Generate Chart" button, it will fetch the data from the database, create a break-even point chart, and display it using CanvasJS.

Remember to replace the database credentials and column names with your actual database information. Additionally, you may need to adjust the charting library and its configuration based on your specific charting requirements.




