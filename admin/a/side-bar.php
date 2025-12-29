<div class="side-nav-div" id="sideNav" data-aos="fade-right" data-aos-duration="900">
    <div class="side-in-div">
        <div class="nav-back-div">

            <div class="nav-div active-li" title="Dashboard" onClick="_get_page('dashboard', 'dashboard')" id="side-dashboard">
                <div class="icon"><i class="bi-speedometer2"></i></div>
                <div class="txt-hidden">Dashboard</div>
                <div class="hidden" id="_dashboard"><i class="bi-speedometer2"></i> Admin Dashboard Overview</div>
            </div>

            <script>
                _sideAdminCheck('adminCheck');
            </script>
            
            <div class="nav-div" title="Executives" onClick="_get_page('view_excos', 'excos')" id="side-excos">
                <div class="icon"><i class="bi-people"></i></div>
                <div class="txt-hidden">Executive</div>
                <div class="hidden" id="_excos"><i class="bi-people"></i> All Active Executives</div>
            </div>

            <div class="nav-div" title="Courses" onClick="_get_page('course_category', 'courses')" id="side-courses">
                <div class="icon"><i class="bi-book"></i></div>
                <div class="txt-hidden">Courses</div>
                <div class="hidden" id="_courses"><i class="bi-book"></i> All Courses</div>
            </div>

            <div class="nav-div" title="Past Question" onClick="_get_page('past_question_category', 'past')" id="side-past">
                <div class="icon"><i class="bi bi-book-half"></i></div>
                <div class="txt-hidden">P.Q</div>
                <div class="hidden" id="_past"><i class="bi bi-book-half"></i> All Past Question</div>
            </div>

            <div class="nav-div" id="publish" onclick="togglePublish()">
                <div class="arrow">
                    <i id="publish-arrow" class="bi-chevron-down"></i>
                </div>
                <div class="txt-hidden">Publish</div>
                <!-- Arrow icon -->
            </div>

            <div id="publish-menu" class="submenu">
                <div class="nav-div" title="Event" onClick="_get_page('event_category', 'event')" id="side-event">
                    <div class="icon"><i class="bi-calendar2-event"></i></div>
                    <div class="txt-hidden">Events</div>
                    <div class="hidden" id="_event"><i class="bi-calendar2-event"></i> All Active Event</div>
                </div>

                <div class="nav-div" title="Gallery" onClick="_get_page('gallery_category', 'gallery')" id="side-gallery">
                    <div class="icon"><i class="bi-images"></i></div>
                    <div class="txt-hidden">Gallery</div>
                    <div class="hidden" id="_gallery"><i class="bi-images"></i> All Active Gallery</div>
                </div>

                <div class="nav-div" title="Blog" onClick="_get_page('blog_category', 'blog')" id="side-blog">
                    <div class="icon"><i class="bi-file-post"></i></div>
                    <div class="txt-hidden">Blog</div>
                    <div class="hidden" id="_blog"><i class="bi-file-post"></i> All Active Blog</div>
                </div>

                <div class="nav-div" title="FAQ" onClick="_get_page('faq_category', 'faq')" id="side-faq">
                    <div class="icon"><i class="bi-patch-question"></i></div>
                    <div class="txt-hidden">FAQ</div>
                    <div class="hidden" id="_faq"><i class="bi-patch-question"></i> All Active FAQ</div>
                </div>

                <div class="nav-div" title="FAQ" onClick="_get_page('testimony_category', 'test')" id="side-test">
                    <div class="icon"><i class="bi-chat-quote-fill"></i></div>
                    <div class="txt-hidden">Testimony</div>
                    <div class="hidden" id="_test"><i class="bi-chat-quote-fill"></i> All Active Testimony</div>
                </div>
            </div>

        </div>

    </div>


</div>

<script>
    function togglePublish() {
        $("#publish-menu").slideToggle(500);
        const arrow = $("#publish-arrow");
        if (arrow.hasClass("bi-chevron-down")) {
            arrow.removeClass("bi-chevron-down").addClass("bi-chevron-up");
        } else {
            arrow.removeClass("bi-chevron-up").addClass("bi-chevron-down");
        }
    }


    $(document).ready(function() {
        let isExpanded = localStorage.getItem("sideNavState") === "expanded";
        // Apply saved state on page load
        $("#sideNav, #content-slide").toggleClass("expanded expandPageContent", isExpanded);
        // $("#toggleNav i").toggleClass("bi-box-arrow-right", !isExpanded)
        //     .toggleClass("bi-box-arrow-left", isExpanded);
        $("#toggleNav").click(function() {
            isExpanded = !isExpanded;
            $("#sideNav, #content-slide").toggleClass("expanded expandPageContent");
            // $("#toggleNav i").toggleClass("bi-box-arrow-right", !isExpanded)
            //  .toggleClass("bi-box-arrow-left", isExpanded);
            localStorage.setItem("sideNavState", isExpanded ? "expanded" : "collapsed");
        });
    });
</script>