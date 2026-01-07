<?php
session_start();
error_reporting(0);
include('user/includes/dbconnection.php');
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <title>Online Notes Sharing System | Notes</title>

    <link rel="manifest" href="site.webmanifest">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css"> <!-- Animate.css -->
    <link rel="stylesheet" href="assets/css/animated-headline.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        /* Animated gradient background */
        body {
            background: linear-gradient(-45deg, #6a11cb, #2575fc, #6a11cb, #2575fc);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            min-height: 100vh;
            color: #222;
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        /* Container background to separate from body background */
        .courses-area {
            background: rgba(255, 255, 255, 0.95);
            padding: 50px 0 80px 0;
            border-radius: 20px;
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.12);
        }

        /* New hover effect for notes card */
        .properties__card {
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.12);
            background-color: #fff;
            will-change: transform;
            position: relative;
        }

        .properties__card:hover {
            transform: translateY(-15px) scale(1.03);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
            z-index: 5;
        }

        /* Replace image with icon container */
        .properties__img {
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f0f4f8;
            border-radius: 12px 12px 0 0;
            transition: background-color 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .properties__card:hover .properties__img {
            background-color: #e1e9f7;
        }

        /* FontAwesome notes icon styling */
        .properties__img i {
            font-size: 6rem;
            color: #007bff;
            transition: transform 0.4s ease, color 0.4s ease;
            filter: drop-shadow(0 0 5px rgba(0, 123, 255, 0.5));
        }

        .properties__card:hover .properties__img i {
            transform: scale(1.2) rotate(5deg);
            color: #0056b3;
            filter: drop-shadow(0 0 10px rgba(0, 86, 179, 0.8));
        }

        /* Styled download buttons */
        .btn-download {
            background-color: #007bff;
            color: white;
            padding: 8px 18px;
            border-radius: 6px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            font-weight: 600;
            box-shadow: 0 2px 6px rgba(0, 123, 255, 0.5);
        }

        .btn-download:hover {
            background-color: #0056b3;
            color: #fff;
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(0, 86, 179, 0.7);
        }

        /* Pagination styling */
        .pagination {
            list-style: none;
            padding-left: 0;
            display: flex;
            gap: 10px;
            justify-content: flex-start;
            margin-top: 30px;
        }

        .pagination li {
            display: inline-block;
        }

        .pagination li a {
            color: #007bff;
            padding: 8px 14px;
            border: 1px solid #007bff;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .pagination li a:hover:not(.disabled) {
            background-color: #007bff;
            color: white;
        }

        .pagination li.disabled a,
        .pagination li.disabled a:hover {
            color: #cccccc;
            border-color: #cccccc;
            pointer-events: none;
            cursor: default;
            background-color: transparent;
        }

        .pagination li.active a {
            background-color: #0056b3;
            color: white;
            border-color: #0056b3;
            cursor: default;
        }

        /* Loading spinner */
        #loadingSpinner {
            display: none;
            text-align: center;
            margin-top: 50px;
        }

        #loadingSpinner .spinner-border {
            width: 3rem;
            height: 3rem;
            color: #007bff;
        }

        /* Section title styling */
        .section-tittle h2 {
            font-weight: 800;
            font-size: 2.8rem;
            color: #007bff;
            text-shadow: 1px 1px 5px rgba(0, 123, 255, 0.3);
        }
    </style>
</head>

