//Get the modal
var modal1 = document.getElementById("galleryModal1");
var modal2 = document.getElementById("galleryModal2");
var modal3 = document.getElementById("galleryModal3");
var modal4 = document.getElementById("galleryModal4");
var modal5 = document.getElementById("galleryModal5");
var modal6 = document.getElementById("galleryModal6");
var modal7 = document.getElementById("galleryModal7");
var modal8 = document.getElementById("galleryModal8");
var modal9 = document.getElementById("galleryModal9");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var button1 = document.getElementById("button01");
var button2 = document.getElementById("button02");
var button3 = document.getElementById("button03");
var button4 = document.getElementById("button04");
var button5 = document.getElementById("button05");
var button6 = document.getElementById("button06");
var button7 = document.getElementById("button07");
var button8 = document.getElementById("button08");
var button9 = document.getElementById("button09");

var modalImg1 = document.getElementById("img1");
var modalImg2 = document.getElementById("img2");
var modalImg3 = document.getElementById("img3");
var modalImg4 = document.getElementById("img4");
var modalImg5 = document.getElementById("img5");
var modalImg6 = document.getElementById("img6");
var modalImg7 = document.getElementById("img7");
var modalImg8 = document.getElementById("img8");
var modalImg9 = document.getElementById("img9");

var captionText1 = document.getElementById("caption1");
var captionText2 = document.getElementById("caption2");
var captionText3 = document.getElementById("caption3");
var captionText4 = document.getElementById("caption4");
var captionText5 = document.getElementById("caption5");
var captionText6 = document.getElementById("caption6");
var captionText7 = document.getElementById("caption7");
var captionText8 = document.getElementById("caption8");
var captionText9 = document.getElementById("caption9");

var wrapper = document.getElementById("wrapper1");

button1.onclick = function() {
    wrapper.classList.add("active");
    modal1.style.display = "block";
    modalImg1.src = document.getElementById("img01").src;
    captionText1.innerHTML = document.getElementById("img01").alt;
}

button2.onclick = function() {
    wrapper.classList.add("active");
    modal2.style.display = "block";
    modalImg2.src = document.getElementById("img02").src;
    captionText2.innerHTML = document.getElementById("img02").alt;
}

button3.onclick = function() {
    wrapper.classList.add("active");
    modal3.style.display = "block";
    modalImg3.src = document.getElementById("img03").src;
    captionText3.innerHTML = document.getElementById("img03").alt;
}

button4.onclick = function() {
    wrapper.classList.add("active");
    modal4.style.display = "block";
    modalImg4.src = document.getElementById("img04").src;
    captionText4.innerHTML = document.getElementById("img04").alt;
}

button5.onclick = function() {
    wrapper.classList.add("active");
    modal5.style.display = "block";
    modalImg5.src = document.getElementById("img05").src;
    captionText5.innerHTML = document.getElementById("img05").alt;
}

button6.onclick = function() {
    wrapper.classList.add("active");
    modal6.style.display = "block";
    modalImg6.src = document.getElementById("img06").src;
    captionText6.innerHTML = document.getElementById("img06").alt;
}

button7.onclick = function() {
    wrapper.classList.add("active");
    modal7.style.display = "block";
    modalImg7.src = document.getElementById("img07").src;
    captionText7.innerHTML = document.getElementById("img07").alt;
}

button8.onclick = function() {
    wrapper.classList.add("active");
    modal8.style.display = "block";
    modalImg8.src = document.getElementById("img08").src;
    captionText8.innerHTML = document.getElementById("img08").alt;
}

button9.onclick = function() {
    wrapper.classList.add("active");
    modal9.style.display = "block";
    modalImg9.src = document.getElementById("img09").src;
    captionText9.innerHTML = document.getElementById("img09").alt;
}

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close")[1];
var span3 = document.getElementsByClassName("close")[2];
var span4 = document.getElementsByClassName("close")[3];
var span5 = document.getElementsByClassName("close")[4];
var span6 = document.getElementsByClassName("close")[5];
var span7 = document.getElementsByClassName("close")[6];
var span8 = document.getElementsByClassName("close")[7];
var span9 = document.getElementsByClassName("close")[8];

// When the user clicks on <span> (x), close the modal
span1.onclick = function() { 
    modal1.style.display = "none";
    wrapper.classList.remove("active");
}

span2.onclick = function() { 
    modal2.style.display = "none";
    wrapper.classList.remove("active");
}

span3.onclick = function() {
    wrapper.classList.remove("active"); 
    modal3.style.display = "none";
}

span4.onclick = function() { 
    wrapper.classList.remove("active"); 
    modal4.style.display = "none";
}

span5.onclick = function() { 
    wrapper.classList.remove("active"); 
    modal5.style.display = "none";
}

span6.onclick = function() { 
    wrapper.classList.remove("active"); 
    modal6.style.display = "none";
}

span7.onclick = function() { 
    wrapper.classList.remove("active"); 
    modal7.style.display = "none";
}

span8.onclick = function() { 
    wrapper.classList.remove("active"); 
    modal8.style.display = "none";
}

span9.onclick = function() { 
    wrapper.classList.remove("active"); 
    modal9.style.display = "none";
}