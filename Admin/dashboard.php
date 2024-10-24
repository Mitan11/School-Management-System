<?php include('../includes/config.php'); ?>
<?php include('header.php'); ?>
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
<?php include('sidebar.php'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
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
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-graduation-cap"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Students</span>
                <span class="info-box-number" id="total-students">
                    <?php
                    // Fetch the total number of students
                    $result = mysqli_query($db_connection, "SELECT COUNT(*) as total FROM `user_accounts` WHERE `user_type` = 'student'");
                    $row = mysqli_fetch_assoc($result);
                    $total_students = $row['total'];
                    echo number_format($total_students);
                    ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1">
                <i class="fas fa-users"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Total Teachers</span>
                <span class="info-box-number" id="total-teachers">
                    <?php
                    // Fetch the total number of teachers
                    $result = mysqli_query($db_connection, "SELECT COUNT(*) as total FROM `user_accounts` WHERE `user_type` = 'teacher'");
                    $row = mysqli_fetch_assoc($result);
                    $total_teachers = $row['total'];
                    echo number_format($total_teachers);
                    ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book-open"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Courses</span>
                <span class="info-box-number" id="total-courses">
                    <?php
                    // Fetch the total number of courses
                    $result = mysqli_query($db_connection, "SELECT COUNT(*) as total FROM `courses`");
                    $row = mysqli_fetch_assoc($result);
                    $total_courses = $row['total'];
                    echo number_format($total_courses);
                    ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-question-circle"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">New Inquiries</span>
                <span class="info-box-number" id="total-inquiries">2,000</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>

            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>

</div>
<!-- /.content-header -->
<?php include('footer.php'); ?>
<script>
    $(document).ready(function () {
        <?php if (isset($_SESSION['toastMessage'])): ?>
            // Set the message inside the toast
            $('#message').text("<?php echo htmlspecialchars($_SESSION['toastMessage']); ?>");

            // Show the toast
            $('.toast').toast('show');

            // Unset the session message to avoid showing it again on page reload
            <?php unset($_SESSION['toastMessage']); ?>
        <?php endif; ?>
    });
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    function animateCounter(elementId, endValue) {
        const element = document.getElementById(elementId);
        let startValue = 0;
        const duration = 2000; // Duration in milliseconds
        const stepTime = Math.abs(Math.floor(duration / endValue));
        
        const timer = setInterval(function() {
            startValue += 1;
            element.innerHTML = numberWithCommas(startValue);
            if (startValue >= endValue) {
                clearInterval(timer);
                element.innerHTML = numberWithCommas(endValue); // Ensure it ends exactly at the final value
            }
        }, stepTime);
    }

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Get the total values
    const totalStudents = <?php echo $total_students; ?>;
    const totalTeachers = <?php echo $total_teachers; ?>;
    const totalCourses = <?php echo $total_courses; ?>;

    // Start the counters
    animateCounter('total-students', totalStudents);
    animateCounter('total-teachers', totalTeachers);
    animateCounter('total-courses', totalCourses);
});
</script>
