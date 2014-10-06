<!--{template header}-->
<!--{if !empty($_SGLOBAL[inajax])}-->
<!--{else}-->
<style>

#mainareafg {
    border-left: 1px solid #dcdcdc;
    min-height: 970px;
    padding-left: 20px;
}

#search_vertical {
    margin-left: 0px;
}

.doing_list .avatar48 {
    margin-right: 8px;
}

.avatar48 img {
    width: 64px;
    height: 64px;
}

.sub_doing {
    border: 1px solid #dcdcdc;
    border-radius: 5px;
}

.sub_doing .comment_last {
    border-bottom: none;
}

.special-doing {
    width: auto;
}

.doing_list .avatar48 img {
    border: 2px solid rgb(255, 255, 255);
    box-shadow: 3px 5px 4px -2px rgb(220, 220, 220);
}
</style>
<div id="search_vertical" class="tabs_header">
	<ul class="tabs">
        <li><a href="space.php?query={$_GET['query']}&do=search&type=user"><span>好友</span></a></li>
        <li class="active"><a href="#"><span>足迹</span></a></li>
        <li><a href="space.php?query={$_GET['query']}&do=search&type=blog"><span>日志</span></a></li>
        <li><a href="space.php?query={$_GET['query']}&do=search&type=album"><span>相册</span></a></li>
        <li><a href="space.php?query={$_GET['query']}&do=search&type=poll"><span>投票</span></a></li>
        <li><a href="space.php?query={$_GET['query']}&do=search&type=event"><span>活动</span></a></li>
        <li><a href="space.php?query={$_GET['query']}&do=search&type=mtag"><span>群组</span></a></li>
    </ul>
</div>
<div class="doing_list" style="width: 700px;">
<!--{if $dolist}-->
<div style="padding: 0px; color: gray;">共找到{$all_item_count}个相关的诉求</div>
    <ol>
    <!--{loop $dolist $key $dv}-->
    <!--{eval $doid = $dv[doid];}-->
        <li id="dl{$doid}" class="clearfix"
            <!--{if $key == count($dolist) - 1}-->
            style="border-bottom: 1px solid #fff;"
            <!--{/if}-->>
            <div class="avatar48" style="float:left;width: 64px; height: 64px;">
                <a href="space.php?uid=$dv[uid]"><!--{avatar($dv[uid], big)}--></a>
            </div>
            <div class="special-doing" style="margin: 0px;">
                <div class="doingcontent" style="padding: 5px 0px">
                    <p style="min-height: 30px;">
                        <a href="space.php?uid=$dv[uid]">{$_SN[$dv[uid]]}</a>:
                        <span>$dv[message]</span>
                    </p>
                    <div class="clearfix" style="margin-left: 72px;">
                        <div class="pull-left">
                            <span style="color: gray">
                                (<!--{date('m-d H:i',$dv[dateline],1)}-->)
                            </span>
                        </div>
                        <div class="pull-right">
                            <!--{if $dv[uid]==$_SGLOBAL[supe_uid]}-->
                            <a href="cp.php?ac=doing&op=delete&doid=$doid&id=$dv[id]" 
                                id="doing_delete_{$doid}_{$dv[id]}" 
                                onclick="ajaxmenu(event, this.id)">删除</a> &nbsp;
                            <!--{/if}-->
                            <a href="space.php?uid=3&do=complain&doid=$doid">回复</a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    <!--{/loop}-->
    </ol>
    <div class="page" style="margin: 0px 0px 10px;">$multi</div>

<!--{else}-->
    <p style="text-align: center; color: gray; margin-top: 75px;">
		<img src="image/icons/no_status.png">
		<br>
		还没有相关的诉求
	</p>
<!--{/if}-->
</div>

<!--{/if}-->
<!--{template footer}-->
