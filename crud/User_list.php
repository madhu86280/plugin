<?php

function user_list() {
    ?>
    <style>
        table {
            border-collapse: collapse;


        }

        table, td, th {
            border: 1px solid black;
            padding: 20px;
            text-align: center;
        }
    </style>
    <div class="wrap">
        <table>
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            global $wpdb;
            $table_name = $wpdb->prefix . 'user_list';
            $employees = $wpdb->get_results("SELECT id,name,email,contact,role from $table_name");
            foreach ($employees as $employee) {
                ?>
                <tr>
                    <td><?= $employee->id; ?></td>
                    <td><?= $employee->name; ?></td>
                    <td><?= $employee->email; ?></td>
                    <td><?= $employee->contact; ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=User_Update&id=' . $employee->id); ?>">Update</a> </td>
                    <td><a href="<?php echo admin_url('admin.php?page=User_Delete&id=' . $employee->id); ?>"> Delete</a></td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
    <?php

}
add_shortcode('short_user_list', 'user_list');
?>