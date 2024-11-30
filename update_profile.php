<?php
<form method="POST" action="profile.php">
    <div class="profile-details">
        <div class="left-column">
            <p><strong>Firstname:</strong> <span id="fname" onclick="editField('fname')"><?php echo htmlspecialchars($user['fname']); ?></span><input type="text" id="fnameInput" name="fname" value="<?php echo htmlspecialchars($user['fname']); ?>" class="edit-input" style="display: none;"></p>
            <p><strong>Lastname:</strong> <span id="lname" onclick="editField('lname')"><?php echo htmlspecialchars($user['lname']); ?></span><input type="text" id="lnameInput" name="lname" value="<?php echo htmlspecialchars($user['lname']); ?>" class="edit-input" style="display: none;"></p>
            <p><strong>Username:</strong> <span id="username" onclick="editField('username')"><?php echo htmlspecialchars($user['username']); ?></span><input type="text" id="usernameInput" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" class="edit-input" style="display: none;"></p>
        </div>

        <div class="right-column">
            <p><strong>Password:</strong> <span id="passwordDisplay">********</span><i id="togglePassword" class="fas fa-eye" style="cursor: pointer;" onclick="togglePasswordVisibility()"></i></p>
            <p><strong>Email:</strong> <span id="email" onclick="editField('email')"><?php echo htmlspecialchars($user['email']); ?></span><input type="email" id="emailInput" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" class="edit-input" style="display: none;"></p>
            <p><strong>Cell No.:</strong> <span id="cellnum" onclick="editField('cellnum')"><?php echo htmlspecialchars($user['celnum']); ?></span><input type="text" id="cellnumInput" name="celnum" value="<?php echo htmlspecialchars($user['celnum']); ?>" class="edit-input" style="display: none;"></p>
            <p><strong>Address:</strong> <span id="address" onclick="editField('address')"><?php echo htmlspecialchars($user['adr']); ?></span><input type="text" id="addressInput" name="adr" value="<?php echo htmlspecialchars($user['adr']); ?>" class="edit-input" style="display: none;"></p>
        </div>
    </div>

    <button type="submit" name="update_user" class="update-info-button">Update Info</button>
</form>
?>