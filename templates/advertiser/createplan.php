<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<script language="JavaScript" type="text/javascript" src="/javascript/temp.js"></script>
<script language="JavaScript" type="text/javascript" src="/javascript/jquery/jquery.js"></script>
<script src="/javascript/jquery/jtip.js" language='JavaScript'></script>
<link href="/javascript/jquery/css/question.css" rel="stylesheet" type="text/css" />
<div id="pro_menu" class="pro_menu" stylea="height: 11px; display: block;background-color:#FFFFFF;background-position:0 -107px;">
  <div class="shell">
    <ul class="pro">
      <li><a href="?action=planlist">�ƻ��б�</a></li>
      <li  class="default"><a href="?action=createplan">���¼ƻ�</a></li>
    </ul>
  </div>
</div>
<div class="pages">
   
  <div id="wrapper">
    <div id="content">
      <h3 class="tab " title="first">
        <div class="tabtxt"><a href="?action=createplan">�½��ƻ�</a></div>
      </h3>
      <div class="tab tab1" >
        <h3 class="tabtxt" title="second"><a href="?action=createads">�½����</a></h3>
      </div>
      <div class="boxholder">
        <div class="box">
          <p><img alt="" src="/templates/<?php echo Z_TPL?>/images/bulb.gif" width="19" height="19" /> <strong>��ʾ��</strong> �����Ŀ������֯Ҫ�����Ĳ�Ʒ��档ͬһ�����Ŀ�е����й���ʹ����ͬ�ĵ��ۡ�ÿ��Ԥ�㡢����λ��ʱ�䶨λ���������� ��</p>
		  
		  <form id="create" name="create" method="post" action="?action=<?php  if($action == 'createplan') echo "postcreateplan"; if($action == 'editplan') echo "editplan&actiontype=postupplan";?>"onsubmit="return post_submit()">
		  	 <input name="planid" type="hidden" value="<?php echo $plan['planid']?>" />
              <input name="minprice" id="minprice" type="hidden" value="<?php  if($action == 'createplan') echo $GLOBALS['C_ZYIIS']['cpcmin_price']; if($action == 'editplan') { $min_price = $plan['plantype'] ;echo $GLOBALS['C_ZYIIS'][$min_price];}?>" />
		    <table width="93%"  border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td valign="top">
				
				<?php if($statetype== 'success') {?>
				  <div class="tipinfo" id="success">
					<div class="r1"></div>
					<div class="r2"></div>
					<div class="text">�ƻ��Ѹ��¡�</div>
					<div class="l1"></div>
					<div class="l2"></div>
				  </div>
				  <?php }  ?>
					
					</td>
              </tr>
              <tr></tr>
              <tr>
                <td height="20">&nbsp;</td>
              </tr>
              <tr>
                <td class="cpt">����</td>
              </tr>
              <tr>
                <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="100" valign="top">�ƻ���Ŀ���� </td>
                      <td><input name="planname" type="text" id="planname" value="<?php echo $plan['planname']?>" />
                          <br />
                          <span class="gray">����д�����Ŀ���ơ�</span></td>
                    </tr>
                    <tr>
                      <td>�Ʒ���ʽ</td>
                      <td><select name="plantype" id="plantype"  <?php if($action=='editplan') echo "disabled='disabled'"?>  onchange="Dodata()">
                          <?php foreach((array)$plantype as $pt) {?>
                          <option value="<?php echo $pt['plantype']?>" <?php if($plan['plantype']==$pt['plantype']) echo "selected"?>><?php echo strtoupper ($pt['plantype'])?> &nbsp;&nbsp;<?php echo $pt['name']?></option>
                          <?php } ?>
                        </select>
                          <br />
                          <span class="gray">�ƻ�Ӧ������һ�ּƷ���ʽ��</span></td>
                    </tr>
                    <tr>
                      <td>��Ҫ���</td>
                      <td><input name="audit" type="radio" value="n" <?php if ($plan['audit']=='n' || !$plan) echo "checked";?> />
                        ����Ҫ
                        <input type="radio" name="audit" value="y" <?php if ($plan['audit']=='y') echo "checked";?> />
                        ��Ҫ<br />
                        <span class="gray">��Ҫ��˵ļƻ�ֻ�й���̻������˹���Ա����վ������ͨ���󣬷���Ͷ�š�</span></td>
                    </tr>
                    <tr id="datadatev"  <?php if (!in_array($plan['plantype'],array('cpa','cps')) || !$plan) echo "style=\"display:none\"";?>>
                      <td>���ݷ���</td>
                      <td><input type="radio" name="datatime" value="0" onclick="$i('datadates').style.display = 'none';$i('serveripids').style.display = '';"   <?php if ($plan['datatime']=='0') echo "checked";?>/>
                        ʵʱ
                        <input name="datatime" type="radio" value="1"  onclick="$i('datadates').style.display = '';$i('serveripids').style.display = 'none';"  <?php if ($plan['datatime']>'0' || !$plan) echo "checked";?>/>
                        ��ʱ<span id="datadates" <?php if ($plan['datatime']=='0') echo "style=\"display:none\"";?>>
                          <input name="datadate" type="text" id="datadate" style="width:30px;" value="<?php echo $plan['datatime']==''?1:$plan['datatime']?>" />
                          ��</span><br />
                        <span class="gray">��ʱΪ�����ֶ�ȷ�϶����󷽿����ʻ�Ա�ʻ���ͳ�Ʊ���ͬʱ��ʾ��������</span></td>
                    </tr>
                    <tr id="serveripids"  <?php if ($plan['datatime']=='1' || !$plan) echo "style=\"display:none\"";?>>
                      <td>�ӿ���֤IP</td>
                      <td><input name="serverip" type="text" id="serverip" style="width:180px;"  value="<?php echo $plan['serverip']?>"/>
                          <br />
                          <span class="gray">����̹�������IP��ַ����IP�롰,���ֿ���</span></td>
                    </tr>
                    <tr>
                      <td>��������</td>
                      <td><select name="clearing">
                          <?php if(in_array ('day', explode(',',$GLOBALS['C_ZYIIS']['clearing_cycle']))){ ?>
                          <option value="day" <?php if($plan['clearing']=='day') echo "selected"?>>�ս�ƻ���Ŀ</option>
                          <?php } ?>
                          <?php if(in_array ('week', explode(',',$GLOBALS['C_ZYIIS']['clearing_cycle']))){ ?>
                          <option value="week" <?php if($plan['clearing']=='week' || !$plan) echo "selected"?>>�ܽ�ƻ���Ŀ</option>
                          <?php } ?>
                          <?php if(in_array ('month', explode(',',$GLOBALS['C_ZYIIS']['clearing_cycle']))){ ?>
                          <option value="month" <?php if($plan['clearing']=='month') echo "selected"?>>�½�ƻ���Ŀ</option>
                          <?php } ?>
                        </select>
                          <br />
                          <span class="gray">���˸���վ�������һ�����ڡ�</span></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td class="cpt">������Ԥ��</td>
              </tr>
              <tr>
                <td height="50"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="100" height="40" valign="top">����</td>
                      <td>��
                        <input name="priceadv" type="text" id="priceadv" size="8"  value="<?php echo $plan['priceadv']? abs($plan['priceadv']) :''?>"/>
                          <span id='plan_p'>Ԫ</span> 
						  <?php if($action != 'editplan'){?>
						  <font color="#FF0000">ע�⣺���μ۸������ڵ���<span id='minprices'><?php echo $GLOBALS['C_ZYIIS']['cpcmin_price']?>Ԫ</span> </font>
						  <?php }?>
						  <br />
                          <span class="gray">��Ŀ֧���ĵ��μ۸�</span></td>
                    </tr>
                    <tr>
                      <td height="60" valign="top"><span class="t14b">ÿ���޶�</span></td>
                      <td>��<input name="budget" type="text" id="budget"  size="8" value="<?php echo $plan['budget']?>"/>Ԫ <font color="#FF0000">ÿ������޶�ܵ���<?php echo $GLOBALS['C_ZYIIS']['min_budeget']?>Ԫ</font><br />
                      <span class="gray">ÿ��Ԥ��������ķ��á�������ԣ��ڴﵽÿ��Ԥ���޶�ʱ�����Ĺ��ͻ��ڵ���ֹͣչʾ</span></td>
                    </tr>
                    <tr>
                      <td height="30" valign="top">�۸�˵��</td>
                      <td><input name="priceinfo" type="text" id="priceinfo"  value="<?php echo $plan['priceinfo']?>" size="40" maxlength="16"/>
                          <br />
                          <span class="gray">���ƷѼ�Ҫ˵����</span></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td  >&nbsp;</td>
              </tr>
              <tr>
                <td class="cpt">��������������</td>
              </tr>
              <tr>
                <td height="50"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="100" height="30">��������</td>
                      <td><input type="radio" name="expire_date" checked="checked" value="0000-00-00" onclick="expire(&quot;expire&quot;, true)" <?php if ($plan['expire']=='0000-00-00' || !$plan) echo "checked";?>/>
                        û�н�������</td>
                    </tr>
                    <tr>
                      <td height="30" align="center"></td>
                      <td><input name="expire_date" type="radio"  onclick="expire(&quot;expire&quot;, false)" value="no" <?php if ($plan['expire']!='0000-00-00' && $plan) echo "checked";?>/>
                          <select name="expire_year" id="expire_year" <?php if ($plan['expire']=='0000-00-00' || !$plan) echo "disabled='disabled'";?>>
                            <?php 
										$expire = @explode("-",$plan['expire']);
										for ($i = date('Y') ;$i<date('Y')+21;$i++) {?>
                            <option value="<?php echo $i?>" <?php if (($i == date('Y')+1&& !$plan) || $expire[0]==$i) echo 'selected'?>><?php echo $i?>��</option>
                            <?php }?>
                          </select>
                          <select name="expire_month" id="expire_month" <?php if ($plan['expire']=='0000-00-00' || !$plan) echo "disabled='disabled'";?>>
                            <?php for ($i = 1 ;$i<13;$i++) {?>
                            <option value="<?php echo $i?>" <?php if (($i == date('n')&& !$plan)  || $expire[1]==$i) echo 'selected'?>><?php echo $i?>��</option>
                            <?php }?>
                          </select>
                          <select name="expire_day" id="expire_day" <?php if ($plan['expire']=='0000-00-00' || !$plan) echo "disabled='disabled'";?>>
                            <?php for ($i = 1 ;$i<32;$i++) {?>
                            <option value="<?php echo $i?>" <?php if ( ($i == date('j',TIMES)&& !$plan)  || $expire[2]==$i) echo 'selected'?>><?php echo $i?>��</option>
                            <?php }?>
                          </select>
                          <br />
                          <div class="tips" id="tip1" style="display:none">���Ĺ�������һ����ֹͣչʾ��ֱ�����Ժ������һ���á�</div>
                        <br /></td>
                    </tr>
                 
                </table></td>
              </tr>
              <tr>
                <td class="cpt">��Ŀ����</td>
              </tr>
              <tr>
                <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="100" height="30">��Ŀ����</td>
                      <td><textarea name="planinfo" id="planinfo" style="width:320px;height:100px"><?php echo $plan['planinfo']?></textarea></td>
                    </tr>
                    <tr>
                      <td align="center"></td>
                      <td>&nbsp;</td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="cpt">����λ������վ���͡�ʱ�䡢���ڶ���</td>
              </tr>
              <tr>
                <td height="50"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="100" height="30" align="center">λ�� <a href="?action=help&amp;width=250&amp;type=createplan&amp;typeval=aclcity" class="jTip" id="aclcityhelp"  name="����λ�ö�λ"><img src="/javascript/jquery/images/question.gif" border="0" align="absmiddle" /></a></td>
                      <td>��ϣ���������Щ����λ��չʾ��</td>
                    </tr>
                    <tr>
                      <td height="30" align="center"></td>
                      <td><input id="acl[1][isacl]" class='aclcity' onclick="showtype('2','n');$i('aclcity_c').style.display = 'none'" type="radio"   value="all" name="acl[1][isacl]" <?php if(!$aclcity) echo " checked"?>/>
                        �����еط���ʾ<br />
                        <input id="acl[1][isacl]" onclick="showtype('2','y');$i('aclcity_c').style.display = ''" type="radio" value="acls" name="acl[1][isacl]"  <?php if($aclcity) echo " checked"?>/>
                        ָ������
                        <div id="aclcity_c" <?php if(!$aclcity) echo 'style="display:none;margin-top:3px"'?>>����Ҫ��<br />
                <input id="radio"  type="radio"  value="==" name="acl[1][comparison]" <?php if($citycom == '==' || $citycom=='' || !$plan) echo " checked"?>/>
                          ����
                          <input id="radio"  type="radio" value="!=" name="acl[1][comparison]" <?php if($citycom == '!=') echo " checked"?>/>
                          �ܾ�
                          <div class="tips">������վ�ǵ����Եģ�ѡ��ָ��������ʾ���������ڹ��Ч����</div>
                        </div></td>
                    </tr>
                    <tr>
                      <td align="center"></td>
                      <td><table width="550" height="200" id="s2"   <?php if(!$aclcity) echo 'style="display:none"'?>>
                          <tr>
                            <td width="200" height="100"><table width="580" align="center">
                                <tr>
                                  <td width="220"><span class="create-city_s1"> <span class="create-city_s2" >
                                    <script language="JavaScript" type="text/javascript">
