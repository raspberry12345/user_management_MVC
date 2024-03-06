const form = document.getElementById("form")
const submitBtn = document.getElementById("submitBtn")



submitBtn.addEventListener("click", (e)=>{
    e.preventDefault()
    const formData = new FormData(form)
    fetch("controller/userController.php",{
        method: 'POST',
        body: formData
    })
})