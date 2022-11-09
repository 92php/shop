// 得到req_id
function getReqId(url, idx) {
	var str = "req_id="
	var reqid = url.slice(idx + str.length); 
	return reqid;
}

$(function () 
{
	load_user_logged_in(function(){load_rec();});
});

function load_rec()
{
	var client = new brs.Client(run_mode);
	var user_info = '';
	var p = new brs.PackedRequest();

	var url = self.location.href;
	var idx = url.indexOf("req_id=");
	var s_goods_title = $('.h2_prodtitle').html();
	var s_goods_link = 'http://item.mbaobao.com' + i_goods_sku +'.html';
	session_id = $.cookie('mbbsessionid');
	if(session_id == null || session_id == "")
	{
		session_id = $.cookie('session_id');
	}
	user_info = user_id ? user_id :session_id;

	if (idx >= 0) 
	{
		var req_id = getReqId(url, idx); 
		p.cr = new brs.ClickRecItem(user_info, i_goods_sku, session_id, req_id);
	}
	else 
	{
		p.a = new brs.AddItem(i_goods_sku, s_goods_title, s_goods_link);

		// 图片链接
		p.a.image_link = s_goods_thumb_url; 

		// 价格
		p.a.price = i_goods_price; 

		// 分类
		p.a.category = category;

		p.v = new brs.VisitItem(user_info, i_goods_sku, session_id);
	}
	/********** 向百分点推荐引擎提交推荐请求 **********/
	p.rec1 = new brs.RecByViewAlsoView(new Array(i_goods_sku), user_info, 15);// 默认返回10条结果
	p.rec5 = new brs.RecByBoughtAlsoBought(new Array(i_goods_sku), user_info, 15);
	client.invoke(p, "cb_recommend");
}

// 回调函数：用于处理推荐请求的返回结果。即,将推荐结果展示在推荐栏中，您可以根据需要修改
function cb_recommend(json) {

		 //获取view商品数据
		var rec1_data = json.rec1[2];
		//获取buy商品数据
		var rec5_data = json.rec5[2];

		//获取view req_id
		var rec1_req = json.rec1[1];
		//获取buy req_id
		var rec5_req = json.rec5[1];

		//获取view sku串
		var sku_ids_rec1 = '';
		for (var i in rec1_data) 
		{		
			sku_ids_rec1 += sku_ids_rec1 == '' ? rec1_data[i] : ',' + rec1_data[i];
		} 

		//获取buy sku串
		var sku_ids_rec5 = '';
		for (var i in rec5_data) 
		{		
			sku_ids_rec5 += sku_ids_rec5 == '' ? rec5_data[i] : ',' + rec5_data[i];
		} 
	var url = IMPORT_WWW_URL + 'apps/bfd_goods1.php?sku_ids_rec1=' + sku_ids_rec1 +'&rec1_req=' + rec1_req + '&sku_ids_rec5='+ sku_ids_rec5 + '&rec5_req=' +rec5_req;

	$.ajax(
	{
		async: true,
		type: 'get',
		url: url,
		dataType: 'jsonp',
		jsonp: 'jsoncallback',
		success: function(result)
		{	
			//初始化view
				var example1 = new window.bfdui.BFDBanner("rec_banner1", "看过本商品的麦友还看过", result.rec1);
				// 设置模板
				example1.setTemplate(document.getElementById("customTemplate").innerHTML);
				// 创建推荐栏
				example1.create();

				//初始化buy
				var example2 = new window.bfdui.BFDBanner("rec_banner2", "买过本商品的麦友还买过", result.rec5);
				// 设置模板
				example2.setTemplate(document.getElementById("customTemplate").innerHTML);
				// 创建推荐栏
				example2.create();
		}
	});
}
