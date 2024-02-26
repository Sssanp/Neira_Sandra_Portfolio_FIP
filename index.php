<!DOCTYPE html>
<html lang="en">

<?php
require_once('includes/connect.php');
$stmt = $connection->prepare('SELECT * FROM projects ORDER BY id ASC');
$stmt->execute();
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home | Portfolio</title>
    <link rel="icon" type="image/svg+xml" href="images/favicon.svg">
    <link rel="icon" type="image/png" href="images/favicon.png">

    <link href="css/grid.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--playerdecor-->
    <link href="https://cdn.plyr.io/3.7.8/plyr.css" rel="stylesheet">
    <script defer src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
    <!--script library-->
    <!--using defer and and modules for a better order-->
    <script defer type="module" src="./js/modules/gsap.js"></script>
    <script type="module" src="js/main.js"></script>

    <!-- 3d element-->
    <script async src="https://unpkg.com/es-module-shims@1.3.6/dist/es-module-shims.js"></script>
    <script type="importmap">
  {
    "imports": {
      "@splinetool/runtime": "https://unpkg.com/@splinetool/runtime@0.9.521/build/runtime.js"
    }
  }
</script>
</head>
<!-- gsap library -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<!-- ScrollTrigger plugin -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<!-- ScrollTo plugin -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js"></script>

<!--For social icons-->
<script src="https://kit.fontawesome.com/0eab0f8aa6.js" crossorigin="anonymous"></script>

<!-------------------------- Body Start ------------------------------->

