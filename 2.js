/* Tanda ^ artinya diawali dengan
  (?=.*\d)          // should contain at least one digit
  (?=.*[a-z])       // should contain at least one lower case
  (?=.*[A-Z])       // should contain at least one upper case
  (?=.*[!@#\$%\^\&*\)\(+=._-])(?=.*\d)(?=.*[@]) // should contain at least one special character
  [a-zA-Z0-9]{5,9}   // should contain at least 8 from the mentioned characters
  [0-9!@#\$%\^\&*\)\(+=._-] // should contain at least one on first string from the mentioned characters
  
*/
function is_username_valid(username){
    
    if(username == username.match(/^[0-9!@#\$%\^\&*\)\(+=._-](?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{5,9}$/)){
        console.log("false");
      }else if(username == username.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{5,9}$/)){
        console.log("true");
      }else{
        console.log("false");
      }
}
function is_password_valid(password){
    
    if(password == password.match(/^(?=.*[!@#\$%\^\&*\)\(+=._-])(?=.*\d)(?=.*[=])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#\$%\^\&*\)\(+=._-]{8,}$/)){
      console.log("true");
    }else{
      console.log("false");
    }
}

is_username_valid('D1iana');
is_password_valid('passW0rd=');