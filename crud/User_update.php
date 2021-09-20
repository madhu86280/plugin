<?php
//echo "update page";
function employee_update(){
    //echo "update page in";
    $i=$_GET['id'];
    global $wpdb;
    $table_name = $wpdb->prefix . 'user_list';
    $user = $wpdb->get_results("SELECT id,name,email,contact,role from $table_name where id=$i");
    echo $user[0]->id;
    ?>
    <table>
        <thead>
        <tr>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <form name="frm" action="#" method="post">
            <input type="hidden" name="id" value="<?= $user[0]->id; ?>">
            <tr>
                <td>Name:</td>
                <td><input type="text" name="nm" value="<?= $user[0]->name; ?>"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" value="<?= $user[0]->email; ?>"></td>
            </tr>
            <tr>
                <td>Mob no:</td>
                <td><input type="number" name="mob" value="<?= $user[0]->contact; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update" name="upd"></td>
            </tr>
        </form>
        </tbody>
    </table>
    <?php
}
if(isset($_POST['upd']))
{
    global $wpdb;
    $table_name=$wpdb->prefix.'user_list';
    $id=$_POST['id'];
    $nm=$_POST['nm'];
    $ad=$_POST['em'];
    $m=$_POST['mob'];
    $wpdb->update(
        $table_name,
        array(
            'name'=>$nm,
            'email'=>$em,
            'role'=>$d,
            'contact'=>$m
        ),
        array(
            'id'=>$id
        )
    );
    $url=admin_url('admin.php?page=User_List');
    header("location:http://localhost/wordpressmyplugin/wordpress/wp-admin/admin.php?page=User_Listing");
}
?>