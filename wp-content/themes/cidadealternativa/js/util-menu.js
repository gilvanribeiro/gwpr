menu();
var numeroUL = $('ul').length;
menu(numeroUL);

barra();
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

function barra(){
    var ul= $('article ul');

        console.log($(ul[0]).removeClass('sub-menu-'+(1)));
        console.log($(ul[1]).removeClass('sub-menu-'+(2)));
        console.log($(ul[2]).removeClass('sub-menu-'+(3)));


}