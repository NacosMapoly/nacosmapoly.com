<footer class="footer-div">
    <div class="footer-div-in">
        <div class="segment-back-div">
            <div class="segment-div left-segment">
                <div class="logo-div">
                    <a href="<?php echo $website_url ?>"><img src="<?php echo $website_url ?>/all-images/images/logo.png" alt="<?php echo $thename ?> Logo" class="animated zoomIn" /></a>
                </div>
                <p><?php echo $thename ?> is the tech community for all computing students at Moshood Abiola Polytechnic, fostering innovation, collaboration, and professional development.</p>
                <div class="icon-div">
                    <a id="whatsAppUs4" target="_blank" rel="noopener noreferrer" title="Whatsapp"><button class="social-icon whtap-cl" title="WhatsApp"><i class="bi-whatsapp"></i></button></a>
                   
                    <a id="mailUs4" title="Mail Us" target="_blank" rel="noopener noreferrer"><button class="social-icon mail-cl"  title="Mail"><i class="bi-envelope"></i></button></a>
                    <!-- <a href="<?php //echo $nacos_social_media_link[0]?>" target="_blank" title="Nacos Facebook"><button class="social-icon" title="Facebook"><i class="bi-facebook"></i></button></a> -->
                    <a id="instagram4" title="Nacos Instagram" target="_blank" rel="noopener noreferrer"><button class="social-icon ig-cl" title="Instagram"><i class="bi-instagram"></i></button></a>
                    <!-- <button class="social-icon" title="Tiktok"><i class="bi-tiktok"></i></button> -->
                </div>
            </div>

            <div class="segment-div">
                <h3>Quick Links</h3>
                <ul>
                    <a href="<?php echo $website_url ?>/about" title="About Us">
                        <li><i class="bi-caret-right-fill"></i>About Us</li>
                    </a>
                    <a href="<?php echo $website_url ?>/gallery/" title="Gallery">
                        <li><i class="bi-caret-right-fill"></i>Gallery </li>
                        <a href="<?php echo $website_url ?>/contact-us" title="Contact Us">
                            <li><i class="bi-caret-right-fill"></i>Contact Us</li>
                        </a>
                        <a href="<?php echo $website_url ?>/event" title="Event">
                            <li><i class="bi-caret-right-fill"></i>Event</li>
                        </a>
                        <a href="<?php echo $website_url ?>/materials" title="Materials">
                            <li><i class="bi-caret-right-fill"></i>Get Your materials</li>
                        </a>
                        <a href="<?php echo $website_url ?>/blog/" title="Blog & Latest News">
                            <li><i class="bi-caret-right-fill"></i>Blog & Latest News</li>
                        </a>
                        <a href="<?php echo $website_url ?>/faq" title="Frequently Asked Questions">
                            <li><i class="bi-caret-right-fill"></i>Frequently Asked Questions</li>
                        </a>
                </ul>
            </div>

            <div class="segment-div">
                <h3>Official Links</h3>
                <ul>
                    <a href="<?php echo $nacos_student_login_portal_url ?>" title="Nacos Student Portal">
                        <li><i class="bi-caret-right-fill"></i>Nacos Student Portal</li>
                    </a>
                    <a href="<?php echo $nacos_student_registration_url ?>" title="Nacos Student Registration">
                        <li><i class="bi-caret-right-fill"></i>Nacos Student Registration</li>
                    </a>
                    <a href="<?php echo $website_url ?>/executives" title="Nacos Executives">
                        <li><i class="bi-caret-right-fill"></i>Nacos Executives</li>
                    </a>
                    <a href="<?php echo $website_url ?>/courses/" title="Nacos Courses">
                        <li><i class="bi-caret-right-fill"></i>Nacos Courses</li>
                    </a>
                    <a href="<?php echo $website_url ?>/classes" title="Nacos Classes">
                        <li><i class="bi-caret-right-fill"></i>Nacos Classes</li>
                    </a>
                    <a href="<?php echo $school_websites_url ?>" title="Mapoly Websites">
                        <li><i class="bi-caret-right-fill"></i>Mapoly Websites</li>
                    </a>
                    <a href="<?php echo $school_student_portal_url ?>" title="Mapoly Student Portal">
                        <li><i class="bi-caret-right-fill"></i>Mapoly Student Portal</li>
                    </a>

                </ul>
            </div>

            <div class="segment-div">
                <h3>Quick Contact</h3>
                <div class="contact-back-div">
                    <div class="contact-div">
                        <div class="icon-div"><i class="bi-telephone-inbound"></i></div>
                        <div class="text-div"><span id="textPhone3"></span></div>
                    </div>

                    <div class="contact-div">
                        <div class="icon-div"><i class="bi-geo-alt-fill"></i></div>
                        <div class="text-div"><span>Ojere, Moshood Abiola Polytechnic, Abekouta, Ogun State</span></div>
                    </div>

                    <div class="contact-div">
                        <div class="icon-div"><i class="bi-envelope-fill"></i></div>
                        <div class="text-div"><span id="textMailUs1"></span></div>
                    </div>
                </div>

                <h3>Newsletter</h3>

                <div class="newsletter-text-div">
                    <div class="footer_text_field_container">
                        <input class="footer_text_field" type="email" id="email" placeholder="" />
                        <div class="placeholder">Enter Your Email</div>
                    </div>
                    <button class="btn" title="Send Mail" onclick=""><i class="bi-send"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="main-bottom-div">
        <div class="div-in">
            <div class="text">© 2024 - <?php echo date('Y') ?> <?php echo $thename ?>. All Rights Reserved.</div>
            <div class="text">Developed By: <span><em>Code Doctor Led Exco</em></span></div>
        </div>
    </div>
</footer>
<script>_disabledInspect()</script>
<?php include 'bottom-scripts.php' ?>