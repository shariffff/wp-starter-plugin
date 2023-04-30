<?php

// if (!defined('ABSPATH')) {
//     die('We\'re sorry, but you can not directly access this file.');
// }
\Dash_Info\exit_if_abspath_not_defined();
?>
<div class="health-check-body">
    <h2>
        <?php esc_html_e('Dashboard Information', 'health-check'); ?>
    </h2>

    <div id="health-check-tools" role="presentation" class="health-check-accordion">
        <?php
        $tabs = apply_filters('health_check_tools_tab', array());

        foreach ($tabs as $count => $tab) :
        ?>

            <h3 class="health-check-accordion-heading">
                <button aria-expanded="false" class="health-check-accordion-trigger" aria-controls="health-check-accordion-block-<?php echo esc_attr($count); ?>" type="button">
                    <span class="title">
                        <?php echo $tab['label']; ?>
                    </span>
                    <span class="icon"></span>
                </button>
            </h3>
            <div id="health-check-accordion-block-<?php echo esc_attr($count); ?>" class="health-check-accordion-panel" hidden="hidden">
                <?php echo $tab['content']; ?>
            </div>

        <?php endforeach; ?>
    </div>

</div>