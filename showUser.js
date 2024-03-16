
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
        changeBtn.addEventListener("click",()=>{
                
            if (availableIds.includes(Number(inputId.value))) {
                fetch("controller/userController.php?id="+inputId.value+"&operations=update",{
                    method: 'GET'
                })
            }
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
