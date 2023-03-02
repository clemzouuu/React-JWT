import {useState} from 'react'

export default function Form () {

const [formData, setFormData] = useState({
    username:"",
    password:""
})

function handleChange(event){
    const {name, value} = event.target
    setFormData((prevValue) => ({
        ...prevValue, 
        [event.target.name]: event.target.value
    }))  
} 


function handleSubmit (event)  {
    event.preventDefault();

    const formData = new FormData(event.target);

    fetch('http://localhost:5758/', {
        method: 'POST',
        body: formData,
        mode:"no-cors"}
        )

    .then(response => response.text())
    .then(data => console.log(data))
    .then()
    .catch(error => console.error(error))

    setFormData({
        username:"",
        password:""
    })
}

    return(
        <form className="form" onSubmit={handleSubmit} method="POST" action='http://localhost:5758/'>

            <input
                type="text"
                placeholder="Username"
                className="form--input"
                name="username"
                onChange={handleChange}
                value={formData.username}
            />

            <input
                type="password"
                placeholder="Password"
                className="form--input"
                name="password"
                onChange={handleChange}
                value={formData.password}
            />

            <input type="submit" className="form--submit" onSubmit={handleSubmit}/>  
        </form>
    )
}
