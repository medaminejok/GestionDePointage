const MODEL_URL = '/models'
const maxDescriptorDistance = 0.6
const video = document.querySelector('video')
const progress = document.querySelector('progress')
const button = document.querySelector('button')
const nameInput = document.querySelector('input[type=text]')
const fileInput = document.querySelector('input[type=file]')
let labeledFaceDescriptors = []//,results = null,fullFaceDescriptions=null;


function startRecording(){
navigator.getUserMedia({video:{}},stream => video.srcObject = stream,err=>console.log(err));
}



Promise.all([
  faceapi.loadSsdMobilenetv1Model(MODEL_URL),
  faceapi.loadFaceLandmarkModel(MODEL_URL),
  faceapi.loadFaceRecognitionModel(MODEL_URL),
]).then(()=>{
  progress.classList.add('invisible')
  video.parentElement.classList.remove('invisible')
  startRecording();
});


let interval;
video.addEventListener('play',()=>{

  const canvas = faceapi.createCanvasFromMedia(video)
  document.body.append(canvas)
  const displaySize = {width:video.width,height:video.height}
  faceapi.matchDimensions(canvas,displaySize)
  interval = setInterval(async ()=>{
    let detections = await faceapi.detectAllFaces(video).withFaceLandmarks().withFaceDescriptors();
    const resizedDetections = faceapi.resizeResults(detections,displaySize);
    canvas.getContext('2d').clearRect(0,0,canvas.width,canvas.height)
    canvas.style.left = video.getBoundingClientRect().x+'px';
    canvas.style.top = video.getBoundingClientRect().y+'px';
    //faceapi.draw.drawDetections(canvas,resizedDetections);
    console.log(labeledFaceDescriptors.length);
    if(labeledFaceDescriptors.length){
        console.log('draw landmarks.');
      const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, maxDescriptorDistance)
      const fullFaceDescriptions = await faceapi.detectAllFaces(video).withFaceLandmarks().withFaceDescriptors()
      const results = fullFaceDescriptions.map(fd => faceMatcher.findBestMatch(fd.descriptor))
      results.forEach((bestMatch, i) => {
        const box = fullFaceDescriptions[i].detection.box
        const text = bestMatch.toString()
        const drawBox = new faceapi.draw.DrawBox(box, { label: text })
        drawBox.draw(canvas)
      })
    }
  },100)
})

function FileToImg(input){
  return new Promise((resolve)=>{
    fileReader = new FileReader()
    fileReader.addEventListener('load',function(){
    const img = document.createElement('img')
    img.src = this.result
    resolve(img);
    })
    fileReader.readAsDataURL(input.files[0])
  })
}

function showAlert(selector,interval=1500){
  const alrt = document.querySelector(selector);
  alrt.classList.remove('invisible')
  setTimeout(()=>alrt.classList.add('invisible'),interval)
}

button.addEventListener('click',async ()=>{
  if(nameInput.value.length && fileInput.files.length){
    try{
      //const imgUrl = `${label}.jpg`
      const label = nameInput.value;
      nameInput.value = '';
      const img = await FileToImg(fileInput) //faceapi.fetchImage(imgUrl)
      fileInput.value = "";
      // detect the face with the highest score in the image and compute it's landmarks and face descriptor
      const fullFaceDescription = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor()

      if (!fullFaceDescription) {
        throw new Error(`no faces detected for ${label}`)
      }

      const faceDescriptors = [fullFaceDescription.descriptor]
      const faceLabel =  new faceapi.LabeledFaceDescriptors(label, faceDescriptors)
      labeledFaceDescriptors.push(faceLabel);
      showAlert('.alert-success',2000)
    }catch(e){
      console.log(e);
      showAlert('.alert-danger',2000)
    }
  }else{
    showAlert('.alert-warning',2000)
  }
})
