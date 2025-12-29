<?php
class allClass
{
    function _UserWelcomeProfile($website_url)
    { ?>

        <div class="page-title-div" data-aos="fade-in" data-aos-duration="1500">
            <div class="title-back-div">
                <div class="title"><span id="page-title"><i class="bi-speedometer2"></i> Admin Dashboard Overview</span></div>
                <h2>👋 Hi, <span id="login_fullname">Xxxx Xxxx</span></h2>
            </div>
            <button class="btn" id="calendarBtn" title="Open Calendar" onclick="_toggleContent('academics-session-chart')"><i class="bi bi-calendar-check"></i></button>
        </div>

<?php }
} //end of class
$callclass = new allClass();
?>