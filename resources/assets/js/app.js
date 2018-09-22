
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
  }
  var $subMenu = $(this).next(".dropdown-menu");
  $subMenu.toggleClass('show');


  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    $('.dropdown-submenu .show').removeClass("show");
  });


  return false;
});

var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#cmd').click(function () {
  document.getElementById("pdfContents").setAttribute('class','');
  window.print();
  document.getElementById("pdfContents").setAttribute('class','row box bordered justify-contents-center');
});

$('#cmd2').click(function () {

  window.print();

});

function printDev(el)
{

   document.getElementsByClassName('navbar')[0].setAttribute("style","display:none");
   window.print();

}

$("#printBtn").on('click', function(){
    document.getElementById("cmd").setAttribute("style","display:none");
    document.getElementById("back").setAttribute("style","display:none");
    document.getElementById("pdfContents").setAttribute("style","margin:0px");
   var el = document.getElementById("printThis");
   printDev(el);
});

function refreshEval()
{
  var full = $("#fullMark").html();
  var elements = document.getElementsByClassName('select');
  var length = elements.length;
  var sum = 0;
  var zero = false;
  var details = '{';

  for(var i = 0 ; i < length ; i++)
  {
     details += '"'+elements[i].getAttribute("class").split(" ")[1]+'":"'+elements[i].options[elements[i].selectedIndex].innerHTML+'",';

     sum += eval(elements[i].options[elements[i].selectedIndex].innerHTML) ;//&& eval(elements[i].options[elements[i].selectedIndex].innerHTML) === 0
     if(elements[i].getAttribute("class").split(" ")[0].localeCompare("man") == 0 && eval(elements[i].options[elements[i].selectedIndex].innerHTML) == 0)
       zero = true;
  }

  details = details.substring(0,details.length -1);
  details += "}";

   var result = (sum/full)* 100;
   if(!zero){
  $("#result").html(result.toPrecision(3) + "%");
  document.getElementById("result-s").setAttribute("value",result.toPrecision(3));
}
  else {
    $("#result").html("0%");
    document.getElementById("result-s").setAttribute("value",0);
  }
   document.getElementById("details").setAttribute("value",details);

}
refreshEval();
$(".select").on('change',function(){
   refreshEval();
});
