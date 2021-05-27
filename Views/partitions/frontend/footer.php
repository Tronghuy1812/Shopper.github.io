<footer >
    <div class="container">
        <div class="row-footer">
            <div class="item">
                <div class="title">
                HỖ TRỢ KHÁCH HÀNG
                </div>
                <ul>
                    <li><a href="">Hotline chăm sóc khách hàng: 1900-6035
                    (1000đ/phút , 8-21h kể cả T7, CN)/a></li>
                    <li><a href="">Các câu hỏi thường gặp/a></li>
                    <li><a href="">Hướng dẫn đặt hàng</a></li>
                    <li><a href="">Phương thức vận chuyển</a></li>
                    <li><a href="">Chính sách đổi trả</a></li>
                    <li><a href="">See All Help Topics</a></li>
                    <li><a href="">Hỗ trợ khách hàng: shopperTH@tiki.vn</a></li>
                </ul>
            </div>
            <div class="item">
                <div class="title">
                VỀ SHOPPER
                </div>
                <ul>
                    <li><a href="">Giới thiệu shopper</a></li>
                    <li><a href="">Tuyển Dụng</a></li>
                    <li><a href="">Chính sách bảo mật thanh toán</a></li>
                    <li><a href="">Điều khoản sử dụng</a></li>
                    <li><a href="">Bán hàng doanh nghiệp</a></li>
                </ul>
            </div>
            <div class="item">
                <div class="title">
                PHƯƠNG THỨC THANH TOÁN

                </div>
                <ul>
                    <li><a href=""><img class="icon" src="https://frontend.tikicdn.com/_desktop-next/static/img/footer/visa.svg" width="54" alt=""></a></li>
                    <li><a href=""><img class="icon" src="https://frontend.tikicdn.com/_desktop-next/static/img/footer/mastercard.svg" width="54" alt=""></a></li>
                    <li><a href=""> <img class="icon" src="https://frontend.tikicdn.com/_desktop-next/static/img/footer/jcb.svg" width="54" alt=""></a></li>
                </ul>
            </div>
            <div class="item">
                <div class="title">
                KẾT NỐI VỚI CHÚNG TÔI
                </div>
                <ul>
                    <li><a href="https://www.facebook.com/shopperdotcom"><img src="https://frontend.tikicdn.com/_desktop-next/static/img/footer/fb.svg" width="32" alt=""></a></li>
                    <li><a href="https://www.youtube.com/shopper">
                    <img src="https://frontend.tikicdn.com/_desktop-next/static/img/footer/youtube.svg" width="32" alt="">
                    </a></li>

                    <li>
                        <a href="https://stc.chat.zalo.me/">
                             <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/Zalo_logo_2019.svg/1024px-Zalo_logo_2019.svg.png" width="32" alt="" style="padding-bottom:10px;height: 24px;
    margin-left: 10px;">
                        </a>
                    </li>

                </ul>
            </div>
        </div>

    </div>

    <div class="copy">
        
        <p>
        @2021 - Shopper.net. All Right Reserved
    Theme GoodNews, nền tảng Php, VPS mua tại Tinohost
    DMCA.com Protection Status
        </p>
        <p>Design by Nguyễn Trọng Huy</p>
    </div>

    <div class="navbar-fixed-bottom float-right ">
        <a href="" class="btn btn-primary nutlen  ">
          <i class="fas fa-chevron-up" aria-hidden="true"></i>
        </a>
    </div>
</footer>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="./public/frontend/js/jquery-3.5.1.slim.js"></script>
<script>
    // garary ảnh
    $(document).ready(function () {
        $('a').click(function () {
            var largeImage = $(this).attr('data-full');
            $('.selected').removeClass();
            $(this).addClass('selected');
            $('.full img').hide();
            $('.full img').attr('src', largeImage);
            $('.full img').fadeIn();


        }); // closing the listening on a click
        $('.full img').on('click', function () {
            var modalImage = $(this).attr('src');
            $.fancybox.open(modalImage);
        });
    }); //closing our doc ready

    // backtotop
    $(()=>{
              $(window).scroll(function(){
            
                 if($(window).scrollTop()>300)
                 {
                    // $('.logo').addClass('chucam');
                    $('.nutlen').addClass('hienthi');
                 }
                 else{
                    //  $('.logo').removeClass('chucam');
                     $('.nutlen').removeClass('hienthi');
                 }
              })

            // xử lí click vào sẽ trượt về

            $('.nutlen').click(function(){
               $("html,body").animate( {scrollTop : 0} ,"slow");
               return false;
              //  do có thẻ a bị loại lại cần return 
            })
             
          })
    // login
        document.addEventListener("DOMContentLoaded",function(){
        var tg= document.getElementsByClassName('fa-user');
    
        var danhsach=document.getElementsByClassName('login');
        var tamgiac=tg[0];
        var danhsach=danhsach[0];
        

        // sử dụng hàm onclick và toggle cho tam giác
        tamgiac.onclick=function(){
            // this.classList.toggle('tamgiactrang')
            danhsach.classList.toggle('ra')
        }
    },false)
</script>
</body>
</html>