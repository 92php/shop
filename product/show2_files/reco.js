var wly_server = "http://reco.wolongyun.com/";
var wly_rjs_server = "http://reco.wolongyun.com/rjs";
var wly_sid = "";
var wly_reco_divid = "";

function wly_generate_html(recores) {
    wly_sid = recores.sid;
    var html = $(wly_html_template);
    var items_parent = html.find(".wly_items");
    for (var index = 0; index < recores.items.length-1 && index < wly_max_show_item;
         ++index) {
        var imgurl = recores.items[index].imgurl;
        var pid = recores.items[index].pid;
        var title = '￥' + recores.items[index].price;
        var itemnode = $(wly_html_item_template);
        itemnode.find("a").each(function() {
                $(this).attr("href",  pid);
                $(this).attr("wly_rank", index);
            });

        itemnode.find(".wly_title").each(function() {
                $(this).append(title);
            });

        itemnode.find(".wly_img").each(function(){
                $(this).attr("src", imgurl);
            });
        var tmp = itemnode.html();
        html.find(".wly_items").each(function(){
                $(this).append(itemnode);
            });
        tmp = html.html();
    }

    return html.html();
}

function wly_show_reco_result(divid, xmldata) {
    var html = wly_generate_html(xmldata);
    $("#" + divid).append(html);
}

function wly_handle_reco_data(json_data) {
    if (null != json_data && json_data.items.length > 1) {
        wly_show_reco_result(wly_reco_divid, json_data);        
    }
}

function wly_send_request() {
    var request_url = wly_rjs_server + "?website=" + location.hostname;
    $.getScript(request_url);
}

function wly_reco(divid) {
    try {
        wly_reco_divid = divid;
        wly_send_request();
    } catch(e) {
    } finally {	
    }    
}