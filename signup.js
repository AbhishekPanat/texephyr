document.getElementById('clg-name').style.display = 'none';
document.getElementById('statey').style.display = 'none';
document.getElementById('info1').style.display = 'none';
document.getElementById('clg-id').style.display = 'none';

function clgCheck() {
  if (document.getElementById('clg').checked) {
    document.getElementById('clg-name').style.display = 'none';
    document.getElementById('statey').style.display = 'none'
    document.getElementById('info1').style.display = 'block';
    document.getElementById('clg-id').style.display = 'block';
  } else {
    document.getElementById('clg-name').style.display = 'block';
    document.getElementById('statey').style.display = 'block'
    document.getElementById('info1').style.display = 'block';
    document.getElementById('clg-id').style.display = 'block';
  }
}
