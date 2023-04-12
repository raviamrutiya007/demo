
<div class="column">
    <h2 class="title">LOGIN</h2>
    <?php echo  $this->session->flashdata('message_name'); ?>
    <?php echo validation_errors(); ?>
    <form action="<?php echo base_url('Login/login_user'); ?>" name="login" id="login" method="POST">
        <div class="field">
            <label class="label">Email</label>
            <div class="control">
                <input id="email" name="Email" class="input" type="text" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Password</label>
            <div class="control">
                <input id="password" name="password" class="input" type="password" required>
            </div>
        </div>
      
        <div class="field is-grouped">
            <div class="control">
                <button type="submit" class="button is-link">Save</button>
            </div>
        </div>
    </form>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>