
window.onload = () => {
    const availableIds = []
    fetch("controller/userController.php?operations=read",{
        method: 'GET'
    }).then((res) => res.json()).then((data) => {
        //console.log(data)
        for (let index = 0; index < data.length; index++) {
            availableIds.push(data[index]['id'])
            const container = document.getElementById('container')
            const pElement = document.createElement("p")
            const textNode = document.createTextNode("id: "+data[index]['id']+"  "+"firstname: "+data[index]['firstname']+"  "+"lastname: "+data[index]['lastname']+"  "+"age: "+data[index]['age'])
            pElement.appendChild(textNode)
            container.appendChild(pElement)
        }

        
            
        const changeBtn = document.getElementById("update")
        const deleteBtn = document.getElementById("delete")
        const inputId = document.getElementById("idInput")
        const submitBtn = document.getElementById("submitBtn")
        changeBtn.addEventListener("click",()=>{
                
            if (availableIds.includes(Number(inputId.value))) {
                const editInput = document.getElementById("editInput")
                const headingEdit = document.getElementById("heading")
                
                editInput.style.display = "block"
                headingEdit.innerHTML = "edit user with the id= "+inputId.value
                
            }
        })

        submitBtn.addEventListener("click", ()=>{

            const firstnameEdit = document.getElementById("firstname")
            const lastnameEdit = document.getElementById("lastname")
            const ageEdit = document.getElementById("age")

            fetch("controller/userController.php?id="+inputId.value+"&operations=update&firstname="+firstnameEdit.value+"&lastname="+lastnameEdit.value+"&age="+ageEdit.value,{
                method: 'GET'
            })
        })

        
        deleteBtn.addEventListener("click",()=>{
                
            if (availableIds.includes(Number(inputId.value))) {
                fetch("controller/userController.php?id="+inputId.value+"&operations=delete",{
                    method: 'GET'
                })
            }
        })
        
    })

    
    
    
    
    

}
