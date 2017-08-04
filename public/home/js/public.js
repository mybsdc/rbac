; // 分号防止压缩合并时与上一个js代码冲突
$('.tpl-left-nav-item a').each(function(){ // 侧栏选中样式
	if (!$(this).hasClass('action') && $(this).attr('now') == 'home/' + controller + '/' + action) { // 判断是否当前方法
		$(this).addClass('active');
	} else {
		$(this).removeClass('active');
	}
});

// 跳至角色添加页面
$('#addRole').click(function(){
	window.location.href = '/home/role/setRole';
});

// 提交添加或编辑角色请求
$('#postRoleName').click(function(){
	var roleName = $('#roleName').val();
	var id = $('.am-form-group input[name="id"]').val();
	$.post('/home/role/setRole', {roleName: roleName, id: id}, function(data){
		if (data.code === 200) {
			$('#tip-h').html(data.tips);
			$('#isModal').modal();
			setTimeout(function() {
		        window.location.href = '/home/role/index';
		    }, 1000);
		} else if (data.code === -1) {
			$('#tip-h').html(data.tips);
			$('#isModal').modal();
		}
	});
});

// 跳至用户添加页面
$('#addUser').click(function(){
	window.location.href = '/home/user/setUser';
});

// 提交添加或编辑用户请求
$('#postUserInfo').click(function(){
	var postBtn = $(this);
	if (postBtn.hasClass('disabled')) { // 防止重复提交
		$('#tip-h').html('正在处理，请勿重复提交');
		$('#isModal').modal();
		return false;
	}
	postBtn.html('正在提交...');
	postBtn.addClass('disabled');

	/*var roleIdArray = [];
	$('.am-u-sm-9 input[name="roleIdArray[]"]').each(function(){
		if ($(this).prop('checked')) {
			roleIdArray.push($(this).val()); // 被选中的值push到数组roleIdArray中
		}
	});*/

	$.post('/home/user/setUser', $('#userInfoForm').serialize(), function(data){
		if (data.code === 200) {
			$('#tip-h').html(data.tips);
			$('#isModal').modal();
			setTimeout(function() {
		        window.location.href = '/home/user/index';
		    }, 1000);
		} else if (data.code === -1) {
			$('#tip-h').html(data.tips);
			$('#isModal').modal();
			postBtn.removeClass('disabled');
			postBtn.html('提交');
		}
	});
});

$('#addAccess').click(function(){
	window.location.href = '/home/access/setAccess';
});

// 提交添加或编辑权限请求
$('#postAccess').click(function(){
	var postBtn = $(this);
	if (postBtn.hasClass('disabled')) { // 防止重复提交
		$('#tip-h').html('正在处理，请勿重复提交');
		$('#isModal').modal();
		return false;
	}
	postBtn.html('正在提交...');
	postBtn.addClass('disabled');
	$.post('/home/access/setAccess', $('#accessForm').serialize(), function(data){
		if (data.code === 200) {
			$('#tip-h').html(data.tips);
			$('#isModal').modal();
			setTimeout(function() {
		        window.location.href = '/home/access/index';
		    }, 1000);
		} else if (data.code === -1) {
			$('#tip-h').html(data.tips);
			$('#isModal').modal();
			postBtn.removeClass('disabled');
			postBtn.html('提交');
		}
	});
});

// 提交为某角色设置权限的请求
$('#postRoleAccess').click(function(){
	var postBtn = $(this);
	if (postBtn.hasClass('disabled')) { // 防止重复提交
		$('#tip-h').html('正在处理，请勿重复提交');
		$('#isModal').modal();
		return false;
	}
	postBtn.html('正在提交...');
	postBtn.addClass('disabled');
	$.post('/home/role/setRoleAccess', $('#setRoleAccessForm').serialize(), function(data){
		if (data.code === 200) {
			$('#tip-h').html(data.tips);
			$('#isModal').modal();
			setTimeout(function() {
		        window.location.href = '/home/role/index';
		    }, 3000); // 这里显示的信息挺多的，多一些时间吧
		} else if (data.code === -1) {
			$('#tip-h').html(data.tips);
			$('#isModal').modal();
			postBtn.removeClass('disabled');
			postBtn.html('提交');
		}
	});
});

// 登录
$('#postLogin').click(function(){
	var email = $('#loginForm input[name="email"]').val();
	var pwd = $('#loginForm input[name="pwd"]').val();
	var postBtn = $(this);
	if (postBtn.hasClass('disabled')) { // 防止重复提交
		$('#tip-h').html('正在处理，请勿重复提交');
		$('#isModal').modal();
		return false;
	}
	postBtn.html('正在提交...');
	postBtn.addClass('disabled');
	$.post('/home/Login/doLogin', {email: email, pwd: pwd}, function(data){
		if (data.code === 200) {
			$('#tip-h').html(data.tips);
			$('#isModal').modal();
			setTimeout(function() {
		        window.location.href = '/home/index/index';
		    }, 1000); // 这里显示的信息挺多的，多一些时间吧
		} else if (data.code === -1) {
			$('#tip-h').html(data.tips);
			$('#isModal').modal();
			postBtn.removeClass('disabled');
			postBtn.html('提交');
		}
	});
	return false;
});