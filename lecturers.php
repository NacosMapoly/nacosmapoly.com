<?php include 'config/constants.php';?>
<?php include 'config/functions.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include 'meta.php'?>
     <title>Meet Our Dedicated Lecturers - Academic Support at <?php echo $thename ?></title>

    <meta name="keywords" content="<?php echo $thename ?> lecturers, MAPOLY academic support, computing lecturers MAPOLY, student-lecturer meeting MAPOLY, academic progress MAPOLY, NACOS academic guidance, tech education support MAPOLY, MAPOLY student mentorship, NACOS educational journey, MAPOLY computing department" />

    <meta name="description" content="Connect with dedicated NACOS lecturers at MAPOLY to discuss your academic progress, ask questions, and get the support you need for your tech education journey." />
    
    <!-- Open Graph (Facebook, LinkedIn, etc.) -->
    <meta property="og:title" content="Meet Our Dedicated Lecturers - Academic Support at <?php echo $thename ?>" />
    <meta property="og:image" content="<?php echo $website_url ?>/all-images/plugin-pix/nacosmapoly.jpg" />
    <meta property="og:description" content="Connect with dedicated NACOS lecturers at MAPOLY to discuss your academic progress, ask questions, and get the support you need for your tech education journey." />

    <!-- Twitter Meta -->
    <meta name="twitter:title" content="Meet Our Dedicated Lecturers - Academic Support at <?php echo $thename ?>" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="<?php echo $website_url ?>/all-images/plugin-pix/nacosmapoly.jpg" />
    <meta name="twitter:description" content="Connect with dedicated NACOS lecturers at MAPOLY to discuss your academic progress, ask questions, and get the support you need for your tech education journey." />
</head>


<body>
    <?php  include 'header.php'?>

    <section class="other-pages" data-aos="fade-in" data-aos-duration="900">
        <div class="other-pages-back-div">
            <div class="top-title">
                <div class="div-in">
                    <ul>
                        <a href="<?php echo $website_url?>"><li title="Home">Home <i class="bi-caret-right-fill"></i></li></a>
                        <a href="<?php echo $website_url?>/lecturers"><li title="About Us">Our Lecturers</li></a>					
                    </ul>
                </div>			
            </div>
            <div class="text-content-div" data-aos="fade-in" data-aos-duration="900">
                <h1 data-aos="fade-in" data-aos-duration="800"><span>Our Lecturers</span></h1>
                <p>Connect with dedicated NACOS lecturers at MAPOLY to discuss your academic progress, ask questions, and get the support you need for your tech education journey.</p>
           
                <?php $callclass->_otherPagesBtn($website_url);?>
            </div>
        </div>
    </section>

    <section class="others-pg-content-div">
        <section class="body-div">
            <div class="body-div-in">
                <div class="main-pages-back-div">
                    <div class="title-div" data-aos="fade-in" data-aos-duration="1200">
                        <div class="top-div">
                            <div><span class="top-title">OUR LECTURERS</span></div>
                             <h2>Connect With Our Lecturers</h2>
                            <p>Connect with dedicated NACOS lecturers at MAPOLY to discuss your academic progress, ask questions, and get the support you need for your tech education journey.</p>
                    </div> 
                        <a href="<?php echo $website_url?>/lecturers" title="Explore All Lecturers">
                        <button class="btn" title="Explore All Lecturers">Explore All Lecturers <i class="bi-arrow-right"></i></button></a>
                    </div>

                      <div class="teachers-back-div" id="fetchPageLecturers">
                        <script>
                            _fetchPageLecturers('fetch-all-lecturers');
                        </script>
                    </div>
                </div>
            </div>
        </section>

        <?php $callclass->_statistics($website_url);?>
        <?php include 'footer.php'?>
    </section>
 
</body>
</html>


