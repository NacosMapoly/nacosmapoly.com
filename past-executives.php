<?php include 'config/constants.php'; ?>
<?php include 'config/functions.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <script src="<?php echo $website_url ?>/js/superplaceholder.js"></script>
    <title><?php echo $thename ?> Past Executives - Leaders of Computer Science</title>

    <meta name="keywords" content="<?php echo $thename ?> past executives, NACOS Stakeholders, MAPOLY Stakeholders, MAPOLY Leaders, MAPOLY computer science leaders, NACOS alumni executives, MAPOLY departmental history, <?php echo $thename ?> former presidents, NACOS legacy leaders" />

    <meta name="description" content="Meet the <?php echo $thename ?> executive team driving innovation, leadership, and student support for a thriving computing community at Moshood Abiola Polytechnic." />

    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo $thename ?> Past Executives - Leaders of Computer Science" />
    <meta property="og:image" content="<?php echo $website_url ?>/all-images/plugin-pix/nacosmapoly.jpg" />
    <meta property="og:description" content="Explore the list of <?php echo $thename ?> past executives who have led the Computer Science department with vision and impact. Honoring years of leadership and legacy." />

    <!-- Twitter Meta -->
    <meta name="twitter:title" content="<?php echo $thename ?> Past Executives - Leaders of Computer Science" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="<?php echo $website_url ?>/all-images/plugin-pix/nacosmapoly.jpg" />
    <meta name="twitter:description" content="Explore the list of <?php echo $thename ?> past executives who have led the Computer Science department with vision and impact. Honoring years of leadership and legacy." />
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
                        <a href="<?php echo $website_url ?>/past-executives">
                            <li title="Our Past Executives">Our Past Executives</li>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="text-content-div" data-aos="fade-in" data-aos-duration="900">
                <h1 data-aos="fade-in" data-aos-duration="800"><span>Our Past Executives</span></h1>
                <p>Explore the list of <?php echo $thename ?> past executives who have led the Computer Science department with vision and impact. Honoring years of leadership and legacy.</p>

                <?php $callclass->_otherPagesBtn($website_url); ?>
            </div>
        </div>
    </section>

    <section class="others-pg-content-div">
        <section class="body-div">
            <div class="body-div-in">
                <div class="search-div">
                    <select id="exam_session" class="text_field" placeholder="" onchange="_getSearchItem('teachers-div', 'fetchPageExcos');">
                        <option value="">-Select Academic Session Here</option>
                    </select>
                    <input type="text" id="search_keywords" class="text_field" onkeyup="_getSearchItem('teachers-div','fetchPageExcos');" placeholder="Type Here to Search for Courses">
                </div>

                <div class="teachers-back-div" id="fetchPageExcos">
                    <script>
                        _fetchPastExcos('fetch-all-past-executives');
                    </script>
                </div>
                    <div id="paginationControls"></div>
            </div>
             <script>
                var search_content = ['Type Here to Search for Past Executives...']; 
                _placeHolder(search_keywords, search_content);
            </script>
        </section>

        <?php $callclass->_statistics($website_url); ?>
        <?php include 'footer.php' ?>
    </section>

</body>

</html>