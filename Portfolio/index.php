<?php include 'dbh.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="viewport" content="width=1024">


  <title>Drin Ramadani - Portfolio</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="shortcut icon" href="images/profile_picture.ico"/>

  <link
   rel="stylesheet"
   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
   integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
   crossorigin="anonymous"
  />
  <link rel="stylesheet" type="text/css" href="css/main.css" />

  

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/p5.js/0.5.6/p5.js"></script>
  <script src="js/main.js"></script>
</head>
<body>
  <div id="home">
    <center>
      <img class="profile_picture" src="images/profile_picture.png" alt="Profile Picture">
    </center>
    <div class="text">
      <h1 class="name">Drin Ramadani, <sub><?php echo date_diff(date_create("10-05-2007"), date_create(date("Y-m-d")))->format('%y'); ?></sub></h1>
      <span class="job">Junior Back-End Developer</span>
      <div class="resume">
        <a href="cv/albanian_cv.pdf">
          <button id="albanian_resume" class="resume_btn">
            <i class="fa fa-file"></i> View CV 
          </button>
        </a>
        <a href="#projects_section">
          <button id="english_resume" class="resume_btn">
            <i class="fas fa-project-diagram"></i> My Projects 
          </button>
        </a> 
        <a href="#about_section">
          <button id="english_resume" class="resume_btn">
            <i class="fas fa-address-card"></i> About Me
          </button>
        </a>
      </div> <!-- resume -->
    </div> <!-- text -->
  </div> <!-- #home -->

  <div class="section" id="projects_section">
    <h1 class="title">Projects</h1>
    <div class="categories">
      <ul>
        <li class='project_categorie current_project_categorie' id="html_css_projects">HTML & CSS (2)</li>
        <li class='project_categorie' id="p5js_projects">P5.js (4)</li>
        <li class='project_categorie' id="php_projects">PHP & MySQL (4)</li>
      </ul>
    </div> <!-- categories -->
    <div class="projects">
      <div class="project_categorie_div" id="html_css_projects_div">
        <?php 
          $sql = "SELECT * FROM projects WHERE categorie='HTML&CSS'; ";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <div class="projects_container">
            <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>" />
            <div class="container__text">
              <h1><?php echo $row['name']; ?></h1>
              <p>
                <?php echo $row['description']; ?>
              </p>
              <div class="container__text__timing">
                <h3>
                  Technologies used:
                  <?php 
                    foreach (explode(" ", $row['tech']) as $tech) {
                  ?>
                      <span class="tech"><?php echo $tech; ?></span>
                  <?php
                    }
                  ?>
                </h3>
              </div>
              <?php 
                if (strlen($row['preview']) > 0) {
                  echo '<a href="'. $row['preview'] .'" target="_blank"><button class="btn live_preview">Live Preview <i class="far fa-eye"></i></button></a>';
                } else {
                  echo '<a><button disabled class="btn live_preview" style="text-decoration: line-through;">No Preview <i class="fas fa-eye-slash"></i></button></a>';
                }
              ?>
              <?php 
                if (strlen($row['source']) > 0) {
                  echo '<a href="'.$row['source'].'" target="_blank"><button class="btn github_code">View Source <i class="far fa-eye"></i></button></a>';
                } else {
                  echo '<a><button disabled class="btn github_code" style="cursor: not-allowed;text-decoration: line-through;background-color: red;border-color: red;color: white;">No Github Code <i class="fab fa-github"></i></button></a>';
                }
              ?>
            </div>
          </div>
        <?php
            }
          }
        ?>
      </div> <!-- html_css_projects_div -->
      <div class="project_categorie_div" id="p5js_projects_div">
        <?php 
          $sql = "SELECT * FROM projects WHERE categorie='p5.js'; ";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <div class="projects_container">
            <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>" />
            <div class="container__text">
              <h1><?php echo $row['name']; ?></h1>
              <p>
                <?php echo $row['description']; ?>
              </p>
              <div class="container__text__timing">
                <h3>
                  Technologies used:
                  <?php 
                    foreach (explode(" ", $row['tech']) as $tech) {
                  ?>
                      <span class="tech"><?php echo $tech; ?></span>
                  <?php
                    }
                  ?>
                </h3>
              </div>
              <?php 
                if (strlen($row['preview']) > 0) {
                  echo '<a href="'. $row['preview'] .'" target="_blank"><button class="btn live_preview">Live Preview <i class="far fa-eye"></i></button></a>';
                } else {
                  echo '<a><button disabled class="btn live_preview" style="cursor: not-allowed;text-decoration: line-through;background-color: red;border-color: red;color: white;">No Preview <i class="fas fa-eye-slash"></i></button></a>';
                }
              ?>
              <?php 
                if (strlen($row['source']) > 0) {
                  echo '<a href="'.$row['source'].'" target="_blank"><button class="btn github_code">View Source <i class="far fa-eye"></i></button></a>';
                } else {
                  echo '<a><button disabled class="btn github_code" style="cursor: not-allowed;text-decoration: line-through;background-color: red;border-color: red;color: white;">No Github Code <i class="fab fa-github"></i></button></a>';
                }
              ?>
            </div>
          </div>
        <?php
            }
          }
        ?>
      </div> <!-- p5js_projects_div -->
      <div class="project_categorie_div" id="php_projects_div">
        <?php 
          $sql = "SELECT * FROM projects WHERE categorie='PHP&MySQL'; ";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <div class="projects_container">
            <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>" />
            <div class="container__text">
              <h1><?php echo $row['name']; ?></h1>
              <p>
                <?php echo $row['description']; ?>
              </p>
              <div class="container__text__timing">
                <h3>
                  Technologies used:
                  <?php 
                    foreach (explode(" ", $row['tech']) as $tech) {
                  ?>
                      <span class="tech"><?php echo $tech; ?></span>
                  <?php
                    }
                  ?>
                </h3>
              </div>
              <?php 
                if (strlen($row['preview']) > 0) {
                  echo '<a href="'. $row['preview'] .'" target="_blank"><button class="btn live_preview">Live Preview <i class="far fa-eye"></i></button></a>';
                } else {
                  echo '<a><button disabled class="btn live_preview" style="cursor: not-allowed;text-decoration: line-through;background-color: red;border-color: red;color: white;">No Preview <i class="fas fa-eye-slash"></i></button></a>';
                }
              ?>
              <?php 
                if (strlen($row['source']) > 0) {
                  echo '<a href="'.$row['source'].'" target="_blank"><button class="btn github_code">View Source <i class="far fa-eye"></i></button></a>';
                } else {
                  echo '<a><button disabled class="btn github_code" style="cursor: not-allowed;text-decoration: line-through;background-color: red;border-color: red;color: white;">No Github Code <i class="fab fa-github"></i></button></a>';
                }
              ?>
            </div>
          </div>
        <?php
            }
          }
        ?>
      </div> <!-- php_projects_div -->
    </div> <!-- projects -->
    
    <br><br>
  </div> <!-- #projects -->
  <div class="section" id="about_section">
    <h1 class="title">About</h1>

    <div class="about">
      <div class="container">
        <div class="row">
          <div class="col-3 image" style="text-align: center;">
            <img src="images/profile_picture.png" /> <br />
            <h1 style="color: var(--main-color);">Drin Ramadani, <?php echo date_diff(date_create("10-05-2007"), date_create(date("Y-m-d")))->format('%y'); ?></h1>
          </div>
          <div class="col-9 about_text">
            <h1>About Me</h1>
            <p>
              I'm a Junior Back-End Devleoper and I have been learning and making projects since I was 9. I feel comfortable on Web Development and also a little bit of Android Development. I'm trying to pursue my dream of working with tech & help people with their problems.
            </p>
            
            <a target="_blank" style="text-decoration: underline;color: var(--main-color);margin: 0;padding: 0;" href="cv/albanian_cv.pdf">View CV <i class="fa fa-file"></i></a>
            <h3 style="width: 100%;">
              Technologies I know:
              <span class="tech">HTML</span>
              <span class="tech">CSS</span>
              <span class="tech">Bootstrap</span>
              <span class="tech">Javascript</span>
              <span class="tech">React</span>
              <span class="tech">jQuery</span>
              <span class="tech">AJAX</span>
              <span class="tech">p5.js</span>
              <span class="tech">PHP</span>
              <span class="tech">MySQL</span>
              <span class="tech">Photoshop</span>
              <span class="tech">Git</span>
              <span class="tech">Github</span>
              <span class="tech">Wordpress</span>
              <span class="tech">Web Hosting</span>
            </h3>
            <a href="#projects_section">
              <button class="categorie_linker"><i class="fas fa-project-diagram"></i> Projects</button>
            </a>
            <a href="#contact">
              <button class="categorie_linker"><i class="fas fa-envelope-square"></i> Contact</button>
            </a>
          </div>
        </div> <!-- row -->
      </div> <!-- container -->
    </div> <!-- about -->
  </div> <!-- about_section -->

  <div class="section" id="contact_section">
    <h1 class="title">Contact Me</h1>
    <div class="rightcontent">
      <form action="https://formspree.io/f/xpzkrdjw" method="POST">
        <div class="topmargform">
          <label for="fname"></label>
          <input style="width: 49.5%;" type="text" name="fname" placeholder="Name">
          <input style="width: 49.5%;" type="text" name="lname" placeholder="Surname"> <br />
          <input style="width: 100%;" type="email" name="_replyto" placeholder="Email"> <br />
          <input style="width: 100%;" type="text" name="subject" placeholder="Subject"> <br />
          <textarea style="font-family: Arial;width: 100%;height: 150px;" type="text" name="Description" placeholder="Description"></textarea>
          <input type="submit">
        </div>
    </form>
  </div>

  <footer>
    <h1 style="text-align: center;">Socials</h1>
    <div class="container">
      <div class="socials">
        <ul>
          <li>
            <a target="_blank" href="https://github.com/drinramadani-code/" style="text-decoration: none;color: var(--main-color);">
              <i class="fab fa-github-square"></i> 
            </a>
          </li>
          <li>
            <a target="_blank" href="https://www.facebook.com/drin.ramadani.9/" style="text-decoration: none;color: var(--main-color);">
              <i class="fab fa-facebook"></i>
            </a>
          </li>
          <li>
            <a target="_blank" href="https://www.instagram.com/drin_ramadani_07/" style="text-decoration: none;color: var(--main-color);">
              <i class="fab fa-instagram-square"></i>
            </a>
          </li>
        </ul>
        <span class="contact_info"><i class="fa fa-compass"></i> Ferizaj, Kosovo</span>
        <span class="contact_info"><i class="fas fa-envelope-square"></i> drinshd@gmail.com</span>
        <span class="contact_info"><i class="fas fa-phone"></i> (+383)43-975-707</span>
      </div> <!-- socials -->
    </div> <!-- container -->
  </footer>
  
    <p style="width: 100%;font-weight: bolder;padding: 10px 0 15px 0;font-size: 20px;text-align: center;color: white;">
      &copy; Copyright <?php echo date("Y"); ?> - Drin Ramadani
    </p>
</body>
</html>