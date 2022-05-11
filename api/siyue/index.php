<?php ob_start();
//准备数据
$a = array(
	"境有天台山、园艺场，取“园”之谐音“元”，合名天元。<br>物产丰富，经济发达，教科先进，文体便民。<br>湘江边，神农庇，灵寺镇，人杰地灵。<br><strong>天元区</strong>",
	"古为“河中之塘”，初名河塘；夏日荷花飘拂，雅称“荷塘”。<br>无灾无害，水入湘江；公益医疗，全民健身。<br>仙庾岭上仙庾塔，流芳园内千人堆。<br><strong>荷塘区</strong>",
	"古称建宁，是株洲的发祥地，后以芦淞路得名，称“芦淞”。<br>气候温和，四季分明；交通便利，大众消费。<br>古金轮寺，盛极明清；神农阁，屹立奔龙山之首。<br><strong>芦淞区</strong>",
	"境内石峰山域建有石峰公园，故命名“石峰”。<br>株洲市的工业“心脏”；有名的有色金属之乡。<br>著名书法家李铎游石峰公园后，欣然题诗道：“四围黛色篱边出，一阵花香竹里来”。<br><strong>石峰区</strong>",
	"长株潭“两型”社会试验区，“3+5”超级城市。<br>极有问鼎“中国经济第五极”之势。<br>辖内云田素有“中国花木之乡”的美誉。<br><strong>云龙示范区</strong>",
	"“渌水东来，湘江北去”，古称“漉浦”。<br>区位条件优越，享有“湘东明珠”的美誉。<br>株洲市“一核一圈一廊”发展规划的重要组成部分。<br><strong>渌口区</strong>",
	"罗霄山脉北段西沿，湘江支流渌水流域，<br>江河交织，盛产陶瓷、鞭炮烟花，<br>有“瓷城”和“花炮之乡”的美称<br><strong>醴陵市</strong>",
	"古称“梅城”，<br>交通便利 ，素有“衡之径庭、潭之门户”之称，<br>文明塔，桃花谷，白龙洞，古色古香，<br>攸县香干，麻鸭美味飘香。<br><strong>攸县</strong>",
	"神农崩葬于茶山之尾，地处茶山之阴，故名为“茶陵”。<br>稻作上古，耕读唐宋，红色革命，客家文化。<br><strong>茶陵县</strong>",
	"邑有圣陵——炎帝陵，故名“炎陵”。<br>古迹繁多，红色旅游资源丰富，获多项荣誉称号。<br><strong>炎陵县</strong>",
);
 
//生成随机数
$arr=array();
$arr[]=rand(0,9);
$arr=array_unique($arr);
$i=implode(" ",$arr);
 
$hitokoto  = $a[$i];
//开始输出
if (isset($_GET["charset"])) {
    if ($_GET["charset"] == "gbk") {
        header("Content-type: text/html; charset=gbk");
        $hitokoto = iconv("UTF-8", "GBK", $hitokoto);
        if (!isset($_GET["encode"])) {
            echo $hitokoto;
            exit();
        }
        encode();
    } else {
        header("Content-type: text/html; charset=utf-8");
        if (!isset($_GET["encode"])) {
            echo $hitokoto;
            exit();
        }
        encode();
    }
}
header("Content-type: text/html; charset=utf-8");
if (!isset($_GET["encode"])) {
    echo $hitokoto;
    exit();
}
encode();
/**
 * [encode 判断输出类型]
 * @return [none]
 */
function encode()
{
    global $hitokoto;
	global $a;
	global $i;
    if ($_GET["encode"] == "js") {
        header('Content-type: application/x-javascript');
        echo "function siyueapi(){
				document.write(\"" . $hitokoto . "\");
				document.getElementById(\"siyueapi\").setAttribute('title', \"$hitokoto\");

				document.getElementById(\"siyueapi\").onclick = function(){
					console.log(\"点击了一下一言\");
				}
			}";
		// echo ""
        exit();
    } else {
        echo $hitokoto;
        exit();
    }
}
ob_end_flush(); 