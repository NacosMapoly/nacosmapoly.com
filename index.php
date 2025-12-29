<?php include 'config/constants.php'; ?>
<?php include 'config/functions.php'; ?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>

    <?php include 'meta.php' ?>
     <title><?php echo $thename ?> - Your gateway to Innovation at Mapoly</title>

    <meta name="keywords" content="<?php echo $thename ?>, NACOS, MAPOLY, Moshood Abiola Polytechnic Computing Students, Nigeria Association of Computing Students, NACOS MAPOLY portal, NACOS ICT, NACOS MAPOLY events, MAPOLY tech community, Student tech association MAPOLY, MAPOLY programming students, NACOS MAPOLY news, NACOS MAPOLY membership" />

    <meta name="description" content="<?php echo $thename ?> is the tech community for all computing students at Moshood Abiola Polytechnic, fostering innovation, collaboration, and professional development."/>

    <!-- Open Graph Meta Tags (for social media sharing) -->
    <meta property="og:title" content="<?php echo $thename ?> - Your gateway to Innovation at Mapoly" />
    <meta property="og:image" content="<?php echo $website_url ?>/all-images/plugin-pix/nacosmapoly.jpg" />
    <meta property="og:description" content="<?php echo $thename ?> is the tech community for all computing students at Moshood Abiola Polytechnic, fostering innovation, collaboration, and professional development." />

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:title" content="<?php echo $thename ?> - Your gateway to Innovation at Mapoly" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="<?php echo $thename ?>/all-images/plugin-pix/nacosmapoly.jpg" />
    <meta name="twitter:description" content="<?php echo $thename ?> is the tech community for all computing students at Moshood Abiola Polytechnic, fostering innovation, collaboration, and professional development." />

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-NVZER5D4TZ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-NVZER5D4TZ');
</script>
</head>

