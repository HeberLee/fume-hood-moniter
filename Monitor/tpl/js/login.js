/**
 * Created by Psilo 2017年8月10日
 * @loginBtn 登录按钮
 * @mask 登录框后方遮罩
 * @login 登录框
 */
(function () {
  var loginBtn = document.getElementById('loginBtn');
  var mask = document.createElement('div');
  var login = document.createElement('div');

  // 渲染登录界面
  function openLogin() {
    // 页面宽度高度
    var sHeight = document.documentElement.scrollHeight;
    var sWidth = document.documentElement.scrollWidth;

    // 浏览器高度
    var cHeight = document.documentElement.clientHeight;

    login.innerHTML = '<div class="modal-title"><h2 class="text-center">登录</h2></div>' +
      '<div class="modal-body"><form class="form-group" action="">' +
      '<div class="form-group"><label for="">用户名</label><input class=' +
      '"form-control" type="text" placeholder=""></div><div class="form-' +
      'group"><label for="">密码</label><input class="form-control" type="' +
      'password" placeholder=""></div><div class="text-right"><button class=' +
      '"btn btn-primary" type="submit">登录</button><button class="btn btn-danger" ' +
      'data-dismiss="modal">取消</button> </div></form></div>';

    mask.className = 'mask';
    mask.style.height = sHeight + 'px';
    mask.style.width = sWidth + 'px';
    login.className = 'login';
    document.body.appendChild(login);
    document.body.appendChild(mask);

    // 登录框高度宽度
    var loginHeight = login.offsetHeight;
    var loginWidth = login.offsetWidth;
    // 登录框居中
    login.style.top = (cHeight - loginHeight) / 2 + 'px';
    login.style.left = (sWidth - loginWidth) / 2 + 'px';
  }

  // 登录按钮点击
  loginBtn.onclick = function () {
    openLogin();
  };

  // 遮罩点击
  mask.onclick = function () {
    document.body.removeChild(mask);
    document.body.removeChild(login);
  };

  // 浏览器变化时登录框保持居中
  window.onresize = function () {
    var sWidth = document.documentElement.scrollWidth;
    var sWidth = document.documentElement.scrollWidth;

    var cHeight = document.documentElement.clientHeight;

    var loginHeight = login.offsetHeight;
    var loginWidth = login.offsetWidth;
    login.style.top = (cHeight - loginHeight) / 2 + 'px';
    login.style.left = (sWidth - loginWidth) / 2 + 'px';
    mask.style.width = sWidth + 'px';
  }
})();