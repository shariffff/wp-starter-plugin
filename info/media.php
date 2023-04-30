<?php

namespace Dash_Info;

exit_if_abspath_not_defined();

class Dash_Info_Media extends Health_Check_Tool
{
    public function __construct()
    {
        $this->label       = __('Media', 'dash-info');
        parent::__construct();
    }




    public function tab_content()
    {
        $attachments_count = wp_count_attachments();
        $total_attachments = 0;
        $html = '';
        foreach ($attachments_count as $meme_type => $count) {
            $html .= "<tr><td>$meme_type</td><td>$count</td></tr>";
            $total_attachments += $count;
        }

?>
        <table class="widefat striped health-check-table" role="presentation">
            <tbody>
                <tr>
                    <td>Total</td>
                    <td><?php echo $total_attachments; ?></td>
                </tr>
                <?php echo $html
                ?>
            </tbody>
        </table>
<?php
    }
}

new Dash_Info_Media;
