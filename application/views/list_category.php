<button><a href="<?php echo base_url('category'); ?>">Add category</a></button>
<button><a href="<?php echo base_url('product'); ?>">List Product</a></button>
<button><a href="<?php echo base_url('Login/logout'); ?>">Logout</a></button>

<h3>Category Listing</h3>
                                                                                                                                               
<table border="2px">
<tr>
    <td>Name</td>
    <?php if($session_data['0']->type == '1'){ ?>

    <td>Action</td>
    <?php } ?>

</tr>

<?php 
    foreach($get_data as $new_data){ ?>
    <tr>
        <td><?php echo $new_data->name; ?></td>
        <?php if($session_data['0']->type == '1'){ ?>

        <td><a href="javascript:void(0)" class ="delete_cat" data-catid="<?php echo $new_data->id; ?>">Delete</a>
        <a href="<?php echo base_url('Category/get_category_data/'.$new_data->id); ?>" class ="edit_cat"data-catid="<?php echo $new_data->id; ?>">Edit</a>
        <?php } ?>

    </td>
        </tr>

   <?php }
?>
<div id="edit_html"></div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
$(document).ready(function() {
   
    $('.delete_cat').click(function(){
        var id = $(this).data('catid');
        $.ajax({
            url: "<?php echo base_url(); ?>Category/delete_category",
            type: 'POST',
            dataType : "json",
            data: {id :id },
            success: function (response) {
               if(response.msg == 'success'){
                let url = "<?php echo base_url(); ?>Category/list";
                window.location.href = url;

               }
            // do something with the result
        }
           
        });
        return false;
    //Some code
    });   

   
    //Some code
    }); 

});
</script>
</table>