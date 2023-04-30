<?php

namespace Dash_Info;

exit_if_abspath_not_defined();

class Dash_Info_Users extends Health_Check_Tool
{
    public function __construct()
    {
        $this->label       = __('Users', 'dash-info');
        parent::__construct();
    }

    public function tab_content()
    {

        $result = count_users();

?>
        <table class="widefat striped health-check-table" role="presentation">
            <tbody>
                <tr>
                    <td>Total</td>
                    <td><?php echo $result['total_users'] ?></td>
                </tr>
                <?php foreach ($result['avail_roles'] as $role => $count) : ?>
                    <tr>
                        <td><?php echo  ucfirst($role); ?></td>
                        <td>
                            <?php echo $count ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
<?php
    }
}

new Dash_Info_Users;