document.write('<select id="city_more" class="create-city_select" name="city_more" size="12">');
	for(k=1;k<where.length;k++) {
		 document.write('<optgroup label="'+where[k].loca+'" >');
		loca3 = (where[k].locacity).split("|");
		for(l=1;l<loca3.length;l++) { 
		document.write('<option value="'+loca3[l]+'">'+loca3[l]+'</option>');
	}
}
document.write('</select>');
                    </script>
                                  </span> </span></td>
                                  <td width="100" align="center"><img alt="" src="/templates/<?php echo Z_TPL?>/images/addcity.gif" onclick="add()" style="cursor: pointer;" />
                                      <div style="height:80px"></div>
                                    <img alt="" src="/templates/<?php echo Z_TPL?>/images/removecity.gif" onclick="remove()" style="cursor: pointer;" /></td>
                                  <td><span class="create-city_s1"> <span class="create-city_s2">
                                    <input type='hidden' name='acl[1][type]' value='city' />
                                    <input value="<?php echo $citydata;?>" name="acl[1][data][]" id="adcitystr" type="hidden" />
                                    <select id="city_choose" name="city_choose" size="12" class="create-city_select">
                                      <?php foreach ((array)$cityarr as $cityarr) {?>
                                      <option value="<?php echo $cityarr;?>"><?php echo $cityarr;?></option>
                                      <?php 	 }?>
                                    </select>
                                  </span> </span></td>
                                </tr>
                            </table></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td height="20" align="center"></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="30" align="center">���� <a href="?action=help&amp;width=250&amp;type=createplan&amp;typeval=aclwebtype" class="jTip" id="aclwebtypehelp"  name="��վ���Ͷ�λ"><img src="/javascript/jquery/images/question.gif" border="0" align="absmiddle" /></a></td>
                      <td>��ϣ���������Щ��վ����չʾ��</td>
                    </tr>
                    <tr>
                      <td height="30" align="center"></td>
                      <td><input id="acl[0][isacl]" onclick="showtype('1','n');$i('webtype_c').style.display = 'none'" type="radio"   value="all" name="acl[0][isacl]" class='aclwebtype' <?php if(!$webtype) echo " checked"?>/>
                        ��������ĿͶ��<br />
                        <input id="acl[0][isacl]" onclick="showtype('1','y');$i('webtype_c').style.display = ''" type="radio" value="acls" name="acl[0][isacl]" class='aclwebtype' <?php if($webtype) echo " checked"?>/>
                        ��ָ����Ŀ����վͶ��
                        <div id="webtype_c" <?php if(!$webtype) echo 'style="display:none;margin-top:3px"'?>>����Ҫ��<br />
                <input id="radio"  type="radio"   value="==" name="acl[0][comparison]" <?php if($webtypecom == '==' || $webtypecom=='' || !$plan) echo " checked"?>/>
                          ����
                          <input id="radio"  type="radio" value="!=" name="acl[0][comparison]" <?php if($webtypecom == '!=') echo " checked"?>/>
                          �ܾ�
                          <div class="tips">ѡ��������ĿͶ�ţ�ϵͳ����Ϊ���Զ��Ż�ѡ����վͶ�����Ĺ�棬����Ϊָ����Ŀ��</div>
                        </div></td>
                    </tr>
                    <tr>
                      <td   align="center"></td>
                      <td><div style="position:relative;z-index:100; width:100%;" onmouseover="os(event)" onmouseout="oe(event)">
                          <input type='hidden' name='acl[0][type]' value='webtype' />
                          <table width="100%"  id="s1"   class="tp" <?php if(!$webtype) echo 'style="display:none"'?>>
                            <tr>
                              <?php 
								$i=1;
								foreach ($sitetype as $s)
								{
									echo '<td><input type="checkbox" name="acl[0][data][]" id="aclsitetype" value="'.$s['sid'].'"'?>
                              <?php 
									if(is_array($webtype)){
										if (in_array ($s['sid'], $webtype)) 
											echo " checked";
									} echo ' class="aclwebtypeval"/>'.$s['sitename'].'</td>';
									if ($i % 6 == 0){
										echo '</tr>';
									} 
									$i++;
								}
								?>
                            </tr>
                          </table>
                      </div></td>
                    </tr>
                    <tr>
                      <td align="center">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="30" align="center">ʱ�� <a href="?action=help&amp;width=250&amp;type=createplan&amp;typeval=acltimetype" class="jTip" id="acltimetypehelp"  name="ʱ�䶨λ"><img src="/javascript/jquery/images/question.gif" border="0" align="absmiddle" /></a></td>
                      <td>��ϣ������ڼ�ʱչʾ��</td>
                    </tr>
                    <tr>
                      <td height="30" align="center"></td>
                      <td><input id="acl[2][isacl]" onclick="showtype('3','n');$i('time_c').style.display = 'none'" type="radio"   value="all" name="acl[2][isacl]"  class="acltime" <?php if(!$acltime) echo " checked"?>/>
                        ȫ��Ͷ��<br />
                        <input id="acl[2][isacl]" onclick="showtype('3','y');$i('time_c').style.display = ''" type="radio" value="acls" name="acl[2][isacl]" class="acltime" <?php if($acltime) echo " checked"?>/>
                        ��ָ����ʱ��Ͷ��
                        <div class="tips" id="time_c"  <?php if(!$acltime) echo 'style="display:none;margin-top:3px"'?>>��ָ����ʱ��Ͷ�ţ�ϵͳ����Ϊ���ڹ涨��ʱ����ʾ��档</div></td>
                    </tr>
                    <tr>
                      <td align="center"></td>
                      <td><input type='hidden' name='acl[2][type]' value='time' />
                          <table width='100%' cellpadding='0' cellspacing='0' border='0'  id='s3' class="tp" <?php if(!$acltime) echo 'style="display:none;margin-top:10px"'?>>
                            <?php 
							$n = 0;
							for($i=0;$i<6;$i++){?>
                            <tr>
                              <?php for($j=0;$j<4;$j++){?>
                              <td><input type='checkbox' name='acl[2][data][]' value='<?php echo $n?>' <?php 
								if(is_array($timedata)){
									if (in_array ($n, $timedata)) echo " checked";
								}else {
									echo " checked";
								}																
								?>   class="acltimeval"/>
                                &nbsp;<?php echo $n?>:00-<?php echo $n?>:59&nbsp;&nbsp;</td>
                              <?php $n++ ;}?>
                            </tr>
                            <?php }?>
                        </table></td>
                    </tr>
                    <tr>
                      <td height="20" align="center"></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="30" align="center">һ�� <a href="?action=help&amp;width=250&amp;type=createplan&amp;typeval=aclweekdaytype" class="jTip" id="aclweekdaytypehelp"  name="���ڶ�λ"><img src="/javascript/jquery/images/question.gif" border="0" align="absmiddle" /></a></td>
                      <td>��ϣ��һ�����ڼ�չʾ��棿</td>
                    </tr>
                    <tr>
                      <td height="30" align="center"></td>
                      <td><input id="acl[3][isacl]" onclick="showtype('4','n');$i('weekday_c').style.display = 'none'" type="radio"   value="all" name="acl[3][isacl]"  class="aclweekday" <?php if(!$aclweekday) echo " checked"?>/>
                        ȫ����Ͷ��<br />
                        <input id="acl[3][isacl]" onclick="showtype('4','y');$i('weekday_c').style.display = ''" type="radio" value="acls" name="acl[3][isacl]" class="aclweekday" <?php if($aclweekday) echo " checked"?>/>
                        ��ָ��������Ͷ��
                        <div class="tips" id="weekday_c"  <?php if(!$aclweekday) echo 'style="display:none;margin-top:3px"'?>>��ָ����һ�����ڼ���ʾ��档</div></td>
                    </tr>
                    <tr>
                      <td height="30" align="center"></td>
                      <td><input type='hidden' name='acl[3][type]' value='weekday' />
                          <table width='100%' cellpadding='0' cellspacing='0' border='0'  id='s4' class="tp" <?php if(!$aclweekday) echo 'style="display:none;margin-top:3px"'?>>
                            <?php 					   
						   for ($i = 0; $i < 7; $i++){
						   		if ($i % 4 == 0) echo "<tr>";
									echo "<td><input type='checkbox'  name='acl[3][data][]' value='$i' class='aclweekdayval'" ?>
                            <?php if(is_array($weekdaydata)){
												if (in_array ($i, $weekdaydata)) echo " checked";
												}else { echo " checked";}
									echo ">&nbsp;��".isweekday($i)."&nbsp;&nbsp;</td>";
									if (($i + 1) % 4 == 0) echo "</tr>";
								}
						   if (($i + 1) % 4 != 0) echo "</tr>";
						?>
                        </table></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td height="50"><input type="submit" name="Submit" class="form-submit" value=" �� �� " /></td>
              </tr>
              <tr>
                <td height="20">&nbsp;</td>
              </tr>
            </table>
                    </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script language="JavaScript" type="text/javascript" src="/javascript/plan.js"></script>
