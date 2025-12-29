<?php if ($page == 'gallery-images') { ?>
    <div class="preview-content animated fadeIn">
        <div class="gallery-in">
            <div class="main-preview" id="preview_image">
                <script>
                    _fetchGall('<?php echo $publish_id ?>');
                </script>
            </div>

            <div class="thumbnail-list" id="fetchGalleryList">
                <script>
                    _fetchGalleryList('<?php echo $publish_id ?>');
                </script>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'testimonial-form') { ?>
    <div class="testimonial-form animated fadeIn">
        <div class="testimonial-header">
            <h2><i class="bi-chat-quote-fill"></i> Testimonial Form </h2>
            <button class="close-btn" title="Close" onclick="_alert_close2();"><i class="bi-x"></i></button>
        </div>

        <div class="div-in testimonial-div-in">
            <div class="text_field_container">
                <input class="text_field" type="text" id="fullname" placeholder="" />
                <div class="placeholder">Enter Your Name:</div>
            </div>

            <div class="text_field_container">
                <input class="text_field" type="email" id="email" placeholder="" />
                <div class="placeholder">Enter Your Email Address:</div>
            </div>

            <div class="text_field_container">
                <input class="text_field" type="tel" id="phone" placeholder="" />
                <div class="placeholder">Enter Your Phone Number:</div>
            </div>

            <div class="text_field_container">
                <select id="relationship_type_id" class="text_field" placeholder="">
                    <option value="">-Select here</option>
                    <script>
                        _getSelectRelationship();
                    </script>
                </select>
                <div class="placeholder">--Select Relationship--</div>
            </div>

            <div class="text_field_container">
                <textarea class="text_field text_area" type="text" id="testimony" placeholder=""></textarea>
                <div class="placeholder">Testimony:</div>
            </div>

            <button class="btn" id="submit_btn" title="Send Testimony" onclick="_sendTestimony();">Send <i class="bi-send-check"></i></button>
        </div>
    </div>
<?php } ?>


<?php if ($page == 'download_material_page') { ?>
    <div class="testimonial-form exam-past-question-div animated fadeIn">
        <div class="testimonial-header">
            <h2><i class="bi-book"></i> Exam Past Question </h2>
            <button class="close-btn" title="Close" onclick="_alert_close2();"><i class="bi-x"></i></button>
        </div>
        <div class="div-in testimonial-div-in">
            <div class="alert alert-success">
                Exam Session: <strong id="exam_session"></strong> - Course Code: <strong id="course_code"></strong>
                - Course Title: <strong id="course_title"></strong> - Course Unit: <strong id="course_unit"></strong> - Level: <strong id="level_name"></strong>
            </div>
            <div id="ajax-loader2"></div>
            <div class="materials-div">
                <iframe id="pdfFile" src="" type="application/pdf" width="100%" height="390px" style="display: none;"> </iframe>
            </div>
            <button class="btn download-btn" id="download-btn" title="CLICK TO DOWNLOAD"> DOWNLOAD <i class="bi bi-cloud-download"></i></button>
        </div>
    </div>
<?php } ?>