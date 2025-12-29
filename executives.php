<?php include 'config/constants.php';?>
<?php include 'config/functions.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include 'meta.php'?>
    <title><?php echo $thename ?> Executives - Leading Innovation and Student Support</title>

    <meta name="keywords" content="<?php echo $thename ?> Executives, Computer Science Executives, NACOS Executives, NACOS Stakeholders, NACOS Student Leaders, MAPOLY student leadership, NACOS leadership team, MAPOLY computing department leaders, NACOS tech leaders, student support MAPOLY, NACOS MAPOLY team, computing student executives, MAPOLY department growth, NACOS MAPOLY innovation" />

    <meta name="description" content="Meet the NACOS MAPOLY executive team driving innovation, leadership, and student support for a thriving computing community at Moshood Abiola Polytechnic." />

    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo $thename ?> Executives - Leading Innovation and Student Support" />
    <meta property="og:image" content="<?php echo $website_url ?>/all-images/plugin-pix/nacosmapoly.jpg" />
    <meta property="og:description" content="Meet the NACOS MAPOLY executive team driving innovation, leadership, and student support for a thriving computing community at Moshood Abiola Polytechnic." />

    <!-- Twitter Meta -->
    <meta name="twitter:title" content="<?php echo $thename ?> Executives - Leading Innovation and Student Support" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="<?php echo $website_url ?>/all-images/plugin-pix/nacosmapoly.jpg" />
    <meta name="twitter:description" content="Meet the NACOS MAPOLY executive team driving innovation, leadership, and student support for a thriving computing community at Moshood Abiola Polytechnic." />
</head>

<body>
    
    <?php  include 'header.php'?>

    <section class="other-pages" data-aos="fade-in" data-aos-duration="900">
        <div class="other-pages-back-div">
            <div class="top-title">
                <div class="div-in">
                    <ul>
                        <a href="<?php echo $website_url?>"><li title="Home">Home <i class="bi-caret-right-fill"></i></li></a>
                        <a href="<?php echo $website_url?>/executives"><li title="Our Executives">Our Executives</li></a>					
                    </ul>
                </div>			
            </div>
            <div class="text-content-div" data-aos="fade-in" data-aos-duration="900">
                <h1 data-aos="fade-in" data-aos-duration="800"><span>Our Executives</span></h1>
                <p>Meet the <strong><?php echo $thename ?></strong> executive team driving innovation, leadership, and student support for a thriving computing community at Moshood Abiola Polytechnic.</p>                
           
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
                            <div><span class="top-title">OUR EXECUTIVES</span></div>
                            <h2>Meet With Our Executives</h2>
                            <p>The NACOS executive team ensures the smooth operation, growth, and success of the department, and explore how we can support your educational journey.</p>
                        </div> 
                        <a href="<?php echo $website_url?>/executives" title="Explore All Executives">
                        <button class="btn" title="Explore All Executives">Explore All Executives <i class="bi-arrow-right"></i></button></a>
                    </div>
                    <div class="teachers-back-div" id="fetchPageExcos">
                        <script>
                            _fetchPageExcos('fetch-all-executives');
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