<script  type="text/javascript">
var cpc_minprice=<?php echo $GLOBALS['C_ZYIIS']['cpcmin_price']?>;
var cpm_minprice=<?php echo $GLOBALS['C_ZYIIS']['cpmmin_price']?>;
var cpv_minprice=<?php echo $GLOBALS['C_ZYIIS']['cpvmin_price']?>;
var cpa_minprice=<?php echo $GLOBALS['C_ZYIIS']['cpamin_price']?>;
var cps_minprice=<?php echo $GLOBALS['C_ZYIIS']['cpsmin_price']?>;
function post_submit(){
	var create = $i('create');
	 
	var datatime = get_radio_value($n("datatime"));
	var serverip  = $i('serverip').value;
	var plantype = $("#plantype").val();
 
	if(create.planname.value=="" ){
		alert("����д�����Ŀ��");
		create.planname.focus();
		return false;
	}
	if(datatime==0 && serverip=='' && (plantype=='cpa' || plantype=='cps' )){
		alert("ʱʵ���ݷ��ؽӿ���֤IP����Ϊ�գ� ");
		create.serverip.focus();
		return false;
	}
	if(create.priceadv.value<=0){
		alert("���۲���С��0�� ");
		create.priceadv.focus();
		return false;
	}
 
	if(!checkPrice(create.priceadv.value)){
		create.priceadv.focus();
		return false;
	}	
 	
	if(!checkBudget(create.budget.value)){
		create.budget.focus();
		return false;
	}

	if($('.aclwebtypeval[@checked]').val() === null && $('.aclwebtype[@checked]').val() != 'all'){
		alert("������Ҫѡ��һ����վ���ͣ�");
		return false;
	}
	if($i('adcitystr').value == '' && $('.aclcity[@checked]').val() != 'all'){
		alert("������Ҫѡ��һ������");
		return false;
	}
	if($('.acltimeval[@checked]').val() === null && $('.acltime[@checked]').val() != 'all'){
		alert("������Ҫѡ��һ��ʱ�䣡");
		return false;
	}
	if($('.aclweekdayval[@checked]').val() === null && $('.aclweekday[@checked]').val() != 'all'){
		alert("������Ҫѡ��һ��ʱ�䣡");
		return false;
	}
	//return false
}

