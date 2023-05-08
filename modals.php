

<!-- Start edit_profile.php ////////////////////////////////////////// -->
<!-- edit image   -->
<div id="edit_image" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Personal Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- Upload file  -->
                    <center>
                        <?php
                            if(empty($image))
                            {
                                echo '
                                <img src="assets/img/profile/default2.png" class="profile_img"> <br>
                                ';
                            }
                            else
                            {
                                echo '
                                <img src="'.$image.'" alt="" class="profile_img"> <br>
                                ';
                            }
                        ?>
                        <input type="file" name="edit_image" class="img_upload">
                    </center>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit_edit_image" class="btn btn-primary">Save changes</button>
                    <button type="button"  class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

<!-- edit email   -->
<div id="edit_email" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Personal Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <!-- Email update  -->
                    <label for="new_email" class="form-label"><strong>Email Address</strong></label>
                    <input type="email" class="form-control" name="new_email" id="new_email" value="<?php echo $email ?>" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit_edit_email" class="btn btn-primary">Save changes</button>
                    <button type="button"  class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

<!-- edit personal information  -->
<div id="edit_personal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Personal Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <!-- first name  -->
                    <label for="fname" class="form-label"> <strong>First Name</strong> </label>
                    <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $fname ?>" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required> <br>
                    <!-- Last name  -->
                    <label for="lname" class="form-label"> <strong>Last Name</strong> </label>
                    <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $lname ?>" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required> <br>
                    <!-- contact  -->
                    <label for="contact" class="form-label"> <strong>Contact (+63)</strong> </label>
                    <input type="text" class="form-control" name="contact" id="contact" value="<?php echo $contact ?>" pattern="[0-9]{10}" minlength='10' maxlength='10' onkeyup="this.value=this.value.replace(/[<>]/g,'')" required> <br>
                    <!-- Company / University  -->
                    <label for="company_univ" class="form-label"> <strong>Company / University</strong> </label>
                    <input type="text" class="form-control" name="company_univ" id="company_univ" value="<?php echo $company_univ ?>" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required> <br>
                    <!-- Address  -->
                    <label for="address" class="form-label"> <strong>Address</strong> </label>
                    <input type="text" class="form-control" name="address" id="address" value="<?php echo $address ?>" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit_edit_personal" class="btn btn-primary">Save changes</button>
                    <button type="button"  class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
            
        </div>
    </div>
</div>
<!-- End edit_profile.php ////////////////////////////////////////// -->


<!-- change_pass information  -->
<div id="change_pass" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <!-- Current password  -->
                    <label for="current_pass" class="form-label"> <strong>Current Password</strong> </label>
                    <input type="password" class="form-control text-danger" name="current_pass" id="current_pass" placeholder="Current password" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required> <br>
                    <!-- New Password  -->
                    <label for="new_pass" class="form-label"> <strong>New Password</strong> </label>
                    <input type="password" class="form-control text-danger" name="new_pass" id="new_pass" placeholder="New password" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required> <br>
                    <!-- Confirm New Password  -->
                    <label for="confirm_new_pass" class="form-label"> <strong>Confirm New Password</strong> </label>
                    <input type="password" class="form-control text-danger" name="confirm_new_pass" id="confirm_new_pass" placeholder="Confirm New password" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required> <br>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit_change_pass" class="btn btn-primary">Change Password</button>
                    <button type="button"  class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
            
        </div>
    </div>
</div>
<!-- End edit_profile.php ////////////////////////////////////////// -->

<!-- fogot password information  -->
<div id="forgot_pass" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Forgot Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <!-- Email  -->
                    <label for="email" class="form-label"> <strong>Email</strong> </label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Juan@gmail.com" onkeyup="this.value=this.value.replace(/[<>]/g,'')" required> <br>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit_forgot_pass" class="btn btn-primary">Submit</button>
                    <button type="button"  class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
            
        </div>
    </div>
</div>
<!-- End edit_profile.php ////////////////////////////////////////// -->
