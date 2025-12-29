<?php include '../config/constants.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title><?php echo $thename ?> | Student Registration </title>
    <meta name="keywords" content="<?php echo $thename ?> portal, MAPOLY Fee, <?php echo $thename ?> Student login, <?php echo $thename ?> Registration, MAPOLY Portal, <?php echo $thename ?> registration, MAPOLY computer science student form, NACOS student portal, register <?php echo $thename ?>, MAPOLY CS student membership, NACOS Departmental Fee" />
    <meta name="description" content="Register as a Computer Science student under NACOS MAPOLY to gain access to event, materials, academic support, E-voting system and official membership benefits" />

    <meta property="og:title" content="<?php echo $thename ?> | Student Registration" />
    <meta property="og:image" content="<?php echo $website_url ?>/all-images/plugin-pix/nacos-sign-up.jpg" />
    <meta property="og:description" content="Register as a Computer Science student under NACOS MAPOLY to gain access to event, materials, academic support, E-voting system and official membership benefits" />

    <meta name="twitter:title" content="<?php echo $thename ?> | Student Registration" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="<?php echo $website_url ?>/all-images/plugin-pix/nacos-sign-up.jpg" />
    <meta name="twitter:description" content="Register as a Computer Science student under NACOS MAPOLY to gain access to event, materials, academic support, E-voting system and official membership benefits" />
</head>
<script src="https://js.paystack.co/v1/inline.js"></script>

<body>
    <?php include 'alert.php' ?>
    <section class="login-session">
        <div class="login-div">

            <header>
                <div class="header-div-in">
                    <div class="logo-div">
                        <a href="<?php echo $website_url ?>" title="<?php echo $thename ?>">
                            <img src="<?php echo $website_url ?>/all-images/images/logo.png" alt="<?php echo $thename ?> Logo" class="animated zoomIn" />
                        </a>
                    </div>
                    <div class="right-div">
                        <span class="text">Already have an account?</span>
                        <a href="<?php echo $nacos_student_login_portal_url ?>">
                            &nbsp; &nbsp; <span class="text-link"> Log In</span>
                        </a>
                    </div>
                </div>
            </header>

            <div class="form-back-div" data-aos="fade-in" data-aos-duration="1500">
                <div class="form-div">
                    <h1>Welcome to Nacos Mapoly <br> <span>Registration Form</span> 😊</h1>
                    <div class="alert alert-success alert-reg-form">Kindly, fill in all <span>Require Fields</span> to continue</div>

                    <?php $page = 'sign-up'; ?>
                    <?php include 'config/page-content.php'; ?>

                    <div class="footer-back-div">
                        Developed By: <span><em>CODE DOCTOR LED EXCO</em></span><br>
                         2024/2025 Session | @ <?php echo $thename?>  <?php echo date('Y')?>
                    </div>
                </div>

            </div>

        </div>
        <div class="graphics-div">
        </div>
    </section>
    <script>
        _inputDataSession();
        // _matricNumberFormat();
    </script>
    <?php include 'bottom-scripts.php' ?>
</body>

</html>