<!-- app.php -->
<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>
<?php include 'sidebar.php'; ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <!DOCTYPE html>
            <html lang="id">

            <head>
                <meta charset="UTF-8">
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        padding: 20px;
                        background-color:rgb(38, 47, 57);
                    }

                    .container {
                        background: white;
                        padding: 20px;
                        border-radius: 8px;
                        box-shadow: 0 2px 5px rgba(165, 160, 180, 0.1);
                    }

                    h1 {
                        color: #333;
                    }
                </style>
            </head>

            <body>
                <div class="container">
                    <h1>Selamat Datang di Dashboard</h1>
                    <p>Ini adalah halaman dashboard sederhana.</p>
                </div>
            </body>

            </html>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                    <?php
                    $page = $_GET['page'] ?? 'dashboard';
                    echo ucfirst(str_replace('_', ' ', $page));
                    ?>
                </li>
            </ol>

            <?php

            if (!empty($file) && file_exists("views/$file.php")) {
                include_once("views/$file.php");
            }
            ?>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; project01 ulan</div>
                <div><a href="#">Privacy Policy</a> &middot; <a href="#">Terms &amp; Conditions</a></div>
            </div>
        </div>
    </footer>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>

</html>