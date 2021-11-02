
var dict = new Object;
var dict = {
    'slide':'content',
    'slideBack':'content',
    'slide-1':'content-1',
    'slideBack-1':'content-1',
    'slide-2':'content-2',
    'slideBack-2':'content-2',
}
var slide = ['slide','slide-1','slide-2']

function get_IDclicked(clicked_id) {
    var button = document.getElementById(clicked_id);
    button.onclick = function () {
        var container = document.getElementById(dict[clicked_id])
        if (slide.includes(clicked_id)) {
            sideScroll(container,'right',25,100,100);
        } else {
            sideScroll(container,'left',25,100,100);
        }
    }
}

function sideScroll(element, direction, speed, distance, step) {
    scrollAmount = 0;
    var SlideTimer = setInterval(function() {
        if (direction == "left") {
            element.scrollLeft -= step;
        } else {
            element.scrollLeft += step;
        }
        scrollAmount += step;
        if (scrollAmount >= distance) {
            window.clearInterval(SlideTimer);
        }
      },speed);
}

function getIDCategory(clicked_id) {
    var path="/preview/Home/ProductByCategory/Product/"
    path = path.concat(clicked_id);
    location.href=path;
}

function getSRCimg(one_click) {
    var Symbol = "#";
    var one_click = Symbol.concat(one_click, " .image")
    $(document).ready(function(){
        src_img = $(one_click).attr("src");
        $("#image-show").attr("src",src_img);
        // alert(one_click)
    })
}

function GotoItemInfor(id=null) {
    var path = "/preview/Home/ProductByItem/Product/";
    if (id !== null) {
        path = path.concat(id);
    } 
    location.href=path;
}

function GotoBuyItem() {
    var url = location.protocol + '//' + location.host + location.pathname;
    url = url.split("/");
    url = url[url.length-2]+"/"+url[url.length-1];
    // alert(url);
    location.href= '/preview/Order/BuyItem/BuyItem/'+url;
}

function GotoAddtoCart() {
    var url = location.protocol + '//' + location.host + location.pathname;
    url = url.split("/");
    location.href = '/preview/Order/AddtoCart/AddtoCart';
}

function Redirect() {
    var param = document.getElementById('search').value;
    var url = "/preview/Home/Search/";
    if (param !== null) {
        location.href = url.concat(param); 
    } else {
        alert("Not Param");
    }
}

function GetValueSortProduct() {
    var Rvalue1 = document.getElementById('Regular1').value;
    var Rvalue2 = document.getElementById('Regular2').value;
    var param = '?a='.concat(Rvalue1, '&b=',Rvalue2);
    // alert(Rvalue1)
    // alert(Rvalue2)
    var url = location.protocol + '//' + location.host + location.pathname+param;
    // alert(url);
    location.href = url;
}