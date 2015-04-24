<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<title><?php echo $v["tit"] ?><?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  background="/templates/<?php echo Z_TPL?>/images/bg_b1.jpg">
  <tr>
    <td><table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="180"><img src="/templates/<?php echo Z_TPL?>/images/bg_b2.jpg" /></td>
        </tr>
      </table></td>
  </tr>
  <tr></tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="260" valign="top" bgcolor="#f7f7f7"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tb1">
              <tr></tr>
              <tr>
                <th height="28">最新公告</th>
              </tr>
              <tr>
                <td height="190" valign="top"><table width="93%" border="0" align="center" cellpadding="2" cellspacing="0">
                    <?php 
				    $news=$this->newsmodel->getAllnews(12);
				   foreach((array)$news as $n){?>
                    <tr>
                      <td width="100%" height="25" ><a href="<?php echo url("?action=news&id=".$n['id']."")?>" title="<?php echo $n['tit']?>"><font color="<?php echo $n['color']?>">
                        <?php if($n['top'])echo "[置顶]";echo str(h($n['tit']),22);?>
                        </font></a>
                        <?php if(!$n['top']){?>
                        &nbsp;&nbsp;&nbsp;[<?php echo date("m-d",strtotime($n['time']));?>]
                        <?php } ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                      <td height="22" align="right" ><a href="<?php echo url("?action=newslist")?>">更多公告&raquo;</a></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td width="30">&nbsp;</td>
    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0"  >
        <tr>
          <td height="30"  style="border-bottom: 1px solid #DDDDDD; background-color:#EBF6FC; padding-left:20px;"><strong><?php echo $_GET['action']=='news' ?  "联盟公告": "联盟帮助";?></strong></td>
        </tr>
        <tr>
          <td height="190" valign="top"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" style=" color:#666;">
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="30" align="center"><strong><?php echo $v["tit"] ?></strong></td>
              </tr>
              <tr>
                <td height="30" align="center"><?php echo $v["time"] ?></td>
              </tr>
              <tr>
                <td style="line-height:25px;"><?php echo nl2br($v["conn"]);?></td>
              </tr>
              <tr>
                <td height="30">&nbsp;</td>
              </tr>
              <tr>
                <td height="26"   class="bd1c">上一篇：<a href="<?php echo url("?action=".$_GET['action']."&id=".$up['id'])?>"><?php echo $up['tit']?></a></td>
              </tr>
              <tr>
                <td height="26">下一篇：<a href="<?php echo  url("?action=".$_GET['action']."&id=".$np['id'])?>"><?php echo $np['tit']?></a> </td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"  class="bd1c">&nbsp;</td>
  </tr>
</table>
<?php include TPL_DIR . "/footer.php";?>
