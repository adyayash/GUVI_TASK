const login_rules = {
    email: {
        presence: true,
        email:true
      },
      password:{
        presence:true,
        length:{
            minimum:8,
            maximum:200
        }
      }
    
};


document.getElementById("login-form").addEventListener('submit',(e)=>{
    e.preventDefault();

    function clearErrorFields(fields){
        for(let field of fields){
          document.getElementById("error-"+field).innerHTML="";
        }
      }
  
      function setErrorFields(fields,errors){
        for(let field of fields){
          let errContent = '';
          if(errors[field]){
            errContent = '<ul>'
            for(let error of errors[field]){
                errContent+='<li>'+error+'</li>';
            }
            errContent+='</ul>';
          }
          document.getElementById("error-"+field).innerHTML = errContent;
  
        }
      }

      const fields = ['email','password'];

      clearErrorFields(fields);

      

    const values = validate.collectFormValues(e.target);

    console.log(values);

    const validated = validate(values,login_rules);
    const data = new URLSearchParams(new FormData(e.target));
    if(validated===undefined){
        fetch("../php/login.php",{
            method:'POST',
            body:data
        }).then((res)=>res.json()).then(data=>{
            alert(data.message);
            if(data.success){
                window.location.replace("../html/profile.html");
            }
        });
    }else{
        setErrorFields(fields,validated);
    }
});