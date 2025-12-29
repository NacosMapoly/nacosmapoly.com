<div class="all-alert-back-div">
    <div class="success-alert-div animated fadeInDown">
        <div class="icon"><i class="bi-check-all"></i></div>
        <div class="text">
            <p>PASSWORD RESET SUCCESSFUL! Check your email to confirm.</p>
        </div>
    </div>
</div>

<div id="get-more-div" onclick="_alert_close(event);">
    <div class="alert-loading-div">
        <div class="icon"><img src="<?php echo $website_url ?>/all-images/images/loading.gif" width="20px" alt="Loading" /></div>
        <div class="text">
            <p>LOADING...</p>
        </div>
    </div>
</div>

<div id="get-form-more-div">
    <div class="alert-loading-div">
        <div class="icon"><img src="<?php echo $website_url ?>/all-images/images/loading.gif" width="20px" alt="Loading" /></div>
        <div class="text">
            <p>LOADING...</p>
        </div>
    </div>
</div>

<div id="get-more-div-secondary">
    <div class="alert-loading-div">
        <div class="icon"><img src="<?php echo $website_url ?>/all-images/images/loading.gif" width="20px" alt="Loading" /></div>
        <div class="text">
            <p>LOADING...</p>
        </div>
    </div>
</div>



<div class="sidenavdiv">
    <div class="live-chat-back-div">

        <a id="callUs1" href="#" title="Call Us" target="_blank" rel="noopener noreferrer">
            <div class="chat-div">
                <div class="icon-div tel-cl"><i class="bi-telephone-outbound"></i></div>
                <div class="text" id="textPhone1"></div>
                <br clear="all" />
            </div>
        </a>

        <a id="whatsAppUs1" target="_blank" title="Whatsapp" rel="noopener noreferrer">
            <div class="chat-div">
                <div class="icon-div whtap-cl"><i class="bi-whatsapp"></i></div>
                <div class="text" id="textWhatsApp1"></div>
                <br clear="all" />
            </div>
        </a>

        <a id="mailUs1" title="Mail Us" target="_blank" rel="noopener noreferrer">
            <div class="chat-div">
                <div class="icon-div mail-cl"><i class="bi bi-envelope"></i></div>
                <div class="text">Mail Us</div>
                <br clear="all" />
            </div>
        </a>
        <!-- <a href="<?php //echo $nacos_social_media_link[0]
                        ?>" target="_blank" title="Nacos Facebook">
        <div class="chat-div">
            <div class="icon-div" style="background:#2980b9;"><i class="bi-facebook"></i></div>
            <div class="text">Facebook Page </div>
          <br clear="all" />
        </div>
        </a> -->
        <a id="instagram1" target="_blank" title="Nacos Instagram" rel="noopener noreferrer">
            <div class="chat-div">
                <div class="icon-div ig-cl"><i class="bi-instagram"></i></div>
                <div class="text">Instagram Page</div>
                <br clear="all" />
            </div>
        </a>

    </div>




    <div class="index-menu-back-div">
        <div class="top-div">
            <div class="logo-div">
                <a href="<?php echo $website_url ?>"><img src="<?php echo $website_url ?>/all-images/images/logo.png" alt="<?php echo $thename ?> Logo" class="animated zoomIn" /></a>
            </div>
        </div>

        <div class="div-in">
            <div class="div">
                <a href="<?php echo $website_url; ?>" title="Home Page">
                    <li <?php if (($website_auto_url == "$website_url/index") || ($website_auto_url == "$website_url/") || ($website_auto_url == "$website_url")) { ?> id="active-li" <?php } ?>><i class="bi-house"></i> Home Page</li>
                </a>
            </div>

            <div class="div">
                <li <?php if (strstr($website_auto_url, "$website_url/about") || strstr($website_auto_url, "$website_url/lecturers") || strstr($website_auto_url, "$website_url/past-executives") || strstr($website_auto_url, "$website_url/executives") || strstr($website_auto_url, "$website_url/past-presidents")) { ?> id="active-li" <?php } ?> onclick="_open_li('about')"><i class="bi-person-hearts"></i> About Us <i class="bi-plus" id="side-expand"></i></li>
                <div class="sub-li" id="about-sub-li">
                    <a href="<?php echo $website_url ?>/about" title="About Nacos Mapoly">
                        <li> - About Nacos Mapoly</li>
                    </a>
                    <a href="<?php echo $website_url ?>/lecturers" title="Meet Our Lecturers">
                        <li> - Meet Our Lecturers</li>
                    </a>
                    <a href="<?php echo $website_url ?>/executives" title="Meet Our Executives">
                        <li> - Meet Our Executives</li>
                    </a>
                    <a href="<?php echo $website_url ?>/past-executives" title="Meet Our Past Executives">
                        <li> - Meet Our Past Executives</li>
                    </a>
                    <a href="<?php echo $website_url ?>/past-presidents" title="Meet Our Past President">
                        <li> - Meet Our Past President</li>
                    </a>
                </div>
            </div>


            <div class="div">
                <li <?php if (strstr($website_auto_url, "$website_url/materials") || strstr($website_auto_url, "$website_url/classes") || strstr($website_auto_url, "$website_url/courses/")) { ?> id="active-li" <?php } ?> onclick="_open_li('academics')"><i class="bi-mortarboard-fill"></i> Academics<i class="bi-plus" id="side-expand"></i></li>
                <div class="sub-li" id="academics-sub-li">
                    <a href="<?php echo $website_url ?>/materials" title="Get Materials">
                        <li> - Get Materials</li>
                    </a>
                    <a href="<?php echo $website_url ?>/classes" title="Nacos Classes">
                        <li> - Classes</li>
                    </a>
                    <a href="<?php echo $website_url ?>/courses/" title="Nacos Courses">
                        <li class="li"> - Courses</li>
                    </a>
                    <a href="<?php echo $nacos_student_portal_url ?>" title="Nacos Student Portal">
                        <li class="li"> - Nacos Student Portal</li>
                    </a>
                    <a href="<?php echo $school_student_portal_url ?>" title="Mapoly Student Portal">
                        <li class="li"> - Mapoly Student Portal</li>
                    </a>
                </div>
            </div>
            <div class="div">
                <a href="<?php echo $website_url; ?>/event/" title="Event">
                    <li <?php if (strstr($website_auto_url, "$website_url/event")) { ?> id="active-li" <?php } ?>><i class="bi-play-btn"></i> Event</li>
                </a>
            </div>
            <div class="div">
                <a href="<?php echo $website_url; ?>/gallery/" title="Gallery">
                    <li <?php if (strstr($website_auto_url, "$website_url/gallery/")) { ?> id="active-li" <?php } ?>><i class="bi-images"></i> Gallery</li>
                </a>
            </div>
            <div class="div">
                <a href="<?php echo $website_url; ?>/blog/" title="Blog">
                    <li <?php if (strstr($website_auto_url, "$website_url/blog")) { ?> id="active-li" <?php } ?>><i class="bi-flower2"></i> Blog</li>
                </a>
            </div>
            <div class="div">
                <a href="<?php echo $website_url; ?>/contact-us" title="Contact Us">
                    <li <?php if (strstr($website_auto_url, "$website_url/contact-us")) { ?> id="active-li" <?php } ?>><i class="bi-headset"></i> Contact Us</li>
                </a>
            </div>
            <div class="div">
                <a href="<?php echo $website_url; ?>/faq" title="Frequently Asked Questions">
                    <li <?php if (strstr($website_auto_url, "$website_url/faq")) { ?> id="active-li" <?php } ?>><i class="bi-patch-question"></i> Frequently Asked Question</li>
                </a>
            </div>
        </div>
    </div>



    <div class="sidenavdiv-in" onclick="_close_side_nav()"></div>
</div>

