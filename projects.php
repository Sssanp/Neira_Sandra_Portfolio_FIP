<!DOCTYPE html>
<?php
require_once('includes/connect.php');
$query = 'SELECT GROUP_CONCAT(image_filename) AS images, project_name, subtitle, projects.description, about, projects.role, roletype, team, teammembers, thoughts, placeholder, videoplaceholder, video_url, tools, results, outcome, learningone, descriptionone, learningtwo, descriptiontwo, projects.id, learningthree, descriptionthree, nextpro, nextprosub FROM projects, mediaitems WHERE projects.id = project_id AND projects.id = :projectId';
$stmt = $connection->prepare($query);
$projectId = $_GET['id'];
$stmt->bindParam(':projectId', $projectId, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$images = explode(",", $row['images']);
$stmt = null;
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="css/grid.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <title>
        <?php echo $row['project_name']; ?>
    </title>

</head>

<body>

    <!-------------------------- body ------------------------------->

    <body id="home-page-bg">
        <h1 class="hidden">Project Page</h1>

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
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#projects">Projects</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </header>

        <!-------------------------- Header End ---------------------------->

        <!---------------------------- Template for PHP projects----------------------------->

        <?php
        echo '<div class="casestudy">
              <div class="casestudy-content">
              <section class="grid-con">
            <h2 class="hidden">Hero</h2>
            <div class="col-span-full m-col-start-2 m-col-end-7 l-col-start-2 l-col-end-7 xl-col-start-2 xl-col-end-7 box-left">
                <h3 class="hidden">Hero Text</h3>
                <h2>' . $row['project_name'] . '</h2>
                <h3>' . $row['subtitle'] . '</h3>
            </div>

        <div class="col-span-full m-col-start-7 m-col-end-12 l-col-start-7 l-col-end-12 xl-col-start-7 xl-col-end-12 box-left">
        <h3 class="hidden">Hero paragraph</h3>
        <p>' . $row['description'] . '</p>
         </div>
        </section>




<section class="grid-con">
    <h2 class="hidden">main project image</h2>
    <div class="col-span-full m-col-span-full l-col-span-full xl-col-span-full box-center">
        <img class="project-img" src="images/' . $images[0] . '" alt="project image">
    </div>
</section>

<section class="grid-con">
    <h2 class="hidden">about project</h2>

    <div class="col-span-full m-col-start-2 m-col-end-7 l-col-start-2 l-col-end-7 xl-col-start-2 xl-col-end-7 box-left">
        <h3 class="hidden">project description</h3>
        <p>' . $row['about'] . '</p>
    </div>

    <div class="col-span-full m-col-start-7 m-col-end-12 l-col-start-7 l-col-end-12 xl-col-start-7 xl-col-end-12 box-left">
        <h3 class="hidden">about project</h3>
        <h3>' . $row['role'] . '</h3>
        <p>' . $row['roletype'] . '</p>
        <h3>' . $row['team'] . '</h3>
        <p>' . $row['teammembers'] . '</p>
    </div>
</section>

<section class="grid-con">
    <h2 class="hidden">project image</h2>
    <div class="col-start-1 col-end-5 m-col-start-3 m-col-end-11 l-col-start-3 l-col-end-11 xl-col-start-3 xl-col-end-11 box-center">
        <img class="project-img" src="images/' . $images[1] . '" alt="project image">
    </div>

    <h2 class="hidden">project text</h2>
    <div class="col-start-1 col-end-5 m-col-start-4 m-col-end-10 l-col-start-4 l-col-end-10 xl-col-start-4 xl-col-end-10 box-left">
        <h3>Thoughts</h3>
        <p>' . $row['thoughts'] . '</p>
    </div>

    <div class="col-span-full m-col-span-full l-col-span-full xl-col-span-full box-center">
        <video controls poster="images/' . $row['placeholder'] . '">
            <source src="videos/' . $row['videoplaceholder'] . '" type="video/mp4">
        </video>
    </div>
</section>

<section class="grid-con">
    <h2 class="hidden">More about the project</h2>

    <div class="col-span-full m-col-start-2 m-col-end-7 l-col-start-2 l-col-end-7 xl-col-start-2 xl-col-end-7 box-left">
        <h3 class="hidden">tools</h3>
        <p>' . $row['tools'] . '</p>
    </div>

    <div class="col-span-full m-col-start-7 m-col-end-12 l-col-start-7 l-col-end-12 xl-col-start-7 xl-col-end-12 box-right">
        <h3 class="hidden">image</h3>
        <img class="project-img" src="images/' . $images[2] . '" alt="project image">
    </div>

    <h2 class="hidden">project text</h2>
    <div class="col-start-1 col-end-5 m-col-start-4 m-col-end-10 l-col-start-4 l-col-end-10 xl-col-start-4 xl-col-end-10 box-left">
        <p>' . $row['results'] . '</p>
    </div>
</section>

<section class="grid-con">
    <h2 class="hidden">project text</h2>
    <div class="col-start-1 col-end-5 m-col-start-3 m-col-end-11 l-col-start-3 l-col-end-11 xl-col-start-3 xl-col-end-11 box-left">
        <h3>Outcome</h3>
        <p>' . $row['outcome'] . '</p>
        <br>
        <h3>' . $row['learningone'] . '</h3>
        <p>' . $row['descriptionone'] . '</p>
        <br>
        <h3>' . $row['learningtwo'] . '</h3>
        <p>' . $row['descriptiontwo'] . '</p>
        <br>
        <h3>' . $row['learningthree'] . '</h3>
        <p>' . $row['descriptionthree'] . '</p>
    </div>
</section>
</div>
</div>';



        ?>

        <?php
        $id_next = $row['id'] + 1;

        echo '<div class="next-container grid-con">';
        if ($id_next != 5) {
            echo '<a class="thumb box" href="projects.php?id=' . $id_next . '" previewlistener="true">';
        } else {
            echo '<div class="thumb box">';
        }
        echo '<h2 class="hidden">project image</h2>
    <div class="col-start-1 col-end-5 m-col-start-1 m-col-end-12 l-col-start-1 l-col-end-12 xl-col-start-1 xl-col-end-12 box-center">
    <img class="project-img" src="images/next' . $id_next . '.jpg">
    </div>
    <section class="grid-con top-text">
        <div class="col-span-full m-col-start-3 m-col-end-7 l-col-start-5 l-col-end-9 xl-col-start-3 xl-col-end-7 box-center">
            <h3 class="hidden">Next Project text</h3>
            <h3>' . $row['nextpro'] . '</h3>
            <h3>' . $row['nextprosub'] . '</h3>
        </div>
    </section>';
        if ($id_next != 5) {
            echo '</a>';
        } else {
            echo '</div>';
        }
        echo '</div>';
        ?>

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
                    <li><a href="https://www.youtube.com/@sann_0/featured"><i
                                class="fa-brands fa-square-youtube"></i></a>
                    </li>
                </ul>
            </div>

            <div class="tablet m-col-start-9 m-col-end-12 box-left socials">
                <p class="footer-heading">Socials</p>
                <ul>
                    <li><a href="https://www.linkedin.com/in/sandra-paola-neira-92132a274/"><i
                                class="fa-brands fa-linkedin"></i></a></li>
                    <li><a href="https://www.instagram.com/ssancreate/"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="https://www.youtube.com/@sann_0/featured"><i
                                class="fa-brands fa-square-youtube"></i></a>
                    </li>
                </ul>
            </div>

            <div class="desktop l-col-start-10 l-col-end-12 xl-col-start-10 xl-col-end-12 box-left socials">
                <p class="footer-heading">Socials</p>
                <ul>
                    <li><a href="https://www.linkedin.com/in/sandra-paola-neira-92132a274/"><i
                                class="fa-brands fa-linkedin"></i></a></li>
                    <li><a href="https://www.instagram.com/ssancreate/"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="https://www.youtube.com/@sann_0/featured"><i
                                class="fa-brands fa-square-youtube"></i></a>
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



        <script src="https://kit.fontawesome.com/0eab0f8aa6.js" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
    </body>

</html>