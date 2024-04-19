@include('content')
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
{{-- @if(isset($userData) && $userData->count() > 0) --}}
    @foreach($userData as $item) 
    <div class="wrapper">
        <div class="short-intro">
            <h1 class="name-holder">
                Hello, I'm <span id="my-name">{{ $item->userName }} </span>
            </h1>
            <h2 class="pos-holder">
                {{ $item->userRole }}
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
                        <img src="{{ asset ($item->userImage) }}" alt="">
                    </div>
                </div>

                <div data-aos="zoom-in" data-aos-delay="200" class="content-holder">
                    <div class="txt-container">
                        <p>{{$item->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
{{-- @else
    <p>No user data found.</p>
@endif --}}

    <!-- skills -->
    <section id="skills">
        <div class="skills-container">
            <h1>Skills</h1>

            <div class="icon-container">
                @foreach($skillData as $index => $skill)
                    @php
                        $delay = $index * 200; // Calculate delay based on index
                    @endphp
                    <div data-aos="flip-left" data-aos-delay="{{ $delay }}">
                        <div class="logo-container">
                            <img src="{{ asset($skill->skillImage)}}" alt="">
                        </div>
                    </div>
                @endforeach  
            </div>
            
        </div>
    </section>
    
    <!-- Projects -->
    <section id="projects">
    <div class="projects-container">
        <h1>Projects</h1>



    </div>
    </section>
    {{-- Project Cards --}}
  <div class="project-cards-container">
    @if ($projectData->isEmpty())
        <div class="no-data">
            <p>No Projects</p>
        </div>
    @else
        @foreach($projectData as $project)
            <div class="project-card">
                <img src="{{ asset($project->projectImage) }}" alt="Project Image" class="projImage">

                <div class="project-content">
                    <label for="" class="prjectName">Project Name:</label>
                    <p class="projName">{{ $project->projectName }}</p>
                </div>

                <div class="project-content">
                  <label for="" class="description">Project Description:</label>
                  <p class="projDescription">{{ $project->description }}</p>
                </div>
            </div>
        @endforeach
    @endif
</div>


  <!-- footer -->

<footer class="footer">
    <div class="social-container">
        @foreach($socialData as $social)
        <div class="icon-holder">
            <span>
                <a href="{{ $social->socialLink }}" target="_blank" rel="noopener">
                    <img src="{{ asset($social->socialIcons) }}" alt="{{ $social->socialName }} Link" class="social-icon" style="width: 40px; height: auto;">
                </a>
            </span>
        </div>
        @endforeach
    </div>
</footer>

    {{-- <footer class="footer">
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
    </footer> --}}
 
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
