$(document).ready(function() {
    $('#bookTable').DataTable();
} );
function changePic7back(){
    document.getElementById('topImage').style.transitionProperty = 'opacity';
    document.getElementById('topImage').style.opacity='0';
    document.getElementById('topImage').style.transitionDuration = '.5s';
}
// onload document.getElementById('topImage');