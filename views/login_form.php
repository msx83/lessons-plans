<div class="login-form">
    <?php if (isset($_SESSION['login_error'])): ?>
        <div class="error_msg">
            <p><?php echo $_SESSION['login_error']; ?></p>
        </div>
    <?php endif; ?>
    <form action="<?php echo base_url('login'); ?>" method="POST">
        <div class="form-element">
            <label for="login">Login</label>
            <input type="text" name="login" id="login">
        </div>
        <div class="form-element">
            <label for="password">Hasło</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit" value="Zaloguj" class="btn blue">Zaloguj</button>
    </form>
</div>