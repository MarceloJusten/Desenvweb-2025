function validarLogin(){
    buttonLogin = document.getElementById('button_login');
    
    user = document.getElementById('campo_usuario');
    pass = document.getElementById('campo_senha');

    user.classList.remove('user_pass_fail');
    pass.classList.remove('user_pass_fail');

    if (user.value === 'user' && pass.value === 'pass') {
        alert('Login Ok');
        
    } else {
        alert('Usuário ou senha incorretos.');
        
        user.classList.add('user_pass_fail');
        pass.classList.add('user_pass_fail');
    }
};
