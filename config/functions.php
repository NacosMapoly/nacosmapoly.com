<?php
class allClass
{

    function _statistics($website_url) { ?>
        <section class="body-div statistics-body">
                <div class="body-div-in statistics-body-div-in">
                        <div class="statistics-back-div">
                        <div class="statistics-div" data-aos="fade-up" data-aos-duration="1000">
                                <div class="image-div">
                                <img src="<?php echo $website_url?>/all-images/body-pix/subject.svg" alt="Subjects" />
                                </div>
                                <div class="text-div text-count">
                                <h3 data-count="50">0</h3>
                                <h4>+ Total Courses</h4>
                                </div>
                        </div>

                        <div class="statistics-div" data-aos="fade-up" data-aos-duration="1200">
                                <div class="image-div">
                                <img src="<?php echo $website_url?>/all-images/body-pix/student.svg" alt="Students" />
                                </div>
                                <div class="text-div text-count">
                                <h3 data-count="2000">0</h3>
                                <h4>+ Our Students</h4>
                                </div>
                        </div>

                        <div class="statistics-div" data-aos="fade-up" data-aos-duration="1400">
                                <div class="image-div">
                                <img src="<?php echo $website_url?>/all-images/body-pix/teachers.svg" alt="Teachers" />
                                </div>
                                <div class="text-div text-count">
                                <h3 data-count="66">0</h3>
                                <h4>+ Skilled Lecturers</h4>
                                </div>
                        </div>

                        <div class="statistics-div" data-aos="fade-up" data-aos-duration="1600">
                                <div class="image-div">
                                <img src="<?php echo $website_url?>/all-images/body-pix/award.svg" alt="Award" />
                                </div>
                                <div class="text-div text-count">
                                <h3 data-count="20">0</h3>
                                <h4>+ Win Awards</h4>
                                </div>
                        </div>
                        </div>
                </div>
                <script>_countStatistics();</script>
        </section>

    <?php }


        function _otherPagesBtn($website_url) { ?>
                <div class="other-pages-btn-div">
                    <a href="https://app.nacosmapoly.com/" title="Nacos Student Portal">
                    <button class="btn" title="Nacos Student Portal"><i class="bi-person-fill-check"></i> Nacos Student Portal</button></a> 
                    <a href="<?php echo $website_url?>/materials" title="Get Materials">
                    <button class="btn center-btn" title="Get Materials"><i class="bi-book-fill"></i>Get Materials</button></a>     
                    <a href="<?php echo $website_url?>/courses" title="Our Courses">
                    <button class="btn" title="Our Courses"><i class="bi-mortarboard-fill"></i> Our Courses</button></a> 
                </div>
        <?php }

} //end of class
$callclass = new allClass();
?>