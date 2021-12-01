// Confirmation avant suppression d'un post

document.querySelector('#suppr').addEventListener('onsubmit', function(){
  let result = window.confirm('Êtes-vous sûr de vouloir supprimer ce post ?');
  if (result = true){
    return true;
  }
  else {
    return false;
  }
});
