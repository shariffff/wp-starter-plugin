<?php

namespace Dash_Info;

exit_if_abspath_not_defined();

class Dash_Info_Post_Types extends Health_Check_Tool
{
    public function __construct()
    {
        $this->label       = __('Post Types', 'dash-info');

        parent::__construct();
    }

    public function tab_content()
    {
        $post_types = get_post_types(['public' => true], 'objects');
        $names = '';
        foreach ($post_types as $post) {
            $names .= $post->label . ', ';
        }
?>
        <table class="widefat striped health-check-table" role="presentation">
            <tbody>
                <tr>
                    <td><?php _e('Number of post types', 'dash-info') ?></td>
                    <td><?php echo count($post_types); ?></td>
                </tr>
                <tr>
                    <td><?php _e('Public Post types', 'dash-info') ?></td>
                    <td><?php echo rtrim($names, ', '); ?></td>
                </tr>
            </tbody>
        </table>
<?php
    }
}

new Dash_Info_Post_Types;
