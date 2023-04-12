<div class="column">
    <h2 class="title">Edit Category</h2>
    <form action="" name="category_edit" id="category_Edit" method="POST">
        <input type="hidden" name="id" value="<?php echo $cat_data->id; ?>" />
        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input id="name" name="name" class="input" type="text" required placeholder="Type the  name"
                    value="<?php if (!empty($cat_data->name)) {echo $cat_data->name;} else {echo set_value('name');}?>">
            </div>
        </div><br>
        <!-- <div class="field">
            <label class="label">Sub Category</label>
            <div class="control">
                <input id="name" name="sub_category" class="input" type="number" placeholder="Type the contact number"
                    value="<?php if (!empty($user_data->number)) {echo $user_data->number;} else {echo set_value('number');}?>">
            </div>
        </div> -->
        <div class="field is-grouped">
            <div class="control">
                <button type="submit" class="button is-link">Save</button>
            </div>
        </div>
    </form>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
$(document).ready(function() {
    $("#category_Edit").submit(function(e) {
        console.log($('form').serialize());
         $.ajax({
            url: "<?php echo base_url(); ?>Category/edit_category",
            type: 'POST',
            dataType : "json",
            data: $('form').serialize(),
            success: function (response) {
               if(response.msg == 'success'){
                let url = "<?php echo base_url(); ?>Category/list";
                window.location.href = url;

               }
            // do something with the result
        }
           
    });
    return false;
     });
   

});
</script>