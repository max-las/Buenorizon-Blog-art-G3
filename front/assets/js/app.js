let toggleEye = false
// Animation oeil mot de passe
const eye = document.getElementById("eye")
const input = document.getElementById("input-login")
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
  input.type = input.type === "password" ? "text" : "password"
})

// Animation checkbox Se souvenir de moi
let toggleCheckbox = false
const checkbox = document.getElementById("checkbox")
var animation = bodymovin.loadAnimation({
  container: checkbox,
  renderer: "svg",
  path: "/front/assets/json/checkBox.json",
  name: "checkbox",
  autoplay: false,
})
checkbox.addEventListener("click", () => {
  toggleCheckbox = !toggleCheckbox
  toggleCheckbox
    ? lottie.setDirection(1, "checkbox")
    : lottie.setDirection(-1, "checkbox")
  lottie.play("checkbox")
})
