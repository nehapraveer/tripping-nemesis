function logoCanvas() {
    var c = document.getElementById("logo");
    var ctx = c.getContext("2d");
    var width = 70, height = 70;
    ctx.beginPath();
    ctx.arc(width/2,height/2,width/2.5,0,2*Math.PI);
    var gradient=ctx.createLinearGradient(0,0,170,0);
    gradient.addColorStop("0","red");
    gradient.addColorStop("0.15","orange");
    gradient.addColorStop("0.25","yellow");
    gradient.addColorStop("0.75","green");
    ctx.strokeStyle=gradient;
    ctx.lineWidth=3;
    ctx.font="bold 20px sans-serif";
    ctx.fillStyle = "red";
    ctx.fillText("W",21,42);
    ctx.fillStyle = "orange";
    ctx.fillText(" E",36,42);
    ctx.stroke();
}

$(document).ready(function() {
  logoCanvas();
  $('#datetimepicker1').datetimepicker({
    language: 'en'
  });
});