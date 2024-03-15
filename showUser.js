
window.onload = () => {
    const availableIds = []
    fetch("controller/userController.php",{
        method: 'GET'
    }).then((res) => res.json()).then((data) => {
        console.log(data)
        for (let index = 0; index < data.length; index++) {
            availableIds.add(data[index]['id'])
            const container = document.getElementById('container')
            const pElement = document.createElement("p")
            const textNode = document.createTextNode("id: "+data[index]['id']+"  "+"firstname: "+data[index]['firstname']+"  "+"lastname: "+data[index]['lastname']+"  "+"age: "+data[index]['age'])
            pElement.appendChild(textNode)
            container.appendChild(pElement)
        }
        
    })
    
}
