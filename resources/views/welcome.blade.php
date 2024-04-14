@extends('content')
<html>
    <body class="antialiased">

    <!-- loader -->
    <div class="loader-overlay">
        <div class="loader">
            <div class="loader-square"></div>
            <div class="loader-square"></div>
            <div class="loader-square"></div>
            <div class="loader-square"></div>
            <div class="loader-square"></div>
            <div class="loader-square"></div>
            <div class="loader-square"></div>
        </div>
    </div>
    
    <!-- nav bar -->
    <div id="header">
        <div class="container">
            <nav>
                <a href=""><img src="/assets/img/logo.png" alt="logo" class="logo"></a>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#skills">Skills</a></li>
                    <li><a href="#projects">Projects</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- bck-to-top-button -->
    <section id="home">
        <div class="bck-btn" id="backToTopBtn">
            <a href="#">
                <img src="assets/img/red-up-arrow.png" alt="">
            </a>    
        </div>
    </section>

    <!-- short intro about me -->
    <div class="wrapper">
        <div class="short-intro">
            <h1 class="name-holder">
                Hello, I'm <span id="my-name">Fred Ritz Vann De Guzman</span>
            </h1>
            <h2 class="pos-holder">
                Front end Developer
            </h2>
        </div>
    </div>

    
    <!-- about me -->
    <section id="about">
        <div class="about-container">
            <h1>About Me</h1>

            <div class="about-content">
                <div data-aos="zoom-in" data-aos-delay="200" class="content-holder">
                    <div class="gif-holder">
                        <img src="assets/img/mypic.png" alt="">
                    </div>
                </div>

                <div data-aos="zoom-in" data-aos-delay="200" class="content-holder">
                    <div class="txt-container">
                        <p>Greetings! I am a 23-year-old soon-to-be graduate from Western Mindanao State University, 
                            residing in the locale of Kitabog Titay, Zamboanga Sibugay. 
                            With a blend of academic rigor and real-world experiences, I am ready to transition into the professional realm. 
                            My journey thus far has equipped me with valuable skills, a thirst for knowledge, and a determination to make a positive impact.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- skills -->
    <section id="skills">
        <div class="skills-container">
            <h1>Skills</h1>
            <div class="icon-container">
                
                <div data-aos="flip-left" data-aos-delay="200">
                    <div class="logo-container">
                        <img src="assets/img/html-logo.png" alt="" class="html-logo">
                    </div>
                </div>
                    
                <div data-aos="flip-left" data-aos-delay="400">
                    <div class="logo-container">
                        <img src="assets/img/js-logo.png" alt="" class="js-logo">
                    </div>
                </div>

                <div data-aos="flip-left" data-aos-delay="600">
                    <div class="logo-container">
                        <img src="assets/img/css-logo.png" alt="" class="css-logo">
                    </div>
                </div>
                   
                <div data-aos="flip-left" data-aos-delay="800">
                    <div class="logo-container">
                        <img src="assets/img/python-logo.png" alt="" class="python-logo">
                    </div>
                </div>   
            </div>
        </div>
    </section>
    
    <!-- Projects -->
    <section id="projects">
    <div class="projects-container">
        <h1>Projects</h1>



    </div>
    </section>


    <!-- blog cards -->
    <div class="blog-card">
        <div class="meta">
            <div class="photo" style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg)"></div>
                <ul class="details">
                    <li class="author"><a href="#">John Doe</a></li>
                    <li class="date">Aug. 24, 2015</li>
                    <li class="tags">
                    <ul>    
                        <li><a href="#">Learn</a></li>
                        <li><a href="#">Code</a></li>
                        <li><a href="#">HTML</a></li>
                        <li><a href="#">CSS</a></li>
                    </ul>
                </li>
                </ul>
        </div>
        <div class="description">
            <h1>Learning to Code</h1>
            <h2>Opening a door to the future</h2>
            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eum dolorum architecto obcaecati enim dicta praesentium, quam nobis! Neque ad aliquam facilis numquam. Veritatis, sit.</p>
            <p class="read-more">
            <a href="#">Read More</a>
            </p>
        </div>
    </div>
    <div class="blog-card alt">
        <div class="meta">
            <div class="photo" style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-2.jpg)"></div>
                <ul class="details">
                    <li class="author"><a href="#">Jane Doe</a></li>
                    <li class="date">July. 15, 2015</li>
                    <li class="tags">
                    <ul>
                        <li><a href="#">Learn</a></li>
                        <li><a href="#">Code</a></li>
                        <li><a href="#">JavaScript</a></li>
                    </ul>
                    </li>
                </ul>
        </div>
        <div class="description">
            <h1>Mastering the Language</h1>
            <h2>Java is not the same as JavaScript</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eum dolorum architecto obcaecati enim dicta praesentium, quam nobis! Neque ad aliquam facilis numquam. Veritatis, sit.</p>
            <p class="read-more">
                <a href="#">Read More</a>
            </p>
        </div>
    </div>
  <!-- blog cards end -->


  <!-- footer -->
    <footer class="footer">
        <div class="social-container">
            <div class="icon-holder">
                <span>
                    <a href="https://github.com/Vannixx" target="_blank" rel="noopener"><img class="github-logo" src="/assets/img/github-logo.png" alt="GitHub Link"></a>
                </span>
            </div>
            <div class="icon-holder">
                <span>
                    <a href="https://www.facebook.com/vann.deguzman.984/" target="_blank" rel="noopener"><img class="fb-logo" src="/assets/img/facebook.png" alt="Facebook Link"></a>
                </span>
            </div>
            <div class="icon-holder">
                <span>
                    <a href="https://twitter.com/vanniixxxx" target="_blank" rel="noopener"><img class="twitter-logo" src="/assets/img/twitter.png" alt="Twitter Link"></a>
                </span>
            </div>
            <div class="icon-holder">
                <span>
                    <a href="https://www.linkedin.com/in/fred-de-guzman-763aab2b7/" target="_blank" rel="noopener"><img class="linkedin-logo" src="/assets/img/linkedin.png" alt="LinkedIn Link"></a>
                </span>
            </div>
        </div>
    </footer>
 
    <script>
    // back to top button
    // Get the button element
    var backToTopBtn = document.getElementById("backToTopBtn");

    // Add scroll event listener to window
    window.addEventListener("scroll", function() {
        // Check if user has scrolled down 100 pixels from the top
        if (window.pageYOffset > 100) {
            // If scrolled down, show the button
            backToTopBtn.style.display = "block";
        } else {
            // If not scrolled down or scrolled back to top, hide the button
            backToTopBtn.style.display = "none";
        }
    });
    </script>

    </body>
</html>
