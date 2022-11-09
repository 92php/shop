/**
 * 商品详细页
 */
var goods = {};
goods.view = {
goods_sku : 0
};

/*初始化商品编号
 *
 */
goods.view.init = function(i_goods_sku)
{
	goods.view.goods_sku = i_goods_sku;
};

/*获取评论列表
 *
 */
goods.view.goods_comments_list = function(page)
{
	var page = empty(page) ? 1 : parseInt(page);
	var url = IMPORT_APPS_URL + "item/ajax/do/get_comments_list?goods_sku=" + goods.view.goods_sku + "&page=" + page;
	$.ajax(
	{
		async: true,
		type: 'get',
		url: url,
		dataType: 'jsonp',
		jsonp: 'jsoncallback',
		success: function(result)
		{	
			$('#js_goods_comment_list').empty();
			var render_html = '';
			$.each(result.data.comment_data, function(i, data)
			{	
				if (data.is_reply == 0)
				{
					$('#js_comments_reply').html('');
				}
				var html = $('#js_goods_comment_template').html();

				html = str_replace(':username:', data.username, html);
				html = str_replace(':add_time:',   data.add_time,   html);
				html = str_replace(':content:',       data.content,       html);
				html = str_replace(':star:',       data.star,       html);
				html = str_replace(':reply_time:',       data.reply_time, html);
				html = str_replace(':reply_content:',       data.reply_content, html);
				render_html += html;
			});
			$('#js_comment_pages').html(result.data.pages);
			$('#js_goods_comment_list').html(render_html);
			$('#js_goods_comment_list .comsstar_star').each(function()
			{
				$(this).attr("src", $(this).attr("_src"));
			});
			$(".procomments .dl_comment:odd").addClass("dl_comdb");
		}
	});
	return this;
};

goods.view.goods_consultations_list = function(page)
{
	var page = empty(page) ? 1 : parseInt(page);
	var url = IMPORT_APPS_URL + "item/ajax/do/get_consultations_list?goods_sku=" + goods.view.goods_sku + "&page=" + page;
	$.ajax(
	{
		async: true,
		type: 'get',
		url: url,
		dataType: 'jsonp',
		jsonp: 'jsoncallback',
		success: function(result)
		{	
			var render_html = '';
			$.each(result.data.consultations_data, function(i, data)
			{	
				if (data.is_reply == 0)
				{
					$('#js_goods_consultations_reply').html('');
				}
				var html = $('#js_goods_consultations_template').html();

				html = str_replace(':username:', data.username, html);
				html = str_replace(':add_time:',   data.add_time,   html);
				html = str_replace(':content:',       data.content,       html);
				html = str_replace(':reply_time:',       data.reply_time, html);
				html = str_replace(':reply_content:',       data.reply_content, html);
				render_html += html;
			});
			$('#js_consultations_pages').html(result.data.pages);
			$('#js_goods_consultations_list').html(render_html);
			$("#js_goods_consultations_list .dl_consult:odd").addClass("dl_comdb");

			if (result.errorcode != 0)
			{

			}

		}
	});
	return this;
};

//添加商品咨询
function add_goods_consultation(e)
{
	logged_in(function()
	{
		$.ajax(
		{
			url: IMPORT_APPS_URL+'item/ajax/do/add_consultation.html',
			data: $(e).serialize(),
			dataType: 'jsonp',
			jsonp: 'jsoncallback',
			success: function(result)
			{
				if(result.errorcode!=0){return errormessage(result.errormessage)}
				$('input[name!=goods_sku][name!=input_consultation_type],textarea', e).val('');
				return errormessage(result.errormessage);
			}
		});
	},
	function()
	{
		showLogin();
	});
	return false;
}

// 显示咨询
function show_consultation_type_answer(iType)
{
	$("#answer p").hide();
	if( iType || iType != 6 )
	{
		$("#answer" + iType).show();
	}
}