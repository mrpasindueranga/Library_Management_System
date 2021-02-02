<?php require '../../db/member_edit.php';

if (isset($_GET['v_id'])) :
?>
  <div class="profile">
    <div class="details">
      <form action="">
        <div class="section">
          <h3>Personal Information</h3>
          <hr>
          <span>
            <label>First Name : </label>
            <input disabled name="Fname" type="text" value="<?php echo $mem['Fname']; ?>">
          </span>
          <span>
            <label>Last Name : </label>
            <input disabled name="Lname" type="text" value="<?php echo $mem['Lname']; ?>">
          </span>
          <span>
            <label>Gender : </label>
            <?php
            if ($mem['Gender'] === 'Male') :
            ?>
              <select disabled name="Gender">
                <option value="male" selected>Male</option>
                <option value="female">Female</option>
              </select>
            <?php endif; ?>
            <?php
            if ($mem['Gender'] === 'Female') :
            ?>
              <select disabled name="Gender">
                <option value="male" selected>Male</option>
                <option value="female">Female</option>
              </select>
            <?php endif; ?>
          </span>
        </div>
        <div class="section">
          <h3>Contact Information</h3>
          <hr>
          <span>
            <label>Email : </label>
            <input disabled name="Email" type="text" value="<?php echo $mem['Email']; ?>">
          </span>
          <span>
            <label>Address : </label>
            <textarea disabled name="Address" cols="30" rows="10" placeholder="Enter member's home address"><?php echo $mem['Address']; ?></textarea>
          </span>
        </div>
        <div class="section">
          <h3>Profile Information</h3>
          <hr>
          <span>
            <label>Post : </label>
            <?php
            if ($mem['Post'] === 'Student') :
            ?>
              <select name="Post" disabled>
                <option value="Professor">Professor</option>
                <option value="Student" selected>Student</option>
              </select>
            <?php endif; ?>
            <?php
            if ($mem['Post'] === 'Professor') :
            ?>
              <select name="Post" disabled>
                <option value="Professor" selected>Professor</option>
                <option value="Student">Student</option>
              </select>
            <?php endif; ?>
          </span>
          <span>
            <label>Registration Number : </label>
            <input type="text" value=" <?php echo $mem['ID']; ?>" disabled>
          </span>
        </div>
      </form>
    </div>
    <div class="img">
      <img id="dp" src="../../public/resources/profile/<?php echo $mem['Profile']; ?>" alt="">
    </div>
  </div>
<?php endif; ?>
<?php if (isset($_GET['cr_id'])) : ?>
  <div class="profile">
    <div class="details">
      <form action="../../db/member_edit.php" method="POST">
        <div class="section">
          <h3>Personal Information</h3>
          <hr>
          <span>
            <label>First Name : </label>
            <input name="Fname" type="text" placeholder="Enter member's first name">
          </span>
          <span>
            <label>Last Name : </label>
            <input name="Lname" type="text" placeholder="Enter member's last name">
          </span>
          <span>
            <label>Gender : </label>
            <select name="Gender">
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </span>
        </div>
        <div class="section">
          <h3>Contact Information</h3>
          <hr>
          <span>
            <label>Email : </label>
            <input name="Email" type="text" placeholder="Enter member's email">
          </span>
          <span>
            <label>Address : </label>
            <textarea name="Address" cols="30" rows="10" placeholder="Enter member's home address"></textarea>
          </span>
        </div>
        <div class="section">
          <h3>Profile Information</h3>
          <hr>
          <span>
            <label>Post : </label>
            <select name="Post">
              <option value="Professor">Professor</option>
              <option value="Student">Student</option>
            </select>
          </span>
          <span>
            <label>Registration Number : </label>
            <input name="c_id" type="text" value="<?php echo getNewID(); ?>" readonly>
          </span>
        </div>
        <input id="Save" type="submit" value="Save">
      </form>
    </div>
    <div class="img">
      <img id="dp" src="../../public/resources/profile/user.png" alt="">
    </div>
  </div>
<?php endif ?>