<?php
/*
  $Id: conditions.php,v 1.4 2002/11/19 01:48:08 dgw_ Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', '使用条件');
define('HEADING_TITLE', '使用条件');
                          //<p><b>Les mentions légales</b></p>
define('TEXT_INFORMATION', '
<p align="justify">  欢迎光临我们的网站 
'.STORE_NAME.' （以下是“网站”缩写）。我们竭力在网站上详细及时更新产品信息，对此我们保留权利随时纠正，恕不另行通知。 </p> 

<p align="justify"> '.STORE_NAME. ' 网站是由MERCURY CAPITAL所编
登记号码为5069891888223892.
 </p>

<p align="justify"> 个人有责付登陆费用拓展电脑资料，进入网站parfumreduc'.STORE_NAME.'</ p>

<p align="justify"> 一般销售条件确认后，首先建议通过网络购物的用户，明确成交产品双方的权力和义务.
没有认何限制，他们所选购的所有产品，包括礼券都在网站上提供。 </p>

<p align="justify"> 声明： '.STORE_NAME.' 没有依靠任何不准确和有漏洞息的第三方网站，这些网站有可能造成直接或间接的损坏，不管是什么后果，出于同样的原因造成的同样的后果. </p>

<p align="justify"> 本协议的宗旨，它是在 
'.STORE_NAME.' 用户将被统一定义为“双方”和“一方”，使用验证控件的用户被称为“用户”。其权力和义务适用于“用户”。 </p>

<p align="justify"> 用户可在网站上购买产品，并有完全的法律能力。 </p>
<p align="justify"> 网站上交易的任何产品或是优惠券要求协商和表达接受这些条款和条件，但是要通过用户亲手签名确认。 
按照现行法律和规定，该项律令由下面的3.3条审定.于双方约定,电子签名与手写签名具有效力,是证明整个秩序和到期付款依据.最后,当然,用户可以保存或打印销售条款.. </p>

<p align="justify"> 第一条.目的 </ P>
<p align="justify"> 总的销售条款旨在定义,由于特定关系,网络销售的各方所由于产品或是优惠券而产生的权力和义务都由网站赋予. </p>

<p align="justify"> 第二条.产品 </ P>
<p align="justify"> 根据消费者守则L.111-1条规定,用户可以在下单之前,浏览网站,通过点击要购买的产品了解产品的详细特性,图片,图型和产品描述,这些对于销售的卖方来说,是指示性的，不具约束力.如果供应商改变产品,图型显示,这不涉及卖方责任,亦不影响销售的有效性. </p>

<p align="justify"> 第三条.交易有效性的控制 </p>
<p align="justify"> 所有订单都视为无条件接受那些销售条款和条件.在操作最后一步会要求用户将这些条款有效化. </p>

<p align="justify"> 对于任何操作,用户可随意选购想要的品种和品牌 </p>
<p align="justify">它可将具体产品放入您的购物篮. 
"我的购物篮"里面的产品数量可以随时更改,您只需要在"更新"处点击修改数量即可. </p>
<p align="justify"> 然后,每单金额不能超过550欧元. </p> 
<p align="justify">  而且,一个卡号只能购买三次,累计金额不超过800欧元.如果有多个操作,每七天一个周期. </p>

<p align="justify"> 当订单完成,一份日志会呈现,用户须确认或是跟据需要作修改,日志还包括打折优惠券. </p>

<p align="justify"> 对于新老客户,都必须通过身份验证. </p>
<p align="justify"> 通过身份验证,用户就可以自行选择:产品的包装方式,给到礼品收件人的留言. </p>

<p align="justify"> 点击"下一步",用户可选择帐单地址和寄送. </p>
<p align="justify"> 当订单最终确定,用户确定接受全部信息,订单确定.在订单登记上面,详细的收据,电子票或确认订单会发送到用户邮箱,用户可再次核实金额,送货方式,产品价格,用户可打印出来. </p>
<p align="justify"> '.STORE_NAME.'亦要求用户在电脑上保留这张订单信息. </p>

<p align="justify"> '.STORE_NAME.' 保留撤消当时的欺诈交易的权力. </p>

<p align="justify"> 第四条.付款. </ P>
<p align="justify"> 网站上的产品销售价格在用户注册的时候就已议定是欧元.产品价格不包含运费,运费另计,总计在订单里面.运费之前在注册时就在我们店里已有通知. </p>

<p align="justify"> 用户帐单金额将由 '.STORE_NAME.' 发送邮件确认. </p>
<p align="justify"> 用户还可自行选择送货方式.而也可以是这样: </p>
<ul type="disc">
  <li>迅速地用信用卡(VISA卡,欧元卡/主卡).交易非常安全.不会在'.STORE_NAME.' , 网站上记录用户的信用卡信息.避免了黑客入侵'.STORE_NAME.' 网站而不会在网站服务器上储存客户信息. </li>

  <li>'.STORE_NAME.' 去支付订单一部分或是全部的金额.如果订单总金额少于礼品券的金额, 
  <a href="http://www.'.strtolower(STORE_NAME).'" target="_blank">www.'.strtolower(STORE_NAME).'</a> 
  不会返回差额.另外用户需在使用礼品券前检查其有效果期.过期订单照常操作处理. </li>
</ul>

<p align="justify">  <b> 重要事项:
信用卡支付金额必须大于1块. </b> </p>
<p align="justify"> 为确定信用卡的支付安全,客户需提交电子密码. </p>

<p align="justify"> 第五条.交货. </p>
<p align="justify"><a href="http://www.'.strtolower(STORE_NAME).'" target="_blank">www.'.strtolower(STORE_NAME).'</a>
预订您的订单送货到您选择的地址. </p>
<p align="justify"> 产品将在平均8-10个工作日内送达 </p>
<p align="justify"> 这些送货条款是指定性的. </p>
<p align="justify"> 用户的任何错误都会导致订单出现问题或是取消. </p>
<p align="justify"> 送货无人接收的情况下,用户或是收件人会收到一个通知,因个人原因导致送货未达,货物会在最近的邮局内宝存15天,以供提取. </p>

<p align="justify"> 用户必须核实送货人员及送货司机,并对包裹的包装情况和递送产品内容进行核实. </p>
<p align="justify"> '.STORE_NAME.' 声明,对于邮政服务或运输,或是核认订单或是罢工等不可抗拒力造成的送货推迟,我们不予责任.除开必须的,我们在31天内没有义务补偿.然而,用户接到满意确保或是四件产品以上的订单,客户不满意可退款 </p>

<p align="justify"> <i> <u> 还款条款: </u> </i> </p>
<p align="justify"> 还款将在60天内完成 </p>
<p align="justify"> <a name="0.2_6"> </a> 第六条.保留所有权 </p>
<p align="justify"> '.STORE_NAME.' 在客户付全款前保留产品的所有权,包括本金,费用和税金. </p>
<p align="justify"> <a name="0.2_7"> </a> 第七条.责任 </ P>
<p align="justify"> '.STORE_NAME.' 不承担由于产品短缺或因不可以抗力造成的邮政服务和运输部分或全部中断及罢工所造成的责任. </p>
<p align="justify"> '.STORE_NAME.' 不对由商品交易产生的破损负责 </p>

<p align="justify"> '.STORE_NAME.' 不对任何资料和文件的丢失负责,用户应自行确保及稳妥. </p>
<p align="justify"> <a name="0.2_8"> </a> 第八条.误差-无效 </ P>
<p align="justify">没有任何隐性的变化和差异可以从 '.STORE_NAME.' 扣除,这些变化和差异条款和条件的频率很小或持续时间很短. '.STORE_NAME.' 始终保留对可能被宣告无效的一些法规,规章或法院的最终宣判有最终的决定权,其它方面保持充分完全有效. </p>
<p align="justify"> <a name="0.2_9"> </a> 第九条.知识产权法 </ P>

<p align="justify"> 这个网站和商标，设计，标志，设计，绘图...及编制和格式都属于 '.STORE_NAME.'. 所有.用户禁止通过各种形式部分或全部散布或是仿造网站. </p>
<p align="justify"> <a name="0.2_10"> </a> 第十条.电脑和自由 </ P>
<p align="justify"> 用户由 
'.STORE_NAME.' 订单收集的个人资料和信息有一个良好的发货,运输和发票管理. </p>
<p align="justify"> '.STORE_NAME.' 仍仍然保留了用户资料的商业使用权.如果用户在注册时:"订阅 '.STORE_NAME.' . 通讯,否则被视作放弃. </p>
<p align="justify"> 最后,很明确的是当用户浏览网站时,cookies会进入电脑里面. </p>
<p align="justify"> 一个旨在记录有关用户的导航信息的cookies,并允许在本网站更容易地重新连接,避名了之前要求完成某些项目的cookies. </ P>
<p align="justify"> 您的网络配置允许你拒绝这些cookies. </p>

<p align="justify"> <a name="0.2_11"> </a> 十一条.有关立法和司法管辖分权. </p>
<p align="justify"> 该合同是授于欧洲和美国法律的.
该合同是受欧洲和美国法律。任何纠纷的解释，性能或违反合同之间'. STORE_NAME.' 和用户将是，即使在和多个被告的案件在达成协议的情况下，在日内瓦法院专属管辖. 
</p>
<p align="justify"> <a name="0.2_12"> </a> 十二条.更改销售条件 </p>
<p align="justify"> 尽可能升级网站 '. STORE_NAME.' 保留随时修改销售条款和条件的权力.新的销售大纲将在网站上公布,客户核实这里销售的条件，促进修改后的新订单. ');
?>
