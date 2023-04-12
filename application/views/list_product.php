<button><a href="<?php echo base_url('category/list'); ?>">List category</a></button>
<button><a href="<?php echo base_url('product'); ?>">Add Product</a></button>
<button><a href="<?php echo base_url('Login/logout'); ?>">Logout</a></button>

</br></br>                                                                                                                                               
<table border="2px">
<tr>
    <td>Name</td>
    <td>Description</td>
    <td>Price</td>
    <td>Category</td>
    <td>Image</td>
    <?php if($session_data['0']->type == '1'){ ?>

        <td>Action</td>
   <?php } ?>

</tr>

<?php 
    foreach($get_data as $new_data){ ?>
    <tr>
        <td><?php echo $new_data->name; ?></td>
        <td><?php echo $new_data->description; ?></td>
        <td><?php echo $new_data->price; ?></td>
        <td><?php echo $new_data->category_name; ?></td>
        <td><img src="<?php echo base_url().'uploads/'.$new_data->image; ?>" width="100"></td>
        <?php if($session_data['0']->type == '1'){ ?>

        <td><a href="javascript:void(0)" class ="delete_cat" data-catid="<?php echo $new_data->id; ?>">Delete</a>
        <a href="<?php echo base_url('Product/get_product_data/'.$new_data->id); ?>" class ="edit_cat"data-catid="<?php echo $new_data->id; ?>">Edit</a>
        <?php } ?>

    </td>
        </tr>

   <?php }
?>
</table>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
$(document).ready(function() {
   
    $('.delete_cat').click(function(){
        var id = $(this).data('catid');
        $.ajax({
            url: "<?php echo base_url(); ?>Product/delete_product",
            type: 'POST',
            dataType : "json",
            data: {id :id },
            success: function (response) {
               if(response.msg == 'success'){
                let url = "<?php echo base_url(); ?>Product/list_products";
                window.location.href = url;

               }
            // do something with the result
        }
           
        });
        return false;
    //Some code
    });   

   
   

});
</script>
