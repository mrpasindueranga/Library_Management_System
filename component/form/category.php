<?php require '../../db/category_edit.php';

  if (isset($_GET['v_id'])):
?>

<form id="catForm" action="../../db/category_edit.php">
  <input type="hidden" name="e_id" value="<?php echo $cat['ID'];?>">
  <div class="inputwrap">
    <label>Name</label>
    <input name="Name" type="text" value="<?php echo $cat['Name'];?>" required>
  </div>
  <div class="inputwrap">
    <label>Description</label>
    <textarea name="Des" id="" cols="30" rows="10"><?php echo $cat['Description'];?></textarea> 
  </div>
  <input id="save" type="submit" value="Save">
</form>

<?php endif;?>
<?php if (isset($_GET['cr_id'])):?>
<form id="catForm" action="../../db/category_edit.php">
  <input type="hidden" name="c_id">
  <div class="inputwrap">
    <label>Name</label>
    <input name="Name" type="text" required>
  </div>
  <div class="inputwrap">
    <label>Description</label>
    <textarea name="Des" id="" cols="30" rows="10" required></textarea> 
  </div>
  <input id="save" type="submit" value="Save">
</form>
<?php endif?>