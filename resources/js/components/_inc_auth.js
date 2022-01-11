// import("toastr")
import * as Toastr from 'toastr';
// Chạy npm run watch trước khi code
var Auth = {
    init : function ()
    {
        //gọi hàm
        this.postLogin()
        this.runToken()
        this.postRegister()
        this.showMessagesLogin()
    },
    runToken()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    },
    // npm i toastr
    showMessagesLogin()
    {
        $(".js-login-message").click(function (event){
            event.preventDefault()
            Toastr.warning('Đăng nhập để thực hiện tính năng này')
            return
        })
    },

    postRegister()
    {
        $('.js-register').click(function (event){
            event.preventDefault()
            let $form = $("#formRegister");
            var formData = $form.serialize();
            $.ajax({
                url:$form.attr('action'),
                type:'POST',
                data:formData,
                success:function(data){
                    //Nếu kiểu dữ liệu data là xác định thì tiến hành reload
                    if (typeof data.email !== "undefined")
                    {
                        location.reload();
                    }
                },
                error: function (response) {
                        // Nếu không nhập dữ liệu sẽ hiện thị thông báo lỗi
                        if( response.status === 422 ) {
                            $.each(response.responseJSON.errors,function(field_name,error){
                                $(document).find('[name='+field_name+']').parent().after('<span class="text-error">' +error+ '</span>')
                            })
                        }
                }
            });
        })
    },
    postLogin()
    {
        $(".js-login").click(function (event){
            event.preventDefault()
            let $formLogin = $("#formLogin");
            var formData = $formLogin.serialize();
            $.ajax({
                url:$formLogin.attr('action'),
                type:'POST',
                data:formData,
                success:function(response){
                    if(response.status === 200)
                    {
                        location.reload();
                    }
                },
                error: function (response) {
                    if( response.status === 422 ) {
                        $.each(response.responseJSON.errors,function(field_name,error){
                            $(document).find('[name='+field_name+']').parent().after('<span class="text-error">' +error+ '</span>')
                        })
                    }
                }
            });
        })
    }


}

export default Auth
