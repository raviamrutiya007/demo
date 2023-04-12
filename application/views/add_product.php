<button><a href="<?php echo base_url('category/list'); ?>">List category</a></button>
<button><a href="<?php echo base_url('product/list_products'); ?>">List Product</a></button>
<button><a href="<?php echo base_url('Login/logout'); ?>">Logout</a></button><div class="column">
    <h2 class="title">Add Product</h2>
    <?php echo validation_errors(); ?>
    <form action="<?php echo base_url('Product/add_product'); ?>" name="product_add" id="product_add" method="POST" enctype='multipart/form-data'>
        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input id="name" name="name" class="input" type="text" required placeholder="Type the  name"
                    value="<?php echo set_value('name');?>">
            </div>
        </div>
        <div class="field">
            <label class="label">Description</label>
            <div class="control">
                <input id="name" name="description" class="input" type="text"  placeholder="Description"
                    value="<?php echo set_value('description'); ?>">
            </div>
        </div>
       
        <div class="field">
            <label class="label">Price</label>
            <div class="control">
                <input id="price" name="price" class="input" type="number" required placeholder="Price"
                    value="<?php echo set_value('description'); ?>">
            </div>
        </div>
        <div class="field">
            <label class="label">Image</label>
            <div class="control">
                <input id="image" name="image" class="input" type="file"  placeholder="Description">
            </div>
        </div>
        <div class="field">
            <label class="label">Category</label>
            <div class="control">
                <select name="category" id="category" required>
                    <option value="">select category</option>
                   <?php foreach($cat_data as $category){ ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                 <?php  } ?>
                </select>
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
</script>