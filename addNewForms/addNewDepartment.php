<?php
    ob_start();
    require('../includes/config.inc.php');
    // include('../includes/header.html');
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="../index.php">TU Hospital</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
</header>

<div class="form-group p-4">
    <h2>Add new Department</h2>
    <form action="" method="POST">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Name</span>
            <input type="text" class="form-control" placeholder="Name" aria-label="name"
                aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Head</span>
            <input type="text" class="form-control" aria-label="email">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <button class="btn btn-secondary" type="button" onclick="history.back()">Go back</button>

    </form>
</div>