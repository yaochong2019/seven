<?php
/* *
 * 功能：支付宝报关接口接口调试入口页面
 * 版本：3.3
 * 日期：2012-07-23
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
	<title>支付宝报关接口接口</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
*{
	margin:0;
	padding:0;
}
ul,ol{
	list-style:none;
}
.title{
    color: #ADADAD;
    font-size: 14px;
    font-weight: bold;
    padding: 8px 16px 5px 10px;
}
.hidden{
	display:none;
}

.new-btn-login-sp{
	border:1px solid #D74C00;
	padding:1px;
	display:inline-block;
}

.new-btn-login{
    background-color: #ff8c00;
	color: #FFFFFF;
    font-weight: bold;
	border: medium none;
	width:82px;
	height:28px;
}
.new-btn-login:hover{
    background-color: #ffa300;
	width: 82px;
	color: #FFFFFF;
    font-weight: bold;
    height: 28px;
}
.bank-list{
	overflow:hidden;
	margin-top:5px;
}
.bank-list li{
	float:left;
	width:153px;
	margin-bottom:5px;
}

#main{
	width:750px;
	margin:0 auto;
	font-size:14px;
	font-family:'宋体';
}
#logo{
	background-color: transparent;
    background-image: url("images/new-btn-fixed.png");
    border: medium none;
	background-position:0 0;
	width:166px;
	height:35px;
    float:left;
}
.red-star{
	color:#f00;
	width:10px;
	display:inline-block;
}
.null-star{
	color:#fff;
}
.content{
	margin-top:5px;
}

.content dt{
	width:160px;
	display:inline-block;
	text-align:right;
	float:left;
	
}
.content dd{
	margin-left:100px;
	margin-bottom:5px;
}
#foot{
	margin-top:10px;
}
.foot-ul li {
	text-align:center;
}
.note-help {
    color: #999999;
    font-size: 12px;
    line-height: 130%;
    padding-left: 3px;
}

.cashier-nav {
    font-size: 14px;
    margin: 15px 0 10px;
    text-align: left;
    height:30px;
    border-bottom:solid 2px #CFD2D7;
}
.cashier-nav ol li {
    float: left;
}
.cashier-nav li.current {
    color: #AB4400;
    font-weight: bold;
}
.cashier-nav li.last {
    clear:right;
}
.alipay_link {
    text-align:right;
}
.alipay_link a:link{
    text-decoration:none;
    color:#8D8D8D;
}
.alipay_link a:visited{
    text-decoration:none;
    color:#8D8D8D;
}
</style>
</head>
<body text=#000000 bgColor=#ffffff leftMargin=0 topMargin=4>
	<div id="main">
		<div id="head">
            <dl class="alipay_link">
                <a target="_blank" href="http://www.alipay.com/"><span>支付宝首页</span></a>|
                <a target="_blank" href="https://b.alipay.com/home.htm"><span>商家服务</span></a>|
                <a target="_blank" href="http://help.alipay.com/support/index_sh.htm"><span>帮助中心</span></a>
            </dl>
            <span class="title">支付宝报关接口快速通道</span>
		</div>
        <div class="cashier-nav">
            <ol>
				<li class="current">1、确认信息 →</li>
				<li>2、点击确认 →</li>
				<li class="last">3、确认完成</li>
            </ol>
        </div>
        <form name="alipayment" action="alipayapi.php" method="post" target="_blank">
            <input type="hidden" name="WIDapi_type" value="acquire" />
            <div id="body" style="clear:left">
                <dl class="content">
					<table style='text-align:left' border='1' cellpadding='10' cellspacing='10'>
					<tr><td colspan=2>
					Debug information: The program already set
					  <ul>
					   <li>service = alipay.acquire.customs</li>
					   <li>partner = 2088131016888224</li>
					   <li>_input_charset = UTF-8</li>
					   <li>sign_type = MD5</li>
					   <li>sign = w7d6b......................4kj4c</li>
					  </ul> 
					</td></tr>
				    <tr>
                    <td><b>报关流水号</b> (WIDout_request_no) String(32)<br>yyyymmdd型8位日期拼接4位序列号。<br>Jh_order($order_sn)</td>
                    <td>
                        <span class="null-star">*</span>
                        <input size="30" name="WIDout_request_no" />
                        <span></span>
                    </td>
					</tr><tr /><tr>
                    <td><b>支付宝交易号</b> (WIDtrade_no) String(64)<br>该交易在支付宝系统中的交易流水号<br>Jh_order($transaction-id)</td>
                    <td>
                        <span class="null-star">*</span>
                        <input size="30" name="WIDtrade_no" />
                        <span></span>
                    </td>
					</tr><tr /><tr>
                    <td><b>商户海关备案编号</b> (WIDmerchant_customs_code) String(20)<br>商户在海关备案的编号。</td>
                    <td>
                        <span class="null-star">*</span>
                        <input size="30" name="WIDmerchant_customs_code" value="3302462801"/>
                        <span></span>
                    </td>
					</tr><tr /><tr>
                    <td><b>商户海关备案名称</b> (WIDmerchant_customs_name) String(256)<br>商户海关备案名称。</td>
                    <td>
                        <span class="null-star">*</span>
                        <input size="30" name="WIDmerchant_customs_name" value="浙江净会电子商务有限公司"/>
                        <span></span>
                    </td>
					</tr><tr /><tr>
                    <td><b>报关金额</b> (WIDamount) String(20)<br>报关金额，单位为人民币“元”，精确到小数点后2位。<br>交易累计的报关金额不得大于交易总金额。<br>Jh_order(goods_price)</td>
                    <td>
                        <span class="null-star">*</span>
                        <input size="30" name="WIDamount" />
                        <span></span>
                    </td>
					</tr><tr /><tr>
                    <td><b>海关编号</b> (WIDcustoms_place) String(20)<br><a href="https://docs.open.alipay.com/#s5">海关编号</a>，大小写均支持。</td>
                    <td>
                        <span class="null-star">*</span>
                        <input size="30" name="WIDcustoms_place" value="NINGBO"/>
                        <span></span>
                    </td>
					</tr><tr /><tr>
					<td>
					Click "Confirm" to call alipayapi.php to send the request to 'https://mapi.alipay.com/gateway.do?'<br>
					In alipayapi.php, it logs html_text and var_dump(doc) to c:/tmp/trace.log file
					</td>
                    <td>
                        <span class="new-btn-login-sp">
                            <button class="new-btn-login" type="submit" style="text-align:center;">确 认</button>
                        </span>
                    </td>
					</tr>
					</table>
                </dl>
            </div>
		</form>
        <div id="foot">
			<ul class="foot-ul">
				<li><font class="note-help">如果您点击“确认”按钮，即表示您同意该次的执行操作。 </font></li>
				<li>
					支付宝版权所有 2011-2015 ALIPAY.COM 
				</li>
			</ul>
		</div>
	</div>
</body>
</html>
