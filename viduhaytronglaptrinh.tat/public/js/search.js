search_active(1);
function search_(){
  var keyword = document.getElementById('keyword').value;
  if(keyword == ''){
    alert('Vui lòng nhập từ khoá!');
    return false;
  }
  window.location.href = './Search/'+keyword;
}
function search_active(num){
  if(num == 1){
    document.getElementById('search-post').style.display = 'block';
    document.getElementById('search-topic').style.display = 'none';
    document.getElementById('search-question').style.display = 'none';
    document.getElementById('btn__search-post').style.backgroundColor = 'white';
    document.getElementById('btn__search-topic').style.backgroundColor = '#c3c9c9';
    document.getElementById('btn__search-question').style.backgroundColor = '#c3c9c9';
  }
  if(num == 2){

    document.getElementById('search-post').style.display = 'none';
    document.getElementById('search-topic').style.display = 'block';
    document.getElementById('search-question').style.display = 'none';
    document.getElementById('btn__search-post').style.backgroundColor = '#c3c9c9';
    document.getElementById('btn__search-topic').style.backgroundColor = 'white';
    document.getElementById('btn__search-question').style.backgroundColor = '#c3c9c9';
  }
  if(num == 3){
    
    document.getElementById('search-post').style.display = 'none';
    document.getElementById('search-topic').style.display = 'none';
    document.getElementById('search-question').style.display = 'block';
    document.getElementById('btn__search-post').style.backgroundColor = '#c3c9c9';
    document.getElementById('btn__search-topic').style.backgroundColor = '#c3c9c9';
    document.getElementById('btn__search-question').style.backgroundColor = 'white';
  }
}
function active_s(id1, id2){
}