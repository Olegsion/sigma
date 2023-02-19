import React, { useState } from "react";
import { useNavigate } from "react-router-dom";

const Login = () => {
  const [login, setLogin] = useState("");
  const [passsword, setPasssword] = useState("");
  const navigate = useNavigate();

  const Login = () => {
    if (login == 'User' && passsword=='12345') {
      localStorage.setItem('session', 1)
      navigate('/profile', { replace: true })
    } else {
      alert("Неверный логин или пароль")
    }
    console.log(localStorage.getItem('session'))
  }
  return (
      <form className="login-form">
        <h2>Введите логин и пароль</h2>
        <input 
          type="text" 
          placeholder="Введите логин"
          onChange={(e) => setLogin(e.target.value)}
          required />
        <input 
          type="password" 
          placeholder="Введите пароль"
          onChange={(e) => setPasssword(e.target.value)}
          required />
        <button onClick={Login}>Войти</button>
      </form>
  );
};

export default Login;
