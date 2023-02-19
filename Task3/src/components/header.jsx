import React from "react";
import Index from "../pages/index";
import { Link, useNavigate } from "react-router-dom";
import Logo from "../images/logo.svg";

const Header = () => {
  const navigate = useNavigate();
  const Logout = () => {
    localStorage.setItem("session", 0);
    window.location.reload();
    navigate("/", { state: Index });
  };
  return (
    <header className="header">
      <div className="header__content">
        <img className="logo" src={Logo} alt="" />
        {localStorage.getItem("session") == 1 ? (
          <nav className="nav">
            <Link className="nav__link" to="/">
              Главная
            </Link>
            <Link className="nav__link" to="/articles">
              Новости
            </Link>
            <Link className="nav__link" to="/profile">
              Профиль
            </Link>
            <Link className="nav__link" onClick={Logout}>
              Выйти
            </Link>
          </nav>
        ) : (
          <nav className="nav">
            <Link className="nav__link" to="/">
              Главная
            </Link>
            <Link className="nav__link" to="/articles">
              Новости
            </Link>
            <Link className="nav__link" to="/login">
              Войти
            </Link>
          </nav>
        )}
      </div>
    </header>
  );
};

export default Header;
