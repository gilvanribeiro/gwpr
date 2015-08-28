menu();
var numeroUL = $('ul').length;
menu(numeroUL);
function menu(numeroUl){
    var ul = $('ul');
    for(var i=1; i < numeroUl;i++){
        if(i <=3){
            console.log($(ul[i]).addClass('sub-menu-' + (i)));
        }else if(i <= 6) {
            console.log($(ul[i]).addClass('sub-menu-' + (i-3)));
        }else if(i <= 9){
            console.log($(ul[i]).addClass('sub-menu-' + (i-6)));
        }else if(i <= 12){
            console.log($(ul[i]).addClass('sub-menu-' + (i-9)));
        }else if(i <=15){
            console.log($(ul[i]).addClass('sub-menu-' + (i-12)));
        }
    }
}