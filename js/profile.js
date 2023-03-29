window.addEventListener('DOMContentLoaded',(e)=>{
    fetch("../php/profile.php").then(res=>res.json()).then(data=>{
        console.log(data);
        if(data.success){
            let user = data.user;
          document.getElementById('name').textContent = 'Welcome '+((user.gender==='Male')?'Mr. ':'Ms. ')+user.first_name+" "+user.last_name;
          document.getElementById('email').textContent='Email : '+user.email;
          document.getElementById('age').textContent='Age : '+user.age;
          document.getElementById('gender').textContent='Gender : '+user.gender;
          document.getElementById('mobile').textContent='Mobile : '+user.mobile;
        }else{
            alert(data.message);
        }
    });
});