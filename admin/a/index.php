<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php include '../../config/constants.php'; ?>
<?php include 'config/welcome_profile.php' ?>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'meta.php' ?>
    <title>Administrative Portal | <?php echo $thename; ?></title>
</head>

<body>

    <?php include 'header.php' ?>
    <?php include 'side-bar.php' ?>

    <div class="content-div" id="content-slide">
        <div class="inner-content">
            <?php $callclass->_UserWelcomeProfile($website_url); ?>

            <div class="statistics-back-div academics-session-chart" id="academics-session-chart" data-aos="fade-in" data-aos-duration="1500">
                <div class="statistics-div academics" onClick="_get_form('app_settings')">
                    <div class="inner-div">
                        <div class="number-div">
                            Academics Session
                            <div class="academics-chart">
                                <span id="current_academics_session">0000/0000</span>
                            </div>
                        </div>
                        <div class="icon"><i class="bi-calendar2-event"></i></div>
                    </div>
                </div>
                <div class="statistics-div academics" onClick="_get_form('app_settings')" id="event">
                    <div class="inner-div">
                        <div class="number-div">
                            Session Start Date
                            <div class="academics-chart">
                                <span id="current_session_start_date">00 / 00 / 000</span>
                            </div>
                        </div>
                        <div class="icon"><i class="bi-calendar2-event"></i></div>
                    </div>
                </div>
                <div class="statistics-div academics" onClick="_get_form('app_settings')" id="event">
                    <div class="inner-div">
                        <div class="number-div">
                            Session End Date
                            <div class="academics-chart">
                                <span id="current_session_end_date">00 / 00 / 000</span>
                            </div>
                        </div>
                        <div class="icon"><i class="bi-calendar2-event"></i></div>
                    </div>
                </div>
                <div class="statistics-div academics" onClick="_get_form('app_settings')" id="event">
                    <div class="inner-div">
                        <div class="number-div">
                            Current Semester
                            <div class="academics-chart">
                                <span id="current_semester">0</span>
                                <span>Semester</span>
                            </div>
                        </div>
                        <div class="icon"><i class="bi-calendar2-event"></i></div>
                    </div>
                </div>
            </div>


            <div id="page-content">
                <script>
                    _get_page('dashboard');
                </script>
            </div>
        </div>
    </div>

    <div class="side-div-right" data-aos="fade-in" data-aos-duration="1000">
        <div class="alert-dashboard-title">
            <div><i class="bi-bell"></i> Recent Activities</div> <span onClick="_get_page('system_alert');"> See All</span>
        </div>
        <div class="alert-dashboard-div animated ZoomIn" id="fetchDashboardAlert">
            <script>
                _fetchDashboardAlert();
            </script>
            <!-- <div class="system-alert" id="'+ alert_id +'" onClick="_get_form('alert-read');">
                <div class="alert-name"><i class="bi-person"></i> Hon. Paul Emmanuel<span><i class="bi-check"></i></span></div>
                <div class="alert-text">Success Alert: uccess Alert: LOGIN ALERT: A user whose name is AFOLABI ABAYOMI with ...</div>
                <div class="alert-time"><i class="bi-clock"></i> <span> 2024-09-15 13:46:42</span></div>
            </div>   -->
        </div>
    </div>
    <script>_disabledInspect()</script>
    <?php include 'bottom-scripts.php' ?>
</body>

</html>