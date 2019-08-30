<?if(! defined('BASEPATH') ){ exit('Unable to view file.'); }?>
<h2 class="title"><?=$lang['b_162']?> - Instagram Likes</h2>
<?
$dbt_value = '';
if($site['target_system'] != 2){
	$dbt_value = " AND (a.country = '".$data['country']."' OR a.country = '0') AND (a.sex = '".$data['sex']."' OR a.sex = '0')";
}

$sql = $db->Query("SELECT a.id, a.inst_id, a.url, a.title, a.photo, a.cpc, b.premium FROM inst_likes a LEFT JOIN users b ON b.id = a.user LEFT JOIN inst_liked c ON c.user_id = '".$data['id']."' AND c.site_id = a.id WHERE a.active = '0' AND (b.coins >= a.cpc AND a.cpc >= '2') AND (c.site_id IS NULL AND a.user !='".$data['id']."')".$dbt_value." ORDER BY a.cpc DESC, b.premium DESC".($site['mysql_random'] == 1 ? ', RAND()' : '')." LIMIT 14");
$sites = $db->FetchArrayAll($sql);

if($site['instagram_id'] == '' || $site['instagram_id'] == '0'){
	echo ($data['admin'] > 0 ? '<div class="msg"><div class="error"><a href="admin-panel/index.php?x=settings">To enable this module you have to add Instagram Client ID on Admin -> Settings!</a></div></div>' :'<div class="msg"><div class="error">This section is currently unavailable!</div></div>');
}elseif($sites != FALSE){
?>
<script type="text/javascript">
	msg1 = '<?=mysql_escape_string($lang['inst_likes_08'])?>';
	msg2 = '<?=mysql_escape_string($lang['inst_likes_09'])?>';
	msg3 = '<?=mysql_escape_string($lang['inst_likes_10'])?>';
	msg4 = '<?=mysql_escape_string($lang['inst_likes_11'])?>';
	msg5 = '<?=mysql_escape_string($lang['inst_likes_12'])?>';
	var report_msg1 = '<?=mysql_escape_string($lang['b_277'])?>';
	var report_msg2 = '<?=mysql_escape_string($lang['b_236'])?>';
	var report_msg3 = '<?=mysql_escape_string($lang['b_237'])?>';
	var report_msg4 = '<?=mysql_escape_string(lang_rep($lang['b_252'], array('-NUM-' => $site['report_limit'])))?>';
	hideref = <?=($site['hideref'] != '' ? $site['hideref'] : 0)?>;
	rs_key = '<?=($site['revshare_api'] != '' ? $site['revshare_api'] : 0)?>';
	var start_click = 1;
	var end_click = <?=$db->GetNumRows($sql)?>;
	eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('4 7(a,b,c){8 e=9(f);g(e){$.h({i:"j",5:"k/l.m",n:o,p:"q="+a+"&5="+b+"&r="+c+"&s="+e,t:4(d){u(d){6\'1\':0(v);w(a,\'1\');3;6\'2\':0(x);3;y:0(z);3}}})}}',36,36,'alert|||break|function|url|case|report_page|var|prompt||||||report_msg1|if|ajax|type|POST|system|report|php|cache|false|data|id|module|reason|success|switch|report_msg2|skipuser|report_msg4|default|report_msg3'.split('|'),0,{}))
	eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('4 u(){8(v<X){v=v+1}p{M.Y(Z)}}4 10(b,d){$("#5").6("<m x=\\"m/y.z\\" /><A>");$.B({C:"D",E:"F/G/H/I.J",K:"11=12&13="+b,q:4(a){$("#5").6(a);L(b);u()}})}n o;4 14(d,e,f,w,h,g,i){8(o&&!o.N){}p{n j=O.P/2-w/2;n k=O.Q/2-h/2;n l=e;$("#5").6("<m x=\\"m/y.z\\" /><A>");$.B({C:"D",E:"F/G/H/I.J",K:"15=1&16="+d,q:4(a){8(!17(a)){$("#5").6("<3 7=\\"s\\"><3 7=\\"18\\">"+19+"</3></3>");n b=1a(4(){o.1b()},1c);n c=1d(4(){8(o.N){R(c);R(b);S(d,g,i)}},1e)}p{$("#5").6("<3 7=\\"s\\"><3 7=\\"T\\">"+1f+"</3></3>")}}});8(t==1){l=\'U://t.V/?\'+e}p 8(t==2&&W!=\'0\'){l=\'U://1g.t.V/r/\'+W+\'/\'+e}o=1h.1i(l,f,"1j=9, M=9, 1k=9, 1l=9, 1m=9, 1n=1o, 1p=9, 1q=9, P="+w+", Q="+h+", 1r="+k+", 1s="+j)}}4 S(b,c,e){$("#5").6("<m x=\\"m/y.z\\" /><A>");$.B({C:"D",E:"F/G/H/I.J",1t:1u,K:"1v="+b,q:4(a){8(a==1){$("#5").6("<3 7=\\"s\\"><3 7=\\"q\\">"+1w+" <b>"+c+"</b>"+1x+"</3></3>");L(b);u()}p{$("#5").6("<3 7=\\"s\\"><3 7=\\"T\\">"+1y+"</3></3>")}}})}4 L(a){1z.1A(a).1B.1C="1D"}',62,102,'|||div|function|Hint|html|class|if|no|||||||||||||img|var|targetWin|else|success||msg|hideref|click_refresh|start_click||src|loader|gif|br|ajax|type|POST|url|system|modules|inst_likes|process|php|data|remove|location|closed|screen|width|height|clearTimeout|do_click|error|http|org|rs_key|end_click|reload|true|skipuser|step|skip|sid|ModulePopup|get|pid|isNaN|info|msg1|setTimeout|close|25000|setInterval|1000|msg2|rs|window|open|toolbar|directories|status|menubar|scrollbars|yes|resizable|copyhistory|top|left|cache|false|id|msg3|msg4|msg5|document|getElementById|style|display|none'.split('|'),0,{}))
</script>
<div id="Hint"></div>
<div id="getpoints">
<?
  foreach($sites as $sit){
?>	
<div class="follow<?=($sit['premium'] > 0 ? '_vip' : '')?>" id="<?=$sit['id']?>">
	<center>
		<img src="<?=$sit['photo']?>" width="48" height="48" alt="<?=truncate($sit['title'], 10)?>" title="<?=truncate($sit['title'], 10)?>" border="0" /><br /><b><?=$lang['b_42']?></b>: <?=($sit['cpc']-1)?><br>
		<a href="javascript:void(0);" onclick="ModulePopup('<?=$sit['id']?>','<?=$sit['url']?>','Instagram','900','500','<?=($sit['cpc']-1)?>','1');" class="followbutton"><?=$lang['inst_05']?></a>
		<font style="font-size:0.8em;">[<a href="javascript:void(0);" onclick="skipuser('<?=$sit['id']?>','1');" style="color: #999999;font-size:0.9em;"><?=$lang['inst_07']?></a>]</font>
		<span style="position:absolute;bottom:1px;right:2px;"><a href="javascript:void(0);" onclick="report_page('<?=$sit['id']?>','<?=base64_encode($sit['url'])?>','instagram');"><img src="img/report.png" alt="Report" title="Report" border="0" /></a></span>
	</center>
</div>
<?}?>
</div>
<?}else{?>
<div class="msg">
	<div class="error"><?=$lang['b_163']?></div>
	<div class="info"><a href="buy.php"><b><?=$lang['b_164']?></b></a></div>
</div>
<?}?>