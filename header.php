<?php include 'alert.php' ?>
<header class="animated fadeInDown">
    <div class="header-top-div">
        <div class="header-top-div-in">
            <div class="social-media-div">
                <h3>Follow Us:</h3>
                <ul>
                    <a id="instagram2" target="_blank" rel="noopener noreferrer" title="Instagram">
                        <li class="ig-cl"><i class="bi-instagram"></i></li>
                    </a>
                    <a id="whatsAppUs2" target="_blank" rel="noopener noreferrer" title="Whatsapp">
                        <li class="whtap-cl"><i class="bi-whatsapp"></i></li>
                    </a>
                    <a id="mailUs2" target="_blank" rel="noopener noreferrer" title="Mail Us">
                        <li class="mail-cl"><i class="bi-envelope"></i></li>
                    </a>
                </ul>
            </div>
            <div class="contacts">
                <div class="contact no-border"><i class="bi-clock"></i> <span>Session - <span id="currentAcademicSession1"></span></div>
                    <div class="contact"><i class="bi-telephone"></i> <span id="textPhone2"></span></div>
            </div>
        </div>
    </div>

    <div class="header-div-in">
        <div class="inner-div">
            <div class="logo-div">
                <a href="<?php echo $website_url ?>"><img src="<?php echo $website_url ?>/all-images/images/logo.png" alt="<?php echo $thename ?> Logo" class="animated zoomIn" /></a>
            </div>

            <nav>
                <ul>
                    <a href="<?php echo $website_url ?>" title="Home Page">
                        <li <?php if (($website_auto_url == "$website_url/index") || ($website_auto_url == "$website_url/") || ($website_auto_url == "$website_url")) { ?> class="active" <?php } ?>> Home</li>
                    </a>

                    <li id="expand-li" class=" <?php if (strstr($website_auto_url, "$website_url/about") || strstr($website_auto_url, "$website_url/lecturers") || strstr($website_auto_url, "$website_url/past-executives") || strstr($website_auto_url, "$website_url/executives") || strstr($website_auto_url, "$website_url/past-presidents") || strstr($website_auto_url, "$website_url/gallery") || strstr($website_auto_url, "$website_url/faq")) { ?> active <?php } ?>">
                        About Us <i class="bi-chevron-down"></i>
                        <ul class="animated fadeIn">
                            <a href="<?php echo $website_url ?>/about" title="About Nacos Mapoly">
                                <li>About Nacos Mapoly</li>
                            </a>
                            <a href="<?php echo $website_url ?>/lecturers" title="Meet Our Lecturers">
                                <li>Meet Our Lecturers</li>
                            </a>
                            <a href="<?php echo $website_url ?>/executives" title="Meet Our Executives" >
                                <li>Meet Our Executives</li>
                            </a>
                            <a href="<?php echo $website_url ?>/past-executives" title="Meet Our Past Executives">
                                <li>Meet Our Past Executives</li>
                            </a>
                            <a href="<?php echo $website_url ?>/past-presidents" title="Meet Our Past President">
                                <li>Meet Our Past President</li>
                            </a>
                            <a href="<?php echo $website_url ?>/gallery" title="Our Gallery">
                                <li>Our Gallery</li>
                            </a>
                            <a href="<?php echo $website_url ?>/faq" title="Frequently Asked Questions">
                                <li class="li">Frequently Asked Questions</li>
                            </a>
                        </ul>
                    </li>



                    <li id="expand-li" class="<?php if (strstr($website_auto_url, "$website_url/materials") || strstr($website_auto_url, "$website_url/classes") || strstr($website_auto_url, "$website_url/courses/") ) { ?> active <?php } ?>">
                        Academics <i class="bi-chevron-down"></i>
                        <ul class="animated fadeIn">
                            <a href="<?php echo $website_url ?>/materials" title="Get Materials">
                                <li>Get Materials</li>
                            </a>
                            <a href="<?php echo $website_url ?>/classes" title="Nacos Classes">
                                <li>Classes</li>
                            </a>
                            <a href="<?php echo $website_url ?>/courses/" title="Nacos Courses">
                                <li class="li">Courses</li>
                            </a>
                            <a href="<?php echo $nacos_student_portal_url ?>" title="Nacos Student Portal">
                                <li class="li">Nacos Student Portal</li>
                            </a>
                            <a href="<?php echo $school_student_portal_url ?>" title="Mapoly Student Portal">
                                <li class="li">Mapoly Student Portal</li>
                            </a>
                        </ul>
                    </li>

                    <a href="<?php echo $website_url ?>/event/" title="Nacos Event">
                        <li class="contact <?php if (strstr($website_auto_url, "$website_url/event")) { ?> active <?php } ?>">
                            Event
                        </li>
                    </a>

                    <a href="<?php echo $website_url ?>/contact-us" title="Contact Us">
                        <li class="contact <?php if (strstr($website_auto_url, "$website_url/contact-us")) { ?> active <?php } ?>">
                            Contact Us
                        </li>
                    </a>

                    <a href="<?php echo $website_url ?>/blog/" title="Blog">
                        <li class="blog <?php if (strstr($website_auto_url, "$website_url/blog/")) { ?> active <?php } ?>">
                            Blog
                        </li>
                    </a>
                </ul>

                <div class="nav-icon-div"><i class="bi-search"></i></div>
                <a href="<?php echo $nacos_student_login_portal_url ?>" title="Nacos Student Portal">
                    <button class="btn" title="Student Portal"><i class="bi-person-fill-check"></i> Student Portal</button>
                </a>
                <button class="mobile-btn" onclick="_open_menu()"><i class="bi-text-right"></i></button>
            </nav>
        </div>
    </div>
</header>