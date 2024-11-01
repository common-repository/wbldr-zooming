<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://malok.pl
 * @since      1.0.0
 *
 * @package    Wbldr_Zooming
 * @subpackage Wbldr_Zooming/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">

    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>

    <form method="post" name="zooming_options" action="options.php">
    <?php

        $options = get_option($this->plugin_name);

        $speed      = $options['speed'];
        $animation  = $options['animation'];
        $background = $options['background'];
        $size       = $options['size'];
        $onclick    = $options['onclick'];
        $gallery    = $options['gallery'];
        $filename   = $options['filename'];

        settings_fields( $this->plugin_name );
        do_settings_sections( $this->plugin_name );
    ?>

        <table class="form-table">
            <tr>
                <th>
                    <label for="<?php echo $this->plugin_name; ?>-animation"><?php _e( 'Animacja', $this->plugin_name ); ?></label>
                </th>
                <td>
                    <select name="<?php echo $this->plugin_name; ?>[animation]" id="<?php echo $this->plugin_name; ?>-animation">
                        <option <?php selected( $animation, 'linear' ); ?> value="linear"><?php _e( 'linear', $this->plugin_name ); ?></option>
                        <option <?php selected( $animation, 'ease' ); ?> value="ease"><?php _e( 'ease', $this->plugin_name ); ?></option>
                        <option <?php selected( $animation, 'ease-in' ); ?> value="ease-in"><?php _e( 'ease-in', $this->plugin_name ); ?></option>
                        <option <?php selected( $animation, 'ease-out' ); ?> value="ease-out"><?php _e( 'ease-out', $this->plugin_name ); ?></option>
                        <option <?php selected( $animation, 'ease-in-out' ); ?> value="ease-in-out"><?php _e( 'ease-in-out', $this->plugin_name ); ?></option>
                    </select>
                    <p class="description"><?php _e('Więcej informacji i przykładów znajdziesz'); ?> <a href="//www.css3.info/preview/css3-transitions/" target="_blank"><?php _e('na tej stronie', $this->plugin_name ); ?></a></p>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="<?php echo $this->plugin_name; ?>-background"><?php _e( 'Tło', $this->plugin_name ); ?></label>
                </th>
                <td>
                    <input id="<?php echo $this->plugin_name; ?>-background" type="text" name="<?php echo $this->plugin_name; ?>[background]" class="c-picker" value="<?php echo ($background) ? $background : 'rgba(255, 255, 255, 0.8)'; ?>"/>
                    <p class="description"><?php _e('Wybierz kolor tła', $this->plugin_name); ?></p>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="<?php echo $this->plugin_name; ?>-speed"><?php _e( 'Szybkość animacji', $this->plugin_name ); ?></label>
                </th>
                <td>
                    <div id="html5"></div>
                    <input type="number" min="100" max="1000" step="10" id="input-number" name="<?php echo $this->plugin_name; ?>[speed]" value="<?php echo ($speed) ? $speed : '400'; ?>">
                    <p class="description"><?php _e('Podana wartość jest prezentowana w milisekundach', $this->plugin_name); ?></p>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="<?php echo $this->plugin_name; ?>-onclick"><?php _e( 'Akcja po kliknięciu w powiększone zdjęcie', $this->plugin_name ); ?></label>
                </th>
                <td>
                    <select name="<?php echo $this->plugin_name; ?>[onclick]" id="<?php echo $this->plugin_name; ?>-onclick">
                        <option <?php selected( $onclick, 'closePopup' ); ?> value="closePopup"><?php _e( 'Zamknij powiększenie', $this->plugin_name ); ?></option>
                        <option <?php selected( $onclick, 'nextImg' ); ?> value="nextImg"><?php _e( 'Wczytaj następne zdjęcie', $this->plugin_name ); ?></option>
                        <option <?php selected( $onclick, 'null' ); ?> value="null"><?php _e( 'Nic nie rób', $this->plugin_name ); ?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="<?php echo $this->plugin_name; ?>-gallery"><?php _e( 'Galeria', $this->plugin_name ); ?></label>
                </th>
                <td>
                    <select name="<?php echo $this->plugin_name; ?>[gallery]" id="<?php echo $this->plugin_name; ?>-gallery">
                        <option <?php selected( $gallery, 'true' ); ?> value="true"><?php _e( 'Włącz galerię', $this->plugin_name ); ?></option>
                        <option <?php selected( $gallery, 'false' ); ?> value="false"><?php _e( 'Wyłącz galerię', $this->plugin_name ); ?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="<?php echo $this->plugin_name; ?>-filename"><?php _e( 'Wyświetlać nazwę pliku pod zdjęciem?', $this->plugin_name ); ?></label>
                </th>
                <td>
                    <select name="<?php echo $this->plugin_name; ?>[filename]" id="<?php echo $this->plugin_name; ?>-filename">
                        <option <?php selected( $filename, 'true' ); ?> value="true"><?php _e( 'Tak', $this->plugin_name ); ?></option>
                        <option <?php selected( $filename, 'false' ); ?> value="false"><?php _e( 'Nie', $this->plugin_name ); ?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php submit_button( __( 'Zapisz wszystkie zmiany', $this->plugin_name ), 'primary', 'submit', TRUE); ?>
                </td>
            </tr>
        </table>

    </form>

</div>

