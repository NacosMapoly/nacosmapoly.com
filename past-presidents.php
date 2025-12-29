<?php include 'config/constants.php'; ?>
<?php include 'config/functions.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title>Past <?php echo $thename ?> Presidents - Honoring Tech Leadership & Legacy</title>

    <meta name="keywords" content="<?php echo $thename ?> Former President, past <?php echo $thename ?> presidents, former NACOS executives, NACOS MAPOLY leadership history, MAPOLY tech pioneers, computing student leaders MAPOLY, NACOS MAPOLY alumni, tech legacy MAPOLY, MAPOLY innovation leaders, NACOS leadership journey, MAPOLY computing history" />

    <meta name="description" content="Discover the legacy of past <?php echo $thename ?> presidents. Who laid the foundation for student-driven innovation, and tech growth at Moshood Abiola Polytechnic." />

    <!-- Open Graph (Facebook, LinkedIn, etc.) -->
    <meta property="og:title" content="Past <?php echo $thename ?> Presidents - Honoring Tech Leadership & Legacy" />
    <meta property="og:image" content="<?php echo $website_url ?>/all-images/plugin-pix/nacosmapoly.jpg" />
    <meta property="og:description" content="Discover the legacy of past <?php echo $thename ?> presidents. Who laid the foundation for student-driven innovation, and tech growth at Moshood Abiola Polytechnic." />

    <!-- Twitter Meta -->
    <meta name="twitter:title" content="Past <?php echo $thename ?> Presidents - Honoring Tech Leadership & Legacy" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="<?php echo $website_url ?>/all-images/plugin-pix/nacosmapoly.jpg" />
    <meta name="twitter:description" content="Discover the legacy of past <?php echo $thename ?> presidents. Who laid the foundation for student-driven innovation, and tech growth at Moshood Abiola Polytechnic." />
</head>


<body>
    <?php include 'header.php' ?>

    <section class="other-pages" data-aos="fade-in" data-aos-duration="900">
        <div class="other-pages-back-div">
            <div class="top-title">
                <div class="div-in">
                    <ul>
                        <a href="<?php echo $website_url ?>">
                            <li title="Home">Home <i class="bi-caret-right-fill"></i></li>
                        </a>
                        <a href="<?php echo $website_url ?>/past-presidents">
                            <li title="Our Past President">Our Past President</li>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="text-content-div" data-aos="fade-in" data-aos-duration="900">
                <h1 data-aos="fade-in" data-aos-duration="800"><span>Our Past President</span></h1>
                <p>Discover the legacy of past NACOS MAPOLY presidents. Who laid the foundation for student-driven innovation, and tech growth at Moshood Abiola Polytechnic.</p>

                <?php $callclass->_otherPagesBtn($website_url); ?>
            </div>
        </div>
    </section>

    <section class="others-pg-content-div">
        <section class="body-div">
            <div class="body-div-in">
                <div class="main-pages-back-div">
                    <div class="title-div" data-aos="fade-in" data-aos-duration="1200">
                        <div class="top-div">
                            <div><span class="top-title">OUR PAST PRESIDENTS</span></div>
                            <h2>Meet With Our Past Presidents</h2>
                            <p>The NACOS past presidents ensures the smooth operation, growth, and success of the department, and explore how we can support your educational journey.</p>
                        </div>
                        <a href="<?php echo $website_url ?>/past-presidents" title="Explore All Past Presidents">
                            <button class="btn" title="Explore All Past Presidents">Explore All Past Presidents <i class="bi-arrow-right"></i></button></a>
                    </div>

                    <div class="teachers-back-div" id="fetchPastDetails">
                        <script>
                            _fetchPastPresidents('fetch-all-past-presidents');
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