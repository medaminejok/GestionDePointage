(async ()=>{
const labels = ['profile']

const labeledFaceDescriptors = await Promise.all(
  labels.map(async label => {
    // fetch image data from urls and convert blob to HTMLImage element
    const imgUrl = `${label}.jpg`
    const img = await faceapi.fetchImage(imgUrl)

    // detect the face with the highest score in the image and compute it's landmarks and face descriptor
    const fullFaceDescription = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor()

    if (!fullFaceDescription) {
      throw new Error(`no faces detected for ${label}`)
    }

    const faceDescriptors = [fullFaceDescription.descriptor]
    return new faceapi.LabeledFaceDescriptors(label, faceDescriptors)
  })
)
const maxDescriptorDistance = 0.6
const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, maxDescriptorDistance)
const fullFaceDescriptions = await faceapi.detectAllFaces(video).withFaceLandmarks().withFaceDescriptors()
const results = fullFaceDescriptions.map(fd => faceMatcher.findBestMatch(fd.descriptor))
results.forEach((bestMatch, i) => {
  const box = fullFaceDescriptions[i].detection.box
  const text = bestMatch.toString()
  const drawBox = new faceapi.draw.DrawBox(box, { label: text })
  const canvas = document.querySelector('canvas')
  drawBox.draw(canvas)
})
console.log('terminated')
})()

fileReader = new FileReader()
fileReader.addEventListener('load',function(){
console.log(this.result)
})
fileReader.readAsDataURL($('input[type=file]').files[0])
//-------------------------------


(async ()=>{
  const labels = ['profile']
labeledFaceDescriptors = await Promise.all(
    labels.map(async label => {
      // fetch image data from urls and convert blob to HTMLImage element
      const imgUrl = `${label}.jpg`
      const img = await faceapi.fetchImage(imgUrl)

      // detect the face with the highest score in the image and compute it's landmarks and face descriptor
      const fullFaceDescription = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor()

      if (!fullFaceDescription) {
        throw new Error(`no faces detected for ${label}`)
      }

      const faceDescriptors = [fullFaceDescription.descriptor]
      return new faceapi.LabeledFaceDescriptors(label, faceDescriptors)
    })
)
});


/// junk





const fn = async (name)=>{
  const image = await faceapi.fetchImage('/profile.jpg')
  const faceDetection = faceapi.detectSingleFace(image).withFaceLandmarks().withFaceDescriptor();
  labeledFaceDescriptors.push(
  new faceapi.LabeledFaceDescriptors(
    name,
    [faceDetection]
  ))
  if(labeledDescriptors.length === 0) throw new Error('there is no face detected')
  console.log(labeledFaceDescriptors);
  return
  const faceMatcher = new faceapi.FaceMatcher(labeledDescriptors)
  const results = faceMatcher.findBestMatch(labeledDescriptors.find(()=>true).descriptor)
  console.log(results);
  const canvas = document.querySelector('canvas')
  const displaySize = {width:video.width,height:video.height}
  faceapi.matchDimensions(canvas,displaySize)
  canvas.style.left = video.getBoundingClientRect().y;
  canvas.style.top = video.getBoundingClientRect().x;
  const box = labeledDescriptors.find(()=>true).detection.box;
  const text = results.toString();
  const drawBox = new faceapi.draw.DrawBox(box, { label: text });
  drawBox.draw(canvas)
}

async function landmarkRecognizedFaces(){
  labeledFaceDescriptors.foreach(el=>{
    const maxDescriptorDistance = 0.6;
    const faceMatcher = new faceapi.FaceMatcher(el.faceDescriptor, maxDescriptorDistance)
    const results = faceMatcher.findBestMatch(fullFaceDescriptions.descriptor)
    console.log(results);
    const canvas = document.createElement('canvas')
    document.body.append(canvas)
    const displaySize = {width:video.width,height:video.height}
    faceapi.matchDimensions(canvas,displaySize)
    canvas.style.left = video.getBoundingClientRect().y;
    canvas.style.top = video.getBoundingClientRect().x;
    const box = fullFaceDescriptions.detection.box;
    const text = results.toString();
    const drawBox = new faceapi.draw.DrawBox(box, { label: text });
    drawBox.draw(canvas)
  })
}


(async ()=>{
  console.log('recognition started');
  //const img = await faceapi.fetchImage('photo-1507003211169-0a1dd7228f2d.jpg')


});

async  function detecteSingleFace(){
let fullFaceDescription = await faceapi.detectSingleFace(video).withFaceLandmarks().withFaceDescriptor()
console.log(fullFaceDescription);
if (!fullFaceDescription) {
  throw new Error(`no faces detected for faceLabel`)
}
const faceDescriptor = [fullFaceDescription.descriptor]
labeledFaceDescriptors.push({faceDescriptor:await new faceapi.LabeledFaceDescriptors('faceLabel', faceDescriptor),fullFaceDescription});
}
