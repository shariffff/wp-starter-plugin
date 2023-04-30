<?php

namespace Dash_Info;

exit_if_abspath_not_defined();

class Dash_Info_Count extends Health_Check_Tool
{
    public function __construct()
    {
        $this->label       = __('Post Count', 'dash-info');
        parent::__construct();
    }

    public function tab_content()
    {

        $post_types = get_post_types(['public' => true], 'objects');
        unset($post_types['attachment']);


        $ignore = ['inherit', 'request-pending', 'request-confirmed', 'request-failed', 'request-completed'];


?>
        <table class="widefat striped health-check-table" role="presentation">
            <tbody>
                <?php foreach ($post_types as $post) : ?>
                    <tr>
                        <td><?php echo $post->label ?></td>
                        <td>
                            <?php $count = wp_count_posts($post->name);
                            foreach ($count as $item => $value) : ?>
                                <?php
                                if (!in_array($item, $ignore)) {
                                    echo ucfirst($item) . ':' .  $value . " | ";
                                }

                                ?>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
<?php
    }
}

new Dash_Info_Count;
