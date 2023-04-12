<a href="<?php echo base_url('product/list_products'); ?>">VIEW LIST</a>
<div class="column">
    <h2 class="title">Edit Product</h2>
    <form action="<?php echo base_url('Product/edit_product'); ?>" name="product_add" id="product_add" method="POST" enctype='multipart/form-data'>
    <input type="hidden" name="id" value="<?php echo $pr_data->id; ?>" >   
    <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input id="name" name="name" class="input" type="text" required placeholder="Type the  name"
                    value="<?php echo $pr_data->name;?>">
            </div>
        </div>
        <div class="field">
            <label class="label">Description</label>
            <div class="control">
                <input id="name" name="description" class="input" type="text"  placeholder="Description"
                value="<?php echo $pr_data->description;?>">
            </div>
        </div>
       
        <div class="field">
            <label class="label">Price</label>
            <div class="control">
                <input id="price" name="price" class="input" type="number" required placeholder="Price"
                value="<?php echo $pr_data->price;?>">
            </div>
        </div>
        <div class="field">
            <label class="label">Image</label>
            <div class="control">
                <input id="image" name="image" class="input" type="file"  placeholder="Description">
                <span><img src="<?php echo base_url().'uploads/'.$pr_data->image; ?>" width="40"></span>
            </div>
        </div>
        <div class="field">
            <label class="label">Category</label>
            <div class="control">
                <select name="category" id="category" required>
                    <option value="">select category</option>
                   <?php foreach($cat_data as $category){ ?>
                        <option value="<?php echo $category['id']; ?>" <?php if($category['id'] == $pr_data->category_id){echo 'selected';} ?>><?php echo $category['name']; ?></option>
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