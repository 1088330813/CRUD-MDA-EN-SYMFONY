const articles = document.getElementById('articles');

if(table){
table.addEventListener('click', (e)=>{
if(e.target.className === "btn btn-danger"){
   if(confirm("¿Realmente deseas eliminar esta canción?")){
       const id = e.target.getAttribute('data-id');

   fetch(`/eliminar/${id}`).then(res => window.location.reload());
   }
}
});
}
