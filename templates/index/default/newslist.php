<?php if(!defined('IN_ZYADS')) exit(); 
include TPL_DIR . "/header.php";?>
<title><?php echo $v["tit"] ?> <?php echo $GLOBALS['C_ZYIIS']['sitename']?></title>
  
 
 
 
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
     <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0"  >
         <tr>
           <td height="30"  style="border-bottom: 1px solid #DDDDDD; background-color:#EBF6FC; padding-left:20px;"><strong>公告列表</strong></td>
         </tr>
         <tr>
           <td height="190" valign="top"><table width="95%" border="0" cellpadding="0" cellspacing="0" style="margin-top:15px;line-height:22px;">
             <tr>
               <td><table width="100%" border="0" cellspacing="0" cellpadding="5">
                   <?php 
					
					foreach((array)$allnews as $n){
					$mtime=strtotime($n["time"]);
					$emtime = TIMES-86400*7;
					?>
                   <tr>
                     <td align="left"><a href="<?php echo url("?action=news&id=".$n['id']."")?>" title="<?php echo $n['tit']?>"><font color="<?php echo $n['color']?>"> <font color="red">
                       <?php if($emtime<$mtime) echo ' New！ '?>
                       </font>
                             <?php if($n['top'])echo "[置顶]";echo $n['tit'];?>
                       </font></a>
                         <?php if(!$n['top']){?>
                       &nbsp;&nbsp;[<?php echo date("Y-m-d",strtotime($n['time']));?>]
                       <?php } ?></td>
                   </tr>
                   <?php } ?>
                   <tr>
                     <td align="left"><?php echo $viewpage?></td>
                   </tr>
                   <tr></tr>
               </table></td>
             </tr>
           </table></td>
         </tr>
     </table></td>
   </tr>
   <tr>
     <td  >&nbsp;</td>
   </tr>
   <tr>
     <td   class="bd1c">&nbsp;</td>
   </tr>
 </table>
 <?php include TPL_DIR . "/footer.php";?>
