 <table width="261" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="225" background="/templates/<?php echo Z_TPL?>/images/member_bg.jpg"><form  method="post" action="http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/index.php?action=postuserlogin" onsubmit="return doLogin()" style="margin-bottom: 0px;">
                  <table width="98%" border="0" align="center" cellpadding="3" cellspacing="0">
                    <tr>
                      <td height="30" align="right">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
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
                      <td><input name="checkcode" type="text"  id="checkcode" style="width:50px" maxlength="4" />
                          <img src="http://<?php echo $GLOBALS['C_ZYIIS']['authorized_url']?>/index.php?action=imgcode"  alt= "看不清?请点击刷新验证码" align="absmiddle" id="varImg"  style= "cursor:pointer;"  onclick="refurbish();"/></td>
                    </tr><?php }?>
                    <tr>
                      <td>&nbsp;</td>
                      <td><input name="image" type="image"  src="/templates/<?php echo Z_TPL?>/images/dl.jpg" align="absmiddle" border="0" style="width:94px; height:24px" /></td>
                    </tr>
                    <tr>
                      <td height="30" colspan="2" align="center">还没有联盟帐号？<a href="<?php echo url("?action=register")?>">注册</a>&nbsp;&nbsp;&nbsp;<img src="/templates/<?php echo Z_TPL?>/images/i4.jpg" width="12" height="11" /> <a href="<?php echo url("?action=findpasswd")?>">忘记密码？</a></td>
                    </tr>
                  </table>
                </form></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="10"></td>
              </tr>
            </table>
            <table width="250" height="91" border="0" cellpadding="0" cellspacing="0"  background="/templates/<?php echo Z_TPL?>/images/banner.jpg">
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="10"></td>
              </tr>
            </table>
            <table width="250" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="250" valign="top" background="/templates/<?php echo Z_TPL?>/images/gg_bg.jpg"><table width="93%" border="0" align="center" cellpadding="2" cellspacing="0">
                  <tr>
                    <td width="79%" height="40">&nbsp;</td>
                    <td width="21%">&nbsp;</td>
                  </tr>
                  <?php 
				    $news=$this->newsmodel->getAllnews(6);
				   foreach((array)$news as $n){?>
                  <tr>
                    <td height="25" colspan="2" ><a href="<?php echo url("?action=news&id=".$n['id']."")?>" title="<?php echo $n['tit']?>"><font color="<?php echo $n['color']?>">
                      <?php if($n['top'])echo "[置顶]";echo str(h($n['tit']),22);?>
                      </font></a>
                        <?php if(!$n['top']){?>
                      &nbsp;&nbsp;&nbsp;[<?php echo date("m-d",strtotime($n['time']));?>]
                      <?php } ?></td>
                  </tr>
                 
                  <?php } ?>
				   <tr>
                     <td height="22" colspan="2" align="right" ><a href="<?php echo url("?action=newslist")?>">更多公告&raquo;</a></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            