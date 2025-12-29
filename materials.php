<?php include 'config/constants.php'; ?>
<?php include 'config/functions.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <script src="<?php echo $website_url ?>/js/superplaceholder.js"></script>

    <title><?php echo $thename ?> Materials - Past Questions & Manuals</title>
    <meta name="keywords" content="<?php echo $thename ?>, MAPOLY computer science past questions, NACOS Materials, MAPOLY Materials, NACOS study materials, MAPOLY manuals download, computer science exam prep MAPOLY, NACOS resources, MAPOLY CS guide" />
    <meta name="description" content="Access <?php echo $thename ?> Computer Science materials, past questions, and manuals. Download resources to prepare for exams and succeed academically across all levels." />

    <meta property="og:title" content="<?php echo $thename ?> Materials - Past Questions & Manuals" />
    <meta property="og:image" content="<?php echo $website_url ?>/all-images/plugin-pix/materials.jpg" />
    <meta property="og:description" content="Access <?php echo $thename ?> Computer Science materials, past questions, and manuals. Download resources to prepare for exams and succeed academically across all levels." />

    <meta name="twitter:title" content="<?php echo $thename ?> Materials - Past Questions & Manuals" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="<?php echo $website_url ?>/all-images/plugin-pix/materials.jpg" />
    <meta name="twitter:description" content="Access <?php echo $thename ?> Computer Science materials, past questions, and manuals. Download resources to prepare for exams and succeed academically across all levels." />
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
                        <a href="<?php echo $website_url ?>/materials">
                            <li title="Materials">Materials</li>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="text-content-div" data-aos="fade-in" data-aos-duration="900">
                <h1 data-aos="fade-in" data-aos-duration="800"><span>Materials: Past Questions & Manuals Hub</span></h1>
                <p>Access <?php echo $thename ?> Computer Science materials, past questions, and manuals. Download resources to prepare for exams and succeed academically across all levels.</p>

                <div class="other-pages-btn-div">
                    <a href="https://app.nacosmapoly.com/" title="Nacos Student Portal">
                        <button class="btn" title="Nacos Student Portal"><i class="bi-person-fill-check"></i> Nacos Student Portal</button></a>
                    <a href="<?php echo $website_url ?>/courses" title="Our Courses">
                        <button class="btn center-btn" title="Our Courses"><i class="bi-mortarboard-fill"></i> Our Courses</button></a>
                </div>
            </div>
        </div>
    </section>

    <section class="others-pg-content-div">

        <section class="body-div main-event-body-div">
            <div class="body-div-in">
                <div class="search-div">
                    <select id="exam_session" class="text_field" placeholder="" onchange="_getSearchItem('grid-div', 'fetchAllPastQestion');">
                        <option value="">-Select Exam Session Here</option>
                    </select>
                    <input type="text" id="search_keywords" class="text_field" onkeyup="_getSearchItem('grid-div','fetchAllPastQestion');" placeholder="Type Here to Search for Courses">
                </div>

                <div class="list-event-back-div" id="fetchAllPastQestion">
                    <script>
                        _fetchAllPastQuestion();
                    </script>
                    <!-- <div class="grid-div">
                        <div class="div-in">
                            <div class="status-div">2024 / 2025 Exam Session </div>
                            <div class="img-div"><img src="<?php // echo $website_url 
                                                            ?>/all-images/body-pix/event_1.webp" alt="Sermon"></div>
                            <div class="text-div">
                                <div class="top-text">Level: <span>ND I</span> </div>
                                <div class="top-text">Semester: <span>FIRST SEMESTER</span> </div>
                                <div class="top-text">Course Code: <span>COM111</span> </div>
                                <div class="top-text">Course Title: </div>
                                <h2>Introduction to Computer</h2>
                                <div class="btn-div">
                                    <button class="btn" title="CLICK TO PREVIEW" onclick="_get_form_with_id('update_sermon')"><i class="bi bi-eye"></i> PREVIEW</button>
                                    <button class="btn download-btn" title="CLICK TO DOWNLOAD" onclick="_get_form_with_id('update_sermon')">DOWNLOAD <i class="bi bi-cloud-download"></i></button>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>

                <div id="paginationControls"></div>

            </div>
            <script>
                var search_content = ['Type Here to Search for Courses...', 'Search for Course Code eg COM111' , 'Search for Course Title', 'Search for Level']; 
                _placeHolder(search_keywords, search_content);
            </script>

        </section>

        <?php include 'footer.php' ?>
    </section>

</body>

</html>