function checkPrice(str){
    minprice = $i('minprice').value;
	var i;	
	for(i=0;i<str.length;i++)  {
	   if ((str.charAt(i)<"0" || str.charAt(i)>"9")&& str.charAt(i) != '.'){
			alert("���μ۸�:ֻ������0--9֮�������,�����пո�");
			return false;
	   }
	}
	if(str>parseFloat(100) ){
	   alert("���μ۸�:���ܴ���100Ԫ��");
	   return false;
	}
	if(str<0){
		alert("���μ۸�:����С��0��\n");
		return false;
	}
	<?php if (!$_SESSION["adminusername"]) {?>
	if(str<parseFloat(minprice) ){
		alert("���ε���۸�:����С��"+minprice+"��\n");
		return false;
	}
	<?php }?>
	var re = /([0-9]+\.[0-9]{4})[0-9]*/;
    aNew = str.replace(re,"$1");
    if(str.length>aNew.length){
	   str=aNew;
	   alert("���μ۸�:С�����λ�����ܳ���4λ,���飡");
	   return false;
	}
	return true;
}

function checkBudget(str){
    
	var i;	
	if(str=="" ){
		alert("����дÿ��Ԥ�㣡\n");
		return false;
	}
	for(i=0;i<str.length;i++)  {
	   if ((str.charAt(i)<"0" || str.charAt(i)>"9")&& str.charAt(i) != '.'){
			alert("ÿ��Ԥ��:ֻ������0--9֮�������,�����пո�");
			return false;
	   }
	}
	if(str<parseFloat(<?php echo $GLOBALS['C_ZYIIS']['min_budeget']?>)){
		alert("ÿ���޶�:����С��<?php echo $GLOBALS['C_ZYIIS']['min_budeget']?>��\n");
		return false;
	}
	
	return true;
}

function Dodata(){
    var _p = 'Ԫ';
	var plantype = $("#plantype").val();
	$("#datadatev").hide();
	
	if(plantype=='cpa' || plantype=='cps'  ){
		$("#datadatev").show();
	}else {
		$("#serveripids").hide();
	}
	if(plantype=='cps') _p='%';
	$i('minprices').innerHTML = eval(plantype+"_minprice")+_p;
	$i('minprice').value = eval(plantype+"_minprice");
	$i('plan_p').innerHTML = _p;
}
function SetUmoney(v){
	if(v){
		v = v.split('��');
		if(v[1]<100){
			if(!confirm('��ǰ����̵�������100Ԫ\nȷ��ô��\n�����ȡ���������ֵ?')){
				top.location="do.php";
			}
		}
	}
}
 
</script>
<?php include TPL_DIR . "/footer.php"?>