<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>

<div id="pro_menu" class="pro_menu" style="display: block;">
  <div class="shell">
    <ul class="pro">
      <li class="default"><a href="?action=createzt">主题广告</a></li>
      <li><a href="?action=planlist">项目广告</a></li>
      <li><a href="?action=adslist">智能广告</a></li>
    </ul>
  </div>
</div>
<div class="planlist">
<?php if($statetype== 'success' || $actiontype=='edit') {?>
<div class="tipinfo" id="success">
  <div class="r1"></div>
  <div class="r2"></div>
  <div class="text"><?php echo $statetype==''? "正在编辑广告位信息":"广告位已更新";?>。</div>
  <div class="l1"></div>
  <div class="l2"></div>
</div>
<?php }  ?>
<div id="wrapper">
  <div id="content">
    <h3 class="tab tab1">
      <div class="tabtxt"><a href="?action=planlist">项目广告</a></div>
    </h3>
    <div class="tab  tab1" >
      <h3 class="tabtxt"><a href="?action=adslist">智能广告</a></h3>
    </div>
    <h3 class="tab" >
      <div class="tabtxt"><a href="?action=createzt">主题广告</a></div>
    </h3>
    <div class="boxholder">
      <div class="box" >
        <p> <img src="/templates/<?php echo Z_TPL?>/images/bulb.gif" align="absmiddle" /> 定制适合自己的主题广告。</p>
        <table width="99%" border="0" align="center" style="margin-top:20px">
          <tr>
            <td style="padding-left:5px;  "><div id="se1">
                <form id="form1" name="form1" method="post" action="?action=createzt&actiontype=<?php echo $actiontype=='edit'? 'posteditzone':'postcreate'?>">
                  <input name="plantype" type="hidden" value="cpc" />
                  <input name="adstypeid" type="hidden" value="13" />
                  <input name="zoneid" type="hidden" value="<?php echo $zoneid?>" />
                  <table width="800" border="0" align="center" cellpadding="0" cellspacing="0" >
                    <tr>
                      <td height="35" class="f14b">投放网站 &nbsp;&nbsp;&nbsp;
                        <select name="siteid"  id="siteid">
                          <?php foreach((array)$site as $key=>$s ) {
							 		echo "<option value = '". $s['siteid']."'>".$s['sitename']."</option>";
								}
							?>
                        </select></td>
                      <td width="400" class="f14b">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="22">&nbsp;&nbsp;&nbsp;需要投放代码的网站地址</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="35" class="f14b">尺寸</td>
                      <td><?php if ($actiontype=='edit') {?>
                        <?php echo $z['width'].'x'.$z['height'];?>
                        <?php } else {?>
                        <select onchange="updateZoneName()" id="specs" name="specs">
                          <optgroup label="横幅">
						   <option value="960x90">960 x 90 页首横幅</option>
						    <option value="950x90">950 x 90 页首横幅</option>
                          <option value="728x90">728 x 90 页首横幅</option>
                          <option value="468x60">468 x 60 横幅</option>
                          <option value="250x60">250 x 60 半横幅</option>
                          </optgroup>
                          <optgroup label="垂直">
                          <option value="120x600">120 x 600 摩天大楼</option>
                          <option value="160x600">160 x 600 宽幅摩天大楼</option>
                          <option value="120x240">120 x 240 竖幅</option>
                          </optgroup>
                          <optgroup label="正方形">
                          <option value="336x280">336 x 280 大矩形</option>
                          <option value="300x250">300 x 250 中等矩形</option>
                          <option value="250x250">250 x 250 正方形</option>
                          <option value="200x200">200 x 200 小方块</option>
                          <option value="180x150">180 x 150 小矩形</option>
                          <option value="125x125">125 x 125 按钮</option>
                          </optgroup>
                        </select>
                        <?php }?>
                      </td>
                    </tr>
                    <tr>
                      <td height="22">&nbsp;&nbsp;&nbsp;广告尺寸大小</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="35" class="f14b">颜色</td>
                      <td><table width="260" height="53" border="0" cellpadding="0" cellspacing="0" bgcolor="#E6F3FF" style="border:1px #dddddd solid">
                          <tr>
                            <td width="50" rowspan="2" align="center">调色板 </td>
                            <td><select name="getstylecodes" id="getstylecodes" onchange="getStyleCodes('y')">
                                <optgroup label="默认调色板">
                                <option value="0000FF,000000,008000,E6E6E6,FFFFFF">默认调色板</option>
                                </optgroup>
                                <optgroup label="WinonAd 调色板">
                                <option value="0000FF,000000,008000,FFFFFF,FFFFFF">户外</option>
                                <option value="0000FF,000000,008000,336699,FFFFFF">海滨</option>
                                <option value="0000FF,000000,008000,000000,F0F0F0">阴影</option>
                                <option value="FFFFFF,AECCEB,AECCEB,6699CC,003366">混和蓝</option>
                                <option  value="FFFFFF,CCCCCC,999999,000000,000000">墨水蓝</option>
                                <option  value="000000,333333,666666,CCCCCC,CCCCCC">石墨黑</option>
                                </optgroup>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td><a href="javascript:void(0)" onclick="getStyleCodes('0000FF,000000,008000,E6E6E6,FFFFFF')">恢复默认色板</a></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="22"><table width="90%" border="0" cellpadding="0" cellspacing="3">
                          <tr>
                            <td>&nbsp;&nbsp;&nbsp;*从我们预设的调色板中进行选择，或创建自己的调色板。 </td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><iframe width="170" height="90" scrolling="No" id="ads-demo" frameborder="0" src="?action=adsdemo&hl=<?php echo $c['color_headline']?$c['color_headline'] :'0000FF'?>&dt=<?php echo $c['color_description']?$c['color_description'] :'000000'?>&du=<?php echo $c['color_dispurl']?$c['color_dispurl'] :'008000'?>&bd=<?php echo $c['color_border']?$c['color_border'] :'E6E6E6'?>&br=<?php echo $c['color_background']?$c['color_background'] :'FFFFFF'?>&yj=<?php echo $c['zonejys']?$c['zonejys']:0?>&w=&h="></iframe></td>
                          </tr>
                        </table></td>
                      <td><table width="160" border="0" cellpadding="0" cellspacing="3">
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>边框：
                              #
                              <input name="color_border" type="text" id="color_border" value="<?php echo $c['color_border']?$c['color_border'] :'E6E6E6'?>" size="8" maxlength="6"   /></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>标题：
                              #
                              <input name="color_headline" type="text" id="color_headline" value="<?php echo $c['color_headline']?$c['color_headline'] :'0000FF'?>" size="8" maxlength="6" /></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>背景：
                              #
                              <input name="color_background" type="text" id="color_background" value="<?php echo $c['color_background']?$c['color_background'] :'FFFFFF'?>" size="8" maxlength="6" /></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>描述：
                              #
                              <input name="color_description" type="text" id="color_description" value="<?php echo $c['color_description']?$c['color_description'] :'000000'?>" size="8" maxlength="6" /></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>链接：
                              #
                              <input name="color_dispurl" type="text" id="color_dispurl" value="<?php echo $c['color_dispurl']?$c['color_dispurl'] :'008000'?>" size="8" maxlength="6" /></td>
                            <td></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="10" ></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td height="35" class="f14b">角样式 &nbsp;&nbsp;&nbsp;</td>
                      <td><img src="/templates/<?php echo Z_TPL?>/images/zone-yj<?php echo $c['zonejys']?$c['zonejys']:0?>.gif" name="zoneyj" width="30" height="30" border="0" id="zoneyj"  style="border:1px solid #000000; cursor:pointer" onclick="showZoneYj();"/>
                        <input type="hidden" name="zonejys"  id="zonejys" value="<?php echo $c['zonejys']?$c['zonejys']:0?>" /></td>
                    </tr>
                    <tr>
                      <td height="22">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="22"><span class="f14b">广告位名称 &nbsp;&nbsp;&nbsp;</span></td>
                      <td><span class="f14b">
                        <input type="text" name="zonename" id="zonename" style="font-size:1.25em;width:15em;"/>
                        </span></td>
                    </tr>
                    <tr>
                      <td height="22">&nbsp;</td>
                      <td><span style="color:#666666">例如：主页，300x250 的广告；无需滚动即可看到的位置等。</span></td>
                    </tr>
                    <tr>
                      <td height="22"><input name="submit" type="submit" id="submit"   value="<?php echo $actiontype=='edit'?'保存' :'下一步：获取代码'?>"/></td>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
                </form>
              </div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table>
        <table border="0" cellpadding="1" cellspacing="0" id="zoneyjbox" style="display:none; position: absolute">
          <tr>
            <td width="35"><a href="javascript:setZoneYj(0)"><img src="/templates/<?php echo Z_TPL?>/images/zone-yj0.gif" title="无圆角" border="0"/></a>
            <td width="35"><a href="javascript:setZoneYj(4)"><img src="/templates/<?php echo Z_TPL?>/images/zone-yj4.gif" title="小圆角" border="0"/></a></td>
            <td width="35"><a href="javascript:setZoneYj(6)"><img src="/templates/<?php echo Z_TPL?>/images/zone-yj6.gif" title="中圆角" border="0"/></a></td>
            <td width="35"><a href="javascript:setZoneYj(8)"><img src="/templates/<?php echo Z_TPL?>/images/zone-yj8.gif" title="大圆角"  border="0"/></a></td>
            <td width="35"><a href="javascript:setZoneYj(10)"><img src="/templates/<?php echo Z_TPL?>/images/zone-yj10.gif" title="特大圆角" border="0"/></a></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
