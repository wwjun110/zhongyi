<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<title>���ֶҽ�<?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
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
          <td ><h3>ʲô�ǻ���</h3></td>
          <td width="10" >&nbsp;</td>
          <td ><h3>�һ�����</h3></td>
        </tr>
        <tr>
          <td width="455"><ul>
              <li> Ϊ��л��������λվ����һ������ƻ���ͨ�����֣�վ�����Զһ���ͬ��Ʒ�� </li>
            </ul></td>
          <td>&nbsp;</td>
          <td><ul>
              <li>�����̨������ֹ�����ѡ���Լ�ϲ���Ľ�Ʒ���жһ�</li>
            </ul></td>
        </tr>
        <tr>
          <td >&nbsp;</td>
          <td >&nbsp;</td>
          <td >&nbsp;</td>
        </tr>
        <tr>
          <td ><h3>��λ�û���</h3></td>
          <td >&nbsp;</td>
          <td ><h3>���ֹ���</h3></td>
        </tr>
        <tr>
          <td><ul>
              <li>Ͷ�Ź�������룬����ʱת���ɶԵȵ�˰��</li>
              <li>Ͷ�Ź��һ����<?php echo $GLOBALS['C_ZYIIS']['integral_day']?>��</li>
              <li>����������˰��</li>
              <li>�����˱��ֳ����ȶ��ĺ���������ʱ��Խ������û���Խ��</li>
            </ul></td>
          <td>&nbsp;</td>
          <td valign="top"><ul>
              <li>������벢�Ҵﵽ�����ǽ����׼��ȷ��֧��������û��� �磺����������100Ԫ=<?php echo 100*$GLOBALS['C_ZYIIS']['integral_topay']?>���� 1Ԫ������=<?php echo  $GLOBALS['C_ZYIIS']['integral_topay']?>���� </li>
              <li>һ��24Сʱ�����Ͷ�Ź��PV�ﵽ<?php echo $GLOBALS['C_ZYIIS']['integral_daypv']?>����ʱ���<?php echo $GLOBALS['C_ZYIIS']['integral_day']?>��</li>
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
                <span class="jfnum"><?php echo $i['integral']?>����</span><a href="/affiliate/?action=exchange"><img src="/templates/<?php echo Z_TPL?>/images/exchange-bg.gif" align="absmiddle" style=" width:29px; height:16px; border:0px; " /></a><br />
              </li>
               
              <?php } ?>
            </ul></td>
          <td valign="top" class="bl1c"><table width="99%" border="0" cellspacing="0" cellpadding="0" class="jftb ">
              <tr>
                <td><h3>������</h3>
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
                <td><h3>���۸��</h3>
                  <ul class="jful"  style="margin-top:15px">
                    <li   class="jfli1"><a href="/index.php/index.php?action=integral&type=<?php echo $type?>&integral=1"  <?php if($integral==1) echo "style='font-weight:bold'"?>>0-500����</a></li>
                    <li   class="jfli1"><a href="/index.php?action=integral&type=<?php echo $type?>&integral=2"  <?php if($integral==2) echo "style='font-weight:bold'"?>>500-2000����</a></li>
                    <li   class="jfli1"><a href="/index.php?action=integral&type=<?php echo $type?>&integral=3"  <?php if($integral==3) echo "style='font-weight:bold'"?>>2000-5000����</a></li>
                    <li   class="jfli1"><a href="/index.php?action=integral&type=<?php echo $type?>&integral=4"  <?php if($integral==4) echo "style='font-weight:bold'"?>>5000-10000����</a></li>
                    <li   class="jfli1"><a href="/index.php?action=integral&type=<?php echo $type?>&integral=5"  <?php if($integral==5) echo "style='font-weight:bold'"?>>10000-50000����</a></li>
                    <li  class="jfli1"><a href="/index.php?action=integral&type=<?php echo $type?>&integral=6"  <?php if($integral==6) echo "style='font-weight:bold'"?>>50000-100000����</a></li>
                    <li  class="jfli1"><a href="/index.php?action=integral&type=<?php echo $type?>&integral=7"  <?php if($integral==7) echo "style='font-weight:bold'"?>>100000��������</a></li>
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
