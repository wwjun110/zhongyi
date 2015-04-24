<?php if(!defined('IN_ZYADS')) exit();  
include TPL_DIR . "/header.php";?>
<title><?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
<table width="100%" height="80" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="340" align="center" background="/templates/<?php echo Z_TPL?>/images/bg_b.jpg"><table width="960" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><div id="slider">
              <ul style="display:none;">
                <li><img src="/templates/<?php echo Z_TPL?>/images/slider_1.jpg"/></li>
                <li><img src="/templates/<?php echo Z_TPL?>/images/slider_2.jpg"/></li>
                <li><img src="/templates/<?php echo Z_TPL?>/images/slider_3.jpg"/></li>
         
              </ul>
              	
           	<a href="<?php echo url("?action=register")?>" class="slider-reg"></a>
            </div>
            
          </td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="640"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><table width="310" border="0" cellpadding="0" cellspacing="0" class="tb1">
          <tr>
            <th height="28">联盟特色</th>
          </tr>
          <tr>
            <td height="190" valign="top"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td style="line-height:22px"> 专注于网络广告的研究与发展，为客户提供各种形式的网络广告投放服务。 </td>
              </tr>
              <tr>
                <td><table width="99%" border="0" cellpadding="0" cellspacing="0" class="un1">
                  <tr>
                    <td>&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="center">&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="60" height="35" align="center"><img src="/templates/<?php echo Z_TPL?>/images/banner.jpg" align="absmiddle" /> </td>
                    <td>图片/FLASH </td>
                    <td width="60" align="center"><img src="/templates/<?php echo Z_TPL?>/images/pop.jpg" align="absmiddle" /></td>
                    <td>超级弹窗</td>
                  </tr>
                  <tr>
                    <td height="35" align="center"><img src="/templates/<?php echo Z_TPL?>/images/html.jpg" align="absmiddle" /> </td>
                    <td>图文网摘 </td>
                    <td align="center"><img src="/templates/<?php echo Z_TPL?>/images/swf.jpg" align="absmiddle" /></td>
                    <td>富媒体</td>
                  </tr>
                  <tr>
                    <td height="35" align="center"><img src="/templates/<?php echo Z_TPL?>/images/ticket.jpg" align="absmiddle" /> </td>
                    <td>飘浮/对联 </td>
                    <td align="center"><img src="/templates/<?php echo Z_TPL?>/images/text.jpg" align="absmiddle" /></td>
                    <td>主题广告</td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td>&nbsp;</td>
        <td><table width="310" border="0" align="right" cellpadding="0" cellspacing="0" class="tb1">
          <tr>
            <th height="28">联盟公告</th>
          </tr>
          <tr>
            <td height="190" valign="top"><table width="94%" border="0" align="center" cellpadding="2" cellspacing="0">
              <?php 
				    $news=$this->newsmodel->getAllnews(6);
				    foreach((array)$news as $n){
						$mtime=strtotime($n["time"]);
						$emtime = TIMES-86400*5;
				   ?>
              <tr>
                <td width="100%" height="23" ><a href="<?php echo url("?action=news&id=".$n['id']."")?>" title="<?php echo $n['tit']?>" class="adot"><font color="<?php echo $n['color']?>" >
                  <?php if($n['top'])echo "[置顶]";echo str(h($n['tit']),22);?>
                  </font></a>
                          <?php if(!$n['top']){?>
                  &nbsp;&nbsp;&nbsp;&nbsp; <font color="<?php if($emtime<$mtime) echo 'red'?>"><?php echo date("Y-m-d",strtotime($n['time']));?></font>
                  <?php } ?></td>
              </tr>
              <?php } ?>
              <tr>
                <td height="18" align="right" ><a href="<?php echo url("?action=newslist")?>">更多公告&raquo;</a></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td width="20">&nbsp;</td>
    <?php if ( $GLOBALS['C_ZYIIS']['make_html']=='1' ||  $_SESSION["usertype"] !=1)  {  ?>
    <td><table width="310" border="0" cellpadding="0" cellspacing="0" class="tb1">
      <tr>
        <th height="28">登  录</th>
      </tr>
      <tr>
        <td height="190">
		<form  method="post" action="http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/i.php?action=postuserlogin" onSubmit="return doLogin()" style="margin-bottom: 0px;"><table width="98%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tr>
            <td width="26%" height="30" align="right">用户名：</td>
            <td width="74%"><input name="username" type="text" class="inp2" id="username" />
            </td>
          </tr>
          <tr>
            <td height="30" align="right">密&nbsp;&nbsp;码：</td>
            <td><input name="password" type="password" class="inp2" id="password" /></td>
          </tr>
          <?php if ($GLOBALS['C_ZYIIS']['check_code']=='1') { //是否启用验证码功能?>
          <tr>
            <td height="30" align="right">验证码：</td>
            <td><input name="checkcode" type="text"  id="checkcode"  maxlength="4" style="width:50px"/>
                    <img src="http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/index.php?action=imgcode"  alt= "看不清?请点击刷新验证码" align="absmiddle" id="varImg"  style= "cursor:pointer;"  onclick="refurbish();"/></td>
          </tr>
          <?php }?>
          <tr>
            <td>&nbsp;</td>
            <td><input name="image3" type="image"  src="/templates/<?php echo Z_TPL?>/images/dl.jpg" align="absmiddle" border="0" style="width:94px; height:24px" /></td>
          </tr>
          <tr>
            <td height="30" colspan="2" align="center">还没有联盟帐号？<a href="<?php echo url("?action=register")?>">注册</a>&nbsp;&nbsp;&nbsp;<img src="/templates/<?php echo Z_TPL?>/images/i4.jpg" width="12" height="11" /> <a href="<?php echo url("?action=findpasswd")?>">忘记密码？</a></td>
          </tr>
        </table></td>
      </tr>
    </table></form>
	
	</td>
    <?php } else {?>
    <td><table width="310" border="0" cellpadding="0" cellspacing="0" class="tb1">
      <tr>
        <th height="28">您好，<?php echo $u['username']?> <a href="/index.php?action=logout">[退出]</a></th>
      </tr>
      <tr>
        <td height="190"><table width="98%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tr>
            <td width="26%" height="30" align="right">未结算：</td>
            <td width="74%"><?php echo $u["money"];?></td>
          </tr>
          <tr>
            <td height="30" align="right">收款人：</td>
            <td><?php echo $u['accountname']?></td>
          </tr>
          <?php if ($GLOBALS['C_ZYIIS']['check_code']=='1') { //是否启用验证码功能?>
          <tr>
            <td height="30" align="right">收款帐号：</td>
            <td><?php echo $u['bankacc']?></td>
          </tr>
          <?php }?>
          <tr>
            <td>&nbsp;</td>
            <td><a href="/affiliate/"><img src="/templates/<?php echo Z_TPL?>/images/dl.jpg" align="absmiddle" border="0" style="width:94px; height:24px" /></a></td>
          </tr>
          <tr></tr>
        </table></td>
      </tr>
    </table></td>
    <?php }  ?>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tb1">
      <tr>
        <th height="28">成功案例</th>
      </tr>
      <tr>
        <td height="180" valign="top"><table width="620" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="60" align="center"><img src="/templates/<?php echo Z_TPL?>/images/r.jpg" width="15" height="45" /></td>
            <td><table width="98%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="90"><table width="120" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td colspan="2"><img src="/templates/<?php echo Z_TPL?>/images/logo/t1.jpg" width="97" height="52" /> </td>
                  </tr>
                  <tr>
                    <td align="center">活动：</td>
                    <td>CPM弹窗</td>
                  </tr>
                  <tr>
                    <td align="center">佣金：</td>
                    <td>4元/1000IP</td>
                  </tr>
                </table></td>
                <td><table width="120" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td colspan="2"><img src="/templates/<?php echo Z_TPL?>/images/logo/fx.jpg" width="97" height="52" /> </td>
                  </tr>
                  <tr>
                    <td align="center">活动：</td>
                    <td>飞信CPA </td>
                  </tr>
                  <tr>
                    <td align="center">佣金：</td>
                    <td>1.2元/注册</td>
                  </tr>
                </table></td>
                <td><table width="120" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td colspan="2"><img src="/templates/<?php echo Z_TPL?>/images/logo/t3.jpg" width="97" height="52" /> </td>
                  </tr>
                  <tr>
                    <td align="center">活动：</td>
                    <td>CPM弹窗 </td>
                  </tr>
                  <tr>
                    <td align="center">佣金：</td>
                    <td>4元/1000IP</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="90"><table width="120" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td colspan="2"><img src="/templates/<?php echo Z_TPL?>/images/logo/ml.jpg" width="97" height="52" /> </td>
                  </tr>
                  <tr>
                    <td align="center">活动：</td>
                    <td>CPM弹窗</td>
                  </tr>
                  <tr>
                    <td align="center">佣金：</td>
                    <td>4元/1000IP</td>
                  </tr>
                </table></td>
                <td><table width="120" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td colspan="2"><img src="/templates/<?php echo Z_TPL?>/images/logo/rx.jpg" width="97" height="52" /> </td>
                  </tr>
                  <tr>
                    <td align="center">活动：</td>
                    <td>CPM弹窗 </td>
                  </tr>
                  <tr>
                    <td align="center">佣金：</td>
                    <td>4元/1000IP</td>
                  </tr>
                </table></td>
                <td><table width="120" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td colspan="2"><img src="/templates/<?php echo Z_TPL?>/images/logo/t2.jpg" width="97" height="52" /></td>
                  </tr>
                  <tr>
                    <td align="center">活动：</td>
                    <td>CPM弹窗 </td>
                  </tr>
                  <tr>
                    <td align="center">佣金：</td>
                    <td>4元/1000IP</td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
            <td width="60" align="center"><img src="/templates/<?php echo Z_TPL?>/images/l.jpg" width="15" height="45" /></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
    <td><table width="310" border="0" cellpadding="0" cellspacing="0" class="tb1">
      <tr>
        <th height="28">联系我们</th>
      </tr>
      <tr>
        <td height="180" valign="top"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="80" height="30">网站主客服： </td>
            <td>www.souho.net</td>
            <td><a href="http://wpa.qq.com/msgrd?V=1&amp;uin=88888888"><img src="/templates/<?php echo Z_TPL?>/images/qqstyle_42.jpg" border="0" align="absmiddle" /></a></td>
          </tr>
          <tr>
            <td height="30">网站主客服： </td>
            <td>www.souho.net</td>
            <td><a href="http://wpa.qq.com/msgrd?V=1&amp;uin=88888888"><img src="/templates/<?php echo Z_TPL?>/images/qqstyle_42.jpg" border="0" align="absmiddle" /></a></td>
          </tr>
          <tr>
            <td height="30">广告商联系： </td>
            <td>www.souho.net</td>
            <td><a href="http://wpa.qq.com/msgrd?V=1&amp;uin=88888888"><img src="/templates/<?php echo Z_TPL?>/images/qqstyle_42.jpg" border="0" align="absmiddle" /></a></td>
          </tr>
          <tr>
            <td height="30">广告商联系： </td>
            <td>www.souho.net</td>
            <td><a href="http://wpa.qq.com/msgrd?V=1&amp;uin=88888888"><img src="/templates/<?php echo Z_TPL?>/images/qqstyle_42.jpg" border="0" align="absmiddle" /></a></td>
          </tr>
          <tr>
            <td height="30"> 客服专线号： </td>
            <td colspan="2">0532-88888888</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<script src="/javascript/imgnum.js" type="text/javascript"></script>
 
<?php include TPL_DIR . "/footer.php";?>
