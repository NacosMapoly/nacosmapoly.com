<?php if($page=='password_reset_successful'){?>
    <div class="successful-div animated zoomIn">
        <div class="success-in">
            <div class="gif animated fadeInLeft">
                <img src="<?php echo $website_url?>/sign-up/images/success.gif" alt="successful gif">
            </div>
            <h3>REGISTRATION SUCCESSFUL</h3>
           <span> Hi <strong id="userFullName">Afolabi Abayomi</strong>, kindly proceed to login and print your departmental reciept.</span>
            <button class="btn" onclick="location.href='<?php echo $nacos_student_login_portal_url?>'">Okay, Log In <i class="bi bi-box-arrow-in-right"></i></button>
        </div> 
    </div>
<?php }?>