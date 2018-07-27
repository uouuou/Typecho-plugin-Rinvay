<?php
/**
 * 编辑器增加高亮代码C按钮，增加表情输入窗口
 *
 * @package Rinvay
 * @author Rinvay
 * @version 1.0
 * @link https://rinvay.cc
 */
class Rinvay_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 插件版本号
     * @var string
     */
    const _VERSION = '1.0';
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     *
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static Function activate()
    {
		Typecho_Plugin::factory('admin/write-post.php')->bottom = array('Rinvay_Plugin', 'button');
		Typecho_Plugin::factory('admin/write-page.php')->bottom = array('Rinvay_Plugin', 'button');
	}

public static function button(){
		?><style>.wmd-button-row {
    height: auto;
}</style>
<script src="<?php gethosturl();?>/usr/themes/Rinvay/js/OwO.min.js"></script>

<link rel="stylesheet" href="<?php gethosturl();?>/usr/themes/Rinvay/css/OwO.min.css">
		<script> 
          $(document).ready(function(){
          	$('#wmd-button-row').append('<li class="wmd-button" id="wmd-jrotty-button" title="按住ALT+C"><span style="background: none;font-size: large;text-align: center;color: #999999;font-family: serif;">C</span></li>');
				if($('#wmd-button-row').length !== 0){
					$('#wmd-jrotty-button').click(function(){
						var rs = "```\nyour code\n```\n";
						zeze(rs);
					})
				}
		$('#wmd-button-bar').append('<div class="OwO"></div>');
				if($('#wmd-button-row').length !== 0){
                    console.log('OωO ok!');
                    window['LocalConst'] = {
                        BIAOQING_PAOPAO_PATH: '<?php echo gethosturl();?>/usr/themes/Rinvay/images/biaoqing/paopao/',
                        BIAOQING_ARU_PATH: '<?php echo gethosturl();?>/usr/themes/Rinvay/images/biaoqing/aru/',
                    };
                    var owo = new OwO({     
                        logo: 'OωO',
                        container: document.getElementsByClassName('OwO')[0],
                        target: document.getElementsByName('text')[0],
                        api: '<?php echo gethosturl();?>/usr/themes/Rinvay/js/OwO.json',
                        position: 'down',
                        width: '100%;',
                        maxHeight: '250px'
                    })
				}

				function zeze(tag) {
					var myField;
					if (document.getElementById('text') && document.getElementById('text').type == 'textarea') {
						myField = document.getElementById('text');
					} else {
						return false;
					}
					if (document.selection) {
						myField.focus();
						sel = document.selection.createRange();
						sel.text = tag;
						myField.focus();
					}
					else if (myField.selectionStart || myField.selectionStart == '0') {
						var startPos = myField.selectionStart;
						var endPos = myField.selectionEnd;
						var cursorPos = startPos;
						myField.value = myField.value.substring(0, startPos)
						+ tag
						+ myField.value.substring(endPos, myField.value.length);
						cursorPos += tag.length;
						myField.focus();
						myField.selectionStart = cursorPos;
						myField.selectionEnd = cursorPos;
					} else {
						myField.value += tag;
						myField.focus();
					}
				}

				$('body').on('keydown',function(a){
					if( a.altKey && a.keyCode == "67"){
						$('#wmd-jrotty-button').click();
					}
				});


			});
</script>
<?php
}

	
    /**
     * 获取插件配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form){}

    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){}



}
