const btn = document.getElementById("talk");
const content = document.getElementById("content");

const speech = window.SpeechRecognition || window.webkitSpeechRecognition;

const recoginition = new speech();

recoginition.onstart = function(){

    content.innerHTML = "Speak to add text";
}

recoginition.onresult = function(event){

    const current = event.resultIndex;

    const transcript = event.results[current][0].transcript;

    content.textContent = transcript;
}
/* 
navigator.mediaDevices.getUserMedia({ audio: true })
  .then(stream => {
    const mediaRecorder = new MediaRecorder(stream);
    mediaRecorder.start();

    const audioChunks = [];
    mediaRecorder.addEventListener("dataavailable", event => {
      audioChunks.push(event.data);
    });

    mediaRecorder.addEventListener("stop", () => {
      const audioBlob = new Blob(audioChunks);
      const audioUrl = URL.createObjectURL(audioBlob);
      const audio = new Audio(audioUrl);
      audio.play();
    });

    setTimeout(() => {
      mediaRecorder.stop();
    }, 3000);
  }); */

btn.addEventListener('click',()=>{
    recoginition.start();
});


