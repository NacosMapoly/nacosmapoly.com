<?php include '../config/constants.php'; ?>
<?php include '../config/functions.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include '../meta.php' ?>
    <title><?php echo $thename ?> Courses - Explore Computing Programs at MAPOLY</title>

    <meta name="keywords" content="<?php echo $thename ?>, <?php echo $thename ?> courses, computing courses MAPOLY, IT programs MAPOLY, computer science MAPOLY, software development MAPOLY, Networking Department, NACOS academic programs, MAPOLY IT education, NACOS MAPOLY curriculum, MAPOLY computing studies" />

    <meta name="description" content="Explore a range of computing and IT courses at NACOS MAPOLY, designed to build your skills in software development, networking, AI, and technology innovation." />

    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo $thename ?> Courses - Explore Computing Programs at MAPOLY" />
    <meta property="og:image" content="<?php echo $website_url ?>/all-images/plugin-pix/nacosmapoly.jpg" />
    <meta property="og:description" content="Explore a range of computing and IT courses at NACOS MAPOLY, designed to build your skills in software development, networking, AI, and technology innovation." />

    <!-- Twitter Meta -->
    <meta name="twitter:title" content="<?php echo $thename ?> Courses - Explore Computing Programs at MAPOLY" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="<?php echo $website_url ?>/all-images/plugin-pix/nacosmapoly.jpg" />
    <meta name="twitter:description" content="Explore a range of computing and IT courses at NACOS MAPOLY, designed to build your skills in software development, networking, AI, and technology innovation." />
</head>

<body>
    <?php include '../header.php' ?>

    <section class="other-pages" data-aos="fade-in" data-aos-duration="900">
        <div class="other-pages-back-div">
            <div class="top-title">
                <div class="div-in">
                    <ul>
                        <a href="<?php echo $website_url ?>">
                            <li title="Home">Home <i class="bi-caret-right-fill"></i></li>
                        </a>
                        <a href="<?php echo $website_url ?>/courses">
                            <li title="Courses">Courses</li>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="text-content-div" data-aos="fade-in" data-aos-duration="900">
                <h1 data-aos="fade-in" data-aos-duration="800"><span>Our Available Courses</span></h1>
                <p>Explore a range of computing and IT courses at NACOS MAPOLY, designed to build your skills in software development, networking, AI, and technology innovation.</p>
                <?php $callclass->_otherPagesBtn($website_url); ?>
            </div>
        </div>
    </section>


    <section class="others-pg-content-div">
        <section class="body-div blog-body-div">
            <div class="body-div-in">
                <div class="page-back-div faq-pages-back-div">

                    <div class="left-div courses-div">
                        <div class="title-div">
                            <h2>National Diploma (ND) Available Courses</h2>
                        </div>
                        <div class="general-faq-div" id="fetchNDCourses">
                            <!-- <div class="faq-title main-faq-title">
                                <div class="inner-title-div">
                                    <h2>NATIONAL DIPLOMA I Courses</h2>
                                    <div class="expand-div"><i class="bi-plus"></i>&nbsp;</div>
                                </div>
                                <div class="faq-answer-div" style="display: none;">
                                    <p>' + faq_answer + '</p>
                                </div>
                            </div> -->
                        </div>

                        <div class="hnd-courses-div">
                            <div class="title-div">
                                <h2>Higher National Diploma (HND) Available Courses</h2>
                            </div>
                            <div class="list-courses-back-div" id="fetchHNDCourses">
                                <script>
                                    _fetchAllCourses();
                                </script>
                                <!-- <div class="grid-div">
                                    <div class="div-in">
                                        <div class="img-div"><img src="<?php //echo $website_url ?>/all-images/body-pix/event_1.webp" alt="Sermon"></div>
                                        <div class="text-div">
                                            <h2>Software Development (SWD)</h2>
                                            <div class="top-text">Software development is a dynamic and ever-evolving field. It requires not just technical skills but also creativity, critical thinking, and collaboration. </div>
                                            <div class="btn-div">
                                                <button class="btn download-btn courses-btn" title="CLICK TO READ MORE">Read More <i class="bi bi-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            
                            </div>

                            <div id="paginationControls"></div>
                        </div>

                    </div>
                </div>
        </section>
        <?php include '../footer.php' ?>
    </section>

</body>

</html>