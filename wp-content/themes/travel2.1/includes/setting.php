<?php //后台设置
function huilang_options() {
add_theme_page("主题设置", "主题设置", 'administrator', basename(__FILE__), 'huilang_form');
add_action( 'admin_init', 'register_mysettings' );
}
function register_mysettings() {

    //register our settings
    register_setting( 'huilang-settings', 'huilang_description');
    register_setting( 'huilang-settings', 'huilang_keywords');
    register_setting( 'huilang-settings', 'huilang_avatar');
}

function huilang_form(){
global $themename;
if ( $_REQUEST['settings-updated'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' 设置已保存。</strong></p></div>';
?>
<style>
fieldset {border: 1px solid #DDDDDD;border-radius: 5px 5px 5px 5px;margin: 5px 0 10px;padding: 0 15px;}
fieldset legend {font-size: 14px;padding: 0 5px;}
</style>
 <div class="icon32" id="icon-themes"><br></div>
<h2>主题设置</h2>
<form method="post" action="options.php">
<?php settings_fields('huilang-settings'); ?>
<fieldset>
<legend>主题设置</legend>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row">SEO优化：
                    <br/>
                    <small style="font-weight:normal;">meta标签设置</small></th>
                    <td>
                        <div align="left">
                        关键词keywords 「以英文逗号隔开，建议不超过100字包括字符」<br />
                        <input type="text" style="width:80%;" name="huilang_keywords" value="<?php echo get_option('huilang_keywords'); ?>" />
                        <br /><br />
                        描述description 「建议不超过150字包括符号」<br />
                        <input type="text" style="width:80%;" name="huilang_description" value="<?php echo get_option('huilang_description'); ?>" />
                        </div>
                    </td>
                </tr>
            </tbody>
            <tbody>
                <tr valign="top">
                    <th scope="row">头像设置：
                    <br/>
                    <small style="font-weight:normal;">顶部头像设置</small></th>
                    <td>
                        <div align="left">
                        请输入头像图片链接<br />
                        <input type="text" style="width:80%;" name="huilang_avatar" value="<?php echo get_option('huilang_avatar'); ?>" />
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        
<p class="submit"><input type="submit" value="<?php _e('Save Changes') ?>" name="save" id="button-primary" /></p>
</form>
</fieldset>
<?php
}
add_action('admin_menu', 'huilang_options');