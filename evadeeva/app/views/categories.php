<h1>Categories</h1>
<?php
    foreach ($data as $key => $value){
        echo $value['category_id'].':'.$value['category_name'].'<br>';
    }
?>