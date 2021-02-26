let toggle = false
// Animation oeil mot de passe
const eye = document.getElementById("eye")
const input = document.getElementById("input-login")
var animation = bodymovin.loadAnimation({
  container: eye,
  renderer: "svg",
  path: "./../../assets/json/visibilityV2.json",
  name: "eye",
})
lottie.setSpeed(1.25, "eye")
eye.addEventListener("click", () => {
  toggle = !toggle
  lottie.play("eye")
  toggle ? lottie.setDirection(-1, "eye") : lottie.setDirection(1, "eye")
  input.type = input.type === "password" ? "text" : "password"
})

// Animation checkbox Se souvenir de moi
const checkbox = document.getElementById("checkbox")
var animation = bodymovin.loadAnimation({
  container: checkbox,
  renderer: "svg",
  path: "./../../assets/json/checkBox.json",
  name: "checkbox",
  autoplay: false,
})
checkbox.addEventListener("click", () => {
  toggle = !toggle
  lottie.play("checkbox")
  console.log(toggle)
  toggle
    ? lottie.setDirection(1, "checkbox")
    : lottie.setDirection(-1, "checkbox")
})
