<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<title>积分兑奖<?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  background="/templates/<?php echo Z_TPL?>/images/bg_b1.jpg">
  <tr>
    <td><table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="180"><img src="/templates/<?php echo Z_TPL?>/images/integral_bg.jpg" /></td>
        </tr>
      </table></td>
  </tr>
  <tr></tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0" class="tb2">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><img src="/templates/<?php echo Z_TPL?>/images/integral.jpg"   /></td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0" >
        <tr>
          <td ><h3>什么是积分</h3></td>
          <td width="10" >&nbsp;</td>
          <td ><h3>兑换积分</h3></td>
        </tr>
        <tr>
          <td width="455"><ul>
              <li> 为答谢并鼓励各位站长的一项回馈计划。通过积分，站长可以兑换不同奖品。 </li>
            </ul></td>
          <td>&nbsp;</td>
          <td><ul>
              <li>进入后台点击积分管理即可选择自己喜欢的奖品进行兑换</li>
            </ul></td>
        </tr>
        <tr>
          <td >&nbsp;</td>
          <td >&nbsp;</td>
          <td >&nbsp;</td>
        </tr>
        <tr>
          <td ><h3>如何获得积分</h3></td>
          <td >&nbsp;</td>
          <td ><h3>积分规则</h3></td>
        </tr>
        <tr>
          <td><ul>
              <li>投放广告获的收入，结算时转换成对等的税分</li>
              <li>投放广告一天获得<?php echo $GLOBALS['C_ZYIIS']['integral_day']?>分</li>
              <li>不定期增送税分</li>
              <li>和联盟保持长期稳定的合作，合作时间越长，获得积分越多</li>
            </ul></td>
          <td>&nbsp;</td>
          <td valign="top"><ul>
              <li>获的收入并且达到了我们结算标准已确认支付，即获得积分 如：这周期收入100元=<?php echo 100*$GLOBALS['C_ZYIIS']['integral_topay']?>积分 1元的收入=<?php echo  $GLOBALS['C_ZYIIS']['integral_topay']?>积分 </li>
              <li>一天24小时不间断投放广告PV达到<?php echo $GLOBALS['C_ZYIIS']['integral_daypv']?>以上时获的<?php echo $GLOBALS['C_ZYIIS']['integral_day']?>分</li>
            </ul></td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td class="bd1c"><img src="/templates/<?php echo Z_TPL?>/images/integralinfo.jpg" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="730" valign="top"><ul class="jful">
              <?php foreach((array)$integraltop  AS $i) {?>
              <li> <img src="<?php echo $i['imageurl']?>" /><br />
                <span class="jftit"><a href="/affiliate/?action=exchange"><?php echo str($i['name'],22)?></a> </span><br />
                <span class="jfnum"><?php echo $i['integral']?>积分</span><a href="/affiliate/?action=exchange"><img src="/templates/<?php echo Z_TPL?>/images/exchange-bg.gif" align="absmiddle" style=" width:29px; height:16px; border:0px; " /></a><br />
              </li>
               
              <?php } ?>
            </ul></td>
          <td valign="top" class="bl1c"><table width="99%" border="0" cellspacing="0" cellpadding="0" class="jftb ">
              <tr>
                <td><h3>按类别分</h3>
                  <ul class="jful" >
                    <?php foreach((array)$GLOBALS['C_IntegralType'] as $key=>$val) {?>
                    <li><a href="/index.php?action=integral&type=<?php echo $key?>"  <?php if($type==$key && is_numeric($type)) echo "style='font-weight:bold'"?>><?php echo $val?></a></li>
                    <?php } ?>
                  </ul></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><h3>按价格分</h3>
                  <ul class="jful"  style="margin-top:15px">
                    <li   class="jfli1"><a href="/index.php/index.php?action=integral&type=<?php echo $type?>&integral=1"  <?php if($integral==1) echo "style='font-weight:bold'"?>>0-500积分</a></li>
                    <li   class="jfli1"><a href="/index.php?action=integral&type=<?php echo $type?>&integral=2"  <?php if($integral==2) echo "style='font-weight:bold'"?>>500-2000积分</a></li>
                    <li   class="jfli1"><a href="/index.php?action=integral&type=<?php echo $type?>&integral=3"  <?php if($integral==3) echo "style='font-weight:bold'"?>>2000-5000积分</a></li>
                    <li   class="jfli1"><a href="/index.php?action=integral&type=<?php echo $type?>&integral=4"  <?php if($integral==4) echo "style='font-weight:bold'"?>>5000-10000积分</a></li>
                    <li   class="jfli1"><a href="/index.php?action=integral&type=<?php echo $type?>&integral=5"  <?php if($integral==5) echo "style='font-weight:bold'"?>>10000-50000积分</a></li>
                    <li  class="jfli1"><a href="/index.php?action=integral&type=<?php echo $type?>&integral=6"  <?php if($integral==6) echo "style='font-weight:bold'"?>>50000-100000积分</a></li>
                    <li  class="jfli1"><a href="/index.php?action=integral&type=<?php echo $type?>&integral=7"  <?php if($integral==7) echo "style='font-weight:bold'"?>>100000积分以上</a></li>
                  </ul></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td ><table width="700" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><?php echo $viewpage;?></td>
        </tr>
      </table></td>
  </tr>
</table>
<?php include TPL_DIR . "/footer.php";?>
