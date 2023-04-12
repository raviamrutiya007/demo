<a href="<?php echo base_url('list'); ?>">VIEW LIST</a>
<div class="column">
    <h2 class="title">Create Contact</h2>
    <?php echo validation_errors(); ?>
    <form action="<?= base_url('add') ?>" method="POST">
    <input type="hidden" name="id" value=<?php  if(!empty($user_data)){echo $user_data->id;} ?>>
        <div class="field">
            <label class="label">Contact Name</label>
            <div class="control">
                <input id="name" name="name" class="input" type="text" placeholder="Type the contact name" value="<?php if(!empty($user_data->name)){ echo $user_data->name;}else{ echo set_value('name'); }?>">
            </div>
        </div>
        <div class="field">
            <label class="label">Contact Number</label>
            <div class="control">
                <input id="name" name="number" class="input" type="number" placeholder="Type the contact number" value="<?php if(!empty($user_data->number)){ echo $user_data->number;}else{ echo set_value('number'); }?>">
            </div>
        </div>
        <div class="field">
            <label class="label">Email Address</label>
            <div class="control">
                <input id="email" name="email" class="input" type="email" placeholder="Type the email address" value="<?php if(!empty($user_data->email)){ echo $user_data->email;}else{ echo set_value('email'); }?>">
            </div>
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Save Contact</button>
            </div>
        </div>
    </form>
</div>