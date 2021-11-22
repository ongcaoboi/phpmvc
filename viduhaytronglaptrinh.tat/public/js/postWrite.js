$(document).ready(function(){
  $('#cancer').on("click", function (){
    window.location.href = '/Post'
  });
  const element = document.querySelectorAll('.btn-w');

  element.forEach(element => {
    element.addEventListener('click', function(){
      let command = element.dataset['element'];
      console.log(command);
      document.execCommand(command, false, 'dsfgjsdhfgjsd');
    });
  });
});