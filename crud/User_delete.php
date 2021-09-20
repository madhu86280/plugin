<?php
//echo "employee delete";
function user_delete(){
    echo "user delete";
    if(isset($_GET['id'])){
        global $wpdb;
        $table_name=$wpdb->prefix.'user_list';
        $i=$_GET['id'];
        $wpdb->delete(
            $table_name,
            array('id'=>$i)
        );
        echo "deleted";
    }
    echo get_site_url() .'/wp-admin/admin.php?page=user_List';
    ?>
    <?php
}
?>