<body>

    <!-- Header End -->
    <?php include_once('includes/header.php'); ?>

    <main>
        <!-- Courses area start -->
        <div class="courses-area section-padding40 fix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <h2>Our Notes</h2>
                        </div>
                    </div>
                </div>

                <div id="loadingSpinner">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

                <div class="row" id="notesContainer" style="display:none;">
                    <?php
                    if (isset($_GET['pageno'])) {
                        $pageno = $_GET['pageno'];
                    } else {
                        $pageno = 1;
                    }
                    $no_of_records_per_page = 10;
                    $offset = ($pageno - 1) * $no_of_records_per_page;
                    $ret = "SELECT ID FROM tblnotes";
                    $query1 = $dbh->prepare($ret);
                    $query1->execute();
                    $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                    $total_rows = $query1->rowCount();
                    $total_pages = ceil($total_rows / $no_of_records_per_page);
                    $sql = "SELECT tblnotes.*,tbluser.* from tblnotes join tbluser on tblnotes.UserID=tbluser.ID LIMIT $offset, $no_of_records_per_page";
                    $query = $dbh->prepare($sql);

                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);

                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results as $row) { ?>
                            <div class="col-lg-6 wow fadeInUp" data-wow-delay="<?php echo 0.2 * $cnt; ?>s">
                                <div class="properties properties2 mb-30">
                                    <div class="properties__card">
                                        <div class="properties__img overlay1">
                                            <i class="fas fa-file-alt" aria-hidden="true" title="Notes Icon"></i>
                                        </div>
                                        <div class="properties__caption p-4">
                                            <p class="text-primary fw-bold"><?php echo htmlentities($row->Subject); ?></p>
                                            <h3 class="mb-3"><?php echo htmlentities($row->NotesTitle); ?> <small class="text-muted">By (<?php echo htmlentities($row->FullName); ?>)</small></h3>
                                            <p class="mb-3"><?php echo htmlentities($row->NotesDecription); ?>.</p>
                                            <table class="table table-bordered text-center">
                                                <tbody>
                                                    <tr>
                                                        <th width="150">File 1</th>
                                                        <td colspan="3">
                                                            <a href="user/folder1/<?php echo $row->File1; ?>" target="_blank" class="btn-download">Download File</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>File 2</th>
                                                        <td colspan="3">
                                                            <?php if (empty($row->File2)) {
                                                                echo '<span class="text-danger fw-bold">File is not available</span>';
                                                            } else { ?>
                                                                <a href="user/folder2/<?php echo $row->File2; ?>" target="_blank" class="btn-download">Download File</a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>File 3</th>
                                                        <td colspan="3">
                                                            <?php if (empty($row->File3)) {
                                                                echo '<span class="text-danger fw-bold">File is not available</span>';
                                                            } else { ?>
                                                                <a href="user/folder3/<?php echo $row->File3; ?>" target="_blank" class="btn-download">Download File</a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>File 4</th>
                                                        <td colspan="3">
                                                            <?php if (empty($row->File4)) {
                                                                echo '<span class="text-danger fw-bold">File is not available</span>';
                                                            } else { ?>
                                                                <a href="user/folder4/<?php echo $row->File4; ?>" target="_blank" class="btn-download">Download File</a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php $cnt++;
                        }
                    } ?>
                </div>

                <nav aria-label="Notes Pagination">
                    <ul class="pagination">
                        <li class="<?php if ($pageno <= 1) echo 'disabled'; ?>">
                            <a href="?pageno=1" aria-label="First" class="<?php if ($pageno == 1) echo 'active'; ?>"><strong>First</strong></a>
                        </li>
                        <li class="<?php if ($pageno <= 1) echo 'disabled'; ?>">
                            <a href="<?php echo ($pageno <= 1) ? '#' : '?pageno=' . ($pageno - 1); ?>" aria-label="Previous"><strong>Prev</strong></a>
                        </li>
                        <li class="<?php if ($pageno >= $total_pages) echo 'disabled'; ?>">
                            <a href="<?php echo ($pageno >= $total_pages) ? '#' : '?pageno=' . ($pageno + 1); ?>" aria-label="Next"><strong>Next</strong></a>
                        </li>
                        <li class="<?php if ($pageno >= $total_pages) echo 'disabled'; ?>">
                            <a href="?pageno=<?php echo $total_pages; ?>" aria-label="Last" class="<?php if ($pageno == $total_pages) echo 'active'; ?>"><strong>Last</strong></a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
        <!-- Courses area End -->

    </main>
    <?php include_once('includes/footer.php'); ?>

    <!-- JS here -->
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLine -->
    <script src="./assets/js/wow.min.js"></script> <!-- WOW.js for scroll animations -->
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <!-- Progress -->
    <script src="./assets/js/jquery.barfiller.js"></script>

    <!-- counter , waypoint,Hover Direction -->
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>
    <script src="./assets/js/jquery.countdown.min.js"></script>
    <script src="./assets/js/hover-direction-snake.min.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->	
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

    <script>
        // Initialize WOW.js for scroll animations
        new WOW().init();

        // Simulate loading spinner for 500ms before showing notes
        $(document).ready(function() {
            $("#loadingSpinner").show();
            $("#notesContainer").hide();
            setTimeout(function() {
                $("#loadingSpinner").fadeOut('slow', function() {
                    $("#notesContainer").fadeIn('slow');
                });
            }, 500); // simulate delay for better UX
        });
    </script>

</body>

</html>
