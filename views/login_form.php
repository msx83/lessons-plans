<section id="login">
    <div class="login-form">
        <form action="<?php echo base_url('login'); ?>" method="POST">
        <div class="form-field">
            <label for="login">Login</label>
            <input type="text" name="login" id="login">
        </div>
        <div class="form-field">
            <label for="password">Hasło</label>
            <input type="password" name="password" id="password">
        </div>
        <input type="submit" value="Zaloguj" class="btn blue"/>
        </form>
    </div>
</section>