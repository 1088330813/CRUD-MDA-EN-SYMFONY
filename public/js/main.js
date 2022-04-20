const articles = document.getElementById('articles');

if(articles){
articles.addEventListener('click', (e)=>{
if(e.target.className === 'btn btn-danger'){
   if(confirm("¿Realmente deseas eliminar esta canción?")){
       const id = e.target.getAttribute('data-id');
      window.location.href = ("/curso-symfony/public/index.php/eliminar/"+id);
      //    fetch(`/eliminar/${id}`).then(res => window.location.reload());
    //   .then(res=> history.back())
   }
}
});
}
