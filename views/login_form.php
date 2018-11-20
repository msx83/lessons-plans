<section id="login">
    <div class="login-form">
        <?php if(isset($_SESSION['login_error'])): ?>
        <p class="login_error"><?php echo $_SESSION['login_error']; ?></p>
        <?php endif; ?>
        <form action="<?php echo base_url('login'); ?>" method="POST">
        <div class="form-field">
            <label for="login">Login</label>
            <input type="text" name="login" id="login">
        </div>
        <div class="form-field">
            <label for="password">Hasło</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="form-field">
            <input type="submit" value="Zaloguj" class="btn blue"/>
        </div>
        </form>
    </div>
</section>