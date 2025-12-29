<?php if ($page == 'sign-up') { ?>
    <div class="form-container" id="page1">
        <div class="form-detail">

            <div class="text_field_container" id="surname_container">
                <script>
                    textField({
                        id: 'surname',
                        title: 'Enter Your Surname'
                    });
                </script>
            </div>
            <div class="text_field_container" id="firstname_container">
                <script>
                    textField({
                        id: 'firstname',
                        title: 'Enter Your First Name'
                    });
                </script>
            </div>
            <div class="text_field_container" id="phone_container">
                <script>
                    textField({
                        id: 'phone',
                        title: 'Enter Your Phone No',
                        type: 'tel',
                        onKeyPressFunction: _isNumberCheck('phone')
                    });
                </script>
            </div>

            <div class="text_field_container" id="gender_id_container">
                <script>
                    selectField({
                        id: 'gender_id',
                        title: '--Select Gender--',
                    });
                    setTimeout(function() {
                        _getSelectGender('gender_id');
                    }, 100); // 100ms delay (adjust as needed)
                </script>
            </div>

            <div class="btn-container">
                <button class="next-btn" id="next_btn" title="NEXT" onclick="_userSignUp('page2')">NEXT <i class="bi bi-arrow-right-short"></i></button>
            </div>
        </div>
    </div>


    <div class="form-container" id="page2">
        <div class="form-detail">

            <div class="text_field_container" id="level_id_container">
                <script>
                    selectField({
                        id: 'level_id',
                        title: '--Select Level--',
                        onChangeFunction: 'checkField()'
                    });
                    setTimeout(function() {
                        _getSelectLevel('level_id', '1,3');
                    }, 100); // 100ms delay (adjust as needed)
                </script>
            </div>

            <div class="alert alert-question">
                Have you gotten your <strong> Matric Number?</strong>
                <div class="radio-container" id="alert-question">
                    <script>

                 _getIsMatricNo('alert-question');

                    </script>
                    <!-- <label>
                        <div class="radio-in-div">
                            <div class="radio"><input type="checkbox" class="child" id="YES" name="is_matric_no[]" data-value="YES">
                                <div class="border"></div>
                            </div>
                            <span class="text">YES</span>
                        </div>
                    </label>

                    <label>
                        <div class="radio-in-div">
                            <div class="radio radio-no"><input type="checkbox" class="child" id="NO" name="is_matric_no[]" data-value="NO">
                                <div class="border"></div>
                            </div>
                            <span class="text">NO</span>
                        </div>
                    </label> -->
                </div>

            </div>

            <!-- <span><em id="msg"></em></span> -->
            <div class="text_field_container animated fadeIn" id="matric_number_container">
                <script>
                    textField({
                        id: 'matric_number',
                        title: 'Enter Your Matric Number'
                    });
                </script>
            </div>
            <div class="text_field_container" id="email_container">
                <script>
                    textField({
                        id: 'email',
                        title: 'Enter Your Email',
                    });
                </script>
            </div>
            <div class="text_field_container" id="confirm_email_container">
                <script>
                    textField({
                        id: 'confirm_email',
                        title: 'Enter Confirm Email',
                    });
                </script>
            </div>
            <div class="btn-container">
                <button class="next-btn btn2" id="next_btn" title="NEXT" onclick="_userSignUp('page3')">NEXT <i class="bi bi-arrow-right-short"></i> </button>
                <button class="next-btn prev-btn" id="prev_btn" title="BACK" onclick="_nextPage('page1')"><i class="bi bi-arrow-left-short"></i> BACK</button>
            </div>
        </div>

    </div>



    <div class="form-container" id="page3">
        <div class="form-detail">
            <div class="text_field_container" id="course_of_study_container">
                <script>
                    selectField({
                        id: 'course_of_study',
                        title: '--Select Course Study--',
                    });
                    setTimeout(function() {
                        _getSelectCourseOfStudy('course_of_study');
                    }, 100); // 100ms delay (adjust as needed)
                </script>
            </div>
            <div class="text_field_container" id="programme_mode_container">
                <script>
                    selectField({
                        id: 'programme_mode',
                        title: '--Select Programme Mode--',
                    });
                    setTimeout(function() {
                        _getSelectProgrammeMode('programme_mode');
                    }, 100); // 100ms delay (adjust as needed)
                </script>
            </div>
            <div class="text_field_container password-container" id="password_container">
                <script>
                    textField({
                        id: 'password',
                        title: 'Enter Your Password',
                        type: 'password',
                        onKeyUpFunction: "_showPasswordVisibility('password','tog_reg_create_password')"
                    });
                </script>
                <div id="tog_reg_create_password" onclick="_togglePasswordVisibility('password','tog_reg_create_password')">
                    <i class="bi-eye-slash password-toggle"></i>
                </div>
            </div>
            <span id="message"><em>Password not matched!</em></span>
            <div class="text_field_container password-container" id="confirmed_password_container">
                <script>
                    textField({
                        id: 'confirmed_password',
                        title: 'Enter Confirmed Password',
                        type: 'password',
                        onKeyUpFunction: "_checkPasswordMatch('confirmed_password','tog_reg_confirmed_password')"
                    });
                </script>
                <div id="tog_reg_confirmed_password" onclick="_togglePasswordVisibility('confirmed_password','tog_reg_confirmed_password')">
                    <i class="bi-eye-slash password-toggle"></i>
                </div>
            </div>
            <div class="btn-container">
                <button class="next-btn submit-btn" id="submit_btn" title="PROCEED" onclick="_userSignUp('proceed_to_payment');"><i class="bi bi-check"></i> PROCEED </button>
                <button class="next-btn prev-btn" id="prev_btn" title="BACK" onclick="_nextPage('page2')"><i class="bi bi-arrow-left-short"></i> BACK</button>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($page == 'send-link-mail') { ?>
    <div class="form-div animated fadeIn" data-aos="zoom-in" data-aos-duration="1200">
        <div class="inner-form">
            <div class="top-div">
                <div class="icon-div"><i class="bi-check2-circle"></i></div>
                <h3>Mail sent successfully</h3>
            </div>
            <div class="alert alert-success login-form-alert"><i class="bi-person"></i> Dear <strong>Paul Emmanuel</strong>,
                a link has been sent to your email address (<strong>seunemmanuel107@gmail.com</strong>)
                to reset your password. Kindly check your <strong>INBOX</strong> or <strong>SPAM</strong> to confirm.
            </div>
            <button class="btn" type="button" id="submit_btn" title="Okay" onclick="location.href='<?php echo $websiteUrl ?>/admin/reset-password'">
                OKAY <i class="bi-check2-all"></i>
            </button>
            <div class="notification"><strong>MAIL</strong> not received? <span><i class="bi-send"></i> <strong> RESEND MAIL </strong></span></div>
        </div>
    </div>
<?php } ?>