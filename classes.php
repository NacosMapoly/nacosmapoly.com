<?php include 'config/constants.php';?>
<?php include 'config/functions.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include 'meta.php' ?>
    <title><?php echo $thename ?> - Classes and Laboratory Practical Learning</title>  

    <meta name="keywords" content="<?php echo $thename ?> Gallery, <?php echo $thename ?> Photos, <?php echo $thename ?> Gallery, Computer Science Event Photos, NACOS Hackathon Images, Bootcamp Highlights, NACOS Seminars Gallery, Tech Event Moments, Workshops and Conferences Photos, NACOS Student Life, Leadership Events MAPOLY, NACOS Executives in Action, NACOS MAPOLY Ojere, Innovation in Computing, IT Student Activities Nigeria, Best Student Tech Association, Moshood Abiola Polytechnic, NACOS Events Coverage, How to join NACOS" />

    <meta name="description" content="NACOS classes MAPOLY, MAPOLY computer lab, NACOS practical sessions, computer science classes MAPOLY, MAPOLY programming lab, software lab MAPOLY" />

    <!-- Open Graph -->
    <meta property="og:title" content="<<?php echo $thename ?> - Classes and Laboratory Practical Learning" />
    <meta property="og:image" content="<?php echo $website_url ?>/all-images/plugin-pix/nacosmapoly.jpg" />
    <meta property="og:description" content="NACOS classes MAPOLY, MAPOLY computer lab, NACOS practical sessions, computer science classes MAPOLY, MAPOLY programming lab, software lab MAPOLY" />

    <!-- Twitter Meta -->
    <meta name="twitter:title" content="<?php echo $thename ?> - Classes and Laboratory Practical Learning" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="<?php echo $website_url ?>/all-images/plugin-pix/nacosmapoly.jpg" />
    <meta name="twitter:description" content="NACOS classes MAPOLY, MAPOLY computer lab, NACOS practical sessions, computer science classes MAPOLY, MAPOLY programming lab, software lab MAPOLY" />
</head>


<body>
    <?php  include 'header.php'?>

    <section class="other-pages" data-aos="fade-in" data-aos-duration="900">
        <div class="other-pages-back-div">
            <div class="top-title">
                <div class="div-in">
                    <ul>
                        <a href="<?php echo $website_url?>"><li title="Home">Home <i class="bi-caret-right-fill"></i></li></a>
                        <a href="<?php echo $website_url?>/classes"><li title="Our Classes">Our Classes</li></a>					
                    </ul>
                </div>			
            </div>
            <div class="text-content-div" data-aos="fade-in" data-aos-duration="900">
                <h1 data-aos="fade-in" data-aos-duration="800"><span>Our Classes</span></h1>
                <p>Explore the <?php echo $thename ?> classes and lab sessions designed to give Computer Science students practical experience in programming, networking, and real-world IT tools.</p>                
           
                <?php $callclass->_otherPagesBtn($website_url);?>
            </div>
        </div>
    </section>
 
    
    <section class="others-pg-content-div">
        <section class="body-div">
            <div class="body-div-in">
                <div class="main-gallery-back-div" id="fetchAllGallery">
                     <script>_fetchAllGallery('classes/fetch-class-gallery');</script>
			    </div>              
            </div>
        </section>
        
        <?php include 'footer.php'?>
    </section>
</body>
</html>


