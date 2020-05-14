
this.onmessage = function (e) {
  console.log('worker started')
  if(e.data.isFunction){
    if(typeof e.data.handler === "string"){
      this[e.data.handler]();
    }
  }
}

const video = document.querySelector('video')
const progress = document.querySelector('progress')

function startRecording(){
navigator.getUserMedia({video:{}},stream => video.srcObject = stream,err=>console.log(err));
}

function setup(){
Promise.all([
  faceapi.loadSsdMobilenetv1Model(MODEL_URL),
  faceapi.loadFaceLandmarkModel(MODEL_URL),
  faceapi.loadFaceRecognitionModel(MODEL_URL),
]).then(()=>{
  progress.classList.add('invisible')
  video.parentElement.classList.remove('invisible')
  startRecording()
})
let interval;
video.addEventListener('play',()=>{
  console.log('video started.');
  const canvas = faceapi.createCanvasFromMedia(video)
  document.body.append(canvas)
  const displaySize = {width:video.width,height:video.height}
  faceapi.matchDimensions(canvas,displaySize)
  interval = setInterval(async ()=>{
    let detections = await faceapi.detectAllFaces(video).withFaceLandmarks()//.withFaceDescriptors();
    const resizedDetections = faceapi.resizeResults(detections,displaySize);
    console.log(detections.length);
    /*
    if(detections.length>0){
      new faceapi.LabeledFaceDescriptors('namedDetection', [detections[0].descriptor]).then(()=>console.log('detection named'))
    }
    */
    canvas.getContext('2d').clearRect(0,0,canvas.width,canvas.height)
    canvas.style.left = video.getBoundingClientRect().y;
    canvas.style.top = video.getBoundingClientRect().x;
    faceapi.draw.drawDetections(canvas,resizedDetections)
  },100)
})
}
