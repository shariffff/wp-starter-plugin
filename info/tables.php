<?php

namespace Dash_Info;

exit_if_abspath_not_defined();

class Dash_Info_DB_Tables extends Health_Check_Tool
{
    public function __construct()
    {
        $this->label       = __('Database Tables', 'dash-info');
        parent::__construct();
    }
    function get_table_sizes()
    {
        global $wpdb;

        $query = "SELECT table_name AS 'Table',
                         ROUND(((data_length + index_length) / 1024 / 1024), 2) AS 'Size (MB)'
                  FROM information_schema.TABLES
                  WHERE table_schema = %s
                  ORDER BY (data_length + index_length) DESC";

        $prepared_query = $wpdb->prepare($query, DB_NAME);
        $table_sizes = $wpdb->get_results($prepared_query);

        return $table_sizes;
    }



    public function tab_content()
    {


        $table_sizes = $this->get_table_sizes();



?>
        <table class="widefat striped health-check-table" role="presentation">
            <tbody>
                <tr>
                    <td>Total Tables</td>
                    <td><?php echo count($table_sizes); ?></td>
                </tr>
                <?php foreach ($table_sizes as $table_size) : ?>
                    <tr>
                        <td><?php echo $table_size->Table; ?></td>
                        <td><?php echo  $table_size->{'Size (MB)'}; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
<?php
    }
}

new Dash_Info_DB_Tables;
