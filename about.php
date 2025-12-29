<?php include 'config/constants.php'; ?>
<?php include 'config/functions.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title>About <?php echo $thename ?> -  Empowering Future Tech Leaders at Moshood Abiola Polytechnic</title>

    <meta name="keywords" content="<?php echo $thename ?>, Nigeria Association of Computing Students, MAPOLY tech community, computing students in Nigeria, student tech innovation MAPOLY, tech skill development MAPOLY, MAPOLY software developers, cybersecurity students MAPOLY, data science MAPOLY, NACOS career opportunities" />

    <meta name="description" content="Join <?php echo $thename ?> - Nigeria's top tech student body at Moshood Abiola Polytechnic. Explore IT skills, innovation, and career growth in a dynamic tech community." />

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="About <?php echo $thename ?> -  Empowering Future Tech Leaders at Moshood Abiola Polytechnic" />
    <meta property="og:image" content="<?php echo $website_url ?>/all-images/plugin-pix/nacosmapoly.jpg" />
    <meta property="og:description" content="Join <?php echo $thename ?> - Nigeria's top tech student body at Moshood Abiola Polytechnic. Explore IT skills, innovation, and career growth in a dynamic tech community." />

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:title" content="About <?php echo $thename ?> -  Empowering Future Tech Leaders at Moshood Abiola Polytechnic" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="<?php echo $website_url ?>/all-images/plugin-pix/nacosmapoly.jpg" />
    <meta name="twitter:description" content="Join <?php echo $thename ?> - Nigeria's top tech student body at Moshood Abiola Polytechnic. Explore IT skills, innovation, and career growth in a dynamic tech community." />
</head>

<body>
    <?php include 'header.php' ?>

    <section class="other-pages" data-aos="fade-in" data-aos-duration="900">
        <div class="other-pages-back-div">
            <div class="top-title">
                <ul>
                    <a href="<?php echo $website_url ?>">
                        <li title="Home">Home <i class="bi-caret-right-fill"></i></li>
                    </a>
                    <a href="<?php echo $website_url ?>/about">
                        <li title="About Us">About Us</li>
                    </a>
                </ul>
            </div>
            <div class="text-content-div" data-aos="fade-in" data-aos-duration="900">
                <h1 data-aos="fade-in" data-aos-duration="800"><span>About Us</span></h1>
               <p>Join <strong><?php echo $thename ?></strong> - Nigeria's top tech student body at Moshood Abiola Polytechnic. Explore IT skills, innovation, and career growth in a dynamic tech community.</p>
                <?php $callclass->_otherPagesBtn($website_url); ?>
            </div>
        </div>
    </section>

    <section class="others-pg-content-div">
        <section class="body-div">
            <div class="body-div-in">
                <div class="main-pages-back-div">
                    <div class="about-div">
                        <div class="image-back-div">
                            <div class="img-div" data-aos="fade-up" data-aos-duration="1400" id="hod_pix">
                                <img src="<?php echo $website_url ?>/all-images/body-pix/nacos-logo.png" alt="About <?php echo $thename ?>" />
                            </div>
                            <div class="image-lay-text-div" id="hidden-detail">
                                <div class="icon-div">
                                    <img src="<?php echo $website_url ?>/all-images/images/icon.png" alt="About Us" />
                                </div>

                                <div class="text-div">
                                    <h3 id="hod_name">Xxxx Xxxx</h3>
                                    <p id="hod_position">Xxxx Xxxx</p>
                                </div>
                            </div>
                            <script>
                                _fetchPageHod();
                            </script>
                        </div>

                        <div class="content-div animated fadeInUp">
                            <div><span class="top-text">ABOUT US</span></div>
                            <h2>Welcome to <span>NACOS MAPOLY, ABEOKUTA</span></h2>
                            <p>NACOS is the largest student body for computing and IT students in Nigeria, dedicated to fostering technology growth, skill development, and career opportunities. Whether you're a software developer, data scientist, cybersecurity enthusiast, or tech entrepreneur, NACOS is your gateway to a world of endless possibilities!</p>
                            <p>We are dedicated to cultivating a culture of curiosity and creativity, where students feel safe to express themselves and embrace challenges. Through hands-on activities and collaborative learning, we inspire critical thinking and problem-solving skills, preparing our students for success in an ever-evolving world.</p>

                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="body-div">
            <div class="body-div-in">
                <div class="main-pages-back-div">
                    <div class="title-div" data-aos="fade-in" data-aos-duration="1200">
                        <div class="top-div">
                            <div><span class="top-title">OUR LECTURERS</span></div>
                            <h2>Meet With Our Lecturers</h2>
                            <p>Meet with our dedicated lecturers to discuss your academics progress, ask questions, and explore how we can support their educational journey.</p>
                        </div>
                        <a href="<?php echo $website_url ?>/lecturers" title="Explore All Lecturers">
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
                        <a href="<?php echo $website_url ?>/executives" title="Explore All Executives">
                            <button class="btn" title="Explore All Executives">Explore All Executives <i class="bi-arrow-right"></i></button></a>
                    </div>

                    <div class="teachers-back-div" id="fetchPageExcos">
                        <script>
                            _fetchPageExcos('fetch-index-executives');
                        </script>
                    </div>
                </div>
            </div>
        </section>



        <section class="body-div about-body-div">
            <div class="body-div-in about-body-div-in">
                <div class="main-pages-info-div">
                    <div class="about-details-back-div">
                        <div class="text-div" data-aos="fade-in" data-aos-duration="1200">
                            <div>
                                <div class="top-div">
                                    <h4>OUR VISION</h4>
                                </div>
                            </div>
                            <p>To empower NACOSTITES students across Nigeria by providing a platform for technical skill development, innovation, leadership, and industry collaboration, ensuring they are well-equipped to thrive in the ever-evolving world of technology.</p>
                        </div>

                        <div class="text-div mission-text" data-aos="fade-in" data-aos-duration="1200">
                            <div>
                                <div class="top-div mission-top">
                                    <h4>OUR MISSION</h4>
                                </div>
                            </div>
                            <p>To be the leading student technology association in Nigeria, fostering a community of highly skilled, innovative, and industry-ready computing professionals who will drive technological advancements locally and globally.</p>
                        </div>

                        <div class="text-div value-text" data-aos="fade-in" data-aos-duration="1200">
                            <div>
                                <div class="top-div">
                                    <h4>OUR CORE VALUE</h4>
                                </div>
                            </div>
                            <p>We encourage students to think outside the box and create cutting-edge solutions to real-world challenges. Also foster a strong community where students, industry leaders, and organizations collaborate for growth.</p>
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


        <section class="body-div testimonial-bg">
            <div class="body-div-in">
                <div class="main-pages-back-div">
                    <div class="testimonial-title" data-aos="fade-in" data-aos-duration="1200">
                        <div class="top-div">
                            <div><span class="top-title">TESTIMONIALS</span></div>
                            <h2>What Our Students Say's</h2>
                            <p>Our students share their experiences, highlighting the engaging lessons and strong friendships that make our school a special place to learn and grow.</p>
                        </div>
                        <button class="btn" title="Share Your Testimony" onclick="_getForm('testimonial-form');">Share Your Testimony <i class="bi-arrow-right"></i></button>
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



        <?php $callclass->_statistics($website_url); ?>
        <?php include 'footer.php' ?>
    </section>

</body>

</html>