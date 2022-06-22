<h1>Add Category</h1>
<form action="<?php echo BASE_URL?>category/insert_category" method="POST">
    <label for="">CategoryName</label>
    <input type="text" name="CategoryName"><br>
    <label for="">Image</label>
    <input type="text" name="Image"><br>
    <input type="submit" name= "add" value="Add">
</form>