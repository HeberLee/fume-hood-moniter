$(function () {
  /* 点击“登录”按钮 */
  $("#loginButton").on('click', function (event) {
    event.preventDefault();
    if ($("#username").val() == "" || $("#password").val() == "") {
      alert("不能为空")
    } else {
      $.ajax({
        type: "post",
        url: "", //登录链接
        data: {
          username: $("#username").val(),
          passwaord: $("#password").val()
        },
        success: function (data) {
          console.log("登录成功");
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
          console.log("登录失败");
          /* 如果输入不正确，则显示错误信息 */
          $(".warning-info").show();
        }
      });
    }
  });

  // 前往注册按钮
  // $('.goReg').on('click', function (event) {
  //   event.preventDefault();
  //   location.pathname = "./regzl.html";
  // })
});