<link href="/javascript/jquery/colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css" />
<script src="/javascript/jquery/colorpicker/jquery.js" language='JavaScript'></script>
<script type="text/javascript" src="/javascript/jquery/colorpicker/colorpicker.js"></script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function() {
	$('#color_border,#color_headline,#color_background,#color_description,#color_dispurl').ColorPicker({
		onSubmit: function(hsb, hex, rgb, el) {
			$(el).val(hex);
			$(el).ColorPickerHide();
			$(el).css('backgroundColor', '#' + hex);
			 setTxtStyle() 
		},
		onBeforeShow: function () {
			$(this).ColorPickerSetColor(this.value);
		}
	})
	.bind('keyup', function(){
		$(this).ColorPickerSetColor(this.value);
	});
});
function updateZoneName(){
		<?php if ($actiontype=='edit') {?>
			$i("zonename").value = '<?php echo $z['zonename'];?>';
		<?php } else {?>
        $i("zonename").value = "主题, "+get_Option_Value($i("specs")) ;
		<?php }  ?>
}
function getStyleCodes(v){
    if(v=='y'){ 
		var getstylecodes = get_Option_Value($i("getstylecodes"));
	}else {
		var getstylecodes = v;
	}
	var g = getstylecodes.split(',');	
	$i("color_headline").value = g[0];
	$i("color_description").value = g[1];
	$i("color_dispurl").value = g[2];
	$i("color_border").value = g[3];
	$i("color_background").value = g[4];
	 setTxtStyle();
}
function setTxtStyle() {
	var _iframe = $i("ads-demo");
	var headline = $i("color_headline").value;
	var description = $i("color_description").value;
	var dispurl = $i("color_dispurl").value;
	var border = $i("color_border").value;
	var background  = $i("color_background").value;
	var zoneyj = $i("zonejys").value;
	var w = '';
	var h = '';
	src = "?action=adsdemo";
	src += "&hl="+headline;
	src += "&dt="+description;
	src += "&du="+dispurl;
	src += "&bd="+border;
	src += "&br="+background;
	src += "&yj="+zoneyj;
	src += "&w="+w;
	src += "&h="+h;
	_iframe.src = src; 
} 

function showZoneYj(src){
	var zoneyjbox = $i("zoneyjbox");
	var zoneyj = $i("zoneyj");
	var srcs = src;
	zoneyjbox.style.display = '';
	zoneyjbox.style.top = ot(zoneyj)-1+'px';
	zoneyjbox.style.left = ol(zoneyj) + 35 + 'px';
	document.onmouseup = hideZoneYj;
}
function hideZoneYj(){
	var zoneyjbox = $i("zoneyjbox");
	zoneyjbox.style.display = 'none';
}
function setZoneYj(src){
	var zoneyj = $i("zoneyj");
	zoneyj.src = "/templates/<?php echo Z_TPL?>/images/zone-yj"+src+".gif";
	$i("zonejys").value = src;
	hideZoneYj();
	setTxtStyle();
}
updateZoneName();
</script>
<?php include TPL_DIR . "/footer.php";?>
