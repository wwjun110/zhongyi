<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<script LANGUAGE="JavaScript" src="/javascript/jiandate.js"></script>

<div class="lists">
  <?php if($statetype== 'success') {?>
  <div class="tipinfo" id="success">
    <div class="r1"></div>
    <div class="r2"></div>
    <div class="text">�����ɹ���</div>
    <div class="l1"></div>
    <div class="l2"></div>
  </div>
  <?php }  ?>
  <h2>�鿴���� <a href="?action=stats&timerange=<?php echo DAYS.'/'.DAYS?>">���챨��</a> <a href="?action=stats&timerange=t">���챨��</a> <a href="?action=stats&timerange=w">��ȥһ��</a> <a href="?action=stats&timerange=m">������</a> <a href="?action=stats&timerange=l">���±���</a> </h2>
  <form action="?action=stats&actiontype=search" method="post">
    <table width="98%" border="0" cellpadding="0" cellspacing="0" class="f_12px" >
      <tr>
        <td><input name="searchval" type="text" class="reg" id="searchval" value="<?php  echo $searchval?>" size="20" />
          <select name="searchtype">
            <option value="1" <?php if ($searchtype == '1') echo "selected";?>>��Ա����</option>
            <option value="2" <?php if ($searchtype == '2') echo "selected";?>>��ԱID</option>
          </select>
          <select name="sortingm" class="select" id="sortingm">
            <option value="DESC" <?php if($sortingm=='DESC')echo "selected"?> >����</option>
            <option value="ASC" <?php if($sortingm=='ASC')echo "selected"?> >����</option>
          </select>
          <select name="sortingtype" class="select" id="select2">
            <option value="day" <?php if($sortingtype=='day')echo "selected"?>>����</option>
            <option value="num" <?php if($sortingtype=='num')echo "selected"?>>������</option>
            <option value="views" <?php if($sortingtype=='views')echo "selected"?>>�����</option>
            <option value="clicks" <?php if($sortingtype=='clicks')echo "selected"?>>���ε��</option>
            <option value="orders" <?php if($sortingtype=='orders')echo "selected"?>>Ч����</option>
          </select>
          &nbsp;&nbsp;
          <select name="timerange" id="timerange" style="width:220px">
            <option value="<?php if($time_begin == '') echo DAYS ;else echo $time_begin; echo ' / ';if($time_end == '') echo DAYS ;else echo $time_end;?>">
            <?php if($time_begin == '') echo DAYS ;else echo $time_begin; echo ' �� ';if($time_end == '') echo DAYS ;else echo $time_end;?>
            </option>
            <option  value="a" <?php echo ($timerange == 'a' ? 'selected ' : '')?>>����ʱ���</option>
            <option value="t" <?php echo ($timerange == 't' ? ' selected' : '')?> >����</option>
            <option value="w" <?php echo ($timerange == 'w' ? ' selected' : '')?> >��ȥһ����</option>
            <option value="m" <?php echo ($timerange == 'm' ? ' selected' : '')?>>������</option>
            <option value="l" <?php echo ($timerange == 'l' ? ' selected' : '')?>>���µ�</option>
          </select>
          <img src="/javascript/images/calendar.gif" align="absmiddle" id="abd" onclick="d.a('timerange','timerange','2')"/>
          <input name="submit" type="submit"   value="�� ѯ" /></td>
      </tr>
    </table>
  </form>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="40">&nbsp;&nbsp;<strong>
        <script language="JavaScript" type="text/javascript">
var t = $("#timerange").find("option:selected").text();  
document.write(t);
</script>
        <?php echo $plan['planname']?>�ı���</td>
    </tr>
  </table>
  <table width="100%" align="center" class="wrap tb0" >
    <tr>
      <th width="120">����</th>
      <th width="110">��Ա����</th>
      <th width="100">�����</th>
      <th width="100">������</th>
      <th width="100">�����</th>
      <th width="100">���ε��</th>
      <th width="100">Ч����</th>
      <th>CTR</th>
    </tr>
    <?php foreach((array)$stats as $s){
			 
	?>
    <tr >
      <td align="center"><?php echo $s['day']?></td>
      <td align="center"><?php echo $s['username']?></td>
      <td align="center"><?php echo $s['views']?></td>
      <td align="center"><?php echo $s['num']?></td>
      <td align="center"><?php echo $s['clicks']?></td>
      <td  align="center"><?php echo $s["do2click"]?></td>
      <td  align="center"><?php echo $s["orders"]?></td>
      <td  align="center"><?php echo ctr($s['views'], $s['num']+$s['deduction'])?></td>
    </tr>
    <?php } //end foreach?>
  </table>
  <?php echo $viewpage;?> </div>
<?php include TPL_DIR . "/footer.php";?>
