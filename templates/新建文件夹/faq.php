<?PHP if(!defined('IN_ZYADS')) exit(); 
header('Content-Type:text/html;charset=GB2312');
$type = h($_GET['type']); 
$typeval = h($_GET['typeval']); 
$h = array (
	'createplan' => array (
			'aclcity'=> '定向具体的莫个城市，只在选中的城市投放或是除外投放。',
			'aclwebtype'=> '只在合适自己的网站类型中投放或是拒绝非相同类型的网站。',
			'acltimetype'=> '在指定的时间投放，系统将会为您在规定的时间显示广告。',
			'aclweekdaytype'=> '在指定的一周星期几显示广告。',
	),
	'stats' => array(
			'pv'=>'浏览量，即PV(page view)，在一定统计周期内所有访问者浏览的页面数量。如果一个访问者浏览同一网页三次，那么网页浏览数就计算为三个，有缓存非即时数据。',
			'clicks' =>'点击量主要是记录<strong>注册</strong>、<strong>销售</strong>、<strong>展示</strong>类计划的广告点击数量，并非点击(CPC)广告的点击数量',
			'do2click' =>'跟踪会员投放效果，访客点击或是弹出到广告页面后，检测是否有点击的动作。',
			'ctr' =>'CTR是Click through rate的缩写 也就是广告的点击率',
			'num' =>'有效的IP数量，联盟根据有效的IP数据。累加或扣除网站主与广告商的费用，此数据为联盟唯一结算标准，如二次点击、效果数只做为参考数据，不参与结算。<br><strong>结算方式为</strong>：一天(24小时)一个会员一个IP一个计划为一个有效的结算数',
			'orders' =>'效果数：在访客点击或是弹出广告，到达广告页面后，比如成功的注册或是下单等等转化成为有效的IP量',
	),
	'url' => array(
			'pertainurl'=>'网站可能会有多个域名启用，为了广告位能在不同域名相同网站下，正常显示广告，请联系我们客服增加附属域名'
	)
);
echo $h[$type][$typeval];