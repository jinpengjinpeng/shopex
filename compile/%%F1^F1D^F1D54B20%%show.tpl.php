<?php /* Smarty version 2.6.26, created on 2013-12-16 15:17:34
         compiled from admin/order/show.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线商城后台管理</title>
<link rel="stylesheet" type="text/css" href="view/admin/style/basic.css" />
<link rel="stylesheet" type="text/css" href="view/admin/style/order.css" />
</head>
<body>

<h2>订单 -- 订单列表</h2>

<div id="list">
	<table>
		<tr><th>订单号</th><th>下单时间</th><th>总金额</th><th>订单状态</th><th>操作</th></tr>
		<?php $_from = $this->_tpl_vars['AllOrder']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
		<tr><td><a href="?a=order&m=update&id=<?php echo $this->_tpl_vars['value']->id; ?>
"><?php echo $this->_tpl_vars['value']->ordernum; ?>
</td><td><?php echo $this->_tpl_vars['value']->date; ?>
</td><td><?php echo $this->_tpl_vars['value']->price; ?>
</td><td>
		<?php if ($this->_tpl_vars['value']->order_state == '已取消'): ?>
			<span class="red">已取消</span>
		<?php else: ?>
			<?php if ($this->_tpl_vars['value']->refund == 1): ?>
				<span style="color:#666;">申请退款中</span>
			<?php else: ?>
				<?php if ($this->_tpl_vars['value']->refund == 2): ?>
					<span class="green">退款成功</span>
				<?php else: ?>
					<?php if ($this->_tpl_vars['value']->order_delivery == '已发货'): ?>
						<span class="green">已发货，等待收货</span>
					<?php else: ?>
						<?php if ($this->_tpl_vars['value']->order_delivery == '已配货'): ?>
							<span class="green">已配货，等待发货</span>
						<?php else: ?>
							<?php if ($this->_tpl_vars['value']->order_pay == '已付款'): ?>
								<span class="green">已付款，等待配货</span>
							<?php else: ?>
								<?php if ($this->_tpl_vars['value']->order_state == '已确认'): ?>
									<span class="green">已确认，等待付款</span>
								<?php else: ?>
									<span style="color:#666;">未确认</span>
								<?php endif; ?>
							<?php endif; ?>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
		<?php endif; ?>
		</td><td><a href="?a=order&m=update&id=<?php echo $this->_tpl_vars['value']->id; ?>
"><img src="view/admin/images/edit.gif" alt="编辑" title="编辑" /></a> <a href="?a=order&m=delete&id=<?php echo $this->_tpl_vars['value']->id; ?>
" onclick="return confirm('你真的要删除这条订单吗？') ? true : false"><img src="view/admin/images/drop.gif" alt="删除" title="删除" /></a></td></tr>
		<?php endforeach; else: ?>
		<tr><td colspan="5">没有订单</td></tr>
		<?php endif; unset($_from); ?>
	</table>
</div>
<div id="page"><?php echo $this->_tpl_vars['page']; ?>
 <input style="cursor:pointer;" onclick="javascript:location.href='?a=order&m=clear'" type="button" value="清理24小时未确认的订单" /></div>

</body>
</html>