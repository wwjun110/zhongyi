<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<title>常见问题<?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
<title><?php echo $v["tit"] ?><?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  background="/templates/<?php echo Z_TPL?>/images/bg_b1.jpg">
  <tr>
    <td><table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="180"><img src="/templates/<?php echo Z_TPL?>/images/help_bg.jpg" /></td>
        </tr>
      </table></td>
  </tr>
  <tr></tr>
</table>
<table width="920" border="0" align="center" cellpadding="0" cellspacing="0" class="tb2" >
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="50%"><img src="/templates/<?php echo Z_TPL?>/images/affiliate.jpg"   /></td>
    <td><img src="/templates/<?php echo Z_TPL?>/images/advertiser.jpg" /></td>
  </tr>
  <tr>
    <td height="30" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" ><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0" >
      <tr>
        <td width="50%" valign="top"><ul >
            <?php foreach((array)$aff as $a){?>
            <li><a   href="<?php echo url("?action=help&id=".$a['id'])?>"> <?php echo $a['tit'];?></a> </li>
          <?php } ?>
        </ul></td>
        <td valign="top"><ul >
            <?php foreach((array)$adv as $a){?>
            <li><a   href="<?php echo url("?action=help&id=".$a['id'])?>"> <?php echo $a['tit'];?></a> </li>
          <?php } ?>
        </ul></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" class="bd1c">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"></td>
  </tr>
</table>
<?php include TPL_DIR . "/footer.php";?>
