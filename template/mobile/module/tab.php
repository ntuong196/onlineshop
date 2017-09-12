<style>

/* get rid of those system borders being generated for A tags */
a:active {
    outline:none;
}

:focus {
    -moz-outline-style:none;
}

/* root element for tabs  */
ul.tabs {
    list-style:none;
    margin:0 !important;
	width:771px;
    padding:0;
    border-bottom:1px solid #C0C0C0;
    height:27px;
}

/* single tab */
ul.tabs li {
    float:left;
    text-indent:0;
    padding:0;
    margin:0 !important;
    list-style-image:none !important;
}

/* link inside the tab. uses a background image */
ul.tabs a {
    background: url('template/mobile/images/tab.jpg');
    font-size:13px;
    display:block;
    height: 27px;
    line-height:30px;
    width: 130px;
    text-align:center;
    text-decoration:none;
    color:#FFFFFF;
    padding:0px;
    margin:0px;
}

ul.tabs a:active {
	background-image:url('template/mobile/images/tab_hover.jpg');
}

/* when mouse enters the tab move the background image */
ul.tabs a:hover {
    color:#DCE31C;
	background-image:url('template/mobile/images/tab_hover.jpg');
}

/* active tab uses a class name "current". its highlight is also done by moving the background image. */
ul.tabs a.current, ul.tabs a.current:hover, ul.tabs li.current a {

}

/* Different widths for tabs: use a class name: w1, w2, w3 or w2 */


/* width 1 */
ul.tabs a.s { background-position: -553px 0; width:81px; }
ul.tabs a.s:hover { background-position: -553px -31px; }
ul.tabs a.s.current  { background-position: -553px -62px; }

/* width 2 */
ul.tabs a.l { background-position: -248px -0px; width:174px; }
ul.tabs a.l:hover { background-position: -248px -31px; }
ul.tabs a.l.current { background-position: -248px -62px; }


/* width 3 */
ul.tabs a.xl { background-position: 0 -0px; width:248px; }
ul.tabs a.xl:hover { background-position: 0 -31px; }
ul.tabs a.xl.current { background-position: 0 -62px; }


/* initially all panes are hidden */
.panes .pane {
    display:none;
}

/* tab pane styling */
.panes div {
    display:none;
    padding:15px 10px;
    border:1px solid #c0c0c0;
    border-top:0;
    height:auto;
	width:750px;
    font-size:14px;
    background-color:#fff;
}
</style>
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
<script>
$(function() {
    // setup ul.tabs to work as tabs for each div directly under div.panes
    $("ul.tabs").tabs("div.panes > div");
});
</script>
<ul class="tabs">
	<li><a href="#">Chi tiết sản phẩm</a></li>
	<li><a href="#">Sản phẩm liên quan</a></li>
</ul>
 
<!-- tab "panes" -->
<div class="panes">
	<div>
<? echo $pro['content'];?>

	</div>
	<div>
<!-- begin pro home -->
<?
$hang=4;
$cot=2;
if ($_REQUEST['cat']!='') $cat=killInjection($_REQUEST['cat']);
$sql2=mysql_query("SELECT * FROM products where user='".$user."' and cat_mem='".$cat."' and id!=".$_REQUEST['p']." limit 8");
?>
 <table border="0" style="padding-left:0px; padding-right:9px; padding-top:2px;" id="table21" cellspacing="0" cellpadding="0">
 <? for($i=1;$i<=$cot;$i++)
 {?>
					<tr>
						<?
	for($j=1;$j<=$hang&&$row2=mysql_fetch_array($sql2);$j++)
	{?>
						<td style="padding-left:0px; padding-right:6px">
                    <table  border="0" width="160px" height="206px" style="padding-left:6px; padding-right:5px; padding-top:2px; border:1px solid #C0C0C0" id="table21" cellspacing="0" cellpadding="0">
					<tr>
						<td height="20px">
						<font color="#808080" size="2pt"><? echo $row2['name'];?></font>
						
						</td>
				  </tr>
					<tr>
						<td>
						
						<?if($domain=='')
		                {?>
						<a href="./<?echo $user;?>/products/<? echo $row2['id']; ?>/<? echo $row2['cat_mem']; ?>/<? echo str_replace($marTViet,$marKoDau,$row2['name']); ?>.html"><img src="<? echo $row2['image'];?>" width="169" height="117"></a>
						<?}else{?>
						<a href="./products/<? echo $row2['id']; ?>/<? echo $row2['cat_mem']; ?>/<? echo str_replace($marTViet,$marKoDau,$row2['name']); ?>.html"><img src="<? echo $row2['image'];?>" width="169" height="117"></a>
						<?}?>
						
						</td>
				  </tr>
				  <tr>
						<td>
						<font color="#808080" size="2pt"><? echo $row2['short'];?></font>
						<br>
						<font color="#C7BB45" size="2pt"><b>Giá bán: <? if ($row2['price']<=0) echo 'Liên hệ'; else echo number_format($row2['price']).' VNĐ'; ?></b></font>
						</td>
				  </tr>
				  <tr>
						<td>
						<?if($domain=='')
{?>
						<span style="float:left"><a href="./<? echo $user;?>/products/<? echo $row2['id']; ?>/<? echo $row2['cat_mem']; ?>/<? echo str_replace($marTViet,$marKoDau,$row2['name']); ?>.html"><img src="template/base/images/chitiet.jpg"></a></span>
						<span style="float:right"><a href="./<? echo $user;?>/mua-hang/<? echo $row2['id'];?>.html"><img src="template/base/images/datmua.jpg"></a></span>
						<?}else{?>
						<span style="float:left"><a href="./products/<? echo $row2['id']; ?>/<? echo $row2['cat_mem']; ?>/<? echo str_replace($marTViet,$marKoDau,$row2['name']); ?>.html"><img src="template/base/images/chitiet.jpg"></a></span>
						<span style="float:right"><a href="./mua-hang/<? echo $row2['id'];?>.html"><img src="template/base/images/datmua.jpg"></a></span>
						<?}?>
						</td>
				  </tr>
				  <tr>
						<td height="8px">
						</td>
				  </tr>
				  </table>
						</td>
	<?}?>					
					</tr>
					<tr><td height="10">
					</td></tr>
	<?}?>

</table>
<!-- end pro home -->

	</div>

</div>