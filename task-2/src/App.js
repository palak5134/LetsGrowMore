
import React, { useState} from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import './index.css'

const App=()=> {
  const [users, setuser] = useState([]);
  const [loading, setLoading] = useState(false);

  const loadusers = async () => {
   
      const res =await fetch("https://reqres.in/api/users?page=1")
      const resjson = await res.json();
      setuser(resjson.data)
      console.log(resjson.data)
  
  
  }
   
  const func = () => {
    setLoading(true)
    setTimeout(() => {
    setLoading(false)
    loadusers()
    }, 3000)
  }

  if (loading) return (
    <div class="mt-5 text-center">
   <img  class="mt-5 text-center"src={process.env.PUBLIC_URL + '/Loading-gif.gif'} /> 
  </div>
  )
  return (
    
    <div className="main">
      
      <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top" >
      <div class="container-fluid">
        
          <a className="navbar-brand text-light fw-bold ps-5" href="#">Users</a>
        
        <button onClick={func} type="button" class="btn btn-primary me-5">GetUsers</button>
      </div>

      </nav>
    
     <div className="container mt-5 mb-5" >
      <div class="row text-center  mx-auto">
          {users ? users.map(({ id, email, avatar, first_name, last_name }) => (
     
        <div class="col-md-4 mt-4 text-center mx-auto">
        <div class="wrapper text-center mx-auto ">
           <div class="card js-profile-card mx-auto">
              <img src={avatar} alt="profile card"/>

              <div className="title fw-bolder">{first_name + " " + last_name}</div>
              <p className="mt-1 text-muted">{email}</p>
              <p className="text-muted">#{id}</p>
    
  </div>

</div>
          </div>
         
          
      )
     
      )
        :<p className="text-light">loading...</p>}
        </div>
        </div>
    
    </div>
  
    
  );
}


export default App;
