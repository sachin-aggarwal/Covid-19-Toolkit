const speech = window.SpeechRecognition || window.webkitSpeechRecognition;

function readOutLoud(){
    
    var msg = document.getElementById('message').value;
    const speech = new SpeechSynthesisUtterance();
    speech.text = msg;
    speech.volume = 1;

    window.speechSynthesis.speak(speech);
}