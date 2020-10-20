<?php require 'views/header_dashboard.php'; ?>

<div class="small-container">
    <div class="row">
        <h2>Edit User</h2>
        </div>
        <div class="center-content">
        <div class="form-container" >
            <form action="<?php echo URL; ?>user/editSave/<?php echo $this->user['nic'] ?>" id="editFrom" method="post">
                        <div class="row">
                            <div class="col-2 pad-l-55">
                            <label>First Name : </label><br><input type="text" name="first_name" value="<?php echo $this->user['first_name'] ?>"><br>
                            <label>NIC : </label><br><input type="text" name="nic" value="<?php echo $this->user['nic'] ?>"><br>
                            <label>Mobile Number : </label><br><input type="text" name="contact_no" value="<?php echo $this->user['contact_no'] ?>"><br>
                            <label>User Type : </label><br><select name="user_type">
                              <option value="customer" <?php if($this->user['user_type']=='customer') echo "selected=\"selected\"";?>>Customer</option>
                              <option value="admin" <?php if($this->user['user_type']=='admin') echo "selected=\"selected\"";?>>Admin</option>
                              <option value="owner" <?php if($this->user['user_type']=='owner') echo "selected=\"selected\"";?>>Owner</option>
                              <option value="delivery" <?php if($this->user['user_type']=='delivery') echo "selected=\"selected\"";?>>Delivery</option>
                        </select><br>
                        </div>
                        <div class="col-2 pad-l-55" >
                            <label>Last Name : </label><br><input type="text" name="last_name" value="<?php echo $this->user['last_name'] ?>"><br>
                        
                        <label>Email : </label><br><input type="email" name="email" value="<?php echo $this->user['email'] ?>"><br>
                        
                        <label>Gender : </label><br><select name="gender" value="<?php echo $this->user['gender'] ?>">
                              <option value="male" <?php if($this->user['gender']=='male') echo "selected=\"selected\"";?>>Male</option>
                              <option value="female" <?php if($this->user['gender']=='female') echo "selected=\"selected\"";?>>Female</option></select><br>
                        
                        <label>User Status : </label><br><select name="user_status" value="<?php echo $this->user['user_status'] ?>">
                              <option value="new" <?php if($this->user['user_status']=='new') echo "selected=\"selected\"";?>>New</option>
                              <option value="verified" <?php if($this->user['user_status']=='verified') echo "selected=\"selected\"";?>>Verified</option>
                              <option value="blocked" <?php if($this->user['user_status']=='blocked') echo "selected=\"selected\"";?>>Blocked</option>
                              <option value="retired" <?php if($this->user['user_status']=='retired') echo "selected=\"selected\"";?>>Retired</option>
                        </select><br>
                        </div>
                    </div>
                        
                        <div class="center-content">
                            <button type="submit" class="btn">Update</button>
                            <a href="<?php echo URL ?>user" class="btn btn-grey">Cancel</a>
                        </div>
                    </form>

                    </div>

        
</div>
</div>