function parseBool(char) {
  return char == "true"
}
// Animation oeil mot de passe
let toggleEye = false
const eye = document.getElementById("eye")
const inputEye = document.getElementById("input-login")
var animation = bodymovin.loadAnimation({
  container: eye,
  renderer: "svg",
  path: "/front/assets/json/visibilityV2.json",
  name: "eye",
})
lottie.setSpeed(1.25, "eye")
eye.addEventListener("click", () => {
  toggleEye = !toggleEye
  lottie.play("eye")
  toggleEye ? lottie.setDirection(-1, "eye") : lottie.setDirection(1, "eye")
  inputEye.type = inputEye.type === "password" ? "text" : "password"
})

let toggleEyeSignin1 = false
const eyeSignin1 = document.getElementById("eyeSignin1")
const inputEyeSignin1 = document.getElementsByClassName("input-signin1")[0]
var animation = bodymovin.loadAnimation({
  container: eyeSignin1,
  renderer: "svg",
  path: "/front/assets/json/visibilityV2.json",
  name: "eyeSignin1",
})
lottie.setSpeed(1.25, "eyeSignin1")
eyeSignin1.addEventListener("click", () => {
  toggleEyeSignin1 = !toggleEyeSignin1
  lottie.play("eyeSignin1")
  toggleEyeSignin1
    ? lottie.setDirection(-1, "eyeSignin1")
    : lottie.setDirection(1, "eyeSignin1")
  inputEyeSignin1.type =
    inputEyeSignin1.type === "password" ? "text" : "password"
})

let toggleEyeSignin2 = false
const eyeSignin2 = document.getElementById("eyeSignin2")
const inputEyeSignin2 = document.getElementsByClassName("input-signin2")[0]
var animation = bodymovin.loadAnimation({
  container: eyeSignin2,
  renderer: "svg",
  path: "/front/assets/json/visibilityV2.json",
  name: "eyeSignin2",
})
lottie.setSpeed(1.25, "eyeSignin2")
eyeSignin2.addEventListener("click", () => {
  toggleEyeSignin2 = !toggleEyeSignin2
  lottie.play("eyeSignin2")
  toggleEyeSignin2
    ? lottie.setDirection(-1, "eyeSignin2")
    : lottie.setDirection(1, "eyeSignin2")
  inputEyeSignin2.type =
    inputEyeSignin2.type === "password" ? "text" : "password"
})

// Animation checkbox Se souvenir de moi
let toggleCheckbox = false
const checkbox = document.getElementById("checkbox")
let inputCheckbox = document.getElementById("souvMemb")
var animation = bodymovin.loadAnimation({
  container: checkbox,
  renderer: "svg",
  path: "/front/assets/json/checkBox.json",
  name: "checkbox",
  autoplay: false,
})
checkbox.addEventListener("click", () => {
  toggleCheckbox = !toggleCheckbox
  inputCheckbox.value = !parseBool(inputCheckbox.value)
  toggleCheckbox
    ? lottie.setDirection(1, "checkbox")
    : lottie.setDirection(-1, "checkbox")
  lottie.play("checkbox")
})
