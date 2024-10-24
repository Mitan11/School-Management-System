<?php include('../includes/config.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">SMS</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="message">
            <!-- Message will be displayed here -->
        </div>
    </div>
</div>


<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2 class="m-0">Dashboard</h2>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Student</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <!-- /.container-fluid -->

    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-6">
                    <h2>Attendance Insights</h2>
                    <canvas id="attendanceChart"></canvas>
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>

    <section class="content pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h3>Uploaded Images</h3>
                    <div class="row">
                        <?php
                        // Fetch images from the database
                        $imageQuery = "SELECT * FROM images";
                        $imageResult = mysqli_query($db_connection, $imageQuery);

                        // Loop through the fetched images and display them
                        while ($image = mysqli_fetch_assoc($imageResult)) {
                            echo '<div class="col-md-4 mb-3">';
                            echo '<div class="card ">';
                            echo '<img src="' . htmlspecialchars($image['file_path']) . '" class="card-img" alt="' . htmlspecialchars($image['file_name']) . '">';
                            echo '</div>'; // Close card div
                            echo '</div>'; // Close column div
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<!-- /.content-header -->
<?php include('footer.php'); ?>

<script>
    $(document).ready(function () {
        <?php
        // Fetch attendance data for the pie chart for the current student
        $query = "SELECT status, COUNT(*) as count FROM attendance WHERE student_id = '$std_id' GROUP BY status";
        $result = mysqli_query($db_connection, $query);

        // Initialize counts
        $attendanceCounts = [
            'present' => 0,
            'absent' => 0,
            'leave' => 0,
            'late' => 0
        ];

        // Loop through the results and count statuses
        while ($data = mysqli_fetch_assoc($result)) {
            $attendanceCounts[$data['status']] = $data['count'];
        }

        // Prepare data for the pie chart
        $statuses = ['Present', 'Absent', 'Leave', 'Late'];
        $counts = [
            $attendanceCounts['present'],
            $attendanceCounts['absent'],
            $attendanceCounts['leave'],
            $attendanceCounts['late']
        ];

        // Debugging output
        echo "console.log(" . json_encode($statuses) . ");";
        echo "console.log(" . json_encode($counts) . ");";
        ?>
        
        // Create the pie chart
        var ctx = document.getElementById('attendanceChart').getContext('2d');
        var attendanceChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($statuses); ?>,
                datasets: [{
                    data: <?php echo json_encode($counts); ?>,
                    backgroundColor: ['#4CAF50', '#F44336', '#2196F3', '#FF9800'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Attendance Status'
                    }
                }
            }
        });
    });
</script>
