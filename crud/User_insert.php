<?php
/**
 * Created by Madhu Banga
 * User: Madhu
 * Date: 20/09/2021
 * Time: 6:30 PM
 */
function user_insert()
{
    //echo "insert page";
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
    <tr>
        <td>Name:</td>
        <td><input type="text" name="nm"></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td><input type="text" name="email"></td>
    </tr>
    <tr>
        <td>Mob no:</td>
        <td><input type="number" name="mob"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="Insert" name="ins"></td>
    </tr>
    </form>
    </tbody>
</table>
<?php
    if(isset($_POST['ins'])){
        global $wpdb;
        $nm=$_POST['nm'];
        $em=$_POST['email'];
        $m=$_POST['mob'];
        $table_name = $wpdb->prefix . 'user_list';

        $wpdb->insert(
            $table_name,
            array(
                'name' => $nm,
                'email' => $em,
                'contact'=>$m
            )
        );
        echo "inserted";
        ?>
        <?php
        exit;
    }
}

?>