<?php include "./config/database.php"; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <title>Feedback Page</title>
  </head>
  <body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-4">
      <div class="container">
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#my-navbar"
          aria-controls="my-navbar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <a href="#" class="navbar-brand">Feedback Page</a>
        <div class="collapse navbar-collapse" id="my-navbar">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="./index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="./feedback.php" class="nav-link">Feedback</a>
            </li>
            <li class="nav-item">
              <a href="./about.php" class="nav-link">About</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <main>
      <div class="container d-flex flex-column align-items-center">