<body>

    <?php include 'header.php' ?>

    <section class="slide-section">
        <?php include 'slide.php' ?>
        <div class="slide-div">
            <div class="content-back-div">
                <div class="text-content-div" data-aos="zoom-in" data-aos-duration="900">
                    <div>
                        <div class="top-title"><i class="bi-bell-fill"></i><span> <strong>WELCOME</strong> TO NACOS MAPOLY</span></div>
                    </div>
                    <h1>Start Your Tech Career </br>#<span id="page-title"></span></h1>
                    <p><strong><?php echo $thename ?></strong> is the tech community for all computing students at Moshood Abiola Polytechnic, fostering innovation, collaboration, and professional development.</p>
                    
                    <div class="btn-div">
                        <button class="btn" onclick="link('<?php echo $nacos_student_login_portal_url ?>')" title="Nacos Student Portal"><i class="bi-person-fill-check"></i>Nacos Student Portal</button>
                        <button class="btn right-btn" onclick="link('<?php echo $website_url ?>/materials')" title="Get Materials"><i class="bi-book-fill"></i>Get Materials</button>
                        <button class="btn" title="Our Courses" onclick="link('<?php echo $website_url ?>')"><i class="bi-mortarboard-fill"></i> Our Courses</button>
                    </div>
                    <script>
                        
                    </script>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            // List of sentences
            var _CONTENT = ["Innovation", "Collaboration", "Excellence", "Intellectual Thinking"];
            // Current sentence being processed
            var _PART = 0;
            // Character number of the current sentence being processed 
            var _PART_INDEX = 0;
            // Element that holds the text
            var _ELEMENT = document.querySelector("#page-title");
            // Implements typing effect
            function Type() {
                var text = _CONTENT[_PART].substring(0, _PART_INDEX + 1);
                _ELEMENT.innerHTML = text;
                _PART_INDEX++;
                // If full sentence has been displayed then start to delete the sentence after some time
                if (text === _CONTENT[_PART]) {
                    clearInterval(_INTERVAL_VAL);
                    setTimeout(function() {
                        _INTERVAL_VAL = setInterval(Delete, 2);
                    }, 5000);
                }
            }
            // Implements deleting effect
            function Delete() {
                var text = _CONTENT[_PART].substring(0, _PART_INDEX - 1);
                _ELEMENT.innerHTML = text;
                _PART_INDEX--;

                // If sentence has been deleted then start to display the next sentence
                if (text === '') {
                    clearInterval(_INTERVAL_VAL);

                    // If last sentence then display the first one, else move to the next
                    if (_PART == (_CONTENT.length - 1))
                        _PART = 0;
                    else
                        _PART++;
                    _PART_INDEX = 0;
                    // Start to display the next sentence after some time
                    setTimeout(function() {
                        _INTERVAL_VAL = setInterval(Type, 50);
                    }, 100);
                }
            }
            // Start the typing effect on load
            _INTERVAL_VAL = setInterval(Type, 50);
        </script>
    </section>

    <section class="index-content-div">
        <div class="event-body-div">
            <div class="event-body-div-in" id="fetchindexUpcomingEvent">
                <script>
                    _fetchindexUpcomingEvent();
                </script>
            </div>

        </div>


        <section class="body-div">
            <div class="body-div-in">
                <div class="main-pages-back-div">
                    <div class="about-div">
                        <div class="image-back-div">
                            <div class="img-div" data-aos="fade-up" data-aos-duration="1400" id="hod_pix">
                                <img src="<?php echo $website_url ?>/all-images/body-pix/nacos-logo.png" alt="About <?php echo $thename ?>" />
                            </div>
                            <div class="image-lay-text-div" id="hidden-detail">
                                <div class="icon-div" >
                                    <img src="<?php echo $website_url ?>/all-images/images/icon.png" alt="About Us" />
                                </div>

                                <div class="text-div">
                                    <h3 id="hod_name">Xxxx Xxxx</h3>
                                    <p id="hod_position">Xxxx Xxxx</p>
                                </div>
                            </div>
                            <script>_fetchPageHod();</script>
                        </div>

                        <div class="content-div" data-aos="fade-in" data-aos-duration="1400">
                            <div><span class="top-text">ABOUT US</span></div>
                            <h2>Welcome to <span>NACOS MAPOLY, ABEOKUTA</span></h2>
                            <p>NACOS is the largest student body for computing and IT students in Nigeria, dedicated to fostering technology growth, skill development, and career opportunities. Whether you're a software developer, data scientist, cybersecurity enthusiast, or tech entrepreneur, NACOS is your gateway to a world of endless possibilities!</p>
                            <p>We are dedicated to cultivating a culture of curiosity and creativity, where students feel safe to express themselves and embrace challenges. Through hands-on activities and collaborative learning, we inspire critical thinking and problem-solving skills, preparing our students for success in an ever-evolving world.</p>

                            <a href="<?php echo $website_url ?>/about" title="Read More">
                                <button class="btn" title="Read More">Read More <i class="bi-arrow-right"></i></button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <section class="body-div net-bg-tl">
            <div class="body-div-in">
                <div class="main-pages-back-div">
                    <div class="title-div" data-aos="fade-in" data-aos-duration="1200">
                        <div class="top-div">
                            <div><span class="top-title">WHAT WE OFFER</span></div>
                            <h2>Our Programs</h2>
                            <p>At NACOS, we provide a wide range of opportunities and resources to help computing students learn, grow, and succeed in the ever-evolving tech industry.</p>
                        </div>
                    </div>

                    <div class="program-back-div">
                        <div class="program-div">
                            <div class="program-content" data-aos="fade-up" data-aos-duration="1000">
                                <div class="program-title">
                                    <div class="icon-div"><img src="<?php echo $website_url ?>/all-images/images/award.png" alt="<?php echo $thename ?> Hackathons" /></div>
                                    <div class="program-title">Hackathons</div>
                                </div>
                                <div>We organise hackathons and competitions for computing students.</div>
                            </div>


                            <div class="program-content" data-aos="fade-up" data-aos-duration="1200">
                                <div class="program-title">
                                    <div class="icon-div"><img src="<?php echo $website_url ?>/all-images/images/networking.png" alt="<?php echo $thename ?> Networking & Career Development" /></div>
                                    <div class="program-title">Networking & Career Development</div>
                                </div>
                                <div>Expand your professional circle by connecting with top tech companies and mentors.</div>
                            </div>
                        </div>

                        <div class="program-div image-div">
                            <img src="<?php echo $website_url ?>/all-images/body-pix/nacos-program.png" alt="<?php echo $thename ?> Nacos Program" />
                        </div>

                        <div class="program-div">
                            <div class="program-content" data-aos="fade-up" data-aos-duration="1000">
                                <div class="program-title">
                                    <div class="icon-div"><img src="<?php echo $website_url ?>/all-images/images/event.png" alt="<?php echo $thename ?> Tech Conferences & Events" /></div>
                                    <div class="program-title">Tech Conferences & Events</div>
                                </div>
                                <div>Stay ahead of the curve by attending high-impact conferences and seminars featuring experts from leading tech firms</div>
                            </div>

                            <div class="program-content" data-aos="fade-up" data-aos-duration="1200">
                                <div class="program-title">
                                    <div class="icon-div"><img src="<?php echo $website_url ?>/all-images/images/leadership.png" alt="<?php echo $thename ?> Community & Leadership Development" /></div>
                                    <div class="program-title">Community & Leadership Development</div>
                                </div>
                                <div>Be part of a vibrant community of young, passionate, and innovative minds pushing the boundaries of technology.</div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </section>

        <section class="body-div net-bg-br">
            <div class="body-div-in">
                <div class="main-pages-back-div">
                    <div class="about-div" data-aos="fade-in" data-aos-duration="1400">
                        <div class="content-div">
                            <div><span class="top-text">OUR CORE VALUES</span></div>
                            <h2>Exploring Our Status <span>#Values</span></h2>
                            <p>Explore our status values to learn about the guiding principles that shape our approach to education and community.</p>

                            <div class="progress-back-div">
                                <div class="progress-container">
                                    <div class="progress-item">
                                        <span class="title">Case study success</span>
                                        <div class="progress-bar">
                                            <div class="progress-per" data-text="90">90</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-container">
                                    <div class="progress-item">
                                        <span class="title">Happy student</span>
                                        <div class="progress-bar">
                                            <div class="progress-per" data-text="75">75</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-container">
                                    <div class="progress-item">
                                        <span class="title">Engaging</span>
                                        <div class="progress-bar">
                                            <div class="progress-per" data-text="93">93</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress-container">
                                    <div class="progress-item">
                                        <span class="title">Student Community</span>
                                        <div class="progress-bar">
                                            <div class="progress-per" data-text="63">63</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="image-back-div">
                            <div class="img-div" data-aos="fade-in" data-aos-duration="1200">
                                <img src="<?php echo $website_url ?>/all-images/body-pix/values.png" alt="<?php echo $thename ?> Values" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                _progressBar();
            </script>
        </section>


        <section class="body-div net-bg-tr">
            <div class="body-div-in">
                <div class="main-pages-back-div">
                    <div class="title-div" data-aos="fade-in" data-aos-duration="1200">
                        <div class="top-div">
                            <div><span class="top-title">OUR CLASSES</span></div>
                            <h2>Our Popular Classes & Lab </h2>
                            <p>Explore our most sought-after classes designed to inspire and engage. Join us and discover a world of learning opportunities!"</p>
                        </div>
                        <div class="carousel-title-btn-div">
                            <button class="button" title="Previous" id="js-carousel__prev_1"><i class="bi-chevron-double-left"></i></button>
                            <button class="button" title="Next" id="js-carousel__next_1"><i class="bi-chevron-double-right"></i></button>
                        </div>
                    </div>

                    <div class="main-gallery-back-div index-gallery-back-div">
                        <div class="cg-carousel">
                            <div class="cg-carousel__container" id="js-carousel_1">
                                <div class="cg-carousel__track js-carousel__track" id="fetchIndexClassGallery">
                                    <script>
                                        _fetchIndexClassGallery();
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                window['carousel_options_1'] = ({
                    items: 4,
                    margin: 30,
                    loop: true,
                    dots: true,
                    autoplayHoverPause: true,
                    smartSpeed: 650,
                    autoplay: true,
                    breakpoints: {
                        700: {
                            slidesPerView: 2,
                        },
                        1000: {
                            slidesPerView: 3,
                        },
                        1300: {
                            slidesPerView: 4,
                        }

                    }
                });
            </script>
        </section>


        <section class="body-div net-bg-bl">
            <div class="body-div-in">
                <div class="main-pages-back-div">
                    <div class="faq-back-div">
                        <div class="left-image-div" data-aos="fade-in" data-aos-duration="1200">
                            <img src="<?php echo $website_url ?>/all-images/body-pix/nacos-logo.png" alt="<?php echo $thename ?> Logo" />
                        </div>

                        <div class="right-container" data-aos="fade-up" data-aos-duration="1200">
                            <div class="faq-title">
                                <div><span class="top-title">FAQ</span></div>
                                <h2>Frequently Asked <span>Questions</span></h2>
                            </div>
                            <div class="faq-toggle-back" id="fetchIndexFaq">
                                <script>
                                    _fetchIndexFaq();
                                </script>
                            </div>
                            <a href="<?php echo $website_url ?>/faq" title="Read More FAQ">
                                <button class="btn" title="Read More FAQ">Read More FAQ <i
                                        class="bi-arrow-right"></i></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="body-div net-bg-tl">
            <div class="body-div-in">
                <div class="main-pages-back-div">
                    <div class="title-div" data-aos="fade-in" data-aos-duration="1200">
                        <div class="top-div">
                            <div><span class="top-title">OUR LECTURERS</span></div>
                            <h2>Meet With Our Lecturers</h2>
                            <p>Meet with our dedicated lecturers to discuss your academics progress, ask questions, and explore how we can support their educational journey.</p>
                        </div>
                        <a href="<?php echo $website_url ?>/lecturers" title="Explore All Teachers">
                            <button class="btn" title="Explore All Teachers">Explore All Lecturers <i class="bi-arrow-right"></i></button></a>
                    </div>

                    <div class="teachers-back-div" id="fetchPageLecturers">
                        <script>
                            _fetchPageLecturers('fetch-index-lecturers');
                        </script>
                    </div>
                </div>
            </div>
        </section>


        <section class="body-div net-bg-tl">
            <div class="body-div-in">
                <div class="main-pages-back-div">
                    <div class="title-div" data-aos="fade-in" data-aos-duration="1200">
                        <div class="top-div">
                            <div><span class="top-title">OUR Executives</span></div>
                            <h2>Meet With Our Executives</h2>
                            <p>The NACOS executive team ensures the smooth operation, growth, and success of the department, and explore how we can support your educational journey.</p>
                        </div>
                        <a href="<?php echo $website_url ?>/executives" title="Explore All Teachers">
                            <button class="btn" title="Explore All Teachers">Explore All Executives <i class="bi-arrow-right"></i></button></a>
                    </div>

                    <div class="teachers-back-div" id="fetchPageExcos">
                        <script>
                            _fetchPageExcos('fetch-index-executives');
                        </script>
                    </div>
                </div>
            </div>
        </section>





        <section class="body-div testimonial-bg">
            <div class="body-div-in">
                <div class="main-pages-back-div">
                    <div class="testimonial-title" data-aos="fade-in" data-aos-duration="1200">
                        <div class="top-div">
                            <div><span class="top-title">TESTIMONIALS</span></div>
                            <h2>What Our Students Say's</h2>
                            <p>Our students share their experiences, highlighting the engaging lessons and strong friendships that make our school a special place to learn and grow.</p>
                        </div>
                        <button class="btn" title="Share Your Testimony" onclick="_getForm('testimonial-form', '');">Share Your Testimony <i class="bi-arrow-right"></i></button>
                    </div>

                    <div class="testimonial-back-div">
                        <div class="cg-carousel">
                            <div class="cg-carousel__container" id="js-carousel_2">
                                <div class="cg-carousel__track js-carousel__track" id="fetchAllTestimony">
                                    <script>
                                        _fetchAllTestimony();
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="test-carousel-btn-div">
                        <button class="btn" title="Previous" id="js-carousel__prev_2"><i class="bi-chevron-double-left"></i></button>
                        <button class="btn" title="Next" id="js-carousel__next_2"><i class="bi-chevron-double-right"></i></button>
                    </div>
                </div>
            </div>
            <script>
                window['carousel_options_2'] = ({
                    items: 4,
                    margin: 30,
                    loop: true,
                    dots: true,
                    autoplayHoverPause: true,
                    smartSpeed: 650,
                    autoplay: true,
                    breakpoints: {
                        700: {
                            slidesPerView: 2,
                        },
                        900: {
                            slidesPerView: 2,
                        },
                        1300: {
                            slidesPerView: 3,
                        }

                    }
                });
            </script>
        </section>

        <section class="body-div faq-bg">
            <div class="body-div-in">
                <div class="main-pages-back-div">
                    <div class="title-div" data-aos="fade-in" data-aos-duration="1200">
                        <div class="top-div">
                            <div><span class="top-title">LATEST INSIGHTS</span></div>
                            <h2>Latest News & Blog </h2>
                            <p>Stay updated with our latest news and blog posts, where we share important announcements, insights, and exciting updates from our school community.</p>
                        </div>
                        <a href="<?php echo $website_url ?>/blog/" title="Explore All Blogs">
                            <button class="btn" title="Explore All Blogs">Explore All Blogs <i class="bi-arrow-right"></i></button></a>
                    </div>

                    <div class="blog-back-div" id="fetchIndexBlog">
                        <script>
                            _fetchIndexBlog();
                        </script>
                    </div>
                </div>
            </div>
        </section>

        <?php $callclass->_statistics($website_url); ?>
        <?php include 'footer.php' ?>
    </section>
</body>

</html>