<body data-page="home" id="home-page-bg">
    <div class="cursor"></div>
    <h1 class="hidden">HOME PAGE</h1>

    <!-------------------------- Header Start ------------------------------->

    <header class="grid-con cursor-scale small">
        <h2 class="hidden">Header</h2>
        <nav id="hamburger-menu" class="grid-con">
            <div
                class="col-start-4 col-end-5 m-col-start-12 m-col-end-13 l-col-start-12 l-col-end-13 xl-col-start-12 xl-col-end-13 box-right">
                <i id="hamburger-close" class="fa-solid fa-x"></i>
            </div>

            <div
                class="col-span-4 m-col-start-5 m-col-end-9 l-col-start-5 l-col-end-9 xl-col-start-5 xl-col-end-9 box-center">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#projects">Projects</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
        </nav>

        <div
            class="col-start-1 col-end-4 m-col-start-2 m-col-end-5 l-col-start-2 l-col-end-5 xl-col-start-2 xl-col-end-5 box-left">
            <h3 class="hidden">Logo</h3>
            <a href="index.html"><img class="logo" src="images/sandralogofinal.svg" alt="logo"></a>
        </div>

        <nav class="mobile col-start-4 box-right">
            <h3 class="hidden">Mobile Nav</h3>
            <i id="hamburger-open" class="fa-solid fa-bars"></i>
        </nav>

        <nav class="tablet m-col-start-5 m-col-end-12 box-right main-nav">
            <h3 class="hidden">Tablet Nav</h3>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>

        </nav>

        <nav class="desktop l-col-start-7 l-col-end-12 xl-col-start-7 xl-col-end-12 box-right main-nav">
            <h3 class="hidden">Desktop Nav</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-------------------------- Header End ---------------------------->


    <!-------------------------- Home Hero Start ------------------------------->

    <section class="grid-con">
        <h2 class="hidden">Hero</h2>

        <div
            class="col-span-full m-col-start-2 m-col-end-7 l-col-start-2 l-col-end-7 xl-col-start-2 xl-col-end-7 box-left">

            <h3 class="hidden">Hero Text</h3>
            <h2 class="hero-text cursor-scale"><span class="highlight"> Hi</span>,<br>I'm San, a<br>designer,
                based<br>in London.</h2>
        </div>

        <div
            class="col-span-full m-col-start-7 m-col-end-12 l-col-start-7 l-col-end-12 xl-col-start-7 xl-col-end-12 canvas-cont">
            <h3 class="hidden">Hero Image</h3>
            <canvas id="canvas3d"></canvas>
        </div>
    </section>

    <hr
        class="col-start-2 col-end-4 m-col-start-2 m-col-end-12 l-col-start-2 l-col-end-12 xl-col-start-2 xl-col-end-12 spacer">

    <!-------------------------- Home Hero end ------------------------------->

    <!-------------------------- DEMO REEL ----------------------------->

    <div class="grid-con" id="projects">
        <section class="col-span-full m-col-span-full l-col-span-full xl-col-span-full box-center"
            id="player-container">
            <video controls poster="images/reelplaceholder.png">
                <source src="videos/Neira_Sandra_demoreelcompress2.mov" type="video/mp4">
            </video>
        </section>
    </div>

    <!-------------------------- Projects Start ----------------------------->

    <section class="grid-con">
        <h2 class="hidden">Projects</h2>

        <?php

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($row['id'] == 1) {
                echo '<div class="col-span-full m-col-start-2 m-col-end-9 l-col-start-2 l-col-end-9 xl-col-start-2 xl-col-end-9 box-left">' .
                    '<h3 class="hidden">Project 3</h3>' .
                    '<a class="thumb box" style="aspect-ratio: 4/3" href="projects.php?id=' .
                    $row['id'] .
                    '" previewlistener="true">' .
                    '<video class="project-video" src="videos/' .
                    $row['video_url'] .
                    '" autoplay loop muted playsinline></video>' .
                    '<div class="overlay cursor-scale small">' .
                    '<div class="content text"><h2>' .
                    $row['project_name'] .
                    '</h2><h3>' .
                    $row['description'] .
                    '</h3></div></div></a></div>';
            }

            if ($row['id'] == 2) {
                echo '<div class="col-span-full m-col-start-9 m-col-end-12 l-col-start-9 l-col-end-12 xl-col-start-9 xl-col-end-12 box-left">' .
                    '<h3 class="hidden">Project 3</h3>' .
                    '<a class="thumb box" style="aspect-ratio: 4/3" href="projects.php?id=' .
                    $row['id'] .
                    '" previewlistener="true">' .
                    '<video class="project-video" src="videos/' .
                    $row['video_url'] .
                    '" autoplay loop muted playsinline></video>' .
                    '<div class="overlay cursor-scale small">' .
                    '<div class="content text"><h2>' .
                    $row['project_name'] .
                    '</h2><h3>' .
                    $row['description'] .
                    '</h3></div></div></a></div>';
            }

            if ($row['id'] == 3) {
                echo '<div class="col-span-full m-col-start-2 m-col-end-5 l-col-start-2 l-col-end-5 xl-col-start-2 xl-col-end-5 box-left">' .
                    '<h3 class="hidden">Project 3</h3>' .
                    '<a class="thumb box" style="aspect-ratio: 4/3" href="projects.php?id=' .
                    $row['id'] .
                    '" previewlistener="true">' .
                    '<video class="project-video" src="videos/' .
                    $row['video_url'] .
                    '" autoplay loop muted playsinline></video>' .
                    '<div class="overlay cursor-scale small">' .
                    '<div class="content text"><h2>' .
                    $row['project_name'] .
                    '</h2><h3>' .
                    $row['description'] .
                    '</h3></div></div></a></div>';
            }

            if ($row['id'] == 4) {
                echo '<div class="col-span-full m-col-start-5 m-col-end-12 l-col-start-5 l-col-end-12 xl-col-start-5 xl-col-end-12 box-left">' .
                    '<h3 class="hidden">Project 3</h3>' .
                    '<a class="thumb box" style="aspect-ratio: 4/3" href="projects.php?id=' .
                    $row['id'] .
                    '" previewlistener="true">' .
                    '<video class="project-video" src="videos/' .
                    $row['video_url'] .
                    '" autoplay loop muted playsinline></video>' .
                    '<div class="overlay cursor-scale small">' .
                    '<div class="content text"><h2>' .
                    $row['project_name'] .
                    '</h2><h3>' .
                    $row['description'] .
                    '</h3></div></div></a></div>';
            }
        }

        ?>



    </section>



    <!----------------------FOOTER----------------------->

    <footer class="grid-con spacer">
        <h2 class="hidden">Footer</h2>

        <div
            class="col-start-1 col-end-4 m-col-start-2 m-col-end-6 l-col-start-2 l-col-end-5 xl-col-start-2 xl-col-end-5 box-left">
            <h3 class="hidden">Logo</h3>
            <a href="index.html"><img class="logo" src="images/3dicon.png" alt="San Logo"></a>
        </div>

        <nav class="mobile col-span-2 box-left footer-nav">
            <h3 class="hidden">Footer Nav</h3>
            <p class="footer-heading">Site</p>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="projects.html">Projects</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>

        <nav class="tablet m-col-start-6 m-col-end-7 box-left footer-nav">
            <h3 class="hidden">Footer Nav</h3>
            <p class="footer-heading">Site</p>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="projects.html">Projects</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>

        <nav class="desktop l-col-start-7 l-col-end-8 xl-col-start-7 xl-col-start-8 box-left footer-nav">
            <h3 class="hidden">Footer Nav</h3>
            <p class="footer-heading">Site</p>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>

        <div class="mobile col-span-2 box-center socials">
            <p class="footer-heading">Socials</p>
            <ul>
                <li><a href="https://www.linkedin.com/in/sandra-paola-neira-92132a274/"><i
                            class="fa-brands fa-linkedin"></i></a></li>
                <li><a href="https://www.instagram.com/ssancreate/"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="https://www.youtube.com/@sann_0/featured"><i class="fa-brands fa-square-youtube"></i></a>
                </li>
            </ul>
        </div>

        <div class="tablet m-col-start-9 m-col-end-12 box-left socials">
            <p class="footer-heading">Socials</p>
            <ul>
                <li><a href="https://www.linkedin.com/in/sandra-paola-neira-92132a274/"><i
                            class="fa-brands fa-linkedin"></i></a></li>
                <li><a href="https://www.instagram.com/ssancreate/"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="https://www.youtube.com/@sann_0/featured"><i class="fa-brands fa-square-youtube"></i></a>
                </li>
            </ul>
        </div>

        <div class="desktop l-col-start-10 l-col-end-12 xl-col-start-10 xl-col-end-12 box-left socials">
            <p class="footer-heading">Socials</p>
            <ul>
                <li><a href="https://www.linkedin.com/in/sandra-paola-neira-92132a274/"><i
                            class="fa-brands fa-linkedin"></i></a></li>
                <li><a href="https://www.instagram.com/ssancreate/"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="https://www.youtube.com/@sann_0/featured"><i class="fa-brands fa-square-youtube"></i></a>
                </li>
            </ul>
        </div>

        <!--copyright-->

        <div class="mobile cr col-span-full box-center">
            <p>All content copyright Sandra Neira 2024 &copy;</p>
        </div>

        <div class="tablet cr m-col-span-full box-center">
            <p>All content Sandra Neira 2024 &copy;</p>
        </div>

        <div class="desktop cr l-col-span-full xl-col-span-full box-center">
            <p>All content Sandra Neira 2024 &copy;</p>
        </div>

        <hr
            class="col-span-full m-col-start-2 m-col-end-12 l-col-start-2 l-col-end-12 xl-col-start-2 xl-col-end-12 spacer">
    </footer>
    <!----------------------END FOOTER----------------------->
    <script src="js/main.js"></script>
</body>

</html>