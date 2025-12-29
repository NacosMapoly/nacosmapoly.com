<?php include 'config/constants.php'; ?>
<?php include 'config/functions.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title>Contact <?php echo $thename ?> - Get in Touch with Our Team</title>

    <meta name="keywords" content="contact<?php echo $thename ?>, MAPOLY tech support, <?php echo $thename ?> partnership, get involved NACOS, MAPOLY computing contact, NACOS inquiries, MAPOLY student helpdesk, tech student support" />

    <meta name="description" content="We'd love to hear from you! For questions, partnerships, or to get involved with <?php echo $thename ?>, our executive team is always ready to support and guide you." />

    <!-- Open Graph (Facebook, LinkedIn, etc.) -->
    <meta property="og:title" content="Contact <?php echo $thename ?> - Get in Touch with Our Team" />
    <meta property="og:image" content="<?php echo $website_url ?>/all-images/plugin-pix/nacosmapoly.jpg" />
    <meta property="og:description" content="We'd love to hear from you! For questions, partnerships, or to get involved with <?php echo $thename ?>, our executive team is always ready to support and guide you." />

    <!-- Twitter Meta Tags -->
    <meta name="twitter:title" content="Contact <?php echo $thename ?> - Get in Touch with Our Team" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="<?php echo $website_url ?>/all-images/plugin-pix/nacosmapoly.jpg" />
    <meta name="twitter:description" content="We'd love to hear from you! For questions, partnerships, or to get involved with <?php echo $thename ?>, our executive team is always ready to support and guide you." />
</head>


<body>
    <?php include 'header.php' ?>

    <section class="other-pages" data-aos="fade-in" data-aos-duration="900">
        <div class="other-pages-back-div">
            <div class="top-title">
                <div class="div-in">
                    <ul>
                        <a href="<?php echo $website_url ?>">
                            <li>Home <i class="bi-caret-right-fill"></i></li>
                        </a>
                        <a href="<?php echo $website_url ?>/about">
                            <li>Contact Us</li>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="text-content-div" data-aos="fade-in" data-aos-duration="900">
                <h1 data-aos="fade-in" data-aos-duration="800"><span>Contact Us</span></h1>
                <p>We'd love to hear from you! For questions, partnerships, or to get involved with NACOS MAPOLY, our executive team is always ready to support and guide you.</p>

                <?php $callclass->_otherPagesBtn($website_url); ?>
            </div>
        </div>
    </section>



    <section class="others-pg-content-div">


        <div id="ketu-hide-div">
            <section class="contact-hash-bg">
                <div class="bottom-body-div">
                    <div class="contact-div animated zoomIn">
                        <div class="div-in inner-contact">
                            <div class="icon img-div"><img src="all-images/images/email.png" alt="<?php echo $thename ?> Email Address" /></div>

                            <div class="text">
                                <h2>MAIL US</h2>
                                <p id="textMailUs2"></p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-div animated zoomIn">
                        <div class="div-in inner-contact">
                            <div class="icon img-div"><img src="all-images/images/phone.png" alt="<?php echo $thename ?> Phone Number" /></div>

                            <div class="text">
                                <h2>CALL US</h2>
                                <p id="textPhone4"></p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-div animated zoomIn">
                        <div class="div-in inner-contact">
                            <div class="icon img-div"><img src="all-images/images/location.png" alt="<?php echo $thename ?> Office Address" /></div>

                            <div class="text">
                                <h2>LOCATION</h2>
                                <p>Ojere, Moshood Abiola Polytechnic, Abekouta, Ogun State</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="map-body-div">
                <div class="map-back-div">
                    <iframe allowfullscreen="" loading="lazy" class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.2150041346204!2d3.3270372102348533!3d7.101062016153381!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103a4cec798b9285%3A0x24c1a34aaf8a0814!2sMoshood%20Abiola%20Polytechnic!5e0!3m2!1sen!2sng!4v1742031537521!5m2!1sen!2sng"></iframe>
                </div>
            </section>
        </div>



        <section class="body-div">
            <div class="body-div-in">
                <div class="contact-mail-div" data-aos="fade-in" data-aos-duration="800">
                    <div class="inner-div">
                        <div class="div-in">
                            <div class="text-segment"><input class="text_field" id="fullname" placeholder="Full Name" /></div>
                            <div class="text-segment"><input class="text_field" id="email" placeholder="Email Address" /></div>
                            <input class="text_field" id="subject" placeholder="Subject" />
                        </div>

                        <div class="div-in right-div-in">
                            <div class="text-segment"><textarea class="text_field text_area" id="message" placeholder="Message" rows="6"></textarea></div>
                            <button class="btn" onclick="_send_contact_email()">Send Mail</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include 'footer.php' ?>
    </section>
</body>

</html>