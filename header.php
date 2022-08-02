
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Keep Notes">
    <meta name="keywords"
        content="html, css, bootstrap5, js, php, sql, database, notes, keep notes, keep tasks, note task">
    <meta name="author" content="farzad foroozanfar">
    <title>Keep Task</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body id="body">
    <div class="container-fluid  px-5 mt-1">
        <div class="row border border-3  border-top-0 border-start-0 border-end-0">
            <div class="d-none d-xxl-block d-xl-bolck d-lg-block col-lg-3 ps-4">
                <img src="img/logo.png" width="50px" alt="logo" srcset="">
                <strong id="app-name">Keep Notes</strong>
            </div>
            <div class="col-8 col-lg-7 p-1">
                <div id="search-bar" class="rounded-3 p-2">
                    <span class="bi bi-search ms-1 me-3 p-2 d-none d-xl-inline d-lg-inline d-xxl-inline d-md-inline"
                        id="search-btn"></span>
                    <input type="search" id="search-id" placeholder="Search...">
                </div>
            </div>
            <div class="col-4 col-lg-2 p-3 d-flex justify-content-end px-3">
                <span id="dark-light-mode" onclick="dark_light_mode()"
                    class="bi bi-moon p-2"></span>
                <span id="grid-notes" onclick="grid_notes()" class="bi bi-list ms-1 p-2"></span>

            </div>
        </div>
    </div>
    <script src="js/script.js